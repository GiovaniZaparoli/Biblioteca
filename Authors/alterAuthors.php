<?php 
    require_once 'Authors.php';
    session_start();
    $author = new Author();
    $author->setId($_POST['id']);
    $author->setName(!empty($_POST['name']) ? $_POST['name'] : $_SESSION['name']);
    $author->update();
    header('Location:/Authors/printAuthors.php');