<!--<h1>hier komt de homepage van de backend van TiliT oh gelukkig</h1>

<form method="post">
    <input type="hidden" name="logout" value="true">
    <input type="submit" value="logout">
</form>-->

<ul class="main-navbar">
	<li class="main-navbar-item"><a href="news.asp">News</a></li>
	<li class="main-navbar-item"><a href="contact.asp">Contact</a></li>
	<li class="main-navbar-item"><a href="about.asp">About</a></li>
	<li class="main-navbar-item"><a href="default.asp">Home</a></li>
</ul>

<div class="main-container">
<p>ja</p>
</div>

<?php
    if(!isset($_SESSION['status'])){
        echo 'bestaat niet';
    }else{
        echo $_SESSION['status'];
    }
?>