<?php

namespace Blog;

use Laminas\Router\Http\Literal;
//use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
  'service_manager' => [
    'aliases' => [
        Model\PostRepositoryInterface::class => Model\PostRepository::class,
    ],
    'factories' => [
        Model\PostRepository::class => InvokableFactory::class,
    ],
  ],

  'router' => [
    'routes' => [
        'blog' => [
          'type' => Literal::class,
          'options' => [
            'route' => '/blog',
            'defaults' => [
              'controller' => Controller\ListController::class,
              'action' => 'index',
            ],
          ],
        ],
    ],
  ],
  'controllers' => [
      'factories' => [
        Controller\ListController::class => Factory\ListControllerFactory::class,
      ],
  ],
  'view_manager' => [
    'template_path_stack' => [
        __DIR__ . '/../view',
    ],
  ],
];