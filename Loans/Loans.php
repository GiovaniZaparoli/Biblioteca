<?php
    ini_set('display_errors', 1);
    require_once '../connection.php';
    class Loan{
        protected $loanId;
        protected $dataEmprestimo;
        protected $dataDevolucao;
        protected $statusId;
        protected $userId;
        protected $readerId;
        protected $dataCancelamento;
        protected $dataRetorno;
        protected $bookId;
        protected $bookLoanId;
        protected $insert;
        protected $devolution;
        protected $cancellation;
        protected $select;
        protected $conecta;

        public function __construct(){
            $this->conecta = new Conecta();
        }

        public function setLoanId($loanId){
            $this->loanId = $loanId;
        }

        public function setDataEmprestimo($emprestimo){
            $this->dataEmprestimo = $emprestimo;
        }

        public function setDataDevolucao($devolucao){
            $this->dataDevolucao = $devolucao;
        }

        public function setStatus($status){
            $this->statusId = $status;
        }

        public function setUser($user){
            $this->userId = $user;
        }

        public function setReader($reader){
            $this->readerId = $reader;
        }

        public function setDataCancelamento($cancelamento){
            $this->dataCancelamento = $cancelamento;
        }

        public function setDataRetorno($retorno){
            $this->dataRetorno = $retorno;
        }

        public function setBookId($book){
            $this->bookId = $book;
        }

        public function setBookLoanId($bookLoan){
            $this->bookLoanId = $bookLoan;
        }

        public function getLoanId(){
            return $this->loanId;
        }

        public function insert(){
            $this->insert = 'INSERT INTO loans (loan_date, return_date, status_id, user_id, reader_id)
            VALUES (\''. $this->dataEmprestimo . '\',\''. $this->dataDevolucao . '\',\''. $this->statusId . '\',\''. $this->userId . '\',\''. $this->readerId . '\')';
            $this->result = $this->conecta->setConnection()->query($this->insert); 
            $this->loanId = $this->conecta->lastId();
            return $this->result;
         }

         public function insertBookLoan(){
            $this->insert = 'INSERT INTO books_has_loans (book_id, loan_id) VALUES (\''. $this->bookId . '\', \''. $this->loanId . '\')';
            $this->result = mysqli_query($this->conecta->setConnection(), $this->insert);
            return $this->result;

         }

        public function selectAll(){
            $this->select = 'SELECT books_has_loans.book_id, books_has_loans.loan_id, loans.loan_date AS DataEmprestimo, loans.return_date AS DataRetorno,
            status.status AS status, users.name AS userName, readers.name AS readerName, books.title AS title
            FROM books_has_loans 
            INNER JOIN loans ON books_has_loans.loan_id = loans.id 
            INNER JOIN books ON books_has_loans.book_id = books.id 
            INNER JOIN status ON loans.status_id = status.id 
            INNER JOIN users ON loans.user_id = users.id 
            INNER JOIN readers ON loans.reader_id = readers.id 
            WHERE loans.status_id = 1';
            $this->result = mysqli_query($this->conecta->setConnection(), $this->select);
            return $this->result;
        }

        public function selectOne(){
            $this->select = "SELECT id FROM loans WHERE id = $this->loanId";
            $this->result = mysqli_query($this->conecta->setConnection(), $this->select);
            return $this->result;
        }

        public function devolution(){
            $this->devolution = "UPDATE loans SET cancellation_date = '$this->dataRetorno', status_id ='$this->statusId'  WHERE id = $this->loanId"; 
            $this->result = mysqli_query($this->conecta->setConnection(), $this->devolution);
            return $this->result;
        }

        public function cancellation(){
            $this->cancellation = "UPDATE loans SET cancellation_date = '$this->dataCancelamento', status_id ='$this->statusId'  WHERE id = $this->loanId";
            $this->result = mysqli_query($this->conecta->setConnection(), $this->cancellation);
            return $this->result;
        }

    }