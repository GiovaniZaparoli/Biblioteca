<?php
    require_once 'Readers.php';
    $reader = new Reader();
    $reader->setId($_GET['id']);
    $reader->delete();
    header('Location:/Readers/printReaders.php');