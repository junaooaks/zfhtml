<?php

namespace Application\Service;

use Doctrine\ORM\EntityManager,
    Zend\Stdlib\Hydrator\ClassMethods;

abstract class AbstractService {

    /**
     * @var EntityManager
     */
    protected $em;
    protected $entity;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function insert(array $data) {

        $entity = new $this->entity($data);

        //caso nao cria a class entity\configurator
        //pear os valores desta forma
        // $entity->setId($data['id']);
        // $entity->setNome($data['nome']);



        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }

    public function update(array $data) {

        $entity = $this->em->getReference($this->entity, $data['id']);


        //automatizar os set da entidade
        $entity = (new ClassMethods())->hydrate($data, $entity);


        $this->em->persist($entity);

        $this->em->flush();

        return $entity;
    }

    public function delete($id) {
        $entity = $this->em->getReference($this->entity, $id);

        if ($entity) {
            $this->em->remove($entity);
            $this->em->flush();
            return $id;
        }
    }

//    public function pesquisa(array $data) {
//        
//        $entity = $this->em->getReference($this->entity, $data['nome']);
//        
//               
//        $query = $this->em->createQueryBuilder()
//                ->select('*')
//                ->from('clientes');
//        $query->andWhere( $query->expr()->like('nome', ':nome') );
//        $query->setParameter(':nome', '%'.$data['nome'].'%');
//        
//        $entity = $query;
//        
////        var_dump($entity);
////        die();
//        
//        
////        $this->em->persist($entity);
//      $this->em->flush();
//        return $entity;
//    }

}
