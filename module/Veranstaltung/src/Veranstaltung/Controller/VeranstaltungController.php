<?php
namespace Veranstaltung\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Veranstaltung\Model\VeranstaltungEntity;
use Veranstaltung\Form\VeranstaltungForm;

/**
 * VeranstaltungController
 *
 * @author
 *
 * @version
 *
 */
class VeranstaltungController extends AbstractActionController
{

    /**
     * The default action - show the home page
     */
    public function indexAction()
    {
        $mapper = $this->getVeranstaltungMapper();
        return new ViewModel(array(
            'veranstaltungen' => $mapper->fetchAll()
        ));
    }
    
    public function showAction(){
        $verid = (int)$this->params('id');
        if (!$verid) {
            return $this->redirect()->toRoute('veranstaltung');
        }
        $veranstaltung = $this->getVeranstaltungMapper()->getVeranstaltung($verid);
        $events = $this->getEventMapper()->Eventver($verid);
        if (!$events) {
            return $this->redirect()->toRoute('event');
        }
    
//         $event = $this->getEventMapper()->getEvent($id);
//         $date = date_create($event->getDatum());
//         $event->setDatum (date_format($date,'Y-m-d H:i'));
    
        return new ViewModel(array(
            'events' => $events , 'veranstaltung' => $veranstaltung
            
        ));
    
    }
    
    public function addAction(){
        $form = new VeranstaltungForm();
        $veranstaltung = new VeranstaltungEntity();
        $veranstaltung->setVeranstalterid(1);
        
        $form->bind($veranstaltung);
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getVeranstaltungMapper()->saveVeranstaltung($veranstaltung);
        
                // Redirect to list of tasks
                return $this->redirect()->toRoute('event', array(
    'action' => 'add', 'id' => $veranstaltung->getId()
));
            }
        }
        
        return array('form' => $form);
    }
    
    public function getVeranstaltungMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('VeranstaltungMapper');
    }
    
    public function getEventMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('EventMapper');
    }
}