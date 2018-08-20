<?php 
    require_once 'Loans.php';
    session_start();
    $loan = new Loan();
    $loan->setLoanId($_POST['id'] ?? null);
    $loan->setStatus(4);
    $loan->setDataCancelamento($_POST['dataCancelamento']  ?? null );
    $loan->cancellation();
    header('Location:/Loans/printLoans.php');