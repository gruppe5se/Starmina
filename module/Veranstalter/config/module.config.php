<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Veranstalter\Controller\Veranstalter' => 'Veranstalter\Controller\VeranstalterController',
            'Veranstalter\Controller\Veranstalter' => 'Veranstalter\Controller\VeranstalterController'
        )
    ),
    'router' => array(
        'routes' => array(
            'veranstalter' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/veranstalter[/:action[/:id]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Veranstalter\Controller',
                        'controller' => 'Veranstalter',
                        'action' => 'index'
                    ),
                    'constraints' => array(
                        'action' => '(add|edit|delete|show|showdetail)',
                        'id' => '[0-9]+'
                    )
                )
            ),
            'veranstalter' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/veranstalter[/:action[/:id]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Veranstalter\Controller',
                        'controller' => 'Veranstalter',
                        'action' => 'index'
                    ),
                    'constraints' => array(
                        'action' => '(add|edit|delete|show)',
                        'id' => '[0-9]+'
                    )
                )
            )
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Veranstalter' => __DIR__ . '/../view'
        )
    )
);
