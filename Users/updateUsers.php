<?php
    require_once '../connection.php';
    require_once 'Users.php';
    ini_set("display_errors","on");
    session_start();
    $user = new User();
    $user->setID($_GET['id'] ?? null);
    $usuario = mysqli_fetch_array($user->selectOne(), MYSQLI_ASSOC);
    $_SESSION['name'] = $usuario['name'];
    $_SESSION['cpf'] = $usuario['cpf'];
    $_SESSION['birth_date'] = $usuario['birth_date'];
    $_SESSION['email'] = $usuario['email'];
    $_SESSION['password'] = $usuario['password'];
?>
<!DOCTYPE html>
    <html>
    <head>
        <link rel="icon" href="/icone.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="/icone.ico" type="image/x-icon" />
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Alteração de Usuários</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="/css/style.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<section class="header-menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <a href="/index.php"><button class="btn btn-dark">Log-out</button></a>
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
                <div class="col-md-2">
                    <div class="dropdown">
                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cadastros
                        </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item d-flex justify-content-center" href="/Users/userRegistration.php">Cadastrar Usuário</a>
                        <a class="dropdown-item d-flex justify-content-center" href="/Authors/authorRegistration.php">Cadastrar Autor</a>
                        <a class="dropdown-item d-flex justify-content-center" href="/Publishers/publisherRegistration.php">Cadastrar Editora</a>
                        <a class="dropdown-item d-flex justify-content-center" href="/Books/booksRegistration.php">Cadastrar Livro</a>
                        <a class="dropdown-item d-flex justify-content-center" href="/Readers/readerRegistration.php">Cadastrar Leitor</a>
                        <a class="dropdown-item d-flex justify-content-center" href="/Genres/genreRegistration.php">Cadastrar Genêro</a>
                    </div>
                </div>
                </div>
                <div class="col-md-2">
                    <a href="/Loans/loanRegistration.php"><button class="btn btn-dark">Empréstimo</button></a>
                </div>
                <div class="col-md-3">
                        <a href="/Loans/printLoans.php"><button class="btn btn-dark">Devolução/Cancelamento</button></a>
                </div>
                <div class="col-md-2">
                    <div class="dropdown">
                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Relatórios e Listagens
                        </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item d-flex justify-content-center" href="/Reports/choice.php">Listagem de empréstimos, devoluções e cancelamentos.</a>
                        <a class="dropdown-item d-flex justify-content-center" href="/Reports/booksReport.php">Relatório de livros mais retirados.</a>
                        <a class="dropdown-item d-flex justify-content-center" href="/Reports/usersReport.php">Relatório leitores que mais retiram livros.</a>
                        <a class="dropdown-item d-flex justify-content-center" href="/Users/printUsers.php">Listar Usuários</a>
                        <a class="dropdown-item d-flex justify-content-center" href="/Readers/printReaders.php">Listar Leitores</a>
                        <a class="dropdown-item d-flex justify-content-center" href="/Authors/printAuthors.php">Listar Autores</a>
                        <a class="dropdown-item d-flex justify-content-center" href="/Publishers/printPublishers.php">Listar Editoras</a>
                        <a class="dropdown-item d-flex justify-content-center" href="/Books/printBooks.php">Listar Livros</a>
                        <a class="dropdown-item d-flex justify-content-center" href="/Genres/printGenres.php">Listar genêros</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="offset-md-3 col-md-6 offset-md-3">
                <div class="d-flex justify-content-center mb-3">
                    <h1>Alterar dados de usuários</h1>
                </div>
                <form action="alterUsers.php" method="POST">
                    <div class="form-group">
                        <label for="inputUsuario">Nome</label>
                        <input type="text" class="form-control" id="inputNome" name="name" aria-describedby="userHelp"
                        placeholder="<?php  echo $_SESSION['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputCpf">CPF</label>
                        <input type="text" class="form-control" id="inputCpf" name="cpf" placeholder="<?php echo $_SESSION['cpf'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputDataNascimento">Data de Nascimento</label>
                        <input type="date" class="form-control" id="inputDataNascimento" name="birthDate" placeholder="<?php echo $_SESSION['birth_date'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="<?php echo $_SESSION['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Senha antiga:</label>
                        <input type="password" class="form-control" name="senhaAntiga">
                    </div>
                    <div class="form-group">
                        <label>Nova senha:</label>
                        <input type="password" class="form-control" name="novaSenha">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $usuario['id'];?>">
                    <button type="submit" name="enviar" value="enviar" class="btn btn-dark d-flex justify-content-center mb-5">Atualizar</button>
                </form>
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

    
