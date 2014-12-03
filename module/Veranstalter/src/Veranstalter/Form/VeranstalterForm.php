<?php
namespace Veranstalter\Form;

use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;

class VeranstalterForm extends Form
{
    public function __construct($name = null, $options = array())
    {
        parent::__construct('veranstalter');

        $this->setAttribute('method', 'post');
       // $this->setInputFilter(new EventFilter());
        $this->setHydrator(new ClassMethods());

        $this->add(array(
            'name' => 'id',
            'type' => 'hidden',
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
            'name' => 'vorname',
            'type' => 'text',
            'options' => array(
                'label' => 'Vorname:',
            ),
            'attributes' => array(
                'id' => 'vorname',
                'maxlength' => 100,
            )
        ));
        
        $this->add(array(
            'name' => 'email',
            'type' => 'text',
            'options' => array(
                'label' => 'Email:',
            ),
            'attributes' => array(
                'id' => 'email',
                'maxlength' => 100,
            )
        ));
        
        $this->add(array(
            'name' => 'passwort',
            'type' => 'text',
            'options' => array(
                'label' => 'Passwort:',
            ),
            'attributes' => array(
                'id' => 'passwort',
                'maxlength' => 100,
            )
        ));
        
        $this->add(array(
            'name' => 'iban',
            'type' => 'text',
            'options' => array(
                'label' => 'IBAN:',
            ),
            'attributes' => array(
                'id' => 'iban',
                'maxlength' => 100,
            )
        ));
        
        $this->add(array(
            'name' => 'bic',
            'type' => 'text',
            'options' => array(
                'label' => 'BIC:',
            ),
            'attributes' => array(
                'id' => 'bic',
                'maxlength' => 100,
            )
        ));
        
        $this->add(array(
            'name' => 'verifiziert',
            'type' => 'text',
            'options' => array(
                'label' => 'Verifiziert:',
            ),
            'attributes' => array(
                'id' => 'verifiziert',
                'maxlength' => 100,
            )
        ));
        
        $this->add(array(
            'name' => 'firmenname',
            'type' => 'text',
            'options' => array(
                'label' => 'Firmenname:',
            ),
            'attributes' => array(
                'id' => 'firmenname',
                'maxlength' => 100,
            )
        ));
        
        $this->add(array(
            'name' => 'strasse',
            'type' => 'text',
            'options' => array(
                'label' => 'Strasse:',
            ),
            'attributes' => array(
                'id' => 'strasse',
                'maxlength' => 100,
            )
        ));
        
        $this->add(array(
            'name' => 'hausnummer',
            'type' => 'text',
            'options' => array(
                'label' => 'Hausnummer:',
            ),
            'attributes' => array(
                'id' => 'hausnummer',
                'maxlength' => 100,
            )
        ));
        
        $this->add(array(
            'name' => 'postleitzahl',
            'type' => 'text',
            'options' => array(
                'label' => 'Postleitzahl:',
            ),
            'attributes' => array(
                'id' => 'postleitzahl',
                'maxlength' => 100,
            )
        ));
        
        $this->add(array(
            'name' => 'ort',
            'type' => 'text',
            'options' => array(
                'label' => 'Ort:',
            ),
            'attributes' => array(
                'id' => 'ort',
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