<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Veranstaltung\Controller\Veranstaltung' => 'Veranstaltung\Controller\VeranstaltungController'
        )
    ),
    'router' => array(
        'routes' => array(
            'veranstaltung' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/veranstaltung[/:action[/:id]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Veranstaltung\Controller',
                        'controller' => 'Veranstaltung',
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
            'Veranstaltung' => __DIR__ . '/../view'
        )
    )
);
