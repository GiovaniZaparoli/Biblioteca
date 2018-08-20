<?php
    require_once 'Authors.php';
    $author = new Author();
    $author->setId($_GET['id']);
    $author->delete();
    header('Location:/Authors/printAuthors.php');