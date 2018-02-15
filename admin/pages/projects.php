<div class="main-container">

	<?php
    echo date("Y-m-d h:i:s");
	$projects = new projects();
    $projects->requestProject();
	?>

	 <!--<div id="accordion">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Project aanmaken
                    </button>
                </h5>
            </div>

	        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">

            </div>
        </div>
    </div>-->

    <div class="container-fluid">
        <div id="medewerker" class="container">
            <div class="row">
                <div class="col-12 p-3" style="border-radius: 3px;">
                    <h4 class="float-left" style="color: black; margin-bottom: 0px;">
<?php if ($_SESSION['userlevel'] == 0) {echo"Alle Projecten";} else {echo"Mijn Projecten";}?>
                    </h4>
                    <div class="float-right" style="color: black; cursor: pointer;" data-dismiss="modal" data-toggle="modal" data-target="#createProjectModal">
                        <i class="material-icons align-top">add</i>Project Aanmaken
                    </div>
                </div>
            </div>

<?php
//Getting the project information and putting it in $data
$data = $projects->getProjects();

//Displaying all the results in foreach loop
if (isset($data)) {
    foreach ($data as $item):?>

            <div class="card my-4">
                <div class="card-header custom-header">
                    <h5 style="color:white; margin-bottom: -25px;"><?= $item['projectName'] ?></h5>
                    <form style="display: inline;" action="" method="post">
                        <input type="hidden" name="projectId" value="<?php echo $item['id']; ?>" />
                        <button name="btnStartTiming" type="submit" class="snikker btn btn-dark btn-custom-trans float-right disabled"><i class="material-icons">timer_off</i></button>
                    </form>

                    <form style="display: inline;" action="" method="post">
                        <input type="hidden" name="projectId" value="<?php echo $item['id']; ?>" />
                        <button name="btnStopTiming" type="submit" class="snikker btn btn-dark btn-custom-trans float-right"><i class="material-icons">timer</i></button>
                    </form>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Beschrijving:</h5>
                    <p class="card-text"><?= $item['description']?></p>
                    <a href="<?= $item['pvePath']?>.pdf"><button type="button" class="btn btn-outline-info">Bekijk PvE</button></a>
                    <a href="projectdetails?id=<?php echo htmlentities($item['id']); ?>" class="btn btn-outline-info">Details</a>
                </div>
            </div>
            
<?php endforeach; } else {
    echo 'Geen resultaten';
} ?>

        </div>
    </div>

    <!-- Modal for adding a project -->
    <div class='modal fade' id='createProjectModal' tabindex='-1' role='dialog' aria-labelledby='createProjectModal' aria-hidden='true'>
        <div class='modal-dialog align-middle' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Project aanmaken</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body'>
                    <div class="card-body">
                        <!-- form here -->
                        <div class="col-xs-12 col-md-6">
                            <form role="form" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" name="projectname" id="projectname" class="form-control input-sm" placeholder="Project naam" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea type="text" name="description" id="projectdescription" class="form-control input-sm" placeholder="Beschrijving" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        PvE uploaden:
                                        <input style="margin-left:-10px;" class="btn" type="file" name="fileToUpload" id="fileToUpload" required>
                                    </div>
                                </div>
                                <input type="submit" name="saveProject" value="Toevoegen" class="btn btn-info btn-block">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
