$(document).ready(function(){

  var firstname = $("#firstname"),
      lastname = $("#lastname"),
      street = $("#street")
      zip = $("#zip"),
      place = $("#place"),
      email = $("#email"),
      phone = $("#phone"),
      valid = false,
      termsChecked = false;
//Validate Form

    //Check form validity everytime value in input field is changed
    $(".input").on('input', function() {
      checkForm();
    });

    //Are terms and conditions accepted
    $('#checkbox-invisible').change(function(){
      if ($("#checkbox-invisible").is(':checked')) {
        termsChecked = true;
      }
      else {
        termsChecked = false;
      }
      checkForm();
    });

    //Check Email and Name field AND all address boxes
    function checkForm() {
      //if (name and email are valid) AND address fields are valid (or empty), return true. Else return false.
      if (checkMandatory() & checkAddress()) {
        $('#ajaxButton').addClass("activated");
        valid = true;
      }
      else {
        $('#ajaxButton').removeClass("activated");
        valid = false;
      }
    }

    function checkMandatory() {
      if (checkBox(firstname) & checkBox(lastname) & checkBox(email) & checkBox(phone) & termsChecked) {
        return true;
      }
      else {
        return false;
      }
    }

    //CHECK ADDRESSES
    function checkAddress() {
      //if all address fields (street, zip, place) are left empty ==> Return true
      if (allAddressBoxesEmpty()) {
        return true;
      }
      //else:
      else {
        //all address fields must be valid ==> true
        if (allAddressBoxesValid()) {
          return true;
        }
        //else: return false
        else {
          return false;
        }
      }
    }

    //check whether specific address Box is empty: Return true if it is. Else, return false.
    function addressBoxEmpty(input) {
      if (input.val() == "") {
        return true;
      }
      else {
        return false;
      }
    }

    //check whether ALL address boxes are empty (street, zip, place)
    function allAddressBoxesEmpty() {
      if (addressBoxEmpty(street) & addressBoxEmpty(zip) & addressBoxEmpty(place)) {
        $(".address-field").removeClass("invalid")
        return true;
      }
      else {
        return false;
      }
    }

    //check whether all Address Inputs fields are Valid (street, zip, place) by running each field through checkBox. Return true if they are. Else, return false.
    function allAddressBoxesValid() {
      if (checkBox(street) & checkBox(zip) & checkBox(place)) {
        return true;
      }
      else {
        return false;
      }
    }

    //Create object with a regex to validate each field
    var regex = {
      name:   /^[A-Za-zÀ-ÖØ-öø-ÿ ,.'-]+$/i,
      email:  /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
      phone:  /^[0-9]+$/,
      street: /^[a-z \d,.'-]+$/i,
      zip:    /^[\d]{4}?$/,
      place:  /^[A-Za-zÀ-ÖØ-öø-ÿ ,.'-]+$/i,
    };

    //Validate each field against its corresponding regex. Return true or false.
    function checkBox(input) {
      //Create variable with value INSIDE the corresponding field (e.g. inside 'name', we find 'Max Mustermann')
      var value = input.val();
      //Create a variable with each field's corresponding regex, by using this field's name and accessing the 'regex' object.
      var specificRegex = regex[input.attr('regex')];
      //If the field passes the regex test (is valid), removeClass .invalid (visual, red) from that field. Return true.
      if (specificRegex.test(value)) {
        input.removeClass("invalid");
        return true;
      }
      //Else: addClass .invalid to that field and return false.
      else {
        input.addClass("invalid");
        return false;
      }
    }

});
