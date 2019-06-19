<?php
require_once '../views/config.php';
class ShopModel
{
    public $connection = null;
    public function __construct()
    {
        try {
            $this->connect();
        } catch (\PDOException $exc) {
            exit('Database connection could not be established.' . $exc);
        }
    }

    /*cod luat de pe site-ul lui Alex Coman*/

    private function connect()
    {
        $connection_string = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';';
        $this->connection = new PDO($connection_string, DB_USER, DB_PASS);
    }

    public function defaultQueryModel($sql){
        $resultItems = array();

        $sql = $this->connection->prepare($sql);
        $sql->execute();
        foreach ($sql->fetchAll() as $result) {
            array_push(
                $resultItems,
                array(
                    "id_product" => $result['id_product'],
                    "url" => $result['url'],
                    "product_name" => $result['product_name'],
                    "price" => $result['price'],
                    "brand" => $result['brand'],
                    "drink_type" => $result['drink_type'],
                    "pack_size" => $result['pack_size'],
                    "discount" => $result['discount']
                )
            );
        }
        return $resultItems;
    }

    public function getItemById($id = ""){
        $sql = "SELECT * from product_details WHERE id_product = '$id'";
        return $this->defaultQueryModel($sql);
    }

    public function getItems($cat = "", $brand = "", $sizePack = "",$order="",$start="",$end="")
    {
        $sql = "SELECT * from product_details ";

        if($cat !== ""){
            $sql .= " WHERE drink_type = '$cat'";
            if($brand !== ""){
                $sql .= " AND brand = '$brand'";
            }
            // if($sizePack !== ""){
            //     $sql .= " AND ";
            //     $num = count($sizePack);
            //     if($num == 1){
            //         $sql .= $sizePack[0];
            //     }else{
            //         for($i = 0 ;$i<$num -1;$i++){
            //             $sql .= " ( pack_size = '$sizePack[$i]' OR";
            //         }
            //     }
                
                
            // }
        }else if($brand !== ""){
            $sql .= " WHERE brand = '$brand'";
        }

        
        if($order!=NULL)
        {
            if($order == "nameAsc" || $order == "default"){
                $sql .= "order by product_name asc";
            }else
            if($order == "nameDesc"){
                $sql .= "order by product_name desc";
            }else
            if($order == "discount"){
                $sql .= "order by discount desc";
            }else
            if($order == "priceAsc"){
                $sql .= "order by price asc";
            }else
            if($order == "priceDesc"){
                $sql .= "order by price desc";
            }else
            if($order == "packSize"){
                $sql .= "order by pack_size desc";
            }
        }

        if($start != NULL && $end != NULL)
        {
            $sql .= " limit ".$start.",".$end;
        }

        
        $resultItems = array();
        $sql = $this->connection->prepare($sql);
        $sql->execute();
        foreach ($sql->fetchAll() as $result) {
            array_push(
                $resultItems,
                array(
                    "id_product" => $result['id_product'],
                    "url" => $result['url'],
                    "product_name" => $result['product_name'],
                    "price" => $result['price'],
                    "brand" => $result['brand'],
                    "drink_type" => $result['drink_type'],
                    "pack_size" => $result['pack_size'],
                    "discount" => $result['discount']
                )
            );
        }
        return $resultItems;
    }

    public function searchItemByName($itemName=""){
        $aux = "'%".$itemName."%'";
        $sql= "SELECT * FROM product_details WHERE product_name LIKE $aux";
        return $this->defaultQueryModel($sql);
    }

    public function countAllItems(){
        $sql = "SELECT COUNT(*) from product_details";
        $sql = $this->connection->prepare($sql);
        $sql->execute();
        return $sql->fetchColumn(0);
    }
}
