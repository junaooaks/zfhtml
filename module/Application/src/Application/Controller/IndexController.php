<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController {

    private $em;

    protected function getEm() {
        if (null === $this->em)
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        return $this->em;
    }

    public function indexAction() {
        $cliente = array('id' => '1', 'nome' => 'JOSE');

        return new ViewModel(array('dados' => $cliente));
    }

    public function newAction() {

        $form = $this->params()->fromPost();

        if (!empty($form)) {
            
            print_r($form);
            die;
            
            //preencher os dados do formulario
            $form->setData($form);

            $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

            //pegar o repositorio da entidade
            $repo = $em->getRepository('Cliente\Entity\Cliente');

            //buscar todos os dados da tabela cliente
            $dados = $repo->findAll();
        }

        return new ViewModel();
    }

}
