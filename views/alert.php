<!DOCTYPE html>
<?php
require_once('../models/Alert.php');
require_once('../models/MissingPerson.php');
session_start();
$alert = $_SESSION['alert'];
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add New Alert | Crisis Center</title>
    <link rel="stylesheet" href="../style/global.css">
    <link rel="stylesheet" href="../style/form.css">
    <link rel="stylesheet" href="../style/alert.css">
    <link rel="stylesheet" href="../style/global_1300.css">
    <link rel="stylesheet" href="../style/global_930.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,300italic' rel='stylesheet' type='text/css'>
</head>

<body>
<!-- Header and nav should be on all pages-->
<div class="above-header"></div>

<header>
    <a id="logo-link" href="../views/index.html"> <img id="logo" src="../style/img/logo/logo-250-nobackground.png"
                                                       alt="Logo"/> </a>

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
    <h2><?php echo $alert->getTitle(); ?></h2>
    <h3>Type : <?php echo $alert->getType(); ?></h3>

    <p><?php echo $alert->getDescription(); ?></p>

    <?php

    if ($alert->getIsSolved() == 0) {
        if ($_SESSION['userType'] == 1)
            echo '<button type="submit">Mark as solved</button>';
        else
            echo '<button type="submit">Add a missing person</button>';
    } else
        echo '<p>Alert solved.</p>';

    ?>


    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Last Interaction</th>
            <th>Description</th>
            <th>Situation</th>
        </tr>
    <?php

    if (count($_SESSION['people']) != 0){
        //echo toate persoanele lipsa
        $people = $_SESSION['people'];
        foreach ($people as $person){
            echo '<tr>';
            echo '<td>' . $person->getFirstname() . '</td>';
            echo '<td>' . $person->getLastname() . '</td>';
            echo '<td>' . $person->getLastInteraction() . '</td>';
            echo '<td>' . $person->getDescription() . '</td>';
            if($person->getIsSolved()==0) {
                if ($_SESSION['userType'] == 1)
                    echo '<td> <button type="submit">Mark as found</button> </td>';
                else
                    echo "<td>Not found</td>";
            }
            else
                echo "<td>Found</td>";
            echo '</tr>';
        }
    }

    ?>
    </table>

</div>

<!-- Footer should be on all pages-->
<footer>
    <ul class="footer-nav">
        <li>Email: crisiscenter@contact.com</li>
        <li>Telephone: +407999999</li>
        <li>Address: General Barthelot Street, Iasi, Romania</li>
    </ul>
</footer>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
    function getPeople() {
        $.ajax({
            url: '../services/alert_mp_helper.php',
            type: 'GET',
            success: function () {
                console.log('a mers');
            }
        });
    }

    window.onload = getPeople;
</script>

</html>