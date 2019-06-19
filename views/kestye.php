<?php 
require_once '../controllers/AccountController.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    AccountController::SignIn(); //  static function
    // $auth  = new AuthController();
    // $auth->SignUp(); // fara static
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet" />

    <title>Document</title>
</head>

<body class="<?php echo $theme; ?>">
    <header>
        <nav>
            <ul class="main">
                <li>
                    <a href="index.php"><i class="fas fa-home"></i> Acasa</a>
                </li>
                <li>
                    <a href="contact.php"><i class="fas fa-bars"></i> Contact</a>
                </li>
                <?php if ($isLogged) { 
                    echo '
              <li>
                  <a href="logout.php"><i class="fas fa-user-circle"></i> Logout</a>
              </li>
              <li>
                <a href="user_profil.php"> <i class="fas fa-cog"></i>Cont</a>
               </li>
              '; } else {
                  echo '
              <li>
              <a class="active" href="login.php"><i class="fas fa-user-circle"></i> Login</a>
          </li>
              ';
            }
            ?>

            </ul>
        </nav>
        <article>
            <div class="main-title">
                <h1>Login</h1>
            </div>
        </article>
    </header>
    <!-- <form action="#" method="post">
        <input type="text" name="email"   placeholder="E-mail" >
        <input type="password" name="password"  placeholder="Introduceti parola" >
        <input type="submit">
    </form> -->
    <!-- <form action="login.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form> -->
    <form action="" method="post">
        <div class="background">
            <div class="space"></div>
            <div class="loginBox">
                <div class="username">
                    <p>E-mail:</p>
                    <input type="text" name="email" class="form-control" required placeholder="E-mail" />
                </div>
                <div class="password">
                    <p>Parola:</p>
                    <input type="password" name="password" class="form-control" required
                        placeholder="Introduceti parola" />
                </div>
                <div class="more">
                    <div class="signUp">
                        <a href="register.php">
                            Inscrie-te
                        </a>
                    </div>
                </div>

                <div class="btn">
                    <button class="button" type="submit">
                        Login
                    </button>
                </div>
               <?php
                if (isset($_GET['error'])) {
                    $errorMsg = "";
                    $error = $_GET['error'];
                    switch ($error) {
                        case 'false':
                            $errorMsg = 'Te rugam sa te logezi.';
                            break;
                        case 'emailNotValid':
                            $errorMsg = 'Email-ul sau parola sunt incorecte. Te rugam sa incerci din nou.';
                            break;
                    }
                    echo '
                            <div class="errorContainer" id="errorContainerId">
                                <span class="errorMessage">' . $errorMsg . '</span>
                            </div>';
                }
                    ?>
                    <?php
                    if(isset($_GET['success'])){
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

            </div>
            <div class="spaceEnd"></div>
        </div>
    </form>


    <aside></aside>
    <!-- <footer class="footer">
      <div class="iconsFooter">
        <a href="https://www.facebook.com/andreea.vatamanelu"><i class="fab fa-facebook-f"></i></a>
        <a href="https://github.com/andreeavata2/Wews"><i class="fab fa-github"></i></a>
        <a href="https://www.instagram.com/xranobi/"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-google"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
      </div>
      <div class="creator">
        <p class="creat">
          Powered by Mavriche Gabriela-Raluca and Vatamanelu Andreea
        </p>
      </div>
    </footer> -->
</body>

</html>
<?php
require_once '../controllers/AccountController.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    AccountController::SignIn();
}
?>
<?php
require_once 'checkRoutes.php';
$error = '';
$mess = '';
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    switch ($error) {
        case 'false':
            $mess = 'Te rugam sa te logezi.';
        case 'emailNotValid':
            $mess = 'Email-ul sau parola sunt incorecte. Te rugam sa incerci din nou.';
    }
}
?>