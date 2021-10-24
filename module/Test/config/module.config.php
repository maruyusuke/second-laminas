<?php

namespace Test;

use Laminas\Router\Http\Literal;
use Laminas\ServiceManager\Factory\InvokableFactory;
use Laminas\Router\Http\Segment;

return [

  'controllers' => [
      'factories' => [
          Controller\IndexController::class => InvokableFactory::class,
      ],
  ],
  'router' => [
    'routes' => [
        'test' => [
            'type'    => Literal::class,
            'options' => [
                'route' => '/test',
                'defaults' => [
                  'controller' => Controller\IndexController::class,
                  'action'     => 'index',
                ],
                
            ],
        ],
      ],
  ],
  
  'view_manager' => [
    'template_path_stack' => [
        __DIR__ . '/../view',
    ],
  ],
];