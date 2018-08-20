<?php
    require_once 'Books.php';
    require_once '../Authors/Authors.php';
    require_once '../Publishers/Publishers.php';
    require_once '../Genres/Genres.php';
    session_start();
    $book = new Book();
    $book->setId($_GET['id']);
    $books = mysqli_fetch_array($book->selectOne(), MYSQLI_ASSOC);
    $_SESSION['title'] = $books['title'];
    $_SESSION['publication_date'] = $books['publication_date'];
    $_SESSION['autor'] = $books['autor'];
    $_SESSION['genres'] = $books['genres'];
    $_SESSION['publisher'] = $books['publisher'];
    $_SESSION['authorID'] = $books['authorID'];
    $_SESSION['genreID'] = $books['genreID'];
    $_SESSION['publisherID'] = $books['publisherID']; 
    
    $autor = new Author();
    $resultadoAutor = $autor->selectAll();
    $genre = new Genre();
    $resultadoGenre = $genre->selectAll();
    $publisher = new Publisher();
    $resultadoPublisher = $publisher->selectAll();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="/icone.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/icone.ico" type="image/x-icon" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Alteração de livros</title>
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
                    <h1>Alterar dados de livros</h1>
                </div>
                <form action="alterBooks.php" method="POST">
                    <div class="form-group">
                        <label for="inputTitle">Titulo</label>
                        <input type="text" class="form-control" id="inputTitle" name="title" aria-describedby="userHelp"
                            placeholder="<?php  echo $_SESSION['titulo'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputPublicationDate">Data de Publicação</label>
                        <input type="date" class="form-control" id="inputPublicationDate" name="PublicationDate"
                            placeholder="<?php echo $_SESSION['publication_date'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputAutor">Autor</label>
                        <select name="idAutor" id="inputAutor" class="form-control">
                        <option disabled selected style="display: none">Autor</option>
                        <?php while($author = mysqli_fetch_array($resultadoAutor, MYSQLI_ASSOC)) { ?>
                            <option value="<?php echo $author['id'];?>"><?php echo $author['name'] ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputGenre">Genêro</label>
                        <select name="idGenre" id="inputGenre" class="form-control">
                        <option disabled selected style="display: none">Genêro</option>
                        <?php while($genero = mysqli_fetch_array($resultadoGenre, MYSQLI_ASSOC)) { ?>
                            <option value="<?php echo $genero['id'];?>"><?php echo $genero['name'] ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputEditora">Editora</label>
                        <select name="idPublisher" id="inputEditora" class="form-control">
                        <option disabled selected style="display: none">Editora</option>
                        <?php while($editora = mysqli_fetch_array($resultadoPublisher, MYSQLI_ASSOC)) { ?>
                            <option value="<?php echo $editora['id'];?>"><?php echo $editora['name'] ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $books['id']?>">
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