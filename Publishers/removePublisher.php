<?php
    require_once 'Publishers.php';
    $publisher = new Publisher();
    $publisher->setId($_GET['id']);
    $publisher->delete();
    header('Location:/Publishers/printPublishers.php');