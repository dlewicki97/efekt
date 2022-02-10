<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Table
{

    protected $fields = array();
    protected string $name;


    public function __construct(string $x = '', $fields ='') {
        $this->name = $x;
        $this->fields[] = $fields;

    }

    public function addField($field)
    {
        $this->fields[] = $field;
    }
    public function addFields($fields)
    {
        $this->fields[] += $fields;
    }
    public function getName()
    {
        return $this->name;
    }


}
