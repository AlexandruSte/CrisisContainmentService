<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add New Alert | Crisis Center</title>
    <link rel="stylesheet" href="../style/global.css">
    <link rel="stylesheet" href="../style/form.css">
    <link rel="stylesheet" href="../style/global_1300.css">
    <link rel="stylesheet" href="../style/global_930.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,300italic' rel='stylesheet' type='text/css'>
</head>

<body>
<!-- Header and nav should be on all pages-->
<div class="above-header"></div>

<header>
    <a id="logo-link" href="../views/index.html"> <img id="logo" src="../style/img/logo/logo-250-nobackground.png" alt="Logo" /> </a>

    <nav>
        <a href="../views/news.html">News</a>
        <a href="../views/partners.html">Partners</a>
        <a href="../views/articles.html">Articles</a>
        <a href="../views/contact.html">Contact</a>
    </nav>

    <div class="user-info">
        <a class="btn btn-ghost" href="../views/login.html">Login</a>
        <a class="btn btn-full" href="../views/sign_up.html">Sign Up</a>
    </div>
</header>

<div class="alert-div">
    <h2>Alert type</h2>
    <h4>Location</h4>

    <p>Alert description.</p>

    <?php

    //if($alert->isSolved==0)
        //if($_SESSION['userType']==1)
            echo '<button type="submit">Mark as solved</button>';
        //else
            echo '<button type="submit">Add a missing person</button>';
    //else
        echo '<p>Alert solved.</p>';


     //if( sunt missing persons )
        //echo toate persoanele lipsa
    ?>

</div>

<!-- Footer should be on all pages-->
<footer>
    <ul class="footer-nav">
        <li>Email: crisiscenter@contact.com </li>
        <li>Telephone: +407999999</li>
        <li>Address: General Barthelot Street, Iasi, Romania</li>
    </ul>
</footer>
</body>

</html>