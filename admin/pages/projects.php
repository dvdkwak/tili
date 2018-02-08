<div class="main-container">

	<?php
	//Getting the project information and putting it in $data
    $projects = new projects();

    $data = $projects->getProjects();

    //Displaying all the results in foreach loop
    if (isset($data)) {
    	foreach ($data as $item):?>

        <div class="container-fluid">
            <div id="medewerker" class="container">
                <div class="card my-4">
                    <div class="card-header custom-header">
                        <h5 style="color:white; margin-bottom: 0;"><?= $item['projectName'] ?></h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Voetbalclub</h5>
                        <p class="card-text"><?= $item['description']?></p>
                        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal">Bekijk PvE</button>
                        <a href="projectdetails?id=<?= htmlentities($item['id']) ?>" class="btn btn-outline-info">Details</a>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; } else {
        echo 'Geen resultaten';
    } ?>

    <!-- Modal for the log -->
    <div class='modal fade' id='logModal' tabindex='-1' role='dialog' aria-labelledby='logModalLabel' aria-hidden='true'>
        <div class='modal-dialog align-middle' role='document'>
            <div id='modallog' class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Log van [Naam bedrijf]</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body'>
                    <div class='bericht'>
                        <b>Naam:</b>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In convallis, nisi ac feugiat laoreet, nibh sem mattis massa, nec iaculis neque mi et magna. Quisque et orci acsem ornare fringilla nec a elit.</p>
                        <div class='sendTime'>
                            14:40 - 22-01-2018
                        </div>
                    </div>
                    <div class='bericht'>
                        <b>Naam:</b>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In convallis, nisi ac feugiat laoreet, nibh sem mattis massa, nec iaculis neque mi et magna. Quisque et orci acsem ornare fringilla nec a elit.</p>
                        <div class='sendTime'>
                            14:44 - 29-01-2018
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-1'></div>
                    <div class='col-9'>
                        <div class='form-group'>
                            <input class='form-control' placeholder='Typ hier een bericht.' type='text'>
                        </div>
                    </div>
                    <div class='col-2'>
                        <div class='form-group'>
                            <button type='button' class='btn btn-outline-secondary'>Verzend</button>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-outline-danger' data-dismiss='modal'>Sluiten</button>
                </div>
            </div>
        </div>
    </div>

</div>
