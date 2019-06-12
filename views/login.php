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
            $_SESSION['userType']=0;
            header('Location: dashboard.php');
        }
        else {
            $authority=new Authority(null, null, null, null, null, null);
            if ($authority->find($email,$password)){
                $_SESSION['email']=$email;
                $_SESSION['userType']=1;
                header('Location: dashboard.php');
            }
            else {
                header('Location: login.html');
            }
        }
    }
?>