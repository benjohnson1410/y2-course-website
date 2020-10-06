// VALIDATION FUNCTIONS:
function validate()
{
  validateForename();
  validateSurname();
  validateGender();
  validateAddress();
  validateCountry();
  validatePhoneNumber();
  validateEmail();
  validatePassword();
  validateType();
}

// Check forename.
function validateForename()
{
  var frmForename = document.getElementById("forename").value;

  if (frmForename == "" || frmForename.length < 2)
  {
    alert("You have not entered a sufficient amount of alpha characters in the Forename box.");
    return false;
  }
  else
  {
    return true;
  }
}

// Check surname.
function validateSurname()
{
  var frmSurname = document.getElementById("surname").value;

  if (frmSurname == "" || frmSurname.length < 2)
  {
    alert("You have not entered a sufficient amount of alpha characters in the Surname box.");
    return false;
  }
  else
  {
    return true;
  }
}

// Check gender.
function validateGender()
{
  var male = document.getElementById("genderM");
  var female = document.getElementById("genderF");
  var other = document.getElementById("genderO");

  if ((male.checked == false) && (female.checked == false) && (other.checked == false))
  {
    alert("Your gender identity is required.");
    return false;
  }
  else
  {
    return true;
  }
}

// Check address.
function validateAddress()
{
  var frmAddL1 = document.getElementById("lineOne");
  var frmCounty = document.getElementById("county");

  if (frmAddL1 == "")
  {
    alert("The first line of your address, i.e.: your house location, is required.");
    return false;
  }
  else if (frmCounty == "")
  {
    alert("Your county/state is required.");
    return false;
  }
}

// Check country.
function validateCountry()
{
  var frmCountry = document.getElementById("country");

  if (frmCountry.value == "")
  {
    alert("Select your country of origin before continuing.");
    return false;
  }
  else
  {
    return true;
  }
}

// Check phone number.
function validatePhoneNumber()
{
  var number = document.getElementById("phoneNumber");
  var sInN = number.search(" ");
  // sInN is a string that will search for any spaces in the phone number.
  // If the program finds any spaces, tell the user this is prohibited.
  if (sInN == true)
  {
    alert("You cannot have spaces in between numbers when entering your phone number.");
    return false;
  }
  else
  {
    return true;
  }
}

// Check email.
function validateEmail()
{
  var em = document.getElementById("email");
  var cem = document.getElementById("cEmail");

  if (em != cem)
  {
    alert("Email addresses do not match.");
    return false;
  }
  else
  {
    return true;
  }
}

// Check password.
function validatePassword()
{
  var pw = document.getElementById("password");
  var cpw = document.getElementById("cPassword");

  if (pw != cpw)
  {
    alert("Passwords do not match.");
    return false;
  }
  else
  {
    return true;
  }
}

// Check user type.
function validateType()
{
  var userType = document.getElementById("type");

  if (userType.value = "")
  {
    alert("Please select a user type before continuing.");
    return false;
  }
  else
  {
    return true;
  }
}

// REGULAR EXPRESSIONS:
// Letters Only:
function alphaOnly(input)
{
  var re = /[^a-z]/gi; // Regular expression, prohibits characters other than A-Z from being accepted.
	input.value = input.value.replace(re, "");
}

// Numbers Only:
function numbersOnly(input)
{
  var re = /[^0-9]/gi; // Regular expression, prohibits characters other than 0-9 from being accepted.
  input.value = input.value.replace(re, "");
}

// Email Address:
function emailExpression(input)
{
  // Regular expression to match email format:
  var re = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/gi;
  input.value = input.value.replace(re, "");
}

// National Insurance Number:
function niExpression(input)
{
  var re = /^[A-CEGHJ-PR-TW-Z]{1}[A-CEGHJ-NPR-TW-Z]{1}[0-9]{6}[A-DFM]{0,1}$/;
  input.value = input.value.replace(re, "");
}
