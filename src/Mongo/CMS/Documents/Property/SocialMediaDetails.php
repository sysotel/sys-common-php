<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Documents\Property;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Delta4op\Mongodb\Documents\EmbeddedDocument;

/**
 * @ODM\EmbeddedDocument
 */
class SocialMediaDetails extends EmbeddedDocument
{
    /**
     * @var ?string
     * @ODM\Field (type="string")
     */
    protected $facebookUrl;

    /**
     * @var ?string
     * @ODM\Field (type="string")
     */
    protected $twitterUrl;

    /**
     * @var ?string
     * @ODM\Field (type="string")
     */
    protected $instagramUrl;

    /**
     * @var ?string
     * @ODM\Field (type="string")
     */
    protected $youtubeUrl;

    /**
     * @var ?string
     * @ODM\Field (type="string")
     */
    protected $linkedinUrl;

    /**
     * @var ?string
     * @ODM\Field (type="string")
     */
    protected $pinterestUrl;

    /**
     * @var ?string
     * @ODM\Field (type="string")
     */
    protected $websiteUrl;

    /**
     * @return string|null
     */
    public function getFacebookUrl(): ?string
    {
        return $this->facebookUrl;
    }

    /**
     * @param string|null $facebookUrl
     */
    public function setFacebookUrl(?string $facebookUrl): void
    {
        $this->facebookUrl = $facebookUrl;
    }

    /**
     * @return string|null
     */
    public function getTwitterUrl(): ?string
    {
        return $this->twitterUrl;
    }

    /**
     * @param string|null $twitterUrl
     */
    public function setTwitterUrl(?string $twitterUrl): void
    {
        $this->twitterUrl = $twitterUrl;
    }

    /**
     * @return string|null
     */
    public function getInstagramUrl(): ?string
    {
        return $this->instagramUrl;
    }

    /**
     * @param string|null $instagramUrl
     */
    public function setInstagramUrl(?string $instagramUrl): void
    {
        $this->instagramUrl = $instagramUrl;
    }

    /**
     * @return string|null
     */
    public function getYoutubeUrl(): ?string
    {
        return $this->youtubeUrl;
    }

    /**
     * @param string|null $youtubeUrl
     */
    public function setYoutubeUrl(?string $youtubeUrl): void
    {
        $this->youtubeUrl = $youtubeUrl;
    }

    /**
     * @return string|null
     */
    public function getLinkedinUrl(): ?string
    {
        return $this->linkedinUrl;
    }

    /**
     * @param string|null $linkedinUrl
     */
    public function setLinkedinUrl(?string $linkedinUrl): void
    {
        $this->linkedinUrl = $linkedinUrl;
    }

    /**
     * @return string|null
     */
    public function getPinterestUrl(): ?string
    {
        return $this->pinterestUrl;
    }

    /**
     * @param string|null $pinterestUrl
     */
    public function setPinterestUrl(?string $pinterestUrl): void
    {
        $this->pinterestUrl = $pinterestUrl;
    }

    /**
     * @return string|null
     */
    public function getWebsiteUrl(): ?string
    {
        return $this->websiteUrl;
    }

    /**
     * @param string|null $websiteUrl
     */
    public function setWebsiteUrl(?string $websiteUrl): void
    {
        $this->websiteUrl = $websiteUrl;
    }



}
