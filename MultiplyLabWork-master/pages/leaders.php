<?php
require_once "../libs/User.php";
require_once "../libs/DataBase.php";
require_once "../libs/Session.php";
$db = new DataBase();
$leaders = array_reverse(simple_quick_sort($db->getAllUsers()));
try {
    $user = Session::GetCurrentUser();
} catch (Exception $e) {

}
function simple_quick_sort($users)
{
    if (count($users) <= 1) {
        return $users;
    } else {
        $pivot = $users[0];
        $left = array();
        $right = array();
        for ($i = 1; $i < count($users); $i++) {
            if ($users[$i]->getRating() < $pivot->getRating()) {
                $left[] = $users[$i];
            } else {
                $right[] = $users[$i];
            }
        }
        return array_merge(simple_quick_sort($left), array($pivot), simple_quick_sort($right));
    }
}

if (isset($user)) {
    $currentUserPosition = array_search($user, $leaders) + 1;
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Leaders</title>
        <link rel="stylesheet" href="../styles/leaderBoard.css">
    </head>
    <body style="width: 80%">
    <table class="table">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Email</th>
            <th>Rating</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($leaders as $leader) { ?>
            <tr>
                <td><?php echo $leader->getName() ?></td>
                <td><?php echo $leader->getEmail() ?></td>
                <td><?php echo $leader->getRating() ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <div class="container">
        <h3>Your position: <?php echo $currentUserPosition; ?></h3>
        <button class="custom-btn btn-1" role="button" onclick="location.href='index.php'">Menu</button>
    </div>

    </body>
    </html>
<?php } else {
    include "404.php";
}