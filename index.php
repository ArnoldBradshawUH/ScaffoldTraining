<?php
/**
 * Created by PhpStorm.
 * User: said
 * Date: 2018-12-20
 * Time: 03:31
 */
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>STC Home Page</title>
    <link rel="stylesheet" href="css/main-style.css">
    <link rel="stylesheet" href="css/slideshow.css">
</head>
<body>
<div class="main-page">
    <div class="slideshow-container">
        <div class="mySlides fade">
            <div class="numbertext">1 / 6</div>
            <img src="images/stc-img1.jpg" style="width:100%" height="500">
            <div class="text">Caption One</div>
        </div>
        <div class="mySlides fade">
            <div class="numbertext">2 / 6</div>
            <img src="images/stc-img2.jpg" style="width:100%" height="500">
            <div class="text">Caption Two</div>
        </div>
        <div class="mySlides fade">
            <div class="numbertext">3 / 6</div>
            <img src="images/stc-img3.jpg" style="width:100%" height="500">
            <div class="text">Caption Three</div>
        </div>
        <div class="mySlides fade">
            <div class="numbertext">4 / 6</div>
            <img src="images/stc-img4.jpg" style="width:100%" height="500">
            <div class="text">Caption Four</div>
        </div>
        <div class="mySlides fade">
            <div class="numbertext">5 / 6</div>
            <img src="images/stc-img5.jpg" style="width:100%" height="500">
            <div class="text">Caption Five</div>
        </div>
        <div class="mySlides fade">
            <div class="numbertext">6 / 6</div>
            <img src="images/stc-img6.jpg" style="width:100%" height="500">
            <div class="text">Caption Six</div>
            <br>
        </div>
        <br>
        <div style="text-align: center">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
        <script type="text/javascript" src="js/slideshow.js"></script>
        <div class="content-wrap">
            <br>
            <h2>The leading Scaffold Training provider in Trinidad & Tobago and the Caribbean</h2><br>
            <p>Scaffold Training Company (STC) is a dynamic, customer-driven business established in 2018; we primarily
                engage in the provision of comprehensive training programs in Scaffolding and scaffold related products
                and services. We also provide the widest range of Scaffolding Training, Scaffolding Accessories.</p>
            <br><br>
        </div>
    </div>
</body>
<footer>
    <?php
    include('footer.php');
    ?>
</footer>
</html>