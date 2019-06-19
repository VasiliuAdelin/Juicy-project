<?php
class ShopController
{
    public function __contruct()
    { }
    
    public function getItems($cat = "", $brand = "", $sizePack = "", $order="",$start="",$end=""){
        require_once '../models/ShopModel.php';
        $Shop = new ShopModel();
        $result = $Shop->getItems($cat,$brand,$sizePack,$order,$start,$end);
        return $result ? $result : false;
    }

    public function getItemById($id = ""){
        require_once '../models/ShopModel.php';
        $Shop = new ShopModel();
        $result = $Shop->getItemById($id);
        return $result ? $result : false;
    }    

    public function searchItemByName($itemName="")
    {
        require_once '../models/ShopModel.php';
        $Shop = new ShopModel();
        $result = $Shop->searchItemByName($itemName);
        return $result ? $result : false;
    }

    public function countAllItems()
    {
        require_once '../models/ShopModel.php';
        $Shop = new ShopModel();
        $result = $Shop->countAllItems();
        return $result ? $result : false;
    }
}
?>