<?php

namespace SYSOTEL\APP\Common\Services\ImageServices;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use SYSOTEL\APP\Common\Enums\CMS\PropertyImageVersion;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyImage\ImageItem;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyImage\ImageMetadata;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyImage\ImageResolution;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\PropertyImage\PropertyImage;

class ImageStorageManager
{
    /**
     * @var PropertyImage
     */
    protected $document;

    /**
     * @var string
     */
    protected $driver;

    /**
     * @var string
     */
    protected $originalImageFolderName = 'original';

    public function __construct(string $driver)
    {
        $this->driver = $driver;
    }

    /**
     * @param PropertyImage $document
     * @return $this
     */
    public function useDocument(PropertyImage $document): static
    {
        $this->document = $document;

        return $this;
    }

    /**
     * @param UploadedFile $imageFile
     * @return PropertyImage
     */
    public function storeImage(UploadedFile $imageFile): PropertyImage
    {
        if(!$this->document) {
            abort(500, 'No image document is set');
        }

        $image = Image::make($imageFile);
        $image->backup();

        $extension = $imageFile->extension();
        $uniqueID = $this->uniqueID();
        $fileName = $uniqueID . '.' . $extension;

        $filePath = $this->getFullPath(PropertyImageVersion::ORIGINAL, $fileName);
        $this->upload($filePath, $image);

        $this->document->items->add(new ImageItem([
            'version' => PropertyImageVersion::ORIGINAL,
            'filePath' => $filePath,
            'meta' => $this->getMeta($image, strtolower($extension))
        ]));

        $filePath = $this->getFullPath(PropertyImageVersion::ORIGINAL_NORMALIZED, $fileName);
        $this->upload($filePath, $image);

        $this->document->items->add(new ImageItem([
            'version' => PropertyImageVersion::ORIGINAL_NORMALIZED,
            'filePath' => $filePath,
            'meta' => $this->getMeta($image, strtolower($extension))
        ]));

        foreach ($this->imageVersions() as $version) {

            $image->fit(...$version->dimentions());
            $filePath = $this->getFullPath($version, $fileName);

            $this->upload($filePath, $image);

            $this->document->items->add(new ImageItem([
                'version' => $version,
                'filePath' => $filePath,
                'meta' => $this->getMeta($image, strtolower($extension))
            ]));

            $image->reset();
        }

        return $this->document;
    }

    /**
     * @return string
     */
    protected function uniqueID(): string
    {
        return \uniqid(now()->timestamp . $this->document->propertyID);
    }

    /**
     * @return string
     */
    protected function basePath(): string
    {
        return 'properties/' . $this->document->propertyID . '/images';
    }

    /**
     * @param PropertyImageVersion $version
     * @return string
     */
    protected function getPath(PropertyImageVersion $version): string
    {
        return 'properties/' . $this->document->propertyID . '/images/' . $version->value;
    }

    /**
     * @param PropertyImageVersion $version
     * @param string $fileName
     * @return string
     */
    protected function getFullPath(PropertyImageVersion $version, string $fileName): string
    {
        return $this->getPath($version) . '/' . $fileName;
    }

    /**
     * @param $fullPath
     * @param $image
     */
    protected function upload($fullPath, $image)
    {
        Storage::disk($this->driver)->put($fullPath, $image->stream(), 'public');
    }

    /**
     * @param \Intervention\Image\Image $image
     * @param string $extension
     * @return ImageMetadata
     */
    protected function getMeta(\Intervention\Image\Image $image, string $extension): ImageMetadata
    {
        return new ImageMetadata([
            'resolution' => new ImageResolution([
                'widthInPX' => $image->width(),
                'heightInPX' => $image->height(),
            ]),
            'extension' => $extension,
            'sizeInKB' => $image->filesize(),
        ]);
    }

    /**
     * @param PropertyImage $image
     * @param PropertyImageVersion $version
     * @return string|null
     */
    public function imageURL(PropertyImage $image, PropertyImageVersion $version): ?string
    {
        $imageItem = $image->getImageItem($version);

        if(!$imageItem) return null;

        return Storage::disk($this->driver)->url($imageItem->filePath);
    }

    /**
     * @return PropertyImageVersion[]
     */
    public function imageVersions(): array
    {
        return [
            PropertyImageVersion::SQUARE_SMALL,
            PropertyImageVersion::SQUARE_MEDIUM,
            PropertyImageVersion::SQUARE_LARGE,
            PropertyImageVersion::STANDARD_SMALL,
            PropertyImageVersion::STANDARD_MEDIUM,
            PropertyImageVersion::STANDARD_LARGE,
        ];
    }
}
