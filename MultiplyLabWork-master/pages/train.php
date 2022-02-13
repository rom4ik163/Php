<?php
include_once "../libs/User.php";
include_once "../libs/Session.php";
require_once "../libs/DataBase.php";
$db = new DataBase();
$key = 'answer';
$first = rand(1, 10);
$second = rand(1, 10);
try {
    $user = Session::GetCurrentUser();
} catch (Exception $exception) {

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
        <title>Train</title>
        <link rel="stylesheet" href="../styles/train.css">
    </head>
    <body>
    <div class="box">
        <span>Дайте правильну відповідь</span>
        <div class="task">
            <form method="post" action="train.php">
                <div class="form-content">
                    <span class="question"> <?php echo $first ?> x <?php echo $second ?> = </span>
                    <input class="answer"
                           name="answer"
                           type="number"
                           min="0"
                           max="100"
                           value="1">
                    <img src="../assets/lamp.png" alt="підказка" id="hint"
                         onclick="getHint(<?php echo $first ?> ,<?php echo $second ?>)">
                </div>
                <button class="custom-btn btn-3"><span>Відповісти</span></button>
            </form>
        </div>
    </div>
    <script src="../scripts/trainHelper.js">
    </script>
    </body>
    </html>
    <?php
} else {
    include "404.php";
}
if (!isset($_SESSION[$key]))
    $_SESSION[$key] = [$first * $second];
array_push($_SESSION[$key], $first * $second);
if (isset($_POST[$key])) {
    $userAnswer = intval($_POST[$key]);
    if ($userAnswer === $_SESSION[$key][count($_SESSION[$key]) - 2]) {
        $user->setRating($user->getRating() + 1);
        ?>
        <div class="notify">
            <h2>Правильно! 😊</h2>
        </div>
        <?php
    } else {
        $user->setRating($user->getRating() - 1);
        ?>
        <div class="notify">
            <h2>Старайся ще! 😉</h2>
        </div>
        <?php
    }
    array_shift($_SESSION[$key]);
    $db->updateUser($user);
} ?>


<div class="notify">
    <button class="custom-btn btn-1" onclick="location.href='index.php'">На головну</button>
</div>
