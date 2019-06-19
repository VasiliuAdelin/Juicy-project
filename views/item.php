<?php
session_start();

if (!isset($_SESSION['copyy'])) {
    $_SESSION['copyy'] = array();
}

if (isset($_GET['addToCart'])) {
    if (isset($_SESSION['copyy'][$_GET['addToCart']])) {
        $_SESSION['copyy'][$_GET['addToCart']] = $_SESSION['copyy'][$_GET['addToCart']] + 1;
    } else {
        $_SESSION['copyy'][$_GET['addToCart']] = 1;
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="icon" href="https://cdn0.iconfinder.com/data/icons/food-icons-rounded/110/Cocktail-512.png" />
    <title>Shop cart</title>
</head>

<body>
    <div class="container">
        <?php
        require_once "header.php" ?>
        <div class="cart_container">

            <?php

            require_once '../controllers/CartController.php';
            $Cart = new CartController();
            $items = $Cart->getItemById($_GET['id']);
            foreach ($items as $item) {
                $name = $item['product_name'];
                $discount = $item['discount'];
                $packSize = $item['pack_size'];
                $price = $item['price'];
                ?>
                <div class="item-single-view">
                    <div class="item-container">
                        <div class="item-header">
                            <div class="item-logo">
                                <img src=<?php echo $item['url']; ?> alt="">
                            </div>
                            <div class="item-price-discount">
                                <span>-<?php echo $item['discount']; ?>%</span>
                            </div>
                        </div>
                        <div class="item-body">
                            <div class="item-title">
                                <?php echo $item['product_name']; ?>
                            </div>
                            <div class="item-subtitle">
                                <?php echo $item['drink_type']; ?>
                            </div>
                            <div class="item-price">
                                <?php echo $item['price']; ?><span>RON</span>
                            </div>
                            <div class="item-subtitle">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem perspiciatis sequi consectetur consequatur, laudantium aliquid ab quisquam, sed quasi non cum. Qui vel porro atque est enim tempore dignissimos distinctio.
                            </div>
                            <div class="item-goto">
                                <a href="?addToCart=<?php echo $item['id_product']."&id=".$item['id_product']; ?>">
                                    <button class="btn special red">
                                        + cart
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
        }



        ?>
            <div class="buttons_cart">
               <a href="./shopCart.php"> <button class="btn special red">Go to cart</button></a>
               <a href="./shop.php"> <button class="btn special red">Back to shop</button></a>
            </div>
        </div>