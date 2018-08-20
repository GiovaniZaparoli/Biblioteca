<?php
    require_once 'connection.php';
    class Login{
        protected $login;
        protected $entrar; 
        protected $senha;
        protected $verifica;
        protected $resultado; 

        public function setLogin(){
            $this->login = $_POST['login'] ?? null;
            $this->senha = $_POST['senha'] ?? null;
            $this->entrar = $_POST['entrar'] ?? null;
        }
        
        public function logar(){
            $this->verifica = "SELECT name, password FROM users WHERE name = '$this->login' AND password = '$this->senha'";
            $conecta = new Conecta();
            if(isset($this->entrar)){
                $this->resultado = mysqli_query($conecta->setConnection(), $this->verifica);
                if(mysqli_num_rows($this->resultado)<=0){
                    echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.html';</script>";
                    die();
                }
                else{
                    setcookie("login", $this->login);
                    header("Location:menu.php");
                }
            }
        }  
    }
    $login = new Login();
    $login->setLogin();
    $login->logar();