<div class="main-container">
	
	<?php

    $requests = new requests();
    $data = $requests->getRequests();

    foreach($data AS $item){
        echo '
        <div class="container-fluid">
        <div id="medewerker" class="container">
            <div class="card">
                <div class="card-header custom-header">
                    <h5 style="color:white;">' . $item['projectName'] . '</hp>
                        <button type="button" class="snikker btn btn-dark btn-custom-trans float-right"><i class="material-icons">&#xE872;</i></button>
                        <button type="button" class="snikker btn btn-dark btn-custom-trans float-right"><i class="material-icons">&#xE876;</i></button>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Voetbalclub</h5>
                    <p class="card-text">' . $item['description'] . '</p>
                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal">Bekijk PvE</button>
                </div>
            </div>
        </div>
    </div>
        ';
    }

    ?>

</div>