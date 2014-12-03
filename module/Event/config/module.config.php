<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Event\Controller\Event' => 'Event\Controller\EventController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'event' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/event[/:action[/:id]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Event\Controller',
                        'controller' => 'Event',
                        'action' => 'index'
                    ),
                    'constraints' => array(
                        'action' => '(add|edit|delete|show|showdetail)',
                        'id' => '[0-9]+'
                    )
                )
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Event' => __DIR__ . '/../view',
        ),
    ),
);
