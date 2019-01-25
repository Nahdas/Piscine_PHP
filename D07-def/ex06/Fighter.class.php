<?php

abstract class Fighter{

    public $post;

    abstract public function fight($target);
    
    public function __construct($name){
        $this->post = $name;
    }
    public function _get(){

    }


}
?>