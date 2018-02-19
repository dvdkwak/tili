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
?>

<div class="main-container">

	<form action="" method="post">
		<div class="form-group">
			<div class='row'>
				<div class='col-11'>
						<input name="logVerzend" class='form-control' placeholder='Typ hier een bericht.' type='text' />
				</div>
				<div class='col-1'>
					<button type="submit" name="btnVerLog" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</div>
	</form>

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
	</div>
</div>

</div>
