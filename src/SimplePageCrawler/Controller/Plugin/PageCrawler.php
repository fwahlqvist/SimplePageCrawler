<?php

/*
 * This file is part of the SimplePageCrawler package.
 * @copyright Copyright (c) 2012 Blanchon Vincent - France (http://developpeur-zend-framework.fr - blanchon.vincent@gmail.com)
 */

namespace SimplePageCrawler\Controller\Plugin;

use SimplePageCrawler\PageCrawler as BasePageCrawler;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class PageCrawler extends AbstractPlugin
{
    protected $pageCrawler;

    public function __invoke($uri = null)
    {
        if(null === $uri) {
            return $this;
        }
        return $this->get($uri);
    }

    public function get($uri)
    {
        $pagecrawler = $this->getPageCrawler();
        return $pagecrawler->get($uri);
    }

    public function getPageCrawler()
    {
        return $this->pageCrawler;
    }

    public function setPageCrawler(BasePageCrawler $pageCrawler)
    {
        $this->pageCrawler = $pageCrawler;
        return $this;
    }
}
