<div class="main-container">
	
	<?php echo $requests->getRequests(); ?>

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