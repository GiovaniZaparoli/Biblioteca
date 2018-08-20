<?php
    require_once '../connection.php';
    class Genre{
        protected $id;
        protected $name;
        protected $insert;
        protected $update;
        protected $delete;
        protected $select;
        protected $result;
        protected $conecta;

        public function __construct(){
            $this->conecta = new Conecta();
        }

        public function setId($id){
            $this->id = $id;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function getId(){
            return $this->id;
        }

        public function getName(){
            return $this->name;
        }

        public function selectOne(){
            $this->select = "SELECT * FROM genres WHERE id = $this->id";
            $this->result = mysqli_query($this->conecta->setConnection(), $this->select);
            return $this->result;
        }

        public function selectAll(){
            $this->select = "SELECT * FROM genres";
            $this->result = mysqli_query($this->conecta->setConnection(), $this->select);
            return $this->result;
        }

        public function update(){
            $this->update ="UPDATE genres SET name = '$this->name' WHERE id = $this->id"; 
            $this->result = mysqli_query($this->conecta->setConnection(), $this->update);
            return $this->result;
        }

        public function delete(){
            $this->delete = "DELETE FROM genres WHERE id = $this->id";
            $this->result = mysqli_query($this->conecta->setConnection(), $this->delete);
            return $this->result;
        }

        public function insert(){
            $this->insert = 'INSERT INTO genres (name) VALUES (\'' . $this->name . '\')';
            var_dump($this->insert);
            $this->result = mysqli_query($this->conecta->setConnection(), $this->insert);
            return $this->result;
        }
    }