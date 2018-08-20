<?php
    require_once 'Genres.php';
    $genre = new Genre();
    $genre->setId($_GET['id']);
    $genre->delete();
    header('Location:/Genres/printGenres.php');