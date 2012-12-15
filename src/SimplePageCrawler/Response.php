<?php

/*
 * This file is part of the SimplePageCrawler package.
 * @copyright Copyright (c) 2012 Blanchon Vincent - France (http://developpeur-zend-framework.fr - blanchon.vincent@gmail.com)
 */

namespace SimplePageCrawler;

use ArrayObject;
use Zend\Stdlib\AbstractOptions;

class Response extends AbstractOptions
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var ArrayObject
     */
    protected $meta;

    /**
     * @var ArrayObject
     */
    protected $images;

    /**
     * @var ArrayObject
     */
    protected $headingTags;

    public function __construct($options = null)
    {
        parent::__construct($options);
        $this->meta = new ArrayObject();
        $this->images = new ArrayObject();
        $this->headingTags = new ArrayObject();
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getMeta($meta = null)
    {
        if($meta) {
            return $this->meta[$meta];
        }
        return $this->meta;
    }

    public function setMeta(array $meta)
    {
        $this->meta->exchangeArray($meta);
        return $this;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function setImages(array $images)
    {
        $this->images->exchangeArray($images);
        return $this;
    }

    public function getHeadingTags()
    {
        return $this->headingTags;
    }

    public function setHeadingTags(array $headingTags)
    {
        $this->headingTags->exchangeArray($headingTags);
        return $this;
    }

    public function getH1()
    {
        return $this->headingTags['h1'];
    }

    public function getH2()
    {
        return $this->headingTags['h2'];
    }

    public function getH3()
    {
        return $this->headingTags['h3'];
    }

    public function getH4()
    {
        return $this->headingTags['h4'];
    }

    public function getH5()
    {
        return $this->headingTags['h5'];
    }
}
