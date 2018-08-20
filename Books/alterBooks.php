<?php 
    require_once 'Books.php';
    session_start();
    $book = new Book();
    $book->setId($_POST['id']);
    $book->setTitle(!empty($_POST['title']) ? $_POST['title'] : $_SESSION['title']);
    $book->setPublicationDate(!empty($_POST['PublicationDate']) ? $_POST['PublicationDate'] : $_SESSION['publication_date']); 
    $book->setAuthor(!empty($_POST['idAutor']) ? $_POST['idAutor'] : $_SESSION['authorID']);
    $book->setGenre(!empty($_POST['idGenre']) ? $_POST['idGenre'] : $_SESSION['genreID']);
    $book->setPublisher(!empty($_POST['idPublisher']) ? $_POST['idPublisher'] : $_SESSION['publisherID']);
    $book->update();
    header('Location:/Books/printBooks.php');