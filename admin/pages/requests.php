<div class="main-container">
	
	<?php

    $requests = new requests();

    if (isset($_POST['btnAcceptRequest'])) {
        $id = $_POST['requestID'];

        $requests->acceptRequests($id);
    }

    if (isset($_POST['btnDeleteRequest'])) {
        $id = $_POST['requestID'];

        $requests->deleteRequests($id);
    }


    $error->getCustomError();
    unset($_SESSION['customError']);

    $data = $requests->getRequests();

    if (isset($data)) {
        foreach($data AS $item){
            echo '
            <div class="container-fluid">
            <div id="medewerker" class="container">
                <div class="card">
                    <div class="card-header custom-header">
                        <h5 style="color:white;">' . $item['projectName'] . '</hp>
                            <form style="display: inline;" action="" method="post">
                                <input type="hidden" name="requestID" value="' . $item['id'] . '" />
                                <button name="btnDeleteRequest" type="submit" class="snikker btn btn-dark btn-custom-trans float-right"><i class="material-icons">&#xE872;</i></button>
                            </form>

                            <form style="display: inline;" action="" method="post">
                                <input type="hidden" name="requestID" value="' . $item['id'] . '" /> 
                                <button name="btnAcceptRequest" type="submit" class="snikker btn btn-dark btn-custom-trans float-right"><i class="material-icons">&#xE876;</i></button>
                            </form>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">' . $item['projectName'] . '</h5>
                        <p class="card-text">' . $item['description'] . '</p>
                        <a href="PvE/'. $item['pvePath'] .'.pdf"><button type="button" class="btn btn-outline-info">Bekijk PvE</button></a>
                    </div>
                </div>
            </div>
        </div>
            ';
        }
    } else {
        echo 'Geen resultaten';
    }

    ?>

</div>