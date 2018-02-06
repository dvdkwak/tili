<?php 

	$emailForm   = $_POST['email'];
	$nameForm    = $_POST['name'];
	$phoneForm   = $_POST['telephone'];
	$messageForm = $_POST['message'];
	$subjectForm = $_POST['subject'];

	if (isset($_POST['submitBtn'])) {
    
    $to      = 'ftp_davidkwakernaak@tilit.nl';
    $subject = $subjectForm;
    $message = '
          <html>
          <body>
            <img src="http://tilit.nl/images/TiliT_Logo2.png" style="width:320;height:100px;"/>
            <br />
            <h4>Naam:'.$nameForm.'</h4>
            <h4>Telefoonnummer:'.$phoneForm.'</h4>
            <br />
            <p>'. $messageForm .'</p>
          </body>
          </html>
          ';

    $headers = 	'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
          'From: ' . $i .'@gmail.com' . "\r\n" .
            'Reply-To: ' . $emailForm . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
    
    mail($to, $subject, $message, $headers);
		
		header("Location: index.php");

	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - TiliT</title>
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="css/master.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
  </head>
  <body>
    <div id="page1" class="page">
      <?php
        include 'includes/header.php';
       ?>
      <div class="container-fluid">
        <div class="text-center">
          <div class="pageTitle">
            Soft & hardware ops
          </div>
          <div class="row justify-content-center">
            <div class="col-12 col-md-4 subTitle">
              TiliT is leerbedrijf opgericht door de studenten van de opleiding applicatieontwikkeling op het ROC Friese Poort Emmeloord
            </div>
          </div>
          <!-- <div class="col-12 col-md-3 colLeft">
            <h1>Welkom</h1>
            <p>
              TiliT, een leerbedrijf opgericht door de studenten van de opleiding applicatieontwikkeling op het ROC Friese Poort te Emmeloord. Binnen TiliT kunnen wij verschillende diensten aanbieden: Webdesign, Reperatie van hardware en hulp bij software en Advies.
              Binnen het maken van website's zijn wij van alle markten thuis. Wij kunnen u adviseren op verschillende gebieden en kunnen op aanvraag eventueel software of apps maken. De programmeer vaardigheden kunt u vinden op onze website.
              De reparatie tak van TiliT geeft u de mogelijkheid om met mogelijke problemen op locatie te komen. Hier zullen de studenten stapsgewijs uw probleem herkennen en in overleg een oplossing toepassen.
              TiliT heeft ook de mogelijkheid om advies te geven op ICT gebied. De studenten beschikken over een brede kennis waardoor er een goed advies gegeven kan worden.
            </p>
          </div>
          <div class="col-md-2">

          </div>
          <div class="col-12 col-md-3 colRight">
            <div class="phone-img">
              <div class="phone-screen">

              </div>
            </div>
          </div> -->
        </div>
      </div>
    	<a href="#page2" rel="relativeanchor">
    		<div class="itm_pageDown">
    			Lees Meer
    			<i class="material-icons">keyboard_arrow_down</i>
    		</div>
    	</a>
    </div>
    <div id="page2" class="halfPage" style="background-color: #ECECEC;">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12 col-md-5 page-padding my-4 my-md-0">
            <div class="text-center">
              <h1>Over ons</h1>
              <hr>
              <div class="text-center">
                TiliT, een leerbedrijf opgericht door de studenten van de opleiding applicatieontwikkeling op het ROC Friese Poort te Emmeloord. Binnen TiliT kunnen wij verschillende diensten aanbieden: Webdesign, Reperatie van hardware en hulp bij software en Advies.
                Binnen het maken van website's zijn wij van alle markten thuis. Wij kunnen u adviseren op verschillende gebieden en kunnen op aanvraag eventueel software of apps maken. De programmeer vaardigheden kunt u vinden op onze website.
                De reparatie tak van TiliT geeft u de mogelijkheid om met mogelijke problemen op locatie te komen. Hier zullen de studenten stapsgewijs uw probleem herkennen en in overleg een oplossing toepassen.
                TiliT heeft ook de mogelijkheid om advies te geven op ICT gebied. De studenten beschikken over een brede kennis waardoor er een goed advies gegeven kan worden.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="page3" class="noFullPage">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12 col-md-9 page-padding my-3 my-md-0">
            <div class="text-center">
              <h1>Onze vaardigheden</h1>
            </div>
            <hr>
            <div class="row pt-3">
              <div class="cardOuter pa-3 col-md-4">
                <div class="card col-12">
                  <div class="card-body text-center">
                    <i class="devicon-html5-plain icon-size"></i>
                    <h4 class="card-title">HTML/CSS</h4>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  </div>
                </div>
              </div>
              <div class="cardOuter py-4 py-md-0 col-md-4">
                <div class="card col-12">
                  <div class="card-body text-center">
                    <i class="devicon-javascript-plain icon-size"></i>
                    <h4 class="card-title">Javascript</h4>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  </div>
                </div>
              </div>
              <div class="cardOuter pa-3 col-md-4">
                <div class="card col-12">
                  <div class="card-body text-center">
                    <i class="devicon-php-plain icon-size"></i>
                    <h4 class="card-title">PHP</h4>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row pt-4">
              <div class="cardOuter pa-3 col-md-4">
                <div class="card col-12">
                  <div class="card-body text-center">
                    <i class="fa fa-joomla icon-size" aria-hidden="true"></i>
                    <h4 class="card-title">Joomla</h4>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  </div>
                </div>
              </div>
              <div class="cardOuter py-4 py-md-0 col-md-4">
                <div class="card col-12">
                  <div class="card-body text-center">
                    <i class="devicon-wordpress-plain icon-size"></i>
                    <h4 class="card-title">Wordpress</h4>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  </div>
                </div>
              </div>
              <div class="cardOuter pa-3 col-md-4">
                <div class="card col-12">
                  <div class="card-body text-center">
                    <i class="devicon-drupal-plain icon-size"></i>
                    <h4 class="card-title">Drupal</h4>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row pt-4">
              <div class="cardOuter pa-3 col-md-4">
                <div class="card col-12">
                  <div class="card-body text-center">
                    <i class="devicon-photoshop-plain icon-size"></i>
                    <h4 class="card-title">Photoshop</h4>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  </div>
                </div>
              </div>
              <div class="cardOuter py-4 py-md-0 col-md-4">
                <div class="card col-12">
                  <div class="card-body text-center">
                    <i class="devicon-dot-net-plain icon-size"></i>
                    <h4 class="card-title">.Net</h4>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  </div>
                </div>
              </div>
              <div class="cardOuter pb-4 pa-3 col-md-4">
                <div class="card col-12">
                  <div class="card-body text-center">
                    <i class="devicon-android-plain icon-size"></i>
                    <h4 class="card-title">Android</h4>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="page3" class="noFullPage" style="background-color: #ECECEC;">
      <div class="container-fluid">
        <div class="row justify-content-center page-padding">
          <div class="col-12 col-md-4 py-4 py-md-0">
            <h1>Contact</h1>
            <form class="" method="post">
              <div class="form-group">
                 <label for="exampleFormControlInput1">Naam</label>
                 <input type="text" name="name" class="form-control b-radius-none" id="exampleFormControlInput1">
               </div>
               <div class="form-group">
                  <label for="exampleFormControlInput1">Email address</label>
                  <input type="email" name="email" class="form-control b-radius-none" id="exampleFormControlInput1">
              </div>
              <div class="form-group">
                 <label for="exampleFormControlInput1">Telefoon nummer</label>
                 <input type="tel" name="telephone" class="form-control b-radius-none" id="exampleFormControlInput1">
              </div>
              <div class="form-group">
                  <label for="exampleFormControlInput1">Onderwerp</label>
                  <input type="text" name="subject" class="form-control b-radius-none" id="exampleFormControlInput1">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control b-radius-none" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <input type="submit" class="btn float-right bg-color-mint b-radius-none" name="submitBtn" value="Verzend">
            </form>
          </div>
          <div class="col-md-1">

          </div>
          <div class="col-12 col-md-4 py-4 py-md-0">
            <h1>Kom langs!</h1>
            <div class="map-responsive">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2416.8425081165574!2d5.745276216187667!3d52.71698777985193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c887cbba77182b%3A0x3a7172b44e327f66!2sROC+Friese+Poort+Emmeloord!5e0!3m2!1snl!2snl!4v1511792259173" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
      include 'includes/footer.php';
     ?>
  </body>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/script.js">

  </script>
</html>
