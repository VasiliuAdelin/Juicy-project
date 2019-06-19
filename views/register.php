<?php
require_once 'checkRoutes.php';
$error = '';
$mess = '';
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    switch ($error) {

        case 'emailIsAllreadyExist':
            $mess = 'This email is already used. Please try with another one!';
            break;

        case 'passwordsDontMatch':
            $mess = 'Passwords do not match!';
            break;

        case 'emptyFields':
            $mess = 'Empty field detected! All the fields must be completed!';
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/style.css" />
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="icon" href="https://cdn0.iconfinder.com/data/icons/food-icons-rounded/110/Cocktail-512.png" />

    <title>JUICY</title>
</head>

<body>
    <div class="container">
        <?php require_once "header.php" ?>
    </div>
    <div class="container register">
        <form class="formContactContainer register" action="" method="post">
            <h2>Register!</h2>
            <input class="inputBoxes" class="form-control" type="text" required placeholder="Name..." name="name">
            <input class="inputBoxes" class="form-control" type="password" required placeholder="Password..." name="password">
            <input class="inputBoxes" class="form-control" type="password" required placeholder="Confirm password..." name="confPass">
            <input class="inputBoxes" class="form-control" type="email" required placeholder="E-mail..." name="email">
            <input class="inputBoxes" class="form-control" type="text" required placeholder="Phone number..." name="phone">
            <textarea class="inputTextBoxArea" placeholder="Adresa" name="address" cols="1" rows="3"></textarea>
            <div class="links">
               <a href="login.php">Login</a>
            </div>
            <?php
            if (isset($_GET['error'])) {
                $errorMsg = "";
                $error = $_GET['error'];
                switch ($error) {
                    case 'emailIsAllreadyExist':
                        $errorMsg = 'Email already used.';
                        break;
                    case 'passwordsDontMatch':
                        $errorMsg = 'Passwords do not match.';
                        break;
                }
                echo '
                            <div class="errorContainer" id="errorContainerId">
                                <span class="errorMessage">' . $errorMsg . '</span>
                            </div>';
            }
            ?>
            <?php
            if (isset($_GET['success'])) {
                $successMsg = "";
                switch ($_GET['success']) {
                    case 'accountCreated':
                        $successMsg = 'Cont creat cu succes.Te rugam sa te logezi.';
                        break;
                }
                echo '
                            <div class="successContainer" id="successContainerId">
                                <span class="successMessage">' . $successMsg . '</span>
                            </div>';
            }
            ?>
            <button class="btn special blue" type="submit" name="trimite">Send</button>
        </form>
    </div>
</body>

</html>
<?php
require_once 'popup-success.php';
?>
<?php
require_once '../controllers/AccountController.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    AccountController::SignUp();
}
?>