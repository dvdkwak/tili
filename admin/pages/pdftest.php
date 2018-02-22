<?php
$url = $_SERVER['REQUEST_URI'];
$idf = (parse_url($url, PHP_URL_QUERY));
$id = str_replace("id=","",$idf);

$user = new user();

$item = $user->offerCreate($id);

$urenPrijsPS = "10";
$aantalUren = "1000";
$btw = "15";
$stukprijs = '10000';
$totaal = 1 * $stukprijs;
$totaal2 = $aantalUren * $urenPrijsPS;
$totaal3 = $totaal / 100 * $btw;
$totaal4 = $totaal3 + $totaal;
$totaalAll = $totaal4 + $totaal2;

if (isset($item)) {
  foreach($item as $data): ?>
  <div class="main-container" id="content" style="background-color:white; max-width:2480px; max-height:3508px;">
    <div class="container-fluid">
  <p><br><br></p>
      <div class="row">
        <div class="col-sm-8"></div>
        <img style="max-width:500px; max-height:150px;" class="pull-right col-sm-4" src="../assets/images/TiliT_Logo2.png">
      </div>
      <div class="row">
        <div class="col-sm-1">
          <p>Aan:</p>
        </div>
        <div class="col-sm-3">
          <p>
            <?php
              echo"
              ".$data['companyName']."<br>
              ".$data['address']."<br>
              ".$data['zipCode']." ".$data['city']."<br>
              ";
            ?>
          </p>
        </div>
        <div class="col-sm-5"></div>
        <div class="pull-right col-sm-3">
          <p>
            TiliT<br>
            Espelerlaan 74<br>
            8302 DC Emmeloord<br>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-9"></div>
        <div class="pull-right col-sm-3">
          <p>
            KvK: <br>
            BTW: <br>
            Bank: <br>
            IBAN: <br>
            BIC: <br>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-3">
          <h2><strong>Offerte</strong></h2>
        </div>
        <div class="col-sm-5"></div>
        <div class="pull-right col-sm-3">
          <p>
            Tel:    +31 6 29427491<br>
            Email:  info@tilit.nl<br>
            Web:    www.Tilit.nl<br>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-8">
          <p>
            Geachte <?php echo "".$data['firstName']." ".$data['lastName'].""; ?>,<br>
            Hierbij ontvangt u een offerte van de besproken producten en/of diensten:<br><br>
          </p>
        </div>
        <div class="col-sm-3"></div>
      </div>

      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
        <table class="table col-sm-3 border-0">
          <thead>
            <tr scope="row">
              <th scope="col">Offerte Nummer</th>
              <th scope="col">Offerte Datum</th>
              <th scope="col">Verval Datum</th>
            </tr>
          </thead>
          <tbody>
            <tr scope="row">
              <?php
                echo "
                  <td scope='col'>".$data['offerNumber']."</td>
                  <td scope='col'>".$data['offerDate']."</td>
                  <td scope='col'>".$data['expirationDate']."</td>
                ";
              ?>
            </tr>
          </tbody>
        </table>
        <p><br></p>
      </div>
        <div class="col-sm-1"></div>
      </div>

      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
        <table class="table col-sm-3 table-bordered">
          <thead>
            <tr scope="row">
              <th scope="col">Begin Datum</th>
              <th scope="col">Omschrijving</th>
              <th scope="col">Aantal</th>
              <th scope="col">Stukprijs</th>
              <th scope="col">BTW</th>
              <th scope="col">Totaal</th>
            </tr>
          </thead>
          <tbody>

            <?php
              echo "
                <tr scope='row'>
                  <td scope='col'>".$data['startDate']."</td>
                  <td scope='col'>Project: ".$data['projectName']."</td>
                  <td scope='col'>1</td>
                  <td scope='col'>&euro;".$stukprijs."</td>
                  <td scope='col'>15%</td>
                  <td class='text-right' scope='col'>&euro;".$totaal.",-</td>
                </tr>
              ";
            ?>

            <?php
              echo "
                <tr scope='row'>
                  <td scope='col'>".$data['offerDate']."</td>
                  <td scope='col'>Project:Werk uren</td>
                  <td scope='col'>".$aantalUren."</td>
                  <td colspan='2' scope='col'>&euro;".$urenPrijsPS."</td>
                  <td class='text-right' scope='col'>&euro;".$totaal2.",-</td>
                </tr>
              ";
            ?>

            <tr scope="row">
              <td colspan="5" scope="col"><strong>Totaal EX. BTW</strong></td>
              <td class="text-right" scope="col">&euro; ,-</td>
            </tr>

            <tr scope="row">
              <td colspan="2" scope="col"></td>
              <td scope="col">BTW %</td>
              <td scope="col">Over</td>
              <td colspan="2" scope="col">Bedrag</td>
            </tr>
            <?php
              echo"
                <tr scope='row'>
                  <td colspan='2' scope='col'></td>
                  <td scope='col'>".$btw."%</td>
                  <td scope='col'>&euro; ".$totaal.",-</td>
                  <td class='text-right' colspan='2' scope='col'><i>&euro; $totaal4,-</i></td>
                </tr>
              ";
            ?>
            <tr scope="row">
              <td colspan="5" scope="col"><strong>Totaal BTW</strong></td>
              <td class="text-right" scope="col">&euro;<?php echo $totaal3; ?>,-</td>
            </tr>
            <tr scope="row">
              <td colspan="5" scope="col"><strong>Totaal betalen</strong></td>
              <td class="text-right" scope="col"><strong>&euro; <?php echo $totaalAll; ?>,-</strong></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-1"></div><br>
      <div class="col-sm-10">
        <p> <br>
            Op deze offerte zijn onze algemene voorwaarden van toepassing. Deze kunt u vinden op onze website.<br>
            <br>
            Wij hopen u hiermee genoeg geïnformeerd te hebben.
            Bij vragen kunt u ons bereiken op de telefoon nummer: +31 6 29427491 of email: info@tilit.nl<br>
            <br>
            Met vriendelijke groet,<br>
            <br>
            Administratie TiliT
      </div>
    </div>
  </div>

  <?php endforeach;} else {
    echo 'Geen resultaten';
  }
?>

<div id="editor"></div>
<button id="cmd">generate PDF</button>

<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js">
var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#cmd').click(function () {
    doc.fromHTML($('#content').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
});
</script>
