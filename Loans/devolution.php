<?php 
    require_once 'Loans.php';
    session_start();
    $loan = new Loan();
    $loan->setLoanId($_POST['id']);
    $loan->setStatus(3);
    $loan->setDataRetorno($_POST['dataDevolucao'] ??  null);
    $loan->devolution();
    header('Location:/Loans/printLoans.php');