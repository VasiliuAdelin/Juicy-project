<?php
require_once '../views/config.php';
class IndexModel
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

    public function getFirstDiscount(){
        $sql = "SELECT * from product_details order by discount desc limit 6";
        return $this->defaultQueryModel($sql);
    }

}


?>