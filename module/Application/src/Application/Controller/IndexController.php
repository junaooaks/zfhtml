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
        
        //receber dados do html metodo POST
        $data = $this->params()->fromPost();
        
        //preencher os dados do formulario
        $form->setData($data);

        if ($form->isValid()) {

            $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

            //pegar o repositorio da entidade
            $repo = $em->getRepository('Cliente\Entity\Cliente');

            //atribuir os dados para sua entidade
            
            $repo->persist($repo);

            $entityManager->flush();
        }

        return new ViewModel();
    }

}
