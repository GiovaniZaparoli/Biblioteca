<?php
    require_once 'Readers.php';
    ini_set("display_errors","on");
    $reader = new Reader();
    session_start();
    $reader->setName($_POST['name'] ?? null);
    $reader->setCpf($_POST['cpf'] ?? null);
    $resultado = $reader->insert();
    if($resultado)
    {
        $_SESSION['menssagem'] = 'Leitor cadastrado com sucesso!';
    }
    else
    {
        $_SESSION['menssagem'] = 'Falha ao cadastrar leitor!';
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="/icone.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/icone.ico" type="image/x-icon" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro de leitor</title>
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
                    <a href="readerRegistration.php"><button class="btn btn-dark mb-5">Cadastrar novo leitor</button></a>
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

    
