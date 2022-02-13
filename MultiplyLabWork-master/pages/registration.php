<?php
require_once "../libs/User.php";
require_once "../libs/DataBase.php";
require_once "../libs/Session.php";
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])
    && isset($_POST['confirm_password'])) {
    $db = new DataBase();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirmation = $_POST['confirm_password'];
    if ($password == $passwordConfirmation) {
        $newUser = new User($name, $email, $password);
        Session::SaveUser($newUser);
        if($db->saveUser($newUser, $password)){
            header("Location: login.php");
        }
        ?>
        <script>alert("Збереження невдале!")</script>
        <?php
    } else {
        ?>
        <script>alert("Паролі не збігаються")</script>
        <?php
    }
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Реєстрація</title>
    <link rel="stylesheet" href="../styles/login.css">
</head>
<body>
<?php include "navbar.php" ?>
<form method="post" action="registration.php">
    <div class="overlay">
        <form>
            <div class="con">
                <header class="head-form">
                    <h2>Реєстрація</h2>

                    <p>Введіть дані нижче</p>
                </header>
                <br>
                <div class="field-set">

                    <span class="input-item">
                    <i class="fa fa-user-circle"></i>
                 </span>
                    <input name="email" class="form-input" id="txt-input" type="text" placeholder="email" required>
                    <br>
                    <span class="input-item">
        <i class="fa fa-key"></i>
       </span>
                    </span>
                    <input name="name" class="form-input" id="txt-input" type="text" placeholder="ім'я" required>
                    <br>
                    <span class="input-item">
        <i class="fa fa-key"></i>
       </span>
                    <input name="password" class="form-input" type="password" placeholder="пароль" id="pwd"
                           required>
                    <span>
     </span>
                    </span>
                    <input name="confirm_password" class="form-input" type="password" placeholder="підтвердити пароль"
                           id="pwd"
                           required>
                    <span>
     </span>
                    <br>
                    <button class="log-in">Зареєструвати</button>
                </div>
                <div class="other">
                    <button class="btn submits frgt-pass">Вже маєте аккаунт?</button>
                    <button class="btn submits sign-up"
                            onclick="location.href='login.php'">Вхід
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</form>
</body>
</html>