<?php

session_start();
require "modelo/login.php";
/* */
class LoginController{
    public function index(){
        if(isset($_SESSION['login'])){
            header('location:'.urlsite);
            require "vista/login.php";
        }
    }

    public function login(){
        $_modelo=new Login ();
        $_email=trim($_POST['txtemail']);
        $_passw=md5(trim($_POST['txtpassword']));
        $resultado=$_modelo->login($_email,$_passw);
        if($resultado){
            $_SESSION['login']=$_email;
            header('location:'.urlsite);
        }
        else{
            header('location'.urlsite."?msg=no coinciden las credecnciales");
        }
    }
    
}