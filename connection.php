<?php
    class Conecta{

        protected $connection;
        protected $lastId;
        
        public function setConnection(){
            $this->connection = mysqli_connect('bdMysql', 'giovani', 'root', 'biblioteca', '3306');

            if (mysqli_connect_errno()){
                echo 'Ocorreu um erro durante a conexão: ' . mysqli_connect_error();
            }
            else{
                return $this->connection;
            }
        }

        public function lastId(){
            $this->lastId = $this->connection->insert_id;
            return $this->lastId;
        }
    }
    