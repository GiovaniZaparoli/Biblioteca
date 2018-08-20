<?php
    require_once '../connection.php';
    class Publisher{
        protected $id;
        protected $name;
        protected $insert;
        protected $update;
        protected $delete;
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

        public function insert(){
            $this->insert = 'INSERT INTO publishers (name) VALUES (\''. $this->name . '\')';
            $this->result = mysqli_query($this->conecta->setConnection(), $this->insert);
            return $this->result;
        }
        
        public function update(){
            $this->update = "UPDATE publishers set name = '$this->name' WHERE id = $this->id";
            $this->result = mysqli_query($this->conecta->setConnection(), $this->update);
            var_dump($this->result);
            return $this->result;
        }

        public function selectOne(){
            $this->select = "SELECT * FROM publishers WHERE id = $this->id";
            $this->result = mysqli_query($this->conecta->setConnection(), $this->select);
            return $this->result;
        }

        public function selectAll(){
            $this->select = "SELECT * FROM publishers ORDER BY name ASC";
            $this->result = mysqli_query($this->conecta->setConnection(), $this->select);
            return $this->result;
        }

        public function delete(){
            $this->delete = "DELETE FROM publishers WHERE id = $this->id";
            $this->result = mysqli_query($this->conecta->setConnection(), $this->delete);
            return $this->result;
        }
    }