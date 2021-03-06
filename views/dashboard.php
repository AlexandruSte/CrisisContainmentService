<!DOCTYPE html>
<?php
require_once('../models/Alert.php');
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard | Crisis Center</title>
    <link rel="stylesheet" href="../style/global.css">
    <link rel="stylesheet" href="../style/dashboard.css">
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

    <main>

        <!-- To be reshaped-->
        <?php
        if($_SESSION['userType']==1)
            echo "<h2> Signed as Authority</h2>";
        else
            echo "<h2> Signed as Citizen</h2>"
        ?>

        <div id="main_panel">
            <a class="btn btn-full" href="add_alert.html">Add Alert</a>
            <a class="btn btn-full" href="../views/find_person.html">Find Person</a>
        </div>

        <div id="alert_history">
            <h2>Alerts in Progress | History</h2>
            <section class="horizontal_container">
                <?php
                $alerts = $_SESSION['alerts'];
                if(count($alerts)==0)
                    echo "<h3>Nu ati pus nicio alerta.</h3>";
                else{
                    foreach($alerts as $alert){
                        echo "<article>";
                        echo "<h3>" . $alert->getTitle() . "</h3>";
                        echo "<p>" . $alert->getDescription() . "</p>";
                        echo "<form method=\"get\" action=\"../services/alert_helper.php\">";
                            echo "<input style='display: none;' value='" . $alert->getId() . "' name='id'>";
                            echo "<input name=\"submitBtn\" id=\"submitButton\" class=\"btn-input\" type=\"submit\" value=\"Vezi detalii\">";
                        echo "</form>";
                        echo "</article>";
                    }
                }
                ?>
            </section>
        </div>

        <div id="near_alerts">
            <h2>Nearby Alerts</h2>
            <section class="horizontal_container">
                <?php
                $alerts = $_SESSION['near_alerts'];
                if(count($alerts)==0)
                    echo "<h3>Nu este nicio alerta in zona.</h3>";
                else{
                    foreach ($alerts as $alert) {
                        echo "<article>";
                        echo "<h3>" . $alert->getTitle() . "</h3>";
                        echo "<p>" . $alert->getDescription() . "</p>";
                        echo "<form method=\"get\" action=\"../services/alert_helper.php\">";
                            echo "<input style='display: none;' value='" . $alert->getId() . "' name='id'>";
                            echo "<input name=\"submitBtn\" id=\"submitButton\" class=\"btn-input\" type=\"submit\" value=\"Vezi detalii\">";
                        echo "</form>";
                        echo "</article>";
                    }
                }
                ?>
            </section>
        </div>
    </main>

    <!-- Footer should be on all pages-->
    <footer>
        <ul class="footer-nav">
            <li>Email: crisiscenter@contact.com </li>
            <li>Telephone: +407999999</li>
            <li>Address: General Barthelot Street, Iasi, Romania</li>
        </ul>
    </footer>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(redirectToPosition);
        }
    }

    function redirectToPosition(position) {
        $.ajax({
            url: '../services/alert_helper.php',
            type: 'POST',
            data: {
                lat: position.coords.latitude,
                long: position.coords.longitude
            }
        });
    }

    window.onload = getLocation;
</script>

</html>