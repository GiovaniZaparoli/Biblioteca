<?php 
    require_once 'Readers.php';
    session_start();
    $reader = new Reader();
    $reader->setId($_POST['id']);
    $reader->setName(!empty($_POST['name']) ? $_POST['name'] : $_SESSION['name']);
    $reader->setCpf(!empty($_POST['cpf']) ? $_POST['cpf'] : $_SESSION['cpf']);     
    $reader->update();
    header('Location:/Readers/printReaders.php');