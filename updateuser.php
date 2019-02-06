<?php
	// define content type
	header('Content-type: text/html; charset=utf-8');

    // store form data
    // only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
	    // get form fields and remove whitespace.
	    $firstname = strip_tags(trim($_POST["firstname"]));
		$firstname = str_replace(array("\r", "\n"), array(" ", " "), $firstname);

		$lastname = strip_tags(trim($_POST["lastname"]));
		$lastname = str_replace(array("\r", "\n"), array(" ", " "), $lastname);

		$street = strip_tags(trim($_POST["street"]));
		$street = str_replace(array("\r", "\n"), array(" ", " "), $street);

		$zip = strip_tags(trim($_POST["zip"]));
		$zip = str_replace(array("\r", "\n"), array(" ", " "), $zip);

		$place = strip_tags(trim($_POST["place"]));
		$place = str_replace(array("\r", "\n"), array(" ", " "), $place);

	    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

	    $phone = strip_tags(trim($_POST["phone"]));
		$phone = str_replace(array("\r", "\n"), array(" ", " "), $phone);

		$store = strip_tags(trim($_POST["store"]));
		$store = str_replace(array("\r", "\n"), array(" ", " "), $store);

		$storeEmail = strip_tags(trim($_POST["storeEmail"]));
		$storeEmail = str_replace(array("\r", "\n"), array(" ", " "), $storeEmail);

		if ($storeEmail == "") {
			$storeEmail = "info";
		}

	    $message = trim($_POST["message"]);
	} else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
	}

	// database connection
    // $dbHost = 'localhost';
    // $dbUser = 'root';
    // $dbPass = 'root';
    // $dbName = 'contest';
    // $participantTable = 'participant';

    // server
    $dbHost = 'localhost';
    $dbUser = 'bin-nl';
    $dbPass = 'S4qpy6$5';
    $dbName = 'bin_nl_';
    $participantTable = 'participant';

    // connect database
    $con = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
    $con->set_charset("utf8");

    // check connection
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
    	exit();
    }

    // select database
    //mysqli_select_db($dbName, $con);

    $added_on = date('Y-m-d G:i:s');

    // initialize table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS $participantTable (
    	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    	firstname VARCHAR(30) NOT NULL,
    	lastname VARCHAR(30) NOT NULL,
    	street VARCHAR(30) NOT NULL,
    	zip SMALLINT(5) NOT NULL,
    	place VARCHAR(30) NOT NULL,
    	email VARCHAR(50) NOT NULL UNIQUE,
    	phone INT(20) NOT NULL,
    	store VARCHAR(30) NOT NULL,
    	message TEXT(400) NOT NULL,
    	date_created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    	last_update TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) CHARACTER SET=utf8;";

 //    $sql .= "REPLACE INTO $participantTable
	// 	(firstname, lastname, street, zip, place, email, phone, message)
	// VALUES
	// 	('$firstname', '$lastname', '$street', '$zip', '$place', '$email', '$phone', '$message')";

    // save new record or update if email exists already
	$sql .= "INSERT INTO $participantTable (
		firstname,
		lastname,
		street,
		zip,
		place,
		email,
		phone,
		store,
		storeEmail,
		message) VALUES (
		'$firstname',
		'$lastname',
		'$street',
		'$zip',
		'$place',
		'$email',
		'$phone',
		'$store',
		'$storeEmail'
		'$message')
  	ON DUPLICATE KEY UPDATE
  		firstname='$firstname',
  		lastname='$lastname',
  		street='$street',
  		zip='$zip',
  		place='$place',
  		phone='$phone',
  		store='$store',
  		storeEmail='$storeEmail',
  		message='$message',
  		last_update=CURRENT_TIMESTAMP;";

    // update database
    if ($con->multi_query($sql)) {
    	//  send notification mail to participant
    	// Check that data was sent to the mailer.
        if ( !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! There was a problem with your submission. Please complete the form and try again.";
            exit;
        }

        // Set the recipient email address.
        $recipient = $email;

        // Set the email subject.
        $subject = "Ihre Gewinnspielteilnahme zum Skierlebnis mit Patrick Küng am 6. März 2019";

        // Build confirm-email content.
        $email_content = "Sie haben soeben an unserem Gewinnspiel für ein einzigartiges Skierlebnis am Mittwoch, 6. März 2019, mit dem Weltmeister Patrick Küng teilgenommen.\n\n

			Ob Sie gewonnen haben, erfahren Sie am 21. Februar 2019.\n\n

			Viel Glück und herzliche Grüsse\n\n

			Ihre Binelli Group $store\n\n

			PS: Sollten Sie nicht mehr beim Gewinnspiel teilnehmen wollen, bitten wir Sie, sich frühzeitig via $storeEmail@binelli-group.ch abzumelden.\n\n";
        
        $email_content .= "Name: $firstname $lastname\n";
        $email_content .= "Strasse: $street\n";
        $email_content .= "PLZ: $zip\n";
        $email_content .= "Ort: $place\n";
        $email_content .= "E-Mail: $email\n";
        $email_content .= "Telefonnummer: $phone\n\n";
        $email_content .= "Bemerkung:\n$message\n";

        // Build the email headers.
        $email_headers = "From: $recipient";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            //echo "Thank You! Your message has been sent.";
            return true;
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    // close connection
    $con->close();
 ?>
