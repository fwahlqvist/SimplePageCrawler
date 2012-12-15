ZF2 SimplePageCrawler module
===================

Version 0.1 Created by [Vincent Blanchon](http://developpeur-zend-framework.fr/)

Introduction
------------

SimplePageCrawler is a web page crawler.
You can get informations :

* Title
* Meta (decsription, etc.)
* H1, H2, etc.
* List of the images
* Weight of the page

Usage
------------

Get page informations :

```php
$crawler = $this->getServiceLocator('SimplePageCrawler');
$page = $crawler->get('http://www.nytimes.com');

echo sprintf('The title is "%s"', $page->getTitle());
echo sprintf('The description is "%s"', $page->getMeta('description'));
```

You can use th action helper :

```php
$page = $this->simplePageCrawler('http://www.nytimes.com');

echo sprintf('The title is "%s"', $page->getTitle());
echo sprintf('The description is "%s"', $page->getMeta('description'));
```