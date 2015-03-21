<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $cliente = array('id'=>'1','nome'=>'JOSE');
        
        return new ViewModel(array('dados'=>$cliente));
    }
    
    public function newAction() {
        
        
        
        //retirecionar para a pagina onde esta o formulario
        //return $this->redirect()->toRoute('application', array('controller' => 'Application\Controller\Index','action'=>'new'));
        
        return new ViewModel();
    }
}
