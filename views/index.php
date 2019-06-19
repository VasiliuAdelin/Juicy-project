<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Juicy</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="icon" href="https://cdn0.iconfinder.com/data/icons/food-icons-rounded/110/Cocktail-512.png" />

</head>

<body>
    <div class="container">
        <?php 
        session_start();
        require_once "header.php" ?>
        <section>
            <img src="../assets/images/untitled.png" alt="server graphic" class="server">
            <h1>Fresh juices shop with the fastest home delivery</h1>
            <p class="subhead">You won't find better prices!</p>
        </section>
    </div>

    <div class="blue-container">
        <div class="container normalView">
            <div class="listOfDiscountItems">
                <div class="title-discount-options">
                    <h1>List of items with discount</h1>
                </div>
                <?php
                require_once '../controllers/IndexController.php';
                $Index = new IndexController();
                $items = $Index->getFirstDiscount();
                if ($items !== false) {
                    foreach ($items as $item) {
                    ?>
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
                            <div class="item-goto">
                                <a href="item.php?id=<?php echo $item['id_product']; ?>">
                                    <button class="btn special red">
                                        Vezi produs
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
            } else {
                ?>
                <div class="msg erro">No items</div>
                <?php
            }

?>
            </div>
        </div>
    </div>
    <div class="grey-container">
        <div class="container">
            <h2 class="title">Our Team</h2>
            <ul>
                <li>
                    <figure>
                        <img src="../assets/images/contact1-adelin.png" class="contact-pic1"
                            alt="user testimonial picture 1">
                        <blockquote>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor
                            incididunt ut labore et dolore magna aliqua.</blockquote>
                        <figcaption>- Vasiliu Adelin</figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="../assets/images/bogdan.png" class="contact-pic2" alt="user testimonial picture 2">
                        <blockquote>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor
                            incididunt ut labore et dolore magna aliqua.</blockquote>
                        <figcaption>- Radu Bogdan</figcaption>
                    </figure>
                </li>
            </ul>
        </div>
    </div>
    <div class="container comercials">
        <div class="list-of-comercials">
            <div class="comercial-container">
                <div class="comercial-header">
                    <img src="../assets/images/poza.jpg" alt="">
                </div>
            </div>
            <div class="comercial-container">
                <div class="comercial-header">
                    <img src="https://d2td6mzj4f4e1e.cloudfront.net/wp-content/uploads/sites/9/2018/10/Fruit-Shoot-Advert-620x330.png"
                        alt="">
                </div>
            </div>
            <div class="comercial-container">
                <div class="comercial-header">
                    <img src="https://locomotion.co.uk/wp-content/uploads/2017/02/Tropicana89oz-600x338.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="container feedback" id="contact">
        <h2>Send us a message!</h2>
        <form class="formContactContainer">
            <input class="inputBoxes" type="text" placeholder="Full name..." name="nume">
            <input class="inputBoxes" type="text" placeholder="E-mail..." name="e-mail">
            <input class="inputBoxes" type="text" placeholder="Phone number..." title="Numar de telefon obligatoriu!"
                name="telefon">
            <textarea class="inputTextBoxArea" placeholder="What would you like to tell us..." name="mesaj" cols="30"
                rows="10"></textarea>
            <button class="btn special blue" type="submit" name="trimite">Send</button>
        </form>
    </div>

    <?php require_once 'footer.php'; ?>
</body>

</html>