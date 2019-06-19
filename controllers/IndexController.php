<?php

class IndexController
{
    public function __contruct()
    { }

    public function getFirstDiscount(){
        require_once '../models/IndexModel.php';
        $Index = new IndexModel();
        $result = $Index->getFirstDiscount();
        return $result ? $result : false;
    }

}
?>