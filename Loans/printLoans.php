<?php   
    require_once 'Loans.php';
    session_start();
    $loans = new Loan();
    $resultado = $loans->selectAll();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="/icone.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/icone.ico" type="image/x-icon" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Listagem de Empréstimos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-center mt-4">
                    <h1>Listagem de livros</h1>
                </div>
                <table class="table table-dark mt-2 text-center">
                    <thead>
                        <tr>
                            <th scope="col">Número do Empréstimo</th>
                            <th scope="col">Data do Empréstimo</th>
                            <th scope="col">Data a ser devolvido</th>
                            <th scope="col">Usuário</th>
                            <th scope="col">Leitor</th>
                            <th scope="col">Livro</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <?php while($loan = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) { ?>
                            <tr>
                                <td><?php echo $loan['loan_id']?></td>
                                <td><?php echo date('d/m/Y', strtotime($loan['DataEmprestimo']))?></td>
                                <td><?php echo date('d/m/Y', strtotime($loan['DataRetorno']))?></td>
                                <td><?php echo $loan['userName']?></td>
                                <td><?php echo $loan['readerName']?></td>
                                <td><?php echo $loan['title']?></td>
                                <td><?php echo $loan['status']?></td>
                                <td>
                                    <a class="btn btn-dark btn-block" href="devolucao.php?id=<?php echo $loan['loan_id']?>">
                                        Devolução
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-dark btn-block" href="cancelamento.php?id=<?php echo $loan['loan_id']?>">
                                        Cancelamento
                                    </a>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
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