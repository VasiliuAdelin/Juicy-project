<?php require_once 'checkRoutes.php';


if (isset($_GET['clear'])) {
    $_SESSION['cart'] = array();
}

$vals = $_SESSION['copyy'];

if (isset($_GET['removeFromCart'])) {
    $idToRemove = $_GET['removeFromCart'];
    unset($vals[$idToRemove]);
    $_SESSION['copyy'] = $vals;
    header("Location:/Juicy-Project/views/shopCart.php");
}

$msgNoItems;
if($vals == NULL)
$msgNoItems = "No items in the cart yet. Go shopping! :)";

if(isset($_GET['clear'])){
    $vals = array();
    $_SESSION['copyy'] = $vals;
  
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
    <div class="container cart">
        <?php
        require_once "header.php" ?>
        <div class="cart_container">
            <?php
            if($vals == NULL){
                global $msgNoItems;
                echo $msgNoItems;
            }
            foreach ($vals as $key => $val) {
                require_once '../controllers/CartController.php';
                $Cart = new CartController();
                $items = $Cart->getItemById($key[$vals[$key]] . $key);
                foreach ($items as $item) {
                    $name = $item['product_name'];
                    $discount = $item['discount'];
                    $packSize = $item['pack_size'];
                    $price = $item['price'];
                    ?>
            <div class="cart_items">
                <span class="cart_style" id="hide1">Id: <?php echo $item['id_product']; ?></span>
                <span class="cart_style">Product name: <?php echo $name ?></span>
                <span class="cart_style" id="hide2">Discount: <?php echo $discount ?></span>
                <span class="cart_style" id="hide3">Pack size: <?php echo $packSize ?></span>
                <span class="cart_style">Quantity: <?php echo $vals[$key] ?></span>
                <span class="cart_style">Price: <?php echo $price." RON" ?></span>
                <a href="?removeFromCart=<?php echo $item['id_product']; ?>">
                    <button class="btn special red far fa-trash-alt">  </button>
                </a>
            </div>
            <?php
            }
        }

        ?>
            <div class="buttons_cart">
                <button class="btn special red">Proceed to finish</button>
                <a href="./shop.php"><button class="btn special red">Back to shop</button></a>
                <a href="?clear=true"><button class="btn special red">Clear cart</button></a>
            </div>
        </div>