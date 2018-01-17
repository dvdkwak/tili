<h1>hier komt de projecten pagina van tilit</h1>

<form method="post">
    
</form>

<?php
    if(!isset($_SESSION['status'])){
        echo 'bestaat niet';
    }else{
        echo $_SESSION['status'];
    }
?>