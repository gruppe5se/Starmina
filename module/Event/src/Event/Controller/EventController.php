<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Event for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Event\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Event\Model\EventEntity;
use Event\Form\EventForm;
use Zend\Form\Element\Time;
use Zend\Form\Element\DateTimeLocal;
use Zend\Form\Element\DateTime;
use Zend\Filter\DateTimeFormatter;

class EventController extends AbstractActionController
{
    public function indexAction()
    {
        $mapper = $this->getEventMapper();
        return new ViewModel(array(
            'events' => $mapper->fetchAll()
        ));
    }
    
    public function showAction(){
        $id = $this->params('id');
        $event = $this->getEventMapper()->getEvent($id);
        if (!$event) {
            return $this->redirect()->toRoute('event');
        }
        
        $event = $this->getEventMapper()->getEvent($id);
        $date = date_create($event->getDatum());
        $event->setDatum (date_format($date,'Y-m-d H:i'));
        
        return new ViewModel(array(
            'event' => $event
        ));
        
    }
    
    public function showdetailAction(){
        $id = $this->params('id');
        $event = $this->getEventMapper()->getEvent($id);
        if (!$event) {
            return $this->redirect()->toRoute('event');
        }
    
        $event = $this->getEventMapper()->getEvent($id);
        $date = date_create($event->getDatum());
        $event->setDatum (date_format($date,'Y-m-d H:i'));
        $verid = $event->getVeranstaltungsid();
    
        return new ViewModel(array(
            'event' => $event , 'verid' => $event->getVeranstaltungsid()
        ));
    
    }
    
    public function addAction()
    {
        $verid = (int)$this->params('id');
        
//         if (!$verid) {
//             return $this->redirect()->toRoute('veranstaltung');
//          }
        $event = new EventEntity();
        if($verid)$event->setVeranstaltungsid($verid);
        $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $form = new EventForm($dbAdapter);
        $form->add(array(
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
        $event->setDatum(date('Y-m-d H:i'));
        $event->setVeranstaltungsid($verid);
        $form->bind($event);
    
        $request = $this->getRequest();
        if ($request->isPost()) {
        $event->setVeranstaltungsid($request->getPost('veranstaltungsid'));
            $form->setData($request->getPost());
            if ($form->isValid()) {
                
                $this->getEventMapper()->saveEvent($event);
                
    
                // Redirect to list of tasks
                return $this->redirect()->toRoute('veranstaltung', array('action'=>'show', 'id'=> $event->getVeranstaltungsid()));
            }
        }
        return array('form' => $form, 'request' => $request, 'test' => $request->getPost('sportart'));
    }

    public function editAction()
    {
        $id = (int)$this->params('id');
        if (!$id) {
            return $this->redirect()->toRoute('event', array('action'=>'add'));
        }
        $event = $this->getEventMapper()->getEvent($id);
        $date = date_create($event->getDatum());
        $event->setDatum (date_format($date,'Y-m-d H:i'));
        
    
        $form = new EventForm();
        $form->add(array(
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
        $form->bind($event);
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getEventMapper()->saveEvent($event);
    
                return $this->redirect()->toRoute('event');
            }
        }
    
        return array(
            'id' => $id,
            'form' => $form,
        );
    }
    
    public function deleteAction()
    {
        $id = $this->params('id');
        $event = $this->getEventMapper()->getEvent($id);
        if (!$event) {
            return $this->redirect()->toRoute('event');
        }
    
        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($request->getPost()->get('del') == 'Yes') {
                $this->getEventMapper()->deleteEvent($id);
            }
    
            return $this->redirect()->toRoute('event');
        }
    
        return array(
            'id' => $id,
            'event' => $event
        );
    }
    
    public function getEventMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('EventMapper');
    }
    
    public function getEventkategorienMapper()
        {
            $sm = $this->getServiceLocator();
            return $sm->get('EventkategorienMapper');
        }
}
