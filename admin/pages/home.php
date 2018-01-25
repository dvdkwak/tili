<div class="main-container">
	<h1>hier komt de homepage van de backend van TiliT</h1>

	<form method="post">
	    <input type="hidden" name="logout" value="true">
	    <input type="submit" value="logout">
	</form>
</div>

<?php
    if(!isset($_SESSION['status'])){
        echo 'bestaat niet';
    }else{
        echo $_SESSION['status'];
    }
?>