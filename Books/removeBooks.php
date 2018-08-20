<?php
    require_once 'Books.php';
    $book = new Book();
    $book->setId($_GET['id']);
    $book->delete();
    header('Location:printBooks.php');

         