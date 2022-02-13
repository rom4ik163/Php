<?php
require_once "../libs/User.php";
require_once "../libs/DataBase.php";
require_once "../libs/Session.php";
try {
    $user = Session::GetCurrentUser();
} catch (Exception $e) {

}
if (isset($user)) {
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../styles/app.css">
        <title>Меню</title>
    </head>
    <body>
    <?php include "navbar.php" ?>
    <div class="header">
        <h1>Hello, <?php echo $user ?></h1>
    </div>
    <div class="hint">
        <img src="../assets/multiplication-tables-from-1-to-10.png"/>
    </div>
    </body>
    </html>
<?php } else {
    include "404.php";
}