<?php 
    require_once 'Genres.php';
    session_start();
    $genre = new Genre();
    $genre->setId($_POST['id']);
    $genre->setName(!empty($_POST['name']) ? $_POST['name'] : $_SESSION['name']);
    $genre->update();
    header('Location:/Genres/printGenres.php');