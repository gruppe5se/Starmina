<?php
namespace Veranstaltung\Form;

use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;

class VeranstaltungForm extends Form
{
    public function __construct($name = null, $options = array())
    {
        parent::__construct('veranstaltung');

        $this->setAttribute('method', 'post');
        //$this->setInputFilter(new EventFilter());
        $this->setHydrator(new ClassMethods());

        $this->add(array(
            'name' => 'id',
            'type' => 'hidden',
        ));
        
        $this->add(array(
            'name' => 'vorganger_id',
            'type' => 'hidden',
            'options' => array(
                'label' => 'Vorgaenger',
            ),
            'attributes' => array(
                'id' => 'vorgaenger_id',
                'maxlength' => 100,
            )
        ));
        
        $this->add(array(
            'name' => 'veranstalter_id',
            'type' => 'hidden',
            'options' => array(
                'label' => 'verid',
            ),
            'attributes' => array(
                'id' => 'veranstalter_id',
                'maxlength' => 100,
            )
        ));
        
        $this->add(array(
            'name' => 'name',
            'type' => 'text',
            'options' => array(
                'label' => 'Name:',
            ),
            'attributes' => array(
                'id' => 'name',
                'maxlength' => 100,
            )
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'class' => 'btn btn-primary',
            ),
        ));
        
    }
}