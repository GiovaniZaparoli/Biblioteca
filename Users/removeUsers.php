<?php
    require_once 'Users.php';
    $user = new User();
    $user->setId($_POST["id"]);
    $user->delete();
    header('Location:printUsers.php');

         