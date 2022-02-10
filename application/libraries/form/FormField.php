<?php
namespace field;
defined('BASEPATH') OR exit('No direct script access allowed');



class FormField {
    protected string $name;

    public function __construct(string $x = '',) {
        $this->name = $x;
    }
    
    function action(){

    }
}