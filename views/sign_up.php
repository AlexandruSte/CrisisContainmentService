<?php
    require_once("../models/CrisisUser.php");
    require_once("../models/Authority.php");
    session_start();
    if (isset($_POST['name'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $website=$_POST['website'];
        $address=$_POST['address'];
        $password=$_POST['password'];
        $authority=new Authority($name,$email,$phone,$website,$address,$password);
        if ($authority->create()){
            header('Location: index.html');
        }
        else {
            header('Location: sign_up.html');
        }
    }
    else {
        if (isset($_POST['first_name'])){
            $firstname=$_POST['frist_name'];
            $lastname=$_POST['last_name'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $zip=$_POST['zip'];
            $city=$_POST['city'];
            $country=$_POST['country'];
            $phone=$_POST['phone'];
            $user=new CrisisUser($firstname,$lastname,$email,$password,$country,$city,$zip,$phone);
            if ($user->create()){
                header('Location: index.html');
            }
            else {
                header ('Location: sign_up.html');
            }
        }
        else {
            header('Location: sign_up.html');
        }
    }
?>