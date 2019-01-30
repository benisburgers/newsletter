<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Newsletter</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/newstyle.css">
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <header>
    <div class="logo left">
      Binelli Group
    </div>
    <div class="logo right">
      Logos
    </div>
  </header>
  <div class="main-body">
    <section class="start">
      <div class="title side-padding">
        <h1>Wettbewerb</h1>
        <p class="intro-header">
          EINZIGARTIGES SKIERLEBNIS FÜR 4x2 PERSONEN IM WERT VON ÜBER 10’000 FRANKEN
        </p>
      </div>
      <div class="image-container">
        <img src="img/patrick_kueng.jpg" alt="Patrick Kueng">
      </div>
    </section>
    <section class="introduction side-padding">
      <p class="strong">
        Nutzen Sie die einmalige Chance auf 2 von 8 exklusiven Plätzen beim einzigartigen Binelli Group Skierlebnis in der Lenzerheide. Dabei lernen Sie vom Ex-Skirennfahrprofi und Weltmeister <a href="#">Patrick Küng</a> höchstpersönlich die perfekte Kurventechnik.
      </p>
      <p>
        Doch damit nicht genug: Zur Mittagszeit wartet ein kulinarischer Höhepunkt auf Sie – und zwar in der <a href="#">Motta-Hütte</a>. Unser Partnerbetrieb am Sonnenhang der Lenzerheid gehört zu den zehn besten Skihütten der Schweiz. Das Restaurant mit 14 Gault-Millau Punkten serviert Ihnen am 6. März ein exquisites Alpengourmet-Menu und verwöhnt Sie mit einer Degustation edler Weine.
      </p>
      <p>
        Ihren Abend im Winterwunderland verbringen Sie individuell, bevor Sie im <a href="#">5*Hotel XY</a> den erstklassigen Erlebnistag gemütlich abschliessen.
      </p>
    </section>
    <section class="images side-padding">
      <div class="column motta">
        <img src="img/motta.jpg" alt="Motta Hütte">
        <span class="strong">Motta Hütte</span>
        <span>Copyright: Lorem Ipsum</span>
      </div>
      <div class="column ski">
        <img src="img/skifahrer.jpg" alt="Motta Hütte">
        <span class="strong">Patrick Küng</span>
        <span>Copyright: Lorem Ipsum</span>
      </div>
      <div class="column hotel">
        <img src="img/hotel.jpg" alt="Motta Hütte">
        <span class="strong">Sheraton 5* Hotel</span>
        <span>Copyright: Lorem Ipsum</span>
      </div>
    </section>
    <section class="program side-padding">
      <h2>Programm</h2>
      <p class="strong">Mittwoch, 6. März 2019</p>
      <div class="times">
        <div class="time one">
          <h3>9.00</h3>
          <p>Kaffee und Gipfeli an der <a href="#">Talstation Heimberg</a> in Parpan (individuelle Hinreise)</p>
        </div>
        <div class="time two">
          <h3>9.45-13.30</h3>
          <p>Skifahren mit Weltmeister <a href="#">Patrick Küng</a></p>
        </div>
        <div class="time three">
          <h3>13.30 – 17.00</h3>
          <p>Gaumenschmaus in der <a href="#">Motta-Hütte</a> und Degustation erlesener Weine</p>
        </div>
        <div class="time four">
          <h3>ab 17.00</h3>
          <p>Freies Programm in der alpinen Oase <a href="#">Lenzerheide Valbella</a>
            <br/>
          Übernachtung im <a href="#">5*Hotel XY</a>
        </p>
        </div>
      </div>
    </section>
    <section class="sign-up side-padding">
      <h2>Teilnahme</h2>
      <div class="body">
        <div class="info">
          <p>Machen Sie mit und mit etwas Glück erleben Sie und Ihre Begleitung am 6. März ein
          unvergessliches Abenteuer im Wert von über 2’000 Franken pro Paar. Teilnahmeschluss
          ist der 20. Februar 2019.</p>
          <p>Wir drücken Ihnen die Daumen.</p>
          <p class="strong">Ihre Binelli Group Zürich</p>
        </div>
        <div class="interactive">
          <form id="myForm" action="#" method="post">
            <div class="input left">
              <label for="firstname">Vorname*</label>
              <input type="text" name="firstname" id="firstname" value="<?php if (isset($userParams['vorname'])) { echo $userParams['vorname'];} ?>" tabindex="1">
            </div>

            <div class="input right">
              <label for="lastname">Name*</label>
              <input type="text" name="lastname" id="lastname" value="<?php echo $lastname; ?>" tabindex="1">
            </div>

            <div class="input left">
              <label for="street">Strasse / Nr.</label>
              <input type="text" name="street" id="street" value="<?php if (isset($userParams['strasse'])) { echo $userParams['strasse'];} ?>" tabindex="1">
            </div>

            <div class="input right">
              <label for="zip">PLZ / Ort</label>
              <input type="text" name="zip" id="zip" value="<?php if (isset($userParams['ort'])) { echo $userParams['ort'];} ?>" tabindex="1">
            </div>

            <div class="input left">
              <label for="email">E-Mail*</label>
              <input type="text" name="email" id="email" value="<?php if (isset($userParams['e-mail'])) { echo $userParams['e-mail'];} ?>" tabindex="1">
            </div>

            <div class="input right">
              <label for="phone">Telefonnummer*</label>
              <input type="text" name="phone" id="phone" value="<?php if (isset($userParams['telefon'])) { echo $userParams['telefon'];} ?>" tabindex="1">
            </div>

            <div class="text-area">
              <label for="textarea">Bemerkungsfeld</label>
              <textarea cols="40" rows="8" name="textarea" id="textarea"></textarea>
            </div>
            <div class="terms">
              <input type="checkbox" name="checkbox" id="checkbox-invisible">
              <label for="checkbox-invisible">
                <img src="img/checkbox_check.svg" alt="checkbox" id="checkbox-visible">
                <span>Ich bin mit den <a href="#">Teilnahmebedingungen</a> einverstanden</span>
              </label>
            </div>
            <div class="submit">
              <input type="submit" value="Submit" id="ajaxButton">
            </div>
          </form>
        </div>
      </div>
    </section>
    <section class="logos side-padding">
      <div class="logo motta">
        Motta
      </div>
      <div class="logo PK">
        PK
      </div>
      <div class="logo Sheraton">
        Sheraton
      </div>
    </section>
  </div>
  <footer>
    <span>Lorem ipsum dolor sit amet</span>
  </footer>
  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>
