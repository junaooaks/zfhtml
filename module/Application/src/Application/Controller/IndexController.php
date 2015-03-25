<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Cliente as MinhaEntidade;
use Zend\Stdlib\Hydrator\ClassMethods;

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

        //receber dados do formulario
        $data = $this->getRequest()->getPost();

        if(!empty($data)) {
            //em vez de usar set isso set aquilo, esta classe faz isto automatico
            $hydrator = new ClassMethods();
            
            $minhaEntidade = new MinhaEntidade();

            //aqui o ClassMethods pega os dados e coloca nos campos da entidade
            $hydrator->hydrate($data, $minhaEntidade);

            //pegando o entity manager
            $meuEntityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

            $meuEntityManager->persist($minhaEntidade); //persistindo a entidade

            $meuEntityManager->flush(); //gravando no banco
        }
        return new ViewModel();
    }

}
