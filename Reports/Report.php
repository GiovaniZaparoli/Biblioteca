<?php
    require_once '../connection.php';
    ini_set("display_erros", 1);
    class Report{
        protected $conecta;
        protected $user;
        protected $book;
        protected $devolution;
        protected $cancellation;
        protected $loan;
        protected $result;

        public function __construct(){
            $this->conecta = new Conecta();
        }

        public function userReport(){
            $this->user = 'SELECT COUNT(loans.reader_id) AS leitores, readers.name AS name
            FROM loans
            INNER JOIN readers ON loans.reader_id = readers.id
            GROUP BY reader_id
            ORDER BY leitores DESC';
            $this->result = mysqli_query($this->conecta->setConnection(), $this->user);
            return $this->result;
            
        }

        public function loanReport(){
            $this->loan = 'SELECT books_has_loans.book_id, books_has_loans.loan_id, loans.loan_date AS DataEmprestimo, loans.return_date AS DataRetorno,
            status.status AS status, users.name AS userName, readers.name AS readerName, books.title AS title
            FROM books_has_loans 
            INNER JOIN loans ON books_has_loans.loan_id = loans.id 
            INNER JOIN books ON books_has_loans.book_id = books.id 
            INNER JOIN status ON loans.status_id = status.id 
            INNER JOIN users ON loans.user_id = users.id 
            INNER JOIN readers ON loans.reader_id = readers.id 
            WHERE loans.status_id = 1';
            $this->result = mysqli_query($this->conecta->setConnection(), $this->loan);
            return $this->result;
        }

        public function devolutionReport(){
            $this->devolution = 'SELECT books_has_loans.book_id, books_has_loans.loan_id, loans.loan_date AS DataEmprestimo, loans.return_date AS DataRetorno,
            status.status AS status, users.name AS userName, readers.name AS readerName, books.title AS title
            FROM books_has_loans 
            INNER JOIN loans ON books_has_loans.loan_id = loans.id 
            INNER JOIN books ON books_has_loans.book_id = books.id 
            INNER JOIN status ON loans.status_id = status.id 
            INNER JOIN users ON loans.user_id = users.id 
            INNER JOIN readers ON loans.reader_id = readers.id 
            WHERE loans.status_id = 3';
            $this->result = mysqli_query($this->conecta->setConnection(), $this->devolution);
            return $this->result;
        }

        public function cancellationReport(){
            $this->cancellation = 'SELECT books_has_loans.book_id, books_has_loans.loan_id, loans.loan_date AS DataEmprestimo, loans.return_date AS DataRetorno,
            status.status AS status, users.name AS userName, readers.name AS readerName, books.title AS title
            FROM books_has_loans 
            INNER JOIN loans ON books_has_loans.loan_id = loans.id 
            INNER JOIN books ON books_has_loans.book_id = books.id 
            INNER JOIN status ON loans.status_id = status.id 
            INNER JOIN users ON loans.user_id = users.id 
            INNER JOIN readers ON loans.reader_id = readers.id 
            WHERE loans.status_id = 4';
            $this->result = mysqli_query($this->conecta->setConnection(), $this->cancellation);
            return $this->result;
     
        }

        public function bookReport(){
            $this->book ='SELECT COUNT(books_has_loans.book_id) AS livro, books.title AS title
            FROM books_has_loans
            INNER JOIN books ON books_has_loans.book_id = books.id
            GROUP BY books.id
            ORDER BY livro DESC';
            $this->result = mysqli_query($this->conecta->setConnection(), $this->book);
            return $this->result;
        }
    }