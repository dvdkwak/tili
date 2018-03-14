<?php
$users = new user();
$data = $users->getUsers('*', 'NOT userlevel=2');
$data2 = $users->getUsers('*', 'userlevel=2');
$user->register();
$user->deleteWorker();

if (isset($_POST['btnAcceptRequest'])) {
  $id= $_POST['acceptID'];
  $user->acceptNew($id);
}
if (isset($_POST['btnDeleteRequest'])) {
  $id= $_POST['acceptID'];
  $user->denyNew($id);
}

?>

<div class="main-container">

    <div id="accordion">
        <div class="card">
            <div class="card-header btn-link" id="headingOne" data-toggle="collapse" data-target="#collapseOne"
                 aria-expanded="true" aria-controls="collapseOne">
                Overzicht
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <!-- table -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#medewerkers" data-toggle="tab" role="tab">Medewerkers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#klanten" data-toggle="tab" role="tab">Klanten</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="medewerkers" role="tabpanel">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Voornaam</th>
                                    <th scope="col">tussen voegsel</th>
                                    <th scope="col">Achternaam</th>
                                    <th scope="col">E-mailadres</th>
                                    <th scope="col">User level</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" style="width:50px">Verwijderen</th>
                                </tr>
                                </thead>
                                <?php
                                if (isset($data)) {
                                    foreach ($data AS $item) {
                                        switch ($item['userlevel']) {
                                            case '0':
                                                $userlevel = 'Projectleider';
                                                break;
                                            case '1':
                                                $userlevel = 'Medewerker';
                                                break;
                                            case '2':
                                                $userlevel = 'Klant';
                                                break;
                                        }
                                        switch ($item['status']) {
                                            case '0':
                                                $status = '<div class="circleBase type1"></div>';
                                                break;
                                            case '1':
                                                $status = '<div class="circleBase type2"></div>';
                                                break;
                                        }
                                        ?>
                                        <div class="modal fade" id="deleteConfirm<?php echo $item['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteConfirm<?php echo $item['id']; ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Medewerker verwijderen</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Weet u heel zeker dat u deze medewerker wilt verwijderen?
                                                    </div>
                                                    <div class="modal-footer">

                                                        <form action="" method="post">
                                                            <input type="hidden" name="workerId" value="<?php echo $item['id']; ?>" />
                                                            <button type="submit" name="btnDeleteWorker" class="btn btn-danger">Verwijderen</button>
                                                        </form>

                                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Sluiten</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $item['firstName']; ?></td>
                                                <td><?php echo $item['preposition']; ?></td>
                                                <td><?php echo $item['lastName']; ?></td>
                                                <td><?php echo $item['email'];?></td>
                                                <td><?php echo $userlevel; ?></td>
                                                <td><?php echo $status; ?></td>
                                                <td><button data-toggle="modal" data-target="#deleteConfirm<?php echo $item['id']; ?>" type="submit" class="snikker btn btn-outline-dark btn-custom-trans"><i class="material-icons">delete</i></button></td>
                                            </tr>
                                        </tbody><?php
                                    }
                                }
                                ?>
                            </table>
                        </div>
                        <div class="tab-pane" id="klanten" role="tabpanel">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Voornaam</th>
                                    <th scope="col">tussen voegsel</th>
                                    <th scope="col">Achternaam</th>
                                    <th scope="col">E-mailadres</th>
                                    <th scope="col">User level</th>
                                    <th scope="col">Goedkeuren</th>
                                </tr>
                                </thead>
                                <?php
                                if (isset($data2)) {
                                    foreach ($data2 AS $item) {
                                        switch ($item['userlevel']) {
                                            case '0':
                                                $userlevel = 'Projectleider';
                                                break;
                                            case '1':
                                                $userlevel = 'Medewerker';
                                                break;
                                            case '2':
                                                $userlevel = 'Klant';
                                                break;
                                        } ?>
                                                <tbody>
													<tr>
														<td><?php echo $item['firstName'] ?></td>
														<td><?php echo $item['preposition'] ?></td>
														<td><?php echo $item['lastName'] ?></td>
														<td><?php echo $item['email'] ?></td>
														<td><?php echo $userlevel ?></td>
														<td>
                                                        <?php if ($item['status'] == 3) { ?>
                                                            <form action="" method="post">
                                                            <input type="hidden" name="acceptID" value="<?php echo $item['id']; ?>" />
                                                            <button name="btnDeleteRequest" type="submit" class="btn btn-custom-trans float-right"><i class="material-icons"cx>remove_circle_outline</i></button>
                                                        </form>

                                                        <form action="" method="post">
                                                            <input type="hidden" name="acceptID" value="<?php echo $item['id']; ?>" />
                                                            <button name="btnAcceptRequest" type="submit" class="btn btn-custom-trans"><i class="material-icons">add_circle_outline</i></button>
                                                        </form><?php
														} ?>
														</td>
												</tr>
												</tbody>
										<?php
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <!-- end table -->
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                            aria-expanded="false" aria-controls="collapseTwo">
                        Werknemersaccount toevoegen
                    </button>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    <!-- hier begint form -->

                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <form role="form" method="post">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="firstname" id="firstname"
                                                   class="form-control input-sm" placeholder="Voornaam">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="firstname" id="firstname"
                                                   class="form-control input-sm" placeholder="Tussenvoegsel">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" name="lastname" id="lastname"
                                                   class="form-control input-sm" placeholder="Achternaam">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control input-sm"
                                                   placeholder="Email Adres">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="number" name="telnumber" id="telnumber" class="form-control input-sm"
                                                   placeholder="Telefoonnummer">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="password" id="password"
                                                   class="form-control input-sm" placeholder="Wachtwoord">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="repeatpass"
                                                   id="repeatpass" class="form-control input-sm"
                                                   placeholder="Herhaal wachtwoord">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="userlvl"></label>
                                            <select class="form-control" id="userlvl">
                                                <option value="">Userlevel</option>
                                                <option value="0">Admin</option>
                                                <option value="1">Medewerker</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="Emmeloord" name="city">
                                <input type="hidden" value="Espelerlaan 74" name="address">
                                <input type="hidden" value="TiliT" name="cname">
                                <input type="hidden" value="8302 DC" name="zipcode">
                                <input type="submit" name="registerBtn" value="Register" class="btn btn-info btn-block">
                            </form>
                        </div>
                        <div class="col-12 col-md-6">
                        </div>
                    </div>
                    <!-- eind form -->
                </div>
            </div>
        </div>
    </div>
</div>
