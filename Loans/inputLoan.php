<?php
    require_once 'Loans.php';
    ini_set("display_erros", "on");
    $loan = new Loan();
    $loan->setDataEmprestimo($_POST['dataEmprestimo'] ?? null);
    $loan->setDataDevolucao($_POST['dataDevolucao'] ?? null);
    $loan->setStatus($_POST['idStatus'] ?? null);
    $loan->setUser($_POST['idUser'] ?? null);
    $loan->setReader($_POST['idReader'] ?? null);
    $loan->setBookId( $_POST['idLivro'] ?? null);
    $loan->insert();
    if($loan->insertBookLoan()){
        $_SESSION['menssagem'] = 'Empréstimo efetuado com sucesso!';
    }
    else{
        $_SESSION['menssagem'] = 'Erro ao efetuar o empréstimo!';
    }
    
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="/icone.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/icone.ico" type="image/x-icon" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Empréstimos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <section class="header-menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                </div>
            </div>
        </div>
    </section>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid d-flex justify-content-center">
            <div class="row d-flex justify-content-between">

                <div class="col-md-2">
                    <a href="/menu.php"><button class="btn btn-dark">Inicio</button></a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="offset-md-3 col-md-6 offset-md-3">

                <div class="alert alert-warning mt-5 d-flex justify-content-center" role="alert">
                    <?php echo $_SESSION['menssagem']?>
                </div>

                <div class="d-flex justify-content-center ">
                    <a href="loanRegistration.php"><button class="btn btn-dark mb-5">Efetuar novo empréstimo</button></a>
                </div>
            </div>
        </div>
    </div>                       
    <section class="footer-all">
        <div class="container-fluid">
            <div class="row">
            </div>
        </div>
    </section>
</body>
</html>
    