// function to execute on click
function makeRequest(isValid) {
  if(isValid) {
    console.log('makeRequest');
    // declare form element
    var formElement = document.getElementById("myForm");

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
            // TODO: show confirm text if successful
            //document.getElementById("debug").innerHTML = this.responseText;
            console.log(this.responseText);
          }
    };

    httpRequest.open("POST","updateuser.php", true);
    httpRequest.send(new FormData(formElement));
  }
}
