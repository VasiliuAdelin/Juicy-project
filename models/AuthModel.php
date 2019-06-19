<?php
require_once '../views/config.php';
class AuthModel
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


    public function getUserbyEmail($email)
    {
        $sql = $this->connection->prepare('SELECT * FROM users WHERE email = :email');
        $sql->execute(array(':email' => $email));
        return ($sql->rowcount() ? $sql->fetch(PDO::FETCH_ASSOC) : false);
    }


    public function userExisting($email){
        $sql = $this->connection->prepare('SELECT id_user FROM users WHERE email = :email');
        $sql->execute(array(':email' => $email));
        return ($sql->rowcount() ? $sql->fetch(PDO::FETCH_ASSOC) : false);
    }


    public function addNewUser($name,$email,$password,$phone,$address){
        $sql = "INSERT INTO users (name, email, password, phone, address) VALUES (:name, :email, :password, :phone, :address)";
        $query = $this->connection->prepare($sql);
        $parameters = array(':name' => $name, ':email' => $email,':password' => $password,':phone' => $phone,':address' => $address);
        if($query->execute($parameters))
        {
            return true;
        }
        else{
            return false;
        }
    }

    
    public function getUserInfoFromDB($id)
    {
        $sql = $this->connection->prepare('SELECT * FROM users WHERE id_user = :id');
        $sql->execute(array(':id' => $id));
        return ($sql->rowcount() ? $sql->fetch(PDO::FETCH_ASSOC) : false);
    }

}