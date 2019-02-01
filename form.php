<?php
	// get url params as key/value array -> $userParams
	parse_str($_SERVER['QUERY_STRING'], $userParams);

	// get user sex and set salutation
	if (isset($userParams['sex'])) {
		if ($userParams['sex'] == 'male') {
			$userSalutation = "Herr";
		} elseif ($userParams['sex'] == 'female') {
			$userSalutation = "Frau";
		}
	} else {
		$userSalutation = "";
	}

	// get users lastname
	$lastname = "";
	if (isset($userParams['nachname'])) { $lastname = $userParams['nachname'];}
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>

	<body>
		<h1>Guten Tag <?php echo $userSalutation . " " . $lastname; ?></h1>
		<form id="myForm" action="#" method="post">
			<div>
				<label for="firstname">Vorname</label>
				<input type="text" name="firstname" id="firstname" value="<?php if (isset($userParams['vorname'])) { echo $userParams['vorname'];} ?>" tabindex="1">
			</div>

			<div>
				<label for="lastname">Name</label>
				<input type="text" name="lastname" id="lastname" value="<?php echo $lastname; ?>" tabindex="1">
			</div>

			<div>
				<label for="street">Strasse / Nr.</label>
				<input type="text" name="street" id="street" value="<?php if (isset($userParams['strasse'])) { echo $userParams['strasse'];} ?>" tabindex="1">
			</div>

			<div>
				<label for="zip">PLZ / Ort</label>
				<input type="text" name="zip" id="zip" value="<?php if (isset($userParams['ort'])) { echo $userParams['ort'];} ?>" tabindex="1">
			</div>

			<div>
				<label for="email">E-Mail</label>
				<input type="text" name="email" id="email" value="<?php if (isset($userParams['e-mail'])) { echo $userParams['e-mail'];} ?>" tabindex="1">
			</div>

			<div>
				<label for="phone">Telefonnummer</label>
				<input type="text" name="phone" id="phone" value="<?php if (isset($userParams['telefon'])) { echo $userParams['telefon'];} ?>" tabindex="1">
			</div>

			<div>
				<label for="textarea">Bemerkungsfeld</label>
				<textarea cols="40" rows="8" name="textarea" id="textarea"></textarea>
			</div>

			<div>
				<label for="checkbox">Ich bin mit den Teilnahmebedingungen einverstanden</label>
				<input type="checkbox" name="checkbox">
			</div>
			<div>
				<input type="submit" value="Submit" id="ajaxButton">
			</div>
		</form>

		<div id="demo"></div>

		<script>
			// submit button event listener
			document.getElementById("ajaxButton").addEventListener('click', makeRequest());

			function makeRequest() {
				// get parameter id
				var url_string = window.location.href;
				var url = new URL(url_string);
				var userId = url.searchParams.get("id");

				var httpRequest;

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
			        	document.getElementById("demo").innerHTML = this.responseText;
			        }
			    };

			    httpRequest.open("GET","updateuser.php?id=" + userId,true);
			    httpRequest.send();
			}
		</script>
	</body>
</html>
