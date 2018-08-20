<?php
    require_once '../connection.php';
    class Reader{
        protected $id;
        protected $name;
        protected $cpf;
        protected $conecta;
        protected $insert;
        protected $update;
        protected $delete;
        protected $result;

        public function __construct(){
            $this->conecta = new Conecta();
        }

        public function setId($id){
            intval($this->id = $id);
        }

        public function setName($name){
            $this->name = $name;
        }

        public function setCpf($cpf){
            $this->cpf = $cpf;
        }

        public function getId(){
            return $this->id;
        }

        public function getName(){
            return $this->name;
        }
        
        public function getCpf(){
            return $this->cpf;
        }

        public function insert(){
            $this->insert = 'INSERT INTO readers (name, cpf) VALUES
                (\'' . $this->name . '\', \'' . $this->cpf . '\')';
            $this->result = mysqli_query($this->conecta->setConnection(), $this->insert);
            return $this->result;
        }

        public function update(){
            $this->update = "UPDATE readers SET name = '$this->name', cpf = '$this->cpf' WHERE id = '$this->id'";
            $this->result = mysqli_query($this->conecta->setConnection(), $this->update);
            return $this->result;
        }

        public function selectOne(){
            $this->select = "SELECT * FROM readers WHERE id = $this->id";
            $this->result = mysqli_query($this->conecta->setConnection(), $this->select);
            return $this->result;
        }

        public function selectAll(){
            $this->select = "SELECT * FROM readers";
            $this->result = mysqli_query($this->conecta->setConnection(), $this->select);
            return $this->result;
        }

        public function delete(){
            $this->delete = "DELETE FROM readers WHERE id=$this->id";
            $this->result = mysqli_query($this->conecta->setConnection(), $this->delete);
            return $this->result;
        }
    }