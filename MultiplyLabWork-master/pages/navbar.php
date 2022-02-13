<?php
include_once "../libs/User.php";
include_once "../libs/Session.php";
function logOut()
{
    $_SESSION['user'] = null;
}

try {
    $user = Session::GetCurrentUser();
} catch (Exception $e) {

}
?>
<link rel="stylesheet" href="../styles/navbar.css">
<ul>
    <li><a href="train.php">Вчити</a></li>
    <li><a href="leaders.php">Лідери</a></li>
    <?php if (isset($user)) { ?>
        <li><a href="login.php" onclick="out()">Вийти</a></li>
    <?php } ?>
    <?php if (!isset($user)) { ?>
        <li><a href="login.php">Ввійти</a></li>
    <?php } ?>
</ul>
<script>
    function out(){
        sessionStorage.removeItem('user')
    }
</script>
