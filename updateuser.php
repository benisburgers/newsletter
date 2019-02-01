<?php
	// recieved id
	$userId = intval($_GET['id']);

	// connect database
	$con = mysqli_connect('localhost','root','root','tessin');

	// check connection
	if (!$con) {
	    die('Could not connect: ' . mysqli_connect_error($con));
	}

	//mysqli_select_db($con,"tessin");
	$updateParticipation = "UPDATE items SET participation=true WHERE id=$userId";
	mysqli_query($con,$updateParticipation);

	mysqli_close($con);
	
	// get form data and send notification mail to participant
    // only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // get form fields and remove whitespace.
        $firstname = strip_tags(trim($_POST["firstname"]));
		$firstname = str_replace(array("\r","\n"),array(" "," "),$firstname);

		$lastname = strip_tags(trim($_POST["lastname"]));
		$lastname = str_replace(array("\r","\n"),array(" "," "),$lastname);

		$street = strip_tags(trim($_POST["street"]));
		$street = str_replace(array("\r","\n"),array(" "," "),$street);

		$zip = strip_tags(trim($_POST["zip"]));
		$zip = str_replace(array("\r","\n"),array(" "," "),$zip);
        
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

        $phone = strip_tags(trim($_POST["phone"]));
		$phone = str_replace(array("\r","\n"),array(" "," "),$phone);
        
        $message = trim($_POST["message"]);

        // Check that data was sent to the mailer.
        // !!! is done by js validation already.
        if ( !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! There was a problem with your submission. Please complete the form and try again.";
            exit;
        }

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $recipient = $email;

        // Set the email subject.
        $subject = "Teilnahme für Binelli Group Wettbewerb";

        // Build the email content.
        $email_content = "Name: $firstname $lastname\n";	
        $email_content .= "Adresse: $street, $zip\n";
        $email_content .= "E-Mail: $email\n";
        $email_content .= "Telefonnummer: $phone\n\n";
        $email_content .= "Bemerkung:\n$message\n";

        // Build the email headers.
        $email_headers = "From: $firstname $lastname <$email>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }
 ?>