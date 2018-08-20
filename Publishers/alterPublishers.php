<?php 
    require_once 'Publishers.php';
    session_start();
    $publisher = new Publisher();
    $publisher->setId($_POST['id']);
    $publisher->setName(!empty($_POST['name']) ? $_POST['name'] : $_SESSION['name']);
    $publisher->update();
    header('Location:/Publishers/printPublishers.php');