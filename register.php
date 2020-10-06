<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register | Ace Training</title>

    <!-- FAVICON -->
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/register.css">

    <!-- Link to JQuery syntax, which will control the HTML select elements. -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!--
			Links to fonts. Montserrat will be used for headings, Maven Pro for link and
			buttons and Roboto for other text.
		-->
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet">

    <!-- CUSTOM FONTS - USED FOR ICONS -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>
    <?php
      include ("header.php");
    ?>
    <div class="container">
      <div id="regForm">
        <h1>Sign Up to Ace Training</h1>
        <?php
          if (isset($_POST['forename']))
          {
            addUserToDatabase();
          }
          else
          {
            showForm();
          }
        ?>
      </div>
      <script src="js/registrationForm.js"></script>
      <script src="js/checkRegistration.js"></script>
    </div>
    <?php
      include ("footer.php");
    ?>
  </body>
</html>
<!--
  Background image: Photo by Lawrence Monk on Pixabay
  https://pixabay.com/en/code-website-html-web-development-647012/
-->
<?php
  function showForm()
  {
    echo ("
      <form name='register' method='post' action='register.php' onsubmit='validate(this);'>
        <label for='forename'>Forename</label> <br />
        <input type='text' id='forename' name='forename' onkeyup='alphaOnly(this);' required /> <br />

        <label for='surname'>Surname</label> <br />
        <input type='text' id='surname' name='surname' onkeyup='alphaOnly(this);' required /> <br />

        <label for='gender'>Gender</label> <br />
        <div id='gender'>
          <input type='radio' id='genderM' name='gender' value='M'><label for='genderM'>Male</label> <br />
          <input type='radio' id='genderF' name='gender' value='F'><label for='genderF'>Female</label> <br />
          <input type='radio' id='genderO' name='gender' value='O'><label for='genderO'>Other</label> <br />
        </div>

        <label for='address'>Address</label> <br />
        <div id='address'>
          <input type='text' id='lineOne' name='addLine1' placeholder='House number and road or apartment room number' required /> <br />
          <input type='text' id='lineTwo' name='addLine2' placeholder='Village name or address of apartment complex (optional)' /> <br />
          <input type='text' id='town' name='town' placeholder='Town (optional)' /> <br />
          <input type='text' id='county' name='county' placeholder='State/County' required /> <br />
        </div>

        <label for='postcode'>ZIP/Postal Code</label> <br />
        <input type='text' id='postcode' name='postcode' required /> <br />

        <label for='country'>Country</label> <br />
        <select id='country' name='country' required>
            <option value=''>Select a country...</option>
            <option value='AF'>Afghanistan</option>
          	<option value='AX'>Åland Islands</option>
          	<option value='AL'>Albania</option>
          	<option value='DZ'>Algeria</option>
          	<option value='AS'>American Samoa</option>
          	<option value='AD'>Andorra</option>
          	<option value='AO'>Angola</option>
          	<option value='AI'>Anguilla</option>
          	<option value='AQ'>Antarctica</option>
          	<option value='AG'>Antigua and Barbuda</option>
          	<option value='AR'>Argentina</option>
          	<option value='AM'>Armenia</option>
          	<option value='AW'>Aruba</option>
          	<option value='AU'>Australia</option>
          	<option value='AT'>Austria</option>
          	<option value='AZ'>Azerbaijan</option>
          	<option value='BS'>Bahamas</option>
          	<option value='BH'>Bahrain</option>
          	<option value='BD'>Bangladesh</option>
          	<option value='BB'>Barbados</option>
          	<option value='BY'>Belarus</option>
          	<option value='BE'>Belgium</option>
          	<option value='BZ'>Belize</option>
          	<option value='BJ'>Benin</option>
          	<option value='BM'>Bermuda</option>
          	<option value='BT'>Bhutan</option>
          	<option value='BO'>Bolivia, Plurinational State of</option>
          	<option value='BQ'>Bonaire, Sint Eustatius and Saba</option>
          	<option value='BA'>Bosnia and Herzegovina</option>
          	<option value='BW'>Botswana</option>
          	<option value='BV'>Bouvet Island</option>
          	<option value='BR'>Brazil</option>
          	<option value='IO'>British Indian Ocean Territory</option>
          	<option value='BN'>Brunei Darussalam</option>
          	<option value='BG'>Bulgaria</option>
          	<option value='BF'>Burkina Faso</option>
          	<option value='BI'>Burundi</option>
          	<option value='KH'>Cambodia</option>
          	<option value='CM'>Cameroon</option>
          	<option value='CA'>Canada</option>
          	<option value='CV'>Cape Verde</option>
          	<option value='KY'>Cayman Islands</option>
          	<option value='CF'>Central African Republic</option>
          	<option value='TD'>Chad</option>
          	<option value='CL'>Chile</option>
          	<option value='CN'>China</option>
          	<option value='CX'>Christmas Island</option>
          	<option value='CC'>Cocos (Keeling) Islands</option>
          	<option value='CO'>Colombia</option>
          	<option value='KM'>Comoros</option>
          	<option value='CG'>Congo</option>
          	<option value='CD'>Congo, the Democratic Republic of the</option>
          	<option value='CK'>Cook Islands</option>
          	<option value='CR'>Costa Rica</option>
          	<option value='CI'>Côte d'Ivoire</option>
          	<option value='HR'>Croatia</option>
          	<option value='CU'>Cuba</option>
          	<option value='CW'>Curaçao</option>
          	<option value='CY'>Cyprus</option>
          	<option value='CZ'>Czech Republic</option>
          	<option value='DK'>Denmark</option>
          	<option value='DJ'>Djibouti</option>
          	<option value='DM'>Dominica</option>
          	<option value='DO'>Dominican Republic</option>
          	<option value='EC'>Ecuador</option>
          	<option value='EG'>Egypt</option>
          	<option value='SV'>El Salvador</option>
          	<option value='GQ'>Equatorial Guinea</option>
          	<option value='ER'>Eritrea</option>
          	<option value='EE'>Estonia</option>
          	<option value='ET'>Ethiopia</option>
          	<option value='FK'>Falkland Islands (Malvinas)</option>
          	<option value='FO'>Faroe Islands</option>
          	<option value='FJ'>Fiji</option>
          	<option value='FI'>Finland</option>
          	<option value='FR'>France</option>
          	<option value='GF'>French Guiana</option>
          	<option value='PF'>French Polynesia</option>
          	<option value='TF'>French Southern Territories</option>
          	<option value='GA'>Gabon</option>
          	<option value='GM'>Gambia</option>
          	<option value='GE'>Georgia</option>
          	<option value='DE'>Germany</option>
          	<option value='GH'>Ghana</option>
          	<option value='GI'>Gibraltar</option>
          	<option value='GR'>Greece</option>
          	<option value='GL'>Greenland</option>
          	<option value='GD'>Grenada</option>
          	<option value='GP'>Guadeloupe</option>
          	<option value='GU'>Guam</option>
          	<option value='GT'>Guatemala</option>
          	<option value='GG'>Guernsey</option>
          	<option value='GN'>Guinea</option>
          	<option value='GW'>Guinea-Bissau</option>
          	<option value='GY'>Guyana</option>
          	<option value='HT'>Haiti</option>
          	<option value='HM'>Heard Island and McDonald Islands</option>
          	<option value='VA'>Holy See (Vatican City State)</option>
          	<option value='HN'>Honduras</option>
          	<option value='HK'>Hong Kong</option>
          	<option value='HU'>Hungary</option>
          	<option value='IS'>Iceland</option>
          	<option value='IN'>India</option>
          	<option value='ID'>Indonesia</option>
          	<option value='IR'>Iran, Islamic Republic of</option>
          	<option value='IQ'>Iraq</option>
          	<option value='IE'>Ireland</option>
          	<option value='IM'>Isle of Man</option>
          	<option value='IL'>Israel</option>
          	<option value='IT'>Italy</option>
          	<option value='JM'>Jamaica</option>
          	<option value='JP'>Japan</option>
          	<option value='JE'>Jersey</option>
          	<option value='JO'>Jordan</option>
          	<option value='KZ'>Kazakhstan</option>
          	<option value='KE'>Kenya</option>
          	<option value='KI'>Kiribati</option>
          	<option value='KP'>Korea, Democratic People's Republic of</option>
          	<option value='KR'>Korea, Republic of</option>
          	<option value='KW'>Kuwait</option>
          	<option value='KG'>Kyrgyzstan</option>
          	<option value='LA'>Lao People's Democratic Republic</option>
          	<option value='LV'>Latvia</option>
          	<option value='LB'>Lebanon</option>
          	<option value='LS'>Lesotho</option>
          	<option value='LR'>Liberia</option>
          	<option value='LY'>Libya</option>
          	<option value='LI'>Liechtenstein</option>
          	<option value='LT'>Lithuania</option>
          	<option value='LU'>Luxembourg</option>
          	<option value='MO'>Macao</option>
          	<option value='MK'>Macedonia, the former Yugoslav Republic of</option>
          	<option value='MG'>Madagascar</option>
          	<option value='MW'>Malawi</option>
          	<option value='MY'>Malaysia</option>
          	<option value='MV'>Maldives</option>
          	<option value='ML'>Mali</option>
          	<option value='MT'>Malta</option>
          	<option value='MH'>Marshall Islands</option>
          	<option value='MQ'>Martinique</option>
          	<option value='MR'>Mauritania</option>
          	<option value='MU'>Mauritius</option>
          	<option value='YT'>Mayotte</option>
          	<option value='MX'>Mexico</option>
          	<option value='FM'>Micronesia, Federated States of</option>
          	<option value='MD'>Moldova, Republic of</option>
          	<option value='MC'>Monaco</option>
          	<option value='MN'>Mongolia</option>
          	<option value='ME'>Montenegro</option>
          	<option value='MS'>Montserrat</option>
          	<option value='MA'>Morocco</option>
          	<option value='MZ'>Mozambique</option>
          	<option value='MM'>Myanmar</option>
          	<option value='NA'>Namibia</option>
          	<option value='NR'>Nauru</option>
          	<option value='NP'>Nepal</option>
          	<option value='NL'>Netherlands</option>
          	<option value='NC'>New Caledonia</option>
          	<option value='NZ'>New Zealand</option>
          	<option value='NI'>Nicaragua</option>
          	<option value='NE'>Niger</option>
          	<option value='NG'>Nigeria</option>
          	<option value='NU'>Niue</option>
          	<option value='NF'>Norfolk Island</option>
          	<option value='MP'>Northern Mariana Islands</option>
          	<option value='NO'>Norway</option>
          	<option value='OM'>Oman</option>
          	<option value='PK'>Pakistan</option>
          	<option value='PW'>Palau</option>
          	<option value='PS'>Palestinian Territory, Occupied</option>
          	<option value='PA'>Panama</option>
          	<option value='PG'>Papua New Guinea</option>
          	<option value='PY'>Paraguay</option>
          	<option value='PE'>Peru</option>
          	<option value='PH'>Philippines</option>
          	<option value='PN'>Pitcairn</option>
          	<option value='PL'>Poland</option>
          	<option value='PT'>Portugal</option>
          	<option value='PR'>Puerto Rico</option>
          	<option value='QA'>Qatar</option>
          	<option value='RE'>Réunion</option>
          	<option value='RO'>Romania</option>
          	<option value='RU'>Russian Federation</option>
          	<option value='RW'>Rwanda</option>
          	<option value='BL'>Saint Barthélemy</option>
          	<option value='SH'>Saint Helena, Ascension and Tristan da Cunha</option>
          	<option value='KN'>Saint Kitts and Nevis</option>
          	<option value='LC'>Saint Lucia</option>
          	<option value='MF'>Saint Martin (French part)</option>
          	<option value='PM'>Saint Pierre and Miquelon</option>
          	<option value='VC'>Saint Vincent and the Grenadines</option>
          	<option value='WS'>Samoa</option>
          	<option value='SM'>San Marino</option>
          	<option value='ST'>Sao Tome and Principe</option>
          	<option value='SA'>Saudi Arabia</option>
          	<option value='SN'>Senegal</option>
          	<option value='RS'>Serbia</option>
          	<option value='SC'>Seychelles</option>
          	<option value='SL'>Sierra Leone</option>
          	<option value='SG'>Singapore</option>
          	<option value='SX'>Sint Maarten (Dutch part)</option>
          	<option value='SK'>Slovakia</option>
          	<option value='SI'>Slovenia</option>
          	<option value='SB'>Solomon Islands</option>
          	<option value='SO'>Somalia</option>
          	<option value='ZA'>South Africa</option>
          	<option value='GS'>South Georgia and the South Sandwich Islands</option>
          	<option value='SS'>South Sudan</option>
          	<option value='ES'>Spain</option>
          	<option value='LK'>Sri Lanka</option>
          	<option value='SD'>Sudan</option>
          	<option value='SR'>Suriname</option>
          	<option value='SJ'>Svalbard and Jan Mayen</option>
          	<option value='SZ'>Swaziland</option>
          	<option value='SE'>Sweden</option>
          	<option value='CH'>Switzerland</option>
          	<option value='SY'>Syrian Arab Republic</option>
          	<option value='TW'>Taiwan, Province of China</option>
          	<option value='TJ'>Tajikistan</option>
          	<option value='TZ'>Tanzania, United Republic of</option>
          	<option value='TH'>Thailand</option>
          	<option value='TL'>Timor-Leste</option>
          	<option value='TG'>Togo</option>
          	<option value='TK'>Tokelau</option>
          	<option value='TO'>Tonga</option>
          	<option value='TT'>Trinidad and Tobago</option>
          	<option value='TN'>Tunisia</option>
          	<option value='TR'>Turkey</option>
          	<option value='TM'>Turkmenistan</option>
          	<option value='TC'>Turks and Caicos Islands</option>
          	<option value='TV'>Tuvalu</option>
          	<option value='UG'>Uganda</option>
          	<option value='UA'>Ukraine</option>
          	<option value='AE'>United Arab Emirates</option>
          	<option value='GB'>United Kingdom</option>
          	<option value='US'>United States</option>
          	<option value='UM'>United States Minor Outlying Islands</option>
          	<option value='UY'>Uruguay</option>
          	<option value='UZ'>Uzbekistan</option>
          	<option value='VU'>Vanuatu</option>
          	<option value='VE'>Venezuela, Bolivarian Republic of</option>
          	<option value='VN'>Viet Nam</option>
          	<option value='VG'>Virgin Islands, British</option>
          	<option value='VI'>Virgin Islands, U.S.</option>
          	<option value='WF'>Wallis and Futuna</option>
          	<option value='EH'>Western Sahara</option>
          	<option value='YE'>Yemen</option>
          	<option value='ZM'>Zambia</option>
          	<option value='ZW'>Zimbabwe</option>
          </select> <br />

        <div id='intUser'>
          <label for='visaExpiryDate'>Visa Expiry Date</label> <br />
          <input type='date' id='visaExpiryDate' name='visaExpires' /> <br />

          <label for='passportNum'>Passport Number</label> <br />
          <input type='text' id='passportNum' name='passportNum' /> <br />
        </div>

        <label for='phoneNumber'>Phone Number</label> <br />
        <input type='text' id='phoneNumber' name='phoneNum' onkeyup='numbersOnly(this);' required /> <br />

        <label for='dateOfBirth'>Date of Birth</label> <br />
        <input type='date' id='dateOfBirth' min='1913-01-01' name='dob' required /> <br />
        <span class='validity'></span>

        <label for='email'>Email Address</label> <br />
        <input type='text' id='email' name='emailAdd' required /> <br />

        <label for='confirmE'>Confirm Email</label> <br />
        <input type='text' id='confirmE' name='cEmail' required /> <br />

        <label for='password'>Password</label> <br />
        <input type='password' id='password' name='password' required /> <br />

        <label for='confirmP'>Confirm Password</label> <br />
        <input type='password' id='confirmP' name='cPassword' required /> <br />

        <label for='todaysDate'>Date of Registration</label> <br />
        <p id='todaysDate'></p>
        <!-- Get the current date using JavaScript. -->
        <script type='text/javascript'>
          var dt = new Date();
          y = dt.getFullYear();
          m = dt.getMonth() + 1;
          if (m < 10)
          {
            m = '0' + m;
          }
          d = dt.getDate();
          if (d < 10)
          {
            d = '0' + d;
          }
          document.getElementById('todaysDate').innerHTML = y + '-' + m + '-' + d;
        </script>

        <label for='type'>Administrator/Tutor/Student</label> <br />
          <select id='type' name='type' onchange='check(this);' required>
            <option value=''>Select an option...</option>
            <option value='admin'>Administrator</option>
            <option value='tutor'>Tutor</option>
            <option value='student'>Student</option>
          </select> <br />

        <div class='hidden' id='admin'>
          <input type='checkbox' id='adminRights' name='agreedToRights' />
            <label for='adminRights'>I agree that I should use administrator rights in a responsible manner, and comply with
            the regulations for administrators used by Ace Training.</label> <br />
        </div>

        <div class='hidden' id='nextOfKin'>
          <label for='nokForename'>Next of Kin Forename</label> <br />
          <input type='text' id='nokForename' name='nokForename' /> <br />

          <label for='nokSurname'>Next of Kin Surname</label> <br />
          <input type='text' id='nokSurname' name='nokSurname' /> <br />

          <label for='nokRelationship'>Next of Kin Relationship</label> <br />
          <select id='nokRelationship' name='nokRelationship'>
            <option value=''>How are they related to you?</option>
            <option value='spouse'>Spouse</option>
            <option value='child'>Child</option>
            <option value='parentGuardian'>Parent/Guardian</option>
            <option value='sibling'>Sibling</option>
            <option value='grandchild'>Grandchild</option>
            <option value='grandparent'>Grandparent</option>
            <option value='nieceNephew'>Niece/Nephew</option>
            <option value='auntUncle'>Aunt/Uncle</option>
            <option value='cousin'>Cousin</option>
          </select><br />

          <label for='daytimeNumber'>Daytime Number</label> <br />
          <input type='text' id='daytimeNumber' name='nokDaytimeTel' onkeyup='numbersOnly(this);' /> <br />

          <label for='eveningNumber'>Evening Number</label> <br />
          <input type='text' id='eveningNumber' name='nokEveningTel' onkeyup='numbersOnly(this);' /> <br />

          <label for='mobileNumber'>Mobile Number</label> <br />
          <input type='text' id='mobileNumber' name='nokMobile' onkeyup='numbersOnly(this);' /> <br />
        </div>

        <div class='hidden' id='tutor'>
          <label for='niNumber'>National Insurance Number</label> <br />
          <input type='text' id='niNumber' name='nINumber' onkeyup='niExpression(this);' /> <br />

          <label for='office'>Office Address</label> <br />
          <div id='office'>
            <input type='text' id='officeAddL1' name='offAddLine1' placeholder='Office number or property name' /> <br />
            <input type='text' id='officeAddL2' name='offAddLine2' placeholder='Business park or street'/> <br />
            <input type='text' id='officeTown' name='offTown' placeholder='Town (optional)' /> <br />
            <input type='text' id='officeCounty' name='offCounty' placeholder='State/County' /> <br />
          </div>

          <label for='officePostcode'>Office Postcode</label> <br />
          <input type='text' id='officePostcode' name='offPostcode' /> <br />

          <input type='checkbox' id='tutorRights' name='agreedToRights' />
            <label for='tutorRights'>I agree that I should use tutor rights in a responsible manner, and comply with
            the regulations for tutors used by Ace Training.</label> <br />
        </div>

        <div class='hidden' id='student'>
          <input type='checkbox' id='studentRights' name='agreedToRights' />
            <label for='studentRights'>I agree that I should use student rights in a responsible manner, and comply with
            the regulations for students used by Ace Training.</label> <br />
        </div>

        <input type='checkbox' id='policies' value='policies' required />
          <label for='policies'>I have read and agreed to the <a href='termsOfService.php'>Terms of Service</a> and
          <a href='privacyPolicy.php'>Privacy Policy</a> of Ace Training.</label> <br />

        <button class='submit' type='submit' name='submit'>
					<i class='material-icons'>done</i>
				</button>
				<label>Submit</label>
				<button class='clear' type='reset' name='clear'>
					<i class='material-icons'>clear</i>
				</button>
				<label>Clear</label>
      </form>
    ");
  }

  function addUserToDatabase()
  {
    $fn = $_POST['forename'];
    $sn = $_POST['surname'];
    $gn = $_POST['gender'];
    $a1 = $_POST['addLine1'];
    $a2 = $_POST['addLine2'];
    $tw = $_POST['town'];
    $cy = $_POST['county'];
    $ve = $_POST['visaExpires'];
    $pn = $_POST['passportNum'];
    $pc = $_POST['postcode'];
    $cr = $_POST['country'];
    $ph = $_POST['phoneNum'];
    $db = $_POST['dob'];
    $em = $_POST['emailAdd'];
    $pw = $_POST['password'];
    $rg = Date("Y-m-d"); // $rg = date of registation.
    $tp = $_POST['type'];
    $nf = $_POST['nokForename'];
    $ns = $_POST['nokSurname'];
    $nr = $_POST['nokRelationship'];
    $nd = $_POST['nokDaytimeTel'];
    $ne = $_POST['nokEveningTel'];
    $nm = $_POST['nokMobile'];
    $ni = $_POST['nINumber'];
    $o1 = $_POST['offAddLine1'];
    $o2 = $_POST['offAddLine2'];
    $ot = $_POST['offTown'];
    $oc = $_POST['offCounty'];
    $op = $_POST['offPostcode'];

    $auth = 0;
    if ($tp == "admin")
    {
      $auth = 1;
    }

    $conn = mysqli_connect("localhost","root","root","aceDatabase") or die(mysql_error());
    $sql = "INSERT INTO user(userForename, userSurname, userGender, userAddressL1, userAddressL2,
      userTown, userCounty, userPostcode, userCountry, userVisaExpiryDate, userPassportNum, userPhone,
      userDateOfBirth, userEmail, userPassword, userRegDate, userType, userActive, nokForename, nokSurname,
      nokRelationship, nokDaytimeTel, nokEveningTel, nokMobile, tutorNINumber, tutorOfficeAddressL1,
      tutorOfficeAddressL2, tutorOfficeTown, tutorOfficeCounty, tutorOfficePostcode, agreedToRights,
      authorised)
		  VALUES('$fn', '$sn', '$gn', '$a1', '$a2', '$tw', '$cy', '$pc', '$cr', '$ve', '$pn', '$ph', '$db', '$em',
        '$pw', '$rg', '$tp', 0, '$nf', '$ns', '$nr', '$nd', '$ne', '$nm', '$ni', '$o1', '$o2', '$ot', '$oc',
        '$op', 1, $auth)";

    if (mysqli_query($conn, $sql))
		{
			echo ("<p style='color: green'>SUCCESS</p>");
		}
		else
		{
			echo ("<p style='color: red'>FAIL: ");
			echo (mysqli_error($conn) . "</p>");
		}
  }
?>
