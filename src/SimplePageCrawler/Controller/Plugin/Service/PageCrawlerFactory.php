<?php

/*
 * This file is part of the SimplePageCrawler package.
 * @copyright Copyright (c) 2012 Blanchon Vincent - France (http://developpeur-zend-framework.fr - blanchon.vincent@gmail.com)
 */

namespace SimplePageCrawler\Controller\Plugin\Service;

use SimplePageCrawler\Controller\Plugin\PageCrawler;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PageCrawlerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $serviceLocator = $serviceLocator->getServiceLocator();
        $pageCrawler = $serviceLocator->get('SimplePageCrawler');
        $plugin = new PageCrawler();
        $plugin->setPageCrawler($pageCrawler);
        return $plugin;
    }
}
