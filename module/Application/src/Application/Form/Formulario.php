<?php

namespace Application\Form;

use Zend\Form\Form;

class Formulario extends Form {

    public function __construct($name = null, $options = array()) {
        parent::__construct('formulario', $options);
        
    }

}
