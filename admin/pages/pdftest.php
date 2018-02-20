<div class="main-container" style="background-color:white; max-width:2480px; max-height:3508px;">
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
            ".$item['companyname']."<br>
            ".$item['address']."<br>
            ".$item['zipCode']." ".$item['city']."<br>
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
          Tel: +31 6 29427491<br>
          Email: info@tilit.nl<br>
          Web: www.Tilit.nl<br>
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-8">
        <p>
          Geachte <?php echo "".$item['firstName']." ".$item['lastName'].""; ?>,<br>
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
                <td scope='col'>".$item['offerteNummer']."</td>
                <td scope='col'>".$item['offerteDatum']."</td>
                <td scope='col'>".$item['vervalDatum']."</td>
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
          $totaal = $item['aantal'] * $item['stukprijs'];
            echo "
              <tr scope='row'>
                <td scope='col'>".$item['datum']."</td>
                <td scope='col'>Project: ".$item['projectnaam']."</td>
                <td scope='col'>".$item['aantal']."</td>
                <td scope='col'>&euro;".$item['stukprijs']."</td>
                <td scope='col'>".$item['btw']."%</td>
                <td class='text-right' scope='col'>&euro;".$totaal.",-</td>
              </tr>
            ";
          ?>

          <?php

          $totaal2 = $item['aantal'] * $item['stukprijs'];
            echo "
              <tr scope='row'>
                <td scope='col'>".$."</td>
                <td scope='col'>Project: ".$."</td>
                <td scope='col'>".$."</td>
                <td scope='col'>&euro;".$."</td>
                <td scope='col'>".$."%</td>
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

          <tr scope="row">
            <td colspan="2" scope="col"></td>
            <td scope="col">--%</td>
            <td scope="col">&euro; ,-</td>
            <td class="text-right" colspan="2" scope="col"><i>&euro; ,-</i></td>
          </tr>
          <tr scope="row">
            <td colspan="2" scope="col"></td>
            <td scope="col">--%</td>
            <td scope="col">&euro; ,-</td>
            <td class="text-right" colspan="2" scope="col"><i>&euro; ,-</i></td>
          </tr>
          <tr scope="row">
            <td colspan="2" scope="col"></td>
            <td scope="col">--%</td>
            <td scope="col">&euro; ,-</td>
            <td class="text-right" colspan="2" scope="col"><i>&euro; ,-</i></td>
          </tr>

          <tr scope="row">
            <td colspan="5" scope="col"><strong>Totaal BTW</strong></td>
            <td class="text-right" scope="col">&euro; ,-</td>
          </tr>
          <tr scope="row">
            <td colspan="5" scope="col"><strong>Totaal betalen</strong></td>
            <td class="text-right" scope="col"><strong>&euro; ,-</strong></td>
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
