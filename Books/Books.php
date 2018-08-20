<?php
    require_once '../connection.php';
    class Book{
        protected $id;
        protected $title;
        protected $publicationDate;
        protected $authorId;
        protected $genreId;
        protected $publisherId;
        protected $insert;
        protected $update;
        protected $delete;
        protected $select;
        protected $result;
        protected $conecta;
        protected $status;

        public function __construct(){
            $this->conecta = new Conecta();
        }

        public function setId($id){
            $this->id = $id;
        }
        
        public function setTitle($title){
            $this->title = $title;
        }

        public function setPublicationDate($date){
            $this->publicationDate = $date;
        }

        public function setAuthor($autor){
            $this->authorId = $autor;
        }

        public function setGenre($genre){
            $this->genreId = $genre;
        }

        public function setPublisher($publisher){
            $this->publisherId = $publisher;
        }

        public function insert(){
            $this->insert = 'INSERT INTO books (title, publication_date, author_id, genre_id, publisher_id) VALUES
                (\'' . $this->title . '\', \'' . $this->publicationDate . '\', \'' . $this->authorId . '\', \'' . $this->genreId . '\', \'' . $this->publisherId . '\')';
            $this->result = mysqli_query($this->conecta->setConnection(), $this->insert);
            return $this->result;
        }

        public function update(){
            $this->update = "UPDATE books SET title = '$this->title', publication_date = '$this->publicationDate',
            author_id = $this->authorId, genre_id = $this->genreId, publisher_id = $this->publisherId  WHERE id = $this->id";
            $this->result = mysqli_query($this->conecta->setConnection(), $this->update);
            return $this->result;
        }

        public function selectOne(){
            $this->select = "SELECT books.title AS title, books.id, books.publication_date, authors.id AS authorID, genres.id
            AS genreID, publishers.id AS publisherID ,authors.name AS autor, genres.name AS genres, publishers.name AS publisher 
            FROM books 
            INNER JOIN authors ON books.author_id = authors.id
            INNER JOIN genres ON books.genre_id = genres.id 
            INNER JOIN publishers ON books.publisher_id = publishers.id
            WHERE books.id = $this->id";
            $this->result = mysqli_query($this->conecta->setConnection(), $this->select);
            return $this->result;
        }

        public function selectAll(){
            $this->select = "SELECT books.title, books.id, books.publication_date, authors.name AS autor, genres.name AS genres, publishers.name AS publisher 
            FROM books 
            INNER JOIN authors ON books.author_id = authors.id
            INNER JOIN genres ON books.genre_id = genres.id 
            INNER JOIN publishers ON books.publisher_id = publishers.id ORDER BY books.title ASC";
            $this->result = mysqli_query($this->conecta->setConnection(), $this->select);
            return $this->result;
        }

        public function delete(){
            $this->delete = "DELETE FROM books WHERE id=$this->id";
            $this->result = mysqli_query($this->conecta->setConnection(), $this->delete);
            return $this->result;
        }

        public function selectStatus(){
            $this->status = "SELECT * FROM status";
            $this->result = mysqli_query($this->conecta->setConnection(), $this->status);
            return $this->result;
        }

    }