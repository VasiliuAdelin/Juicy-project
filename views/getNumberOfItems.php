<?php
session_start();
if (isset($_GET['total'])) {
    require_once '../controllers/ShopController.php';
    $Shop = new ShopController();
    echo $Shop->getItems($_SESSION['category'], $_SESSION['brand'], $_SESSION['sizePack']) !== false ?  count($Shop->getItems($_SESSION['category'], $_SESSION['brand'], $_SESSION['sizePack'])) : 0;
}
?>  