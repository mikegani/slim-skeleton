<?php
/**
 * @Author: mikegani
 * @Date:   2016-03-21 16:06:03
 * @Last Modified by:   mg5
 * @Last Modified time: 2016-12-13 18:05:44
 */
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production

        // PHP Renderer settings
        'renderer' => [
            'template_path' => PATH_ROOT.'component/',
        ],

        // Twig View settings
        'view' => [
            'template_path' => PATH_ROOT.'component/',
            'cache_path' => PATH_ROOT.'storage/cache/',
            'debug' => true,
        ],
        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => PATH_ROOT.'storage/log/server.log',
        ],
    ],
];
