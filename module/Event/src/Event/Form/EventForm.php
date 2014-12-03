<?php
namespace Event\Form;

use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Mvc\Controller\AbstractActionController;

class EventForm extends Form
{
    protected $dbAdapter;
    
    public function __construct(AdapterInterface $dbAdapter = null, $name = null, $options = array())
    {
        $this->setDbAdapter($dbAdapter);
        
        parent::__construct('event');

        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'form-horizontal');
        $this->setInputFilter(new EventFilter());
        $this->setHydrator(new ClassMethods());
        
        $this->add(array(
            'name'    => 'sportart',
            'type'    => 'Zend\Form\Element\Select',
            'options' => array(
                'label'         => 'Sportart: ',
                'value_options' => $this->getOptionsForSelect(),
                'empty_option'  => '--- please choose ---'
            )
        ));

        $this->add(array(
            'name' => 'id',
            'type' => 'hidden',
        ));
        
        $this->add(array(
            'name' => 'vorgaengerid',
            'type' => 'hidden',
            'options' => array(
                'label' => 'vorgaengerid',
            ),
            'attributes' => array(
                'id' => 'vorgaengerid',
                'maxlength' => 100,
            )
        ));
        
        $this->add(array(
            'name' => 'veranstaltungsid',
            'type' => 'hidden',
            'options' => array(
                'label' => 'veranstaltungsid',
            ),
            'attributes' => array(
                'id' => 'veranstaltungsid',
                'maxlength' => 100,
            )
        ));

        $this->add(array(
            'name' => 'anmeldegebuehr',
            'type' => 'text',
            'options' => array(
                'label' => 'Preis:',
            ),
            'attributes' => array(
                'id' => 'anmeldegebuehr',
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
            'name' => 'ort',
            'type' => 'text',
            'options' => array(
                'label' => 'Ort: ',
            ),
            'attributes' => array(
                'id' => 'ort',
                'maxlength' => 100,
            )
        ));
        
        $this->add(array(
            'name' => 'postleitzahl',
            'type' => 'text',
            'options' => array(
                'label' => 'PLZ: ',
            ),
            'attributes' => array(
                'id' => 'postleitzahl',
                'maxlength' => 5,
            )
        ));
        
        $this->add(array(
            'name' => 'strasse',
            'type' => 'text',
            'options' => array(
                'label' => 'Strasse: ',
            ),
            'attributes' => array(
                'id' => 'strasse',
                'maxlength' => 50,
            )
        ));
        
        $this->add(array(
            'name' => 'hausnummer',
            'type' => 'text',
            'options' => array(
                'label' => 'Nr.: ',
            ),
            'attributes' => array(
                'id' => 'hausnummer',
                'maxlength' => 5,
            )
        ));

        
        $this->add(array(
            'name' => 'beschreibung',
            'type' => 'textarea',
            'options' => array(
                'label' => 'Beschreibung: ',
            ),
            'attributes' => array(
                'id' => 'beschreibung',
                'maxlength' => 1000,
            )
        ));
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'geschlecht',
            'options' => array(
                'label' => 'Geschlecht: ',
                'value_options' => array(
                    'NULL' => 'Waehle das Geschlecht aus',
                    'W' => 'Weiblich',
                    'M' => 'Maennlich'
                ),
            ),
            'attributes' => array(
                'value' => '1' //set selected to '1'
            )
        ));
        
        $this->add(array(
            'type' => 'Zend\Form\Element\DateTime',
            'name' => 'datum',
            'options' => array(
                'label' => 'Datum: ',
                'format' => 'Y-m-d H:i'
            ),
            'attributes' => array(
                'min' => date('Y-m-d H:i'),
                'step' => '1', // minutes; default step interval is 1 min
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

    
    public function getOptionsForSelect()
    {
        if($this->dbAdapter){
        $dbAdapter = $this->getDbAdapter();
        $sql       = 'SELECT * FROM sportart';
        $statement = $dbAdapter->query($sql);
        $result    = $statement->execute();
        } else {
            return null;
        }
 
        $selectData = array();
 
        foreach ($result as $res) {
            $selectData[$res['id']] = $res['Bezeichnung'];
        }
 
        return $selectData;
    }
	/**
     * @return the $dbAdapter
     */
    public function getDbAdapter()
    {
        return $this->dbAdapter;
    }

	/**
     * @param field_type $dbAdapter
     */
    public function setDbAdapter($dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
    }

}