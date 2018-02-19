<?php
$url = $_SERVER['REQUEST_URI'];
$logidf = (parse_url($url, PHP_URL_QUERY));
$id = str_replace("id=","",$logidf);

$getLog = new user();
$data = $getLog->getLog($id);

if(isset($_POST['btnVerLog'])) {
	$verLog = new user();
	$message = $_POST['logVerzend'];
	$fname = $_SESSION['firstName'];
	$lname = $_SESSION['lastName'];
	$verLog->verLog($id,$fname ,$lname , $message);
}

$getHours = new user();
$data2 = $getHours->getTimeRegistration($id);
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">

				<form method="post">
					<div class="form-group">
						<div class='row'>
							<div class='col-11'>
									<input name="logVerzend" class='form-control' placeholder='Typ hier een bericht.' type='text' />
							</div>
						</div>
					</div>
      </div>
      <div class="modal-footer">
				<button type="submit" name="btnVerLog" class="btn btn-outline-success">Verzenden</button>
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Sluiten</button>
				</form>
      </div>
    </div>
  </div>
</div>

<div class="main-container">
	<h1>Projectdetails</h1>
</div>
<div class="main-container">
	<ul class="nav nav-tabs" role="tablist">
		<li class="nav-item">
		  <a class="nav-link active" data-toggle="tab" href="#log" role="tab">Logboek</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link" data-toggle="tab" href="#uren" role="tab">Uren overzicht</a>
		</li>
	</ul>
<div class="tab-content">
	<div class="tab-pane active" id="log" data-toggle="tab" role="tabpanel"><br>
		<button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal">Log bericht toevoegen</button><br>
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Naam</th>
					<th scope="col">Beschrijving</th>
					<th scope="col">Tijd / datum</th>
				</tr>
			</thead>
			<?php
				if (isset($data))  {
					foreach($data AS $item){
						echo '
						<tbody>
							<tr>
								<td>'. $item['author'] .'</td>
								<td>'. $item['message'] .'</td>
								<td>'. $item['date'] .'</td>
							</tr>
						</tbody>
						';
					}
				}
			?>
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
			<?php
				if (isset($data2))  {
					foreach($data2 AS $item){
						echo '
						<tbody>
							<tr>
								<td>'. $item['firstName'] . ' ' . $item['lastName'] .'</td>
								<td>'. $item['startTime'] .'</td>
								<td>'. $item['endTime'] .'</td>
								<td>'. $item['date'] .'</td>
							</tr>
						</tbody>
						';
					}
				}
			?>
		</table>
	</div>
</div>
</div>
