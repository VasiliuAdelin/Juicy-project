<?php
class AccountController
{
    public function __contruct()
    { }
    public static function SignIn()
    {
        if (isset($_POST['emailLogin']) && isset($_POST['passwordLogin'])) {
            require_once '../models/AuthModel.php';
            $email = AccountController::cleardata($_POST['emailLogin']);
            $password = $_POST['passwordLogin'];
            $AuthModel = new AuthModel();
            $res = $AuthModel->getUserbyEmail($email);
            if ($res === false) {
                header("Location:/Juicy-Project/views/login.php?error=false");
            } else if ($res['password'] == md5($password)) {
                $_SESSION['email'] = $email;
                $_SESSION['id_user'] = $res['id_user'];
                header('Location:/Juicy-Project/views/shop.php?login=true');
            } else {
                header("Location:/Juicy-Project/views/login.php?error=credeantialsBad222");
            }
        } else
            header("Location:/Juicy-Project/views/login.php?error=credeantialsBad");
    }
    public static function clearData($str)
    {
        $str = trim($str);
        $str = stripslashes($str);
        $str = htmlspecialchars($str);
        return $str;
    }
    public static function SignUp()
    {
        if (isset($_POST['email'])) {
            require_once '../models/AuthModel.php';
            $name = AccountController::clearData($_POST['name']);
            $email = AccountController::clearData($_POST['email']);
            $password = $_POST['password'];
            $confPass = $_POST['confPass'];
            $phone = AccountController::clearData($_POST['phone']);
            $address = AccountController::clearData($_POST['address']);
            if ($name == NULL || $email == NULL || $password == NULL || $confPass == NULL || $phone == NULL || $address == NULL) {
                header("Location:/Juicy-Project/views/register.php?error=emptyFields");
            } else {
                if ($password != $confPass) {
                    header("Location:/Juicy-Project/views/register.php?error=passwordsDontMatch");
                } else {
                    $AuthModel = new AuthModel();
                    $res = $AuthModel->userExisting($email);
                    $password = md5(AccountController::clearData($_POST['password']));
                    if ($res == false) {
                        $res2 = $AuthModel->addNewUser($name, $email, $password, $phone, $address);
                        header("Location:/Juicy-Project/views/login.php?success=accountCreated");
                    } else {
                        header("Location:/Juicy-Project/views/register.php?error=emailIsAllreadyExist");
                    }
                }
            }
        }
    }

    public static function getUserInfo($id)
    {
        require_once '../models/AuthModel.php';@@
        $AuthModel = new AuthModel();
        return $AuthModel->getUserInfoFromDB($id);
    }
   
}
