<?php

/*
 * This file is part of the SimplePageCrawler package.
 * @copyright Copyright (c) 2012 Blanchon Vincent - France (http://developpeur-zend-framework.fr - blanchon.vincent@gmail.com)
 */

namespace SimplePageCrawlerTest\Controller\Plugin;

use PHPUnit_Framework_TestCase as TestCase;
use SimplePageCrawler\Response;
use Zend\ServiceManager;
use Zend\Mvc\Controller\PluginManager;

class PageCrawlerTest extends TestCase
{
    protected $sm;

    public function setUp()
    {
        $config = include __DIR__ . '/../../../../config/module.config.php';
        $this->sm = new PluginManager(new ServiceManager\Config($config['controller_plugins']));
        $smApp =  new ServiceManager\ServiceManager(new ServiceManager\Config($config['service_manager']));
        $smApp->setService('Config', $config);
        $this->sm->setServiceLocator($smApp);
    }

    public function testCanGetFactory()
    {
        $pageCrawler = $this->sm->get('SimplePageCrawler');
        $this->assertEquals(get_class($pageCrawler), 'SimplePageCrawler\Controller\Plugin\PageCrawler');
    }

    public function testCanCrawlPage()
    {
        $helper = $this->sm->get('SimplePageCrawler');
        $response = $helper('http://www.zend.com/fr/');
        $this->assertEquals(true, $response instanceof Response);

        $response = $helper->get('http://www.zend.com/fr/');
        $this->assertEquals(true, $response instanceof Response);

        $response = $helper()->get('http://www.zend.com/fr/');
        $this->assertEquals(true, $response instanceof Response);
    }
}
