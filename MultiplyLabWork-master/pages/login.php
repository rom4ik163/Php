<?php
require_once "../libs/User.php";
require_once "../libs/DataBase.php";
require_once "../libs/Session.php";
$db = new DataBase();
if (isset($_POST['email']) && isset($_POST['password'])) {
    $user = $db->findUser($_POST['email']);
    if ($user != false) {
        if ($user->PasswordIsCorrect($_POST['password']) == true) {
            Session::SaveUser($user);
            header("Location: index.php");
            die();
        }
    } else {
        ?>
        <script>alert("Такого користувача немає")</script>
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
        <title>Вхід</title>
        <link rel="stylesheet" href="../styles/login.css">
    </head>
    <body>
    <?php include "navbar.php" ?>
    <form method="post" action="login.php">
        <div class="overlay">
            <form>
                <div class="con">
                    <header class="head-form">
                        <h2>Вхід</h2>

                        <p>Ввійдіть за логіном та паролем</p>
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
                        <input name="password" class="form-input" type="password" placeholder="пароль" id="pwd"
                               required>
                        <span>
     </span>
                        <br>
                        <button class="log-in" type="submit">Вхід</button>
                    </div>
                    <div class="other">
                        <button class="btn submits frgt-pass">Не маєте аккаунту?</button>
                        <button class="btn submits sign-up"
                                onclick="location.href='registration.php'" type="button">Реєстрація
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </form>
    </body>
    </html>

