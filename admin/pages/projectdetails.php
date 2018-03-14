<?php
$url = $_SERVER['REQUEST_URI'];
$logidf = (parse_url($url, PHP_URL_QUERY));
$id = str_replace("id=","",$logidf);

$user = new user();
$error = new errorHandling();
$user->checkProjectId($id);
$data1 = $user->getLog($id);
$data2 = $user->getTimeRegistration($id);
$data3 = $user->getUsersProject($id);

if(isset($_POST['btnVerLog'])) {
	$message = $_POST['logVerzend'];
	$fname = $_SESSION['firstName'];
	$lname = $_SESSION['lastName'];
    $user->verLog($id,$fname ,$lname , $message);
}

if (isset($_POST['btnToevoegenMedewerker'])) {
	if($_SESSION['userlevel'] == "0") {
		$email = $_POST['txtMedewerker'];
		$user->addMember($id, $email);
	}
}

if (isset($_POST['btnProjectRemoveMember'])) {
    $user->removeMemberProject($id);
}

if (isset($_POST['btnOfferte'])) {
	header("location: /admin/pdftest?id=".$id."");
}

$error->getCustomError();

?>

<!-- Een bericht voor het logboek aanmaken -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="form-group">
          <div class='row'>
            <div class='col-11'>
              <form method="post">
                <input name="logVerzend" class='form-control' required placeholder='Typ hier een bericht.' type='text' />
                <div class="modalButtons">
                    <button type="submit" name="btnVerLog" class="btn btn-outline-success">Verzenden</button>
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Sluiten</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Medewerker toevoegen -->
<div class="modal fade" id="medewerker" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="form-group">
          <div class='row'>
            <div class='col-11'>
              <p>Voeg een email van de medewerker toe:</p>
              <form method="post">
                <input name="txtMedewerker" class='form-control' required placeholder='Typ hier de email van een medewerker.' type='text' />
                <div class="modalButtons">
                    <button type="submit" name="btnToevoegenMedewerker" class="btn btn-outline-success">Toevoegen</button>
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Sluiten</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="main-container">
    <h1>Projectdetails</h1>
	<ul class="nav nav-tabs" role="tablist">
		<li class="nav-item">
		  <a class="nav-link active" data-toggle="tab" href="#log" role="tab">Logboek</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link" data-toggle="tab" href="#uren" role="tab">Uren overzicht</a>
		</li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#werk" role="tab">Gekoppelde Medewerkers</a>
        </li>
	</ul>
    <div class="tab-content">
        <div class="tab-pane active" id="log" data-toggle="tab" role="tabpanel"><br>
            <?php $i=$_SESSION['userlevel']; if($i !== "2") {echo "
                <button type='button' class='btn btn-outline-secondary' data-toggle='modal' data-target='#exampleModal'>Log bericht toevoegen</button>
                <br>
            ";} ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Naam</th>
                        <th scope="col">Beschrijving</th>
                        <th scope="col">Tijd / datum</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if (isset($data1))  {
                        foreach($data1 AS $item){
                            ?><tr>
                                <td><?php echo $item['author'];?></td>
                                <td><?php echo $item['message'];?></td>
                                <td><?php echo $item['date'];?></td>
                            </tr><?php
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="uren" data-toggle="tab" role="tabpanel">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Naam</th>
                        <th scope="col">Begin tijd</th>
                        <th scope="col">Eind tijd</th>
                        <th scope="col">Datum</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if (isset($data2))  {
                        foreach($data2 AS $item){
                            ?><tr>
                                <td><?php echo $item['firstName'] . $item['lastName'];?></td>
                                <td><?php echo $item['startTime'];?></td>
                                <td><?php echo $item['endTime'];?></td>
                                <td><?php echo $item['date'];?></td>
                            </tr><?php
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="werk" data-toggle="tab" role="tabpanel">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="width:400px;" scope="col">Naam</th>
                        <th style="width:1100px;" scope="col">Email</th>
                        <th style="float: right;" scope="col"><a style="cursor: pointer;" class='' data-toggle='modal' data-target='#medewerker'><i class="material-icons">person_add</i></a></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if (isset($data3))  {
                    foreach($data3 AS $item){ ?>
                        <tr>
                            <td><?php echo $item['firstname'] . ' ' . $item['preposition'] . ' ' . $item['lastname']; ?></td>
                            <td><?php echo $item['email']; ?></td>
                            <td style="float:right;"><button data-toggle="modal" data-target="#removeUserProject<?php echo $item['id'];?>" type="submit" class="snikker btn btn-outline-dark btn-custom-trans"><i class="material-icons">delete</i></button></td>
                        </tr>
                    <?php }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
if (isset($data3))  {
    foreach($data3 AS $item){ ?>
        <div class="modal fade" id="removeUserProject<?php echo $item['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-12'>
                                    Weet u zeker dat u <?php echo $item['firstname'] . ' ' . $item['preposition'] . ' ' . $item['lastname']; ?> van dit project wilt verwijderen ?
                                    <div class="modalButtons">
                                        <form action="" method="post">
                                            <input type="hidden" name="selectedUserIDR" class='form-control' value="<?php echo $item['id'];?>" />
                                            <button type="submit" name="btnProjectRemoveMember" class="btn btn-outline-danger">Verwijderen</button>
                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Sluiten</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
}
?>
