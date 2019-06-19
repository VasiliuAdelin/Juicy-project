<?php
class CartController
{
    public function __contruct()
    { }
    //nu mai fac alt model deoarece inca nu am nevoie de alte functii/functionalitati
    
    public function getItemById($id = ""){
        require_once '../models/ShopModel.php';
        $Shop = new ShopModel();
        $result = $Shop->getItemById($id);
        return $result ? $result : false;
    }    
}