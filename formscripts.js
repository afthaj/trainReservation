// JavaScript Document

function validateRegEx(regex, input, helpText, helpMessage) {
        // See if the input data validates OK
        if (!regex.test(input)) {
          // The data is invalid, so set the help message and return false
          if (helpText != null)
            helpText.innerHTML = helpMessage;
          return false;
        }
        else {
          // The data is OK, so clear the help message and return true
          if (helpText != null)
            helpText.innerHTML = "";
          return true;
        }
      }

function validateNonEmpty(inputField, helpText) {
	//see if the inputField is empty
	if(inputField.value.length == 0){
		//inputField is empty. therefore, display the help message
		if(helpText != null)
			helpText.innerHTML = "Please enter a value";
			return false;
		} else {
			if(helpText != null)
			helpText.innerHTML = "";
			return true;
			}
	}
		
function validateRetypePassword(inputField1, inputField2, helpText) {
	//see if the password field is equal in value to the retype password field
	if(inputField1.value != inputField2.value){
		//the passwords do not match
		if(helpText != null)
		helpText.innerHTML = "Passwords do not match";
		return false;
		} else {
			if(helpText != null)
			helpText.innerHTML = "";
			return true;
		}
	}

function validateDate(inputField, helpText) {
  // First see if the input value contains data
  if (!validateNonEmpty(inputField, helpText))
	return false;

  // Then see if the input value is a date
  return validateRegEx(/^\d{4}-\d{2}-\d{2}$/, inputField.value, helpText, "Please enter a date in the form of YYYY-MM-DD");
  }
  
function validateTime(inputField, helpText) {
  // First see if the input value contains data
  if (!validateNonEmpty(inputField, helpText))
	return false;

  // Then see if the input value is a date
  return validateRegEx(/^\d{2}:\d{2}:\d{2}$/, inputField.value, helpText, "Please enter a time in the form of HH:MM:SS");
  }

function validateEmail(inputField, helpText) {
  // First see if the input value contains data
  if (!validateNonEmpty(inputField, helpText))
	return false;

  // Then see if the input value is an email address
  return validateRegEx(/^[\w\.-_\+]+@[\w-]+(\.\w{2,3})+$/, inputField.value, helpText, "Please enter an email address in the form of johndoe@acme.com");
}

function validateLogin(form) {
  if (
	  validateNonEmpty(form["username"], form["username_help"]) &&
	  validateNonEmpty(form["password"], form["password_help"])) {
	// Submit the order to the server
	return true;
  } else {
	alert("Please enter a Username and a Password");
	return false;
  }
}

function validateSignUp(form) {
  if (
	  validateNonEmpty(form["username"], form["username_help"]) &&
	  validateNonEmpty(form["password"], form["password_help"]) &&
	  validateRetypePassword(form["retypepassword"], form["retypepassword_help"]) &&
	  validateNonEmpty(form["firstname"], form["firstname_help"]) &&
	  validateNonEmpty(form["lastname"], form["lastname_help"])) {
	// Submit the order to the server
	return true;
  } else {
	alert("Please enter all the details");
	return false;
  }
}

function validateEditProfile(form) {
  if (
	  validateNonEmpty(form["firstname"], form["firstname_help"]) &&
	  validateNonEmpty(form["othernames"], form["othernames_help"]) &&
	  validateNonEmpty(form["lastname"], form["lastname_help"]) &&
	  validateNonEmpty(form["gender"], form["gender_help"]) &&
	  validateDate(form["dob"], form["dob_help"]) &&
	  validateNonEmpty(form["address"], form["address_help"]) &&
	  validateNonEmpty(form["telnumber"], form["telnumber_help"]) &&
	  validateEmail(form["email"], form["email_help"])) {
	// Submit the order to the server
	return true;
  } else {
	alert("Sorry, there is something wrong. Please resubmit the form");
	return false;
  }
}

function validateChangePassword(form) {
  if (
	  validateNonEmpty(form["oldpassword"], form["oldpassword_help"]) &&
	  validateNonEmpty(form["newpassword"], form["newpassword_help"]) &&
	  validateRetypePassword(form["retypenewpassword"], form["retypenewpassword_help"])) {
	// Submit the order to the server
	return true;
  } else {
	alert("Sorry, there is something wrong. Please resubmit the form");
	return false;
  }
}

function submitReservation(form) {
  if (validateNonEmpty(form["noofpassengers"], form["noofpassengers_help"])) {
	// Submit the order to the server
	return true;
  } else {
	alert("Please enter the number of passengers.");
	return false;
  }
}

function validateAdminAddNewTrainRoute(form) {
  if (
	  validateNonEmpty(form["trainnumber"], form["trainnumber_help"]) &&
	  validateNonEmpty(form["trainname"], form["trainname_help"]) &&
	  validateNonEmpty(form["departurestation"], form["departurestation_help"]) &&
	  validateTime(form["departuretime"], form["departuretime_help"]) &&
	  validateNonEmpty(form["arrivalstation"], form["arrivalstation_help"]) &&
	  validateTime(form["arrivaltime"], form["arrivaltime_help"]) &&
	  validateNonEmpty(form["frequency"], form["frequency_help"]) &&
	  validateNonEmpty(form["stationsincluded"], form["stationsincluded_help"]) &&
	  validateNonEmpty(form["otherinformation"], form["otherinformation_help"])) {
	// Submit the order to the server
	return true;
  } else {
	alert("Sorry, there is something wrong. Please resubmit the form");
	return false;
  }
}

function validateAdminAddNewAdmin(form) {
  if (
	  validateNonEmpty(form["username"], form["username_help"]) &&
	  validateNonEmpty(form["password"], form["password_help"]) &&
	  validateRetypePassword(form["retypepassword"], form["retypepassword_help"]) &&
	  validateNonEmpty(form["firstname"], form["firstname_help"]) &&
	  validateNonEmpty(form["othernames"], form["othernames_help"]) &&
	  validateNonEmpty(form["lastname"], form["lastname_help"]) &&
	  validateNonEmpty(form["gender"], form["gender_help"]) &&
	  validateDate(form["dob"], form["dob_help"]) &&
	  validateNonEmpty(form["address"], form["address_help"]) &&
	  validateNonEmpty(form["telnumber"], form["telnumber_help"]) &&
	  validateEmail(form["email"], form["email_help"])) {
	// Submit the order to the server
	return true;
  } else {
	alert("Sorry, there is something wrong. Please resubmit the form");
	return false;
  }
}

function validateAdminAddNewPassenger(form) {
  if (
	  validateNonEmpty(form["username"], form["username_help"]) &&
	  validateNonEmpty(form["password"], form["password_help"]) &&
	  validateRetypePassword(form["retypepassword"], form["retypepassword_help"]) &&
	  validateNonEmpty(form["firstname"], form["firstname_help"]) &&
	  validateNonEmpty(form["othernames"], form["othernames_help"]) &&
	  validateNonEmpty(form["lastname"], form["lastname_help"]) &&
	  validateNonEmpty(form["gender"], form["gender_help"]) &&
	  validateDate(form["dob"], form["dob_help"]) &&
	  validateNonEmpty(form["address"], form["address_help"]) &&
	  validateNonEmpty(form["telnumber"], form["telnumber_help"]) &&
	  validateEmail(form["email"], form["email_help"])) {
	// Submit the order to the server
	return true;
  } else {
	alert("Sorry, there is something wrong. Please resubmit the form");
	return false;
  }
}

function validateAdminLatestNews(form) {
  if (
	  validateDate(form["date"], form["date_help"]) &&
	  validateNonEmpty(form["content"], form["content_help"])) {
	// Submit the order to the server
	return true;
  } else {
	alert("Sorry, there is something wrong. Please resubmit the form");
	return false;
  }
}