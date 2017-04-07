<?php

return [

    'http' => [

        'type'   => 'http',

        'scheme' => 'http', // optional null
        'domain' => '(.+\.)example.com', // optional null

        'resolver' => [

            'cp' => [
                'type' => 'prefix',
                'path' => '(/<language:[a-z]{2}>)/cp',

                'resolver' => [

                    'dashboard' => [
                        'type' => 'pattern',
                        'path' => '/dashboard',

                        'defaults' => [
                            'controller' => 'dashboard'
                        ]
                    ],

                    'post' => [
                        'type' => 'pattern',
                        'path' => '/post(/<id>)',
                    ],

                    'posts' => [
                        'type' => 'pattern',
                        'path' => '/posts(/<id>(/<type>))',

                        'defaults' => [
                            'type'       => 'list',
                            'controller' => 'posts'
                        ],

                        'methods' => ['GET']
                    ],

                ],

                'defaults' => [
                    'controller' => 'post',
                    'processor'  => 'cp',
                    'action'     => 'default',
                    'language'   => 'en'
                ]
            ]

        ],

        'methods' => ['POST']

    ],

    'admin' => [
        'type' => 'prefix',
        'path' => '/admin',

        'resolver' => [

            'dashboard' => [
                'type' => 'pattern',
                'path' => '/dashboard',

                'defaults' => [
                    'controller' => 'dashboard'
                ]
            ],

        ],
    ],

    'default' => [
        'type' => 'pattern',
        'path' => [
            '/<any:\w+>',
            [
                'any' => '.*'
            ]
        ],

        'defaults' => [
            'controller' => 'hello',
            'action'     => 'world',
            'any'        => 'hello-world'
        ],

    ]

];