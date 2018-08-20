<?php 
    require_once'../connection.php';
    ini_set('display_erros', 'on');
    class Author{
        protected $id;
        protected $name;
        protected $insert;
        protected $update;
        protected $delete;
        protected $select;
        protected $conecta;
        protected $result;

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
            $this->insert = 'INSERT INTO authors (name) VALUES (\'' . $this->name . '\')';
            $this->result = mysqli_query($this->conecta->setConnection(), $this->insert);
            return $this->result;
        }

        public function delete(){
            $this->delete = "DELETE FROM authors WHERE id = $this->id";
            $this->result = mysqli_query($this->conecta->setConnection(), $this->delete);
            return $this->result;
        }
        
        public function update(){
            $this->update = "UPDATE authors SET name = '$this->name' WHERE id = $this->id";
            $this->result = mysqli_query($this->conecta->setConnection(), $this->update);
            return $this->result;
        }

        public function selectOne(){
            $this->select = "SELECT * FROM authors WHERE id = $this->id";
            $this->result = mysqli_query($this->conecta->setConnection(), $this->select);
            return $this->result;
        }

        public function selectAll(){
            $this->select = "SELECT * FROM authors ORDER BY name ASC";
            $this->result = mysqli_query($this->conecta->setConnection(), $this->select);
            return $this->result;
        }
    }