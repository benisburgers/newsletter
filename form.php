<?php
	// get url parameter as key/value array -> $userParams
	parse_str($_SERVER['QUERY_STRING'], $userParams);

	// set user parameter
	$userSalutation = getParamValue('sex', $userParams);
	$firstname = getParamValue('firstname', $userParams);
	$lastname = getParamValue('lastname', $userParams);
	$email = getParamValue('email', $userParams);
	$store = getParamValue('store', $userParams);

	// get parameter value with key
	function getParamValue($key, $userParams) {
		if (isset($userParams[$key])) {
			return $userParams[$key];
		} else {
			return "";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>

	<body>
		<h1>Guten Tag <?php echo $userSalutation . " " . $lastname; ?></h1>
		<form id="theForm" action="#" method="post">
			<div>
				<label for="firstname">Vorname</label>
				<input type="text" name="firstname" id="firstname" value="<?php echo $firstname; ?>" tabindex="1">
			</div>

			<div>
				<label for="lastname">Name</label>
				<input type="text" name="lastname" id="lastname" value="<?php echo $lastname; ?>" tabindex="1">
			</div>

			<div>
				<label for="street">Strasse / Nr.</label>
				<input type="text" name="street" id="street" value="<?php //if (isset($userParams['strasse'])) { echo $userParams['strasse'];} ?>" tabindex="1">
			</div>

			<div>
				<label for="zip">PLZ / Ort</label>
				<input type="text" name="zip" id="zip" value="<?php //if (isset($userParams['ort'])) { echo $userParams['ort'];} ?>" tabindex="1">
			</div>

			<div>
				<label for="email">E-Mail</label>
				<input type="text" name="email" id="email" value="<?php echo $email; ?>" tabindex="1">
			</div>

			<div>
				<label for="phone">Telefonnummer</label>
				<input type="text" name="phone" id="phone" value="<?php //if (isset($userParams['telefon'])) { echo $userParams['telefon'];} ?>" tabindex="1">
			</div>
			
			<div>
				<label for="message">Bemerkungsfeld</label>
				<textarea cols="40" rows="8" name="message" id="message"></textarea>
			</div>
			
			<div>
				<label for="checkbox">Ich bin mit den Teilnahmebedingungen einverstanden</label>
				<input type="checkbox" name="checkbox">
			</div>
			<div>
				<input type="submit" value="Submit" id="ajaxButton">
			</div>
		</form>

		<div id="debug"></div>

		<script>
			// event listener for form submit
			document.getElementById("ajaxButton").addEventListener('click', function(e) {
				e.preventDefault();
				makeRequest();
			}, false);

			// function to execute on click
			function makeRequest() {
				// declare form element
				var formElement = document.getElementById("theForm");
				
				// get participant id from url parameter
				var url_string = window.location.href;
				var url = new URL(url_string);
				var userId = url.searchParams.get("id");

				var httpRequest;

				// create request
			    if (window.XMLHttpRequest) {
			        // code for IE7+, Firefox, Chrome, Opera, Safari
			        httpRequest = new XMLHttpRequest();

			        if (!httpRequest) {
			            alert('Giving up :( Cannot create an XMLHTTP instance');
			            return false;
			        } 
			    } else {
			        // code for IE6, IE5
			        httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
			    }
			    
			    httpRequest.onreadystatechange = function() {
			        if (this.readyState == 4 && this.status == 200) {
			        	document.getElementById("debug").innerHTML = this.responseText;
			        }
			    };
			    
			    httpRequest.open("POST","updateuser.php?id=" + userId, true);
			    httpRequest.send(new FormData(formElement));
			}
		</script>
	</body>
</html>