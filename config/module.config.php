<?php

return array(
    'controller_plugins' => array(
        'factories' => array(
            'SimplePageCrawler' => 'SimplePageCrawler\Controller\Plugin\Service\PageCrawlerFactory',
        ),
    ),
    'service_manager' => array(
        'invokables' => array(
            'SimplePageCrawler' => 'SimplePageCrawler\PageCrawler',
        ),
    ),
);