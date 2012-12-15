<?php

/*
 * This file is part of the SimplePageCrawler package.
 * @copyright Copyright (c) 2012 Blanchon Vincent - France (http://developpeur-zend-framework.fr - blanchon.vincent@gmail.com)
 */

namespace SimplePageCrawler;

use Zend\Dom\Query as DomQuery;

class PageParser
{
    public static function fromPageSource($source)
    {
        $response = new Response();
        $domQuery = new DomQuery();
        $domQuery->setDocumentHtml($source);

        $metas = $response->getMeta();
        $nodes = $domQuery->queryXpath('//meta');
        foreach($nodes as $node) {
            if(!$node->hasAttribute('name')) {
                continue;
            }
            $name = $node->getAttribute('name');
            $name = strtolower($name);
            $content = $node->getAttribute('content');
            $metas->offsetSet($name, $content);
        }

        $tags = $response->getHeadingTags();
        $h1 = array();
        $h2 = array();
        $h3 = array();
        $h4 = array();
        $h5 = array();

        $nodes = $domQuery->queryXpath('//h1');
        foreach($nodes as $node) {
            $h1[] = $node->textContent;
        }
        $nodes = $domQuery->queryXpath('//h2');
        foreach($nodes as $node) {
            $h2[] = $node->textContent;
        }
        $nodes = $domQuery->queryXpath('//h3');
        foreach($nodes as $node) {
            $h3[] = $node->textContent;
        }
        $nodes = $domQuery->queryXpath('//h4');
        foreach($nodes as $node) {
            $h4[] = $node->textContent;
        }
        $nodes = $domQuery->queryXpath('//h5');
        foreach($nodes as $node) {
            $h5[] = $node->textContent;
        }

        $tags->offsetSet('h1', $h1);
        $tags->offsetSet('h2', $h2);
        $tags->offsetSet('h3', $h3);
        $tags->offsetSet('h4', $h4);
        $tags->offsetSet('h5', $h5);

        $node = $domQuery->queryXpath('//title')->current();
        if($node) {
            $response->title = $node->textContent;
        }

        $img = array();
        $nodes = $domQuery->queryXpath('//img');
        foreach($nodes as $node) {
            $img[] = $node->getAttribute('src');
        }
        $response->images = array_unique($img);

        return $response;
    }
}
