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
    case 'Zurich':
      $storeName = "Zürich AG";
      $storeStreet = "Badenerstrasse 527";
      $storeTown = "CH-8040 Zürich";
      $store = 'Zürich';
      break;
    case 'Zurich-City':
      $storeName = "Zürich-City AG";
      $storeStreet = "Pflanzschulstrasse 7-9";
      $storeTown = "CH-8004 Zürich";
      $store = 'Zürich-City';
      break;
    case 'Adliswil':
      $storeName = "Adliswil AG";
      $storeStreet = "Zürichstrasse 102";
      $storeTown = "CH-8134 Adliswil";
      break;
    case 'Zug':
      $storeName = "Zug AG";
      $storeStreet = "Neuhofstrasse 1";
      $storeTown = "CH-6341 Baar";
      break;
    default:
      $storeName = "Binelli Baar AG";
      $storeStreet = "Neuhofstrasse 1";
      $storeTown = "CH-6341 Baar";
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
        <span>Binelli Group</span>
      </div>
      <div class="logo right">
        <img src="img/Binelli-group_markenlogos.png" alt="binelli logos">
      </div>
    </header>
    <div class="main-body" id="main-body">
      <section class="start">
        <div class="title side-margin">
          <h1>WETTBEWERB</h1>
          <p class="intro-header">
            EINZIGARTIGES SKIERLEBNIS FÜR 4x2 PERSONEN IM WERT VON ÜBER 10’000 FRANKEN.
          </p>
        </div>
      </section>
      <section class="image-grid-container">
        <div class="image-grid">
          <div class="left">
            <div class="kuhn-portrait gallery-cell">
              <img src="img/grid/kuhn-portrait.png" alt="Patrick Küng">
            </div>
          </div>
          <div class="right">
            <div class="right-top">
              <div class="motta-outside gallery-cell">
                <img src="img/grid/motta-outside.png" alt="Motta Outside">
              </div>
              <div class="weinkeller gallery-cell">
                <img src="img/grid/weinkeller.png" alt="Motta Wine">
              </div>
            </div>
            <div class="right-bottom">
              <div class="motta-inside gallery-cell">
                <img src="img/grid/motta-inside.png" alt="Motta Inside">
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="introduction side-margin">
        <p class="strong">
          <?php if ($salutation && $lastname) {echo $salutation . " " . $lastname . "<br /><br />";} ?>
          Nutzen Sie die einmalige Chance auf 2 von 8 exklusiven Plätzen beim einzigartigen Binelli Group Skierlebnis in der Lenzerheide.
          Dabei verbringen Sie gemeinsam mit dem Ex-Skirennfahrprofi und Weltmeister Patrick Küng einen unvergesslichen Tag auf der Piste.
        </p>
        <p>
          Doch damit nicht genug: Zur Mittagszeit wartet ein kulinarischer Höhepunkt auf Sie – und zwar in der <a href="https://www.motta-lenzerheide.com/" target="_blank">«Motta»-Hütte</a>.
          Unser Partnerbetrieb am Sonnenhang der Lenzerheide gehört zu den zehn besten Skihütten der Schweiz.
        </p>
        <p>
           Das Restaurant mit 14 Gault Millau Punkten serviert Ihnen am 6. März ein exquisites Alpengourmet-Menu und verwöhnt Sie mit einer Degustation edler Weine.
           Ihren Abend im Winterwunderland verbringen Sie individuell, bevor Sie im <a href="https://valbellainn.ch/" target="_blank"> 4* Superior Hotel Valbella Inn</a> den erstklassigen Erlebnistag gemütlich abschliessen.
        </p>
      </section>
      <!-- <section class="slide-show side-margin" data-flickity='{ "watchCSS": true }'>
        <div class="gallery-cell">
          <img src="img/motta.jpg" alt="Motta Hütte">
          <span class="strong small">Motta Hütte</span>
        </div>
        <div class="gallery-cell">
          <img src="img/weinkeller.jpg" alt="Weinkeller">
          <span class="strong small">Weinkeller</span>
        </div>
        <div class="gallery-cell">
          <img src="img/valbella_inn.jpg" alt="Valbella Inn">
          <span class="strong small">Valbella Inn</span>
        </div>
      </section> -->
      <section class="banner-container">
        <img src="img/banner.png" alt="Banner">
      </section>
      <section class="program side-margin">
        <h2>Programm</h2>
        <p class="strong">Mittwoch, 6. März 2019</p>
        <div class="times">
          <div class="time one">
            <h3>9.00</h3>
            <p>​Kaffee und Gipfeli an der <a href="https://arosalenzerheide.swiss/de/Region/Infrastruktur/Talstation-Heimberg_isd_126855" target="_blank">Talstation Heimberg</a> in Parpan (individuelle Hinreise)</p>
          </div>
          <div class="time two">
            <h3>9.45 – 13.30</h3>
            <p>3 3/4h Skispass im Bündner Schneeparadies zusammen mit dem Weltmeister Patrick Küng.</p>
          </div>
          <div class="time three">
            <h3>13.30 – 17.00</h3>
            <p>​Gaumenschmaus in der <a href="https://www.motta-lenzerheide.com/" target="_blank">«Motta»-Hütte</a> und Degustation erlesener Weine</p>
          </div>
          <div class="time four">
            <h3>ab 17.00</h3>
            <p>​Freies Programm, anschliessend Übernachtung im <a href="https://valbellainn.ch/" target="_blank"> 4* Superior Hotel Valbella Inn</a> inkl. Frühstück</p>
          </div>
        </div>
      </section>
      <section class="sign-up side-margin">
        <h2>Teilnahme</h2>
        <div class="body">
          <div class="info">
            <p>
              Machen Sie mit – und mit etwas Glück gewinnen Sie und Ihre Begleitung am 6. März ein unvergessliches Erlebnis im Wert von über 2’000 Franken. Teilnahmeschluss ist der 17. Februar 2019.
            </p>
            <p>Wir drücken Ihnen die Daumen.</p>
            <p class="strong">Ihre Binelli Group <?php echo $store; ?></p>
          </div>
          <div class="interactive">
            <form id="myForm" action="#" method="post">
              <div class="input left">
                <label for="firstname">Vorname*</label>
                <input type="text" name="firstname" id="firstname" regex="name" value="<?php echo $firstname; ?>" tabindex="1">
              </div>

              <div class="input right">
                <label for="lastname">Name*</label>
                <input type="text" name="lastname" id="lastname" regex="name" value="<?php echo $lastname; ?>" tabindex="1">
              </div>

              <div class="input left">
                <label for="street">Strasse / Nr.</label>
                <input type="text" name="street" id="street" regex="street" class="address-field" value="" tabindex="1">
              </div>

              <div class="input right location">
                <div class="zip">
                  <label for="zip">PLZ</label>
                  <input type="text" name="zip" id="zip" regex="zip" class="address-field" value="" tabindex="1">
                </div>
                <div class="place">
                  <label for="place">Ort</label>
                  <input type="text" name="place" id="place" regex="place" class="address-field" value="" tabindex="1">
                </div>
              </div>

              <div class="input left">
                <label for="email">E-Mail*</label>
                <input type="text" name="email" id="email" regex="email" value="<?php echo $email; ?>" tabindex="1">
              </div>

              <div class="input right">
                <label for="phone">Telefonnummer*</label>
                <input type="text" name="phone" id="phone" regex="phone" value="" tabindex="1">
              </div>

              <div class="text-area">
                <label for="message">Bemerkungsfeld</label>
                <textarea type="text" cols="40" rows="8" name="message" id="message" tabindex="1" placeholder="Ich möchte eine Nachricht hinterlassen…"></textarea>
              </div>
              <div class="terms">
                <input type="checkbox" name="checkbox" id="checkbox-invisible">
                <label for="checkbox-invisible" class="checkbox-label">
                  <img src="img/checkbox_check.svg" alt="checkbox" id="checkbox-visible" tabindex="1">
                </label>
                <span class="small">Ich bin mit den <span class="open-modal" id="open-modal" tabindex="1">Teilnahmebedingungen</span> einverstanden</span>
              </div>
              <input class="hidden" type="text" name="store" value="<?php echo $store; ?>">
              <input class="hidden" type="text" name="storeEmail" value="<?php echo $storeEmail; ?>">
              <div class="submit">
                <input type="submit" value="JETZT MITMACHEN" id="ajaxButton" tabindex="1"/>
              </div>
            </form>
            <div class="thank-you" id="thank-you">
              <p>
                Herzlichen Dank für Ihre Teilnahme!
              </p>
              <br>
              <p>
                Die Gewinner werden am 21. Februar 2019 persönlich via Telefon und E&#8209;Mail benachrichtigt.
              </p>
              <br>
              <p>
               Die Binelli Group <?php echo $store; ?> wünscht Ihnen viel Glück!
              </p>
            </div>
          </div>
        </div>
      </section>
      <section class="logos side-margin">
        <div class="logo motta">
          <img src="img/motta-logo.jpg" alt="Motta Hütte">
        </div>
        <div class="logo pk">
          <img src="img/pk-logo.jpg" alt="Patrick Küng">
        </div>
        <div class="logo hotel">
          <img src="img/hotel-logo.png" alt="Arosa Lenzerheide">
        </div>
        <div class="logo al">
          <img src="img/al-logo.jpg" alt="Arosa Lenzerheide">
        </div>
      </section>
    </div>
    <footer>
      <span class="small"><?php echo $storeName; ?> | <?php echo $storeStreet; ?> | <?php echo $storeTown; ?></span>
    </footer>
  </div>
  <div class="modal teilnahmebedingungen" id="modal">
    <div class="inside-modal">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Teilnahmebedingungen</h2>
          <button type="button" class="close-modal" id="close-modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <br><br>
          <p>
            Teilnahmebedingungen: Pro Person nur eine Teilnahme. Der Gewinn ist nicht übertragbar. Teilnahmeberechtigt sind alle Personen ab 18 Jahren mit gültigem Führerausweis der Kat. B und Wohnsitz in der Schweiz
            oder im Fürstentum Liechtenstein. Ausgenommen sind Mitarbeitende der Binelli Group und der beauftragten Unternehmen sowie deren Angehörige. Die Gewinner werden durch das Los ermittelt und schriftlich benachrichtigt.
            Die Verlosung findet unter Ausschluss der Öffentlichkeit statt. Über das Gewinnspiel und die Verlosung wird keine Korrespondenz geführt. Keine Barauszahlung des Preises. Es besteht kein Kaufzwang. Der Rechtsweg ist ausgeschlossen.
          </p>
          <br>
          <p>
            Jeder Teilnehmer willigt mit seiner Teilnahme hiermit ausdrücklich ein, dass von ihm gemachte Bild-, Ton- und Filmaufnahmen während des Skitags am 6. März 2019 für Veröffentlichungen auf Websites, Social-Media-Plattformen und in anderen
            Publikationen unentgeltlich genutzt werden können. Die Daten werden nicht an Dritte weitergegeben, ausgenommen davon ist die zuständige Werbeagentur.
          </p>
        </div>
      </div>
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
</body>

</html>
