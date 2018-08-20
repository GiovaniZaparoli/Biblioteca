<?php 
    require_once '../connection.php';
    require_once 'Users.php';
    ini_set("display_errors","on");
    session_start();
    $user = new User();
    $user->setId($_POST['id']);
    $user->setName(!empty($_POST['name']) ? $_POST['name'] : $_SESSION['name']);
    $user->setCpf(!empty($_POST['cpf']) ? $_POST['cpf'] : $_SESSION['cpf']); 
    $user->setBirthDate(!empty($_POST['birthDate']) ? $_POST['birthDate'] : $_SESSION['birth_date']);
    $user->setEmail(!empty($_POST['email']) ? $_POST['email'] : $_SESSION['email']);
    $user->setSenhaNova(!empty($_POST['novaSenha']) ? $_POST['novaSenha'] : null);
    $user->setSenhaAntiga(!empty($_POST['senhaAntiga']) ? $_POST['senhaAntiga'] : null);
    $user->setPassword($_SESSION['password']);
    $user->updateUser();

    header('Location:/Users/printUsers.php');