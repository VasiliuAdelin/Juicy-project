<?php
require_once 'checkRoutes.php';
require_once '../controllers/AccountController.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['category'])) {
        $_SESSION['category'] = isset($_POST['category']) ? $_POST['category'] : "";
        $_SESSION['brand'] = isset($_POST['brand']) ? $_POST['brand'] : "";
        $_SESSION['sizePack'] = isset($_POST['sizePack']) ? $_POST['sizePack'] : "";
    }
        
    if(isset($_POST['itemNameForSearch'])){
        $_SESSION['itemByName'] = isset($_POST['itemNameForSearch']) ? $_POST['itemNameForSearch'] : "";
    }

    if(isset($_POST['order'])){
        $_SESSION['order'] = isset($_POST['order']) ? $_POST['order'] : "";
    }

} else {
    if (!isset($_SESSION['category'])) {
        $_SESSION['category'] = "";
    }
    if (!isset($_SESSION['brand'])) {
        $_SESSION['brand'] = "";
    }
    if (!isset($_SESSION['sizePack'])) {
        $_SESSION['sizePack'] = "";
    }

}

if (!isset($_SESSION['copyy'])) {
    $_SESSION['copyy'] = array();
}
if (!isset($_SESSION['start'])) {
    $_SESSION['start'] = "";
}

if (!isset($_SESSION['end'])) {
    $_SESSION['end'] = "";
}



if (isset($_GET['addToCart'])) {
    if (isset($_SESSION['copyy'][$_GET['addToCart']])) {
        $_SESSION['copyy'][$_GET['addToCart']] = $_SESSION['copyy'][$_GET['addToCart']] + 1;
    } else {
        $_SESSION['copyy'][$_GET['addToCart']] = 1;
    }
}

if (isset($_GET['reset'])) {
    if ($_GET['reset'] == 'all') {
        $_SESSION['category'] = "";
        $_SESSION['brand'] = "";
        $_SESSION['sizePack'] = "";
        header("Location:/Juicy-Project/views/shop.php");
    }
    if ($_GET['reset'] == 'category') {
        $_SESSION['category'] = "";
        header("Location:/Juicy-Project/views/shop.php");
    }
    if ($_GET['reset'] == 'brand') {
        $_SESSION['brand'] = "";
        header("Location:/Juicy-Project/views/shop.php");
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Juicy</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="icon" href="https://cdn0.iconfinder.com/data/icons/food-icons-rounded/110/Cocktail-512.png" />
</head>

<body onload="loadNumberOfItems()">
    <div class="container">
        <?php require_once "header.php" ?>

        <h1 class="aside-title">Having Fun Shopping</h1>
    </div>
    <div class="container special-container effect1">
        <div class="filter-side">
            <form action="#" method="post">
                <p class="aside-title">Apply filters</p>
                <aside class="filter-container">

                    <p class="aside-title">Category</p>

                    <div class="choiceApply"><input
                            <?php echo $_SESSION['category'] == "carbogazed drink" ? "checked" : "" ?> type="radio"
                            name="category" id="carbo drink" value="carbo drink"><label for="carbo drink"> Carbonated
                            drinks</label></div>
                    <div class="choiceApply"><input
                            <?php echo $_SESSION['category'] == "natural drink" ? "checked" : "" ?> type="radio"
                            name="category" id="natural drink" value="natural drink"><label for="natural drink"> Natural
                            drinks</label></div>
                    <div class="choiceApply"><input
                            <?php echo $_SESSION['category'] == "energy drink" ? "checked" : "" ?> type="radio"
                            name="category" id="energy drink" value="energy drink"><label for="energy drink"> Energy
                            drinks</label>
                    </div>
                    <div class="choiceApply"><input <?php echo $_SESSION['category'] == "beer" ? "checked" : "" ?>
                            type="radio" name="category" id="beer" value="beer"><label for="beer"> Beer</label>
                    </div>

                </aside>
                <aside class="filter-container">
                    <p class="aside-title">Brand</p>
                    <div class="choiceApply"><input <?php echo $_SESSION['brand'] == "cola" ? "checked" : "" ?>
                            type="radio" name="brand" id="cola" value="cola"><label for="cola"> Cola</label>
                    </div>
                    <div class="choiceApply"><input <?php echo $_SESSION['brand'] == "fanta" ? "checked" : "" ?>
                            type="radio" name="brand" id="fanta" value="fanta"><label for="fanta"> Fanta</label>
                    </div>
                    <div class="choiceApply"><input <?php echo $_SESSION['brand'] == "sprite" ? "checked" : "" ?>
                            type="radio" name="brand" id="sprite" value="sprite"><label for="sprite"> Sprite</label>
                    </div>
                    <div class="choiceApply"><input <?php echo $_SESSION['brand'] == "redbull" ? "checked" : "" ?>
                            type="radio" name="brand" id="redbull" value="redbull"><label for="redbull"> Redbull</label>
                    </div>
                    <div class="choiceApply"><input <?php echo $_SESSION['brand'] == "hell" ? "checked" : "" ?>
                            type="radio" name="brand" id="hell" value="hell"><label for="hell"> Hell</label>
                    </div>
                    <div class="choiceApply"><input <?php echo $_SESSION['brand'] == "giusto" ? "checked" : "" ?>
                            type="radio" name="brand" id="giusto" value="giusto"><label for="giusto"> Giusto</label>
                    </div>
                    <div class="choiceApply"><input <?php echo $_SESSION['brand'] == "burn" ? "checked" : "" ?>
                            type="radio" name="brand" id="burn" value="burn"><label for="burn"> Burn</label>
                    </div>
                    <div class="choiceApply"><input <?php echo $_SESSION['brand'] == "prigat" ? "checked" : "" ?>
                            type="radio" name="brand" id="prigat" value="prigat"><label for="prigat"> Prigat</label>
                    </div>
                    <div class="choiceApply"><input <?php echo $_SESSION['brand'] == "Tuborg" ? "checked" : "" ?>
                            type="radio" name="brand" id="tuborg" value="tuborg"><label for="tuborg"> Tuborg</label>
                    </div>
                </aside>

                <aside class="filter-container">
                    <p class="aside-title">Size Pack</p>

                    <div><input type="checkbox" name="sizePack[]" value="18" id="single"><label for="drink1131">
                            1 pack</label></div>
                    <div><input type="checkbox" name="sizePack[]" value="6" id="6pack"><label for="drink1111">
                            6 pack</label></div>
                    <div><input type="checkbox" name="sizePack[]" value="48" id="48pack"><label for="drink1121">
                            48 pack</label></div>
                </aside>
                <button class="btn special red" type="submit">Apply Filters</button>
            </form>
        </div>
        <div class="main-view-shop">
            <div class="shop-container show-filters ">
                Number of products:<span class="sub-title" id="numberOfItems">0</span>
                <form class="search-container" action method="post">
                    <div class="top-search-container">
                        <input type="text" placeholder="Search.." class="formaction" name="itemNameForSearch">
                        <button type="submit"><i class="btn special red fas fa-search"></i></button>
                    </div>
                </form>
                Order by:
                <form class="search-container" action method="post">
                    <div class="top-search-container">
                        <select class="top-bar-selector" required value="1" name="order">
                            <option value="default">whatever you want</option>
                            <option value="nameAsc">Name ascendent</option>
                            <option value="nameDesc">Name descendent</option>
                            <option value="discount">Discount</option>
                            <option value="priceAsc">Price ascendent</option>
                            <option value="priceDesc">Price descendent</option>
                            <option value="packSize">Pack size</option>
                        </select>
                        <button type="submit"><i class="btn special red fas fa-sort-amount-up"></i></button>
                    </div>
                </form>
            </div>
            <div class="shop-container other-filters ">
                <ul>
                    <li><?php echo $_SESSION['category'] ? $_SESSION['category'] : "" ?></li>
                    <li><?php echo $_SESSION['brand'] ? $_SESSION['brand'] : "" ?></li>
                    <?php if ($_SESSION['category'] || $_SESSION['brand']) echo '<li><a  href="?reset=all">reset</a></li>';  ?>

                </ul>
            </div>
            <div class="shop-container view-list ">
                <?php require_once 'view-items.php'; ?>
            </div>
        </div>


    </div>
    <?php require_once 'footer.php'; ?>

    <script src="../assets/js/main.js"></script>
</body>

</html>