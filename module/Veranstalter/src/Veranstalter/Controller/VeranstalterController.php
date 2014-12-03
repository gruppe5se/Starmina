<?php
namespace Veranstalter\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Veranstalter\Model\VeranstalterEntity;
use Veranstalter\Form\VeranstalterForm;

/**
 * VeranstalterController
 *
 * @author
 *
 * @version
 *
 */
class VeranstalterController extends AbstractActionController
{

    /**
     * The default action - show the home page
     */
    public function indexAction()
    {
        $mapper = $this->getVeranstalterMapper();
        return new ViewModel(array(
            'veranstaltern' => $mapper->fetchAll()
        ));
    }
    
    public function showAction(){
      $id = $this->params('id');
      $veranstalter = $this->getVeranstalterMapper()->getVeranstalter($id);
        if (!$veranstalter) {
            return $this->redirect()->toRoute('veranstalter');
        }
    
        return new ViewModel(array(
            'veranstalter' => $veranstalter
        ));
    
    }
    
    public function addAction(){
        $form = new VeranstalterForm();
        $veranstalter = new VeranstalterEntity();
        
        $form->bind($veranstalter);
        // die †bergabe von Werten funktioniert noch nicht
        $pw = $this->params('passwort');
        $request = $this->getRequest();
        //†berprŸft ob etwas vorhanden ist
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getVeranstalterMapper()->saveLogin($veranstalter, $pw);
                $this->getVeranstalterMapper()->saveVeranstalter($veranstalter);
        
                // Redirect to list of tasks
                return $this->redirect()->toRoute('veranstalter');
            }
        }
        
        return array('form' => $form);
    }
    
    public function editAction()
    {
        $id = (int)$this->params('id');
        if (!$id) {
            return $this->redirect()->toRoute('veranstalter', array('action'=>'add'));
        }
        $veranstalter = $this->getVeranstalterMapper()->getVeranstalter($id);
    
        $form = new VeranstalterForm();
        $form->bind($veranstalter);
    
    
    
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getVeranstalterMapper()->saveVeranstalter($veranstalter);
    
                return $this->redirect()->toRoute('veranstalter');
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
        $veranstalter = $this->getVeranstalterMapper()->getVeranstalter($id);
        if (!$veranstalter) {
            return $this->redirect()->toRoute('veranstalter');
        }
    
        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($request->getPost()->get('del') == 'Yes') {
                $this->getVeranstalterMapper()->deleteVeranstalter($id);
                $this->getVeranstalterMapper()->deleteLogin($veranstalter);
            }
    
            return $this->redirect()->toRoute('veranstalter');
        }
    
        return array(
            'id' => $id,
            'veranstalter' => $veranstalter
        );
    }
    
    public function getVeranstalterMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('VeranstalterMapper');
    }
}