<?php
    require_once("../models/CrisisUser.php");
    require_once("../models/Authority.php");
    session_start();
    if (isset($_POST["email"])){
        $email=$_POST["email"];
        $password=$_POST["password"];
        $user=new CrisisUser(null,null,null,null,null,null,null,null);
        if ($user->find($email,$password)){
            $_SESSION['email']=$email;
            header('Location: dashboard.html');
        }
        else {
            $authority=new Authority(null, null, null, null, null, null);
            if ($authority->find($email,$password)){
                $_SESSION['email']=$email;
                header('Location: dashboard.html');
            }
            else {
                header('Location: login.html');
            }
        }
    }
?>