<?php
    require_once '../connection.php';
    class User{
        protected $id;
        protected $name;
        protected $cpf;
        protected $birth_date;
        protected $email;
        protected $password;
        protected $result;
        protected $insert;
        protected $select;
        protected $conecta;
        protected $update;
        protected $delete;
        protected $senhaNova;
        protected $senhaAntiga;

        public function __construct(){
            $this->conecta = new Conecta();
        }

        public function setId($id){
            $this->id = $id;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function setCpf($cpf){
            $this->cpf = $cpf;
        }

        public function setBirthDate($birth_date){
            $this->birth_date = $birth_date;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function setPassword($password){
            $this->password = $password;
        }

        public function setSenhaNova($senha){
            $this->senhaNova = $senha;
        }

        public function setSenhaAntiga($senha){
            $this->senhaAntiga = $senha;
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

        public function getBirthDate(){
            return $this->birth_date;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getPassword(){
            return $this->password;
        }

        public function insertUser(){
            $this->insert = 'INSERT INTO users (name, cpf, birth_date, email, password) VALUES
                (\'' . $this->name . '\' ,  \'' .$this->cpf. '\', \'' . $this->birth_date .'\',\'' . $this->email .'\', \'' . $this->password . '\')';
            $this->result = mysqli_query($this->conecta->setConnection(), $this->insert);
            return $this->result;
        }

        public function updateUser(){
            if($this->senhaNova != null && $this->senhaAntiga == $this->password){
                $this->update = "UPDATE users SET name = '$this->name', cpf = '$this->cpf',birth_date ='$this->birth_date',
                email ='$this->email', password = '$this->senhaNova' WHERE id ='$this->id'";
                $this->result = mysqli_query($this->conecta->setConnection(), $this->update);
            }
            else{
                $this->update = "UPDATE users SET name = '$this->name', cpf = '$this->cpf',birth_date ='$this->birth_date', email ='$this->email' WHERE id ='$this->id'"; 
                $this->result = mysqli_query($this->conecta->setConnection(), $this->update);
            }
            return $this->result;   
        }

        public function selectOne(){
            $this->select = 'SELECT id, name, cpf, birth_date, email, password FROM users WHERE id = \'' . $this->id . '\'';
            $this->result = mysqli_query($this->conecta->setConnection(), $this->select);
            return $this->result;
        }

        public function selectAll(){
            $this->select = "SELECT id, name, cpf, birth_date, email FROM users ORDER BY name ASC";
            $this->result = mysqli_query($this->conecta->setConnection(), $this->select);
            return $this->result;
        }

        public function delete(){
            $this->delete = "DELETE FROM users WHERE id = $this->id";
            $this->result = mysqli_query($this->conecta->setConnection(), $this->delete);
        }
    }

