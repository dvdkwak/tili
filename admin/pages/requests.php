<div class="main-container">

<?php

$requests = new requests();
$error    = new errorHandling();

$requests->redirectUser();
$requests->acceptRequests();
$requests->deleteRequests();

$data = $requests->getRequests();

if (isset($data)) {
    foreach ($data as $item):?>

    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Weet u heel zeker dat u dit project wilt verwijderen?
          </div>
          <div class="modal-footer">

            <form action="" method="post">
              <input type="hidden" name="requestID" value="<?php echo $item['id']; ?>" />
              <button type="submit" name="btnDeleteRequest2" class="btn btn-danger">Verwijderen</button>
            </form>

            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Sluiten</button>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
        <div id="medewerker" class="container">
            <div class="card my-4">
                <div class="card-header custom-header">
                    <h5 style="color:white; margin-bottom: -25px;"><?php echo $item['projectName']; ?></h5>
                    <form style="display: inline;" action="" method="post">
                        <button name="btnDeleteRequest" type="button" data-toggle="modal" data-target="#delete" class="snikker btn btn-dark btn-custom-trans float-right"><i class="material-icons">&#xE872;</i></button>
                    </form>

                    <form style="display: inline;" action="" method="post">
                        <input type="hidden" name="requestID" value="<?php echo $item['id']; ?>" />
                        <button name="btnAcceptRequest" type="submit" class="snikker btn btn-dark btn-custom-trans float-right"><i class="material-icons">&#xE876;</i></button>
                    </form>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Beschrijving:</h5>
                    <p class="card-text"><?php echo $item['description']; ?></p>
                    <a href="<?php $item['pvePath'] ?>.pdf"><button type="button" class="btn btn-outline-info">Bekijk PvE</button></a>
                </div>
            </div>
        </div>
    </div>

<?php endforeach;} else {
    echo 'Geen resultaten';
}?>

</div>
