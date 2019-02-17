<?php
  // get url parameter as key/value array -> $userParams
  parse_str($_SERVER['QUERY_STRING'], $userParams);

  // store user parameter
  $userSalutation = getParamValue('sex', $userParams);
  $firstname = getParamValue('firstname', $userParams);
  $lastname = getParamValue('lastname', $userParams);
  $email = getParamValue('email', $userParams);
  $store = getParamValue('store', $userParams);
  $storeEmail = getParamValue('storeEmail', $userParams);

  // store personalized salutation
  $salutation = "";

  switch($userSalutation){
    case 'Herr':
      $salutation = "Sehr geehrter Herr";
      break;
    case 'Frau':
      $salutation = "Sehr geehrte Frau";
      break;
    case 'Herr und Frau':
      $salutation = "Sehr geehrte(r) Frau und Herr";
      break;
    default: "Sehr geehrte Damen und Herren";
  }

  switch($store){
    case 'Zürich-City':
      $storeName = "Binelli Zürich-City AG";
      $storeStreet = "Pflanzschulstrasse 7-9";
      $storeTown = "CH-8004 Zürich";
      break;
    case 'Adliswil':
      $storeName = "Binelli Adliswil AG";
      $storeStreet = "Zürichstrasse 102";
      $storeTown = "CH-8134 Adliswil";
      break;
    case 'Zug':
      $storeName = "Binelli Baar AG";
      $storeStreet = "Neuhofstrasse 1";
      $storeTown = "CH-6341 Baar";
      break;
    default:
      $storeName = "Binelli Zürich AG";
      $storeStreet = "Badenerstrasse 527";
      $storeTown = "CH-8040 Zürich";
  }

  // get parameter value with key
  function getParamValue($key, $userParams) {
    if (isset($userParams[$key])) {
      return $userParams[$key];
    } else {
      return "";
    }
  }
?>

<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Newsletter</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="apple-touch-icon" href="icon.png">
  <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
  <link rel="shortcut icon" href="favicon.ico">

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/newstyle.css">

  <link rel="stylesheet" href="css/flickity.css">
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <div class="screen" id="screen">
    <header>
      <div class="logo left">
        <a href="https://www.binelli-group.ch/" target="_blank">
          <span>Binelli Group</span>
        </a>
      </div>
      <div class="logo right">
        <a href="https://www.binelli-group.ch/" target="_blank">
          <img src="img/Binelli-group_markenlogos.png" alt="binelli logos">
        </a>
      </div>
    </header>
    <div class="main-body" id="main-body">
      <section class="start">
        <div class="title side-margin">
          <h1>WETTBEWERB</h1>
          <p class="intro-header">
            Der Wettbewerb ist beendet. Vielen Dank für Ihr Interesse.
          </p>
        </div>
      </section>
    </div>
  </div>

  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
  <script src="js/validate.js"></script>
  <script src="js/flickity.pkgd.min.js"></script>

  <script>
    // event listener for form submit
    document.getElementById("ajaxButton").addEventListener('click', function(e) {
      e.preventDefault();
      	makeRequest(valid);
    }, false);
  </script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-134382378-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-134382378-1');
  </script>
</body>

</html>
