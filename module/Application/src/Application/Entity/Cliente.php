<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;
/**
 * @ORM\Entity
 * @ORM\Table(name="cliente")
 */
class Cliente
{
    public function __construct($options = null) {
        (new ClassMethods())->hydrate($options, $this);
        
    }
    

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $nome;
    

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function setId($id) {
        $this->id = $id;
        return $this;
    }

    function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }
    
    public function __toString() {
        return $this->nome;
    }
    
    public function toArray(){
        return (new ClassMethods())->extract($this);
    }
    
} 