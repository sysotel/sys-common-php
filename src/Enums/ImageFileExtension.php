<?php

namespace SYSOTEL\APP\Common\Enums;

enum ImageFileExtension: string
{
    case PNG = 'PNG';
    case JPG = 'JPG';
    case JPEG = 'JPEG';
    case WEBP = 'WEBP';

    /**
     * @param string $mime
     * @return ImageFileExtension|null
     */
    public static function createFromMime(string $mime): ?ImageFileExtension
    {
        return match ($mime) {
            'image/jpeg', 'image/jpg' => self::JPG,
            'image/png' => self::PNG,
            'image/webp' => self::WEBP,
            default => null
        };
    }
}
