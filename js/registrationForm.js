// DISPLAYING HIDDEN INPUTS:
// This will use JQuery to automatically display and set required fields, depending
// on options chosen in each select tag in the registration form.

// Inputs specific to international users:
$('#country').change(function()
{
  if ($(this).val() != "GB" && $(this).val() != "") // If, when set, the value of country equates to a country outside the UK:
  {
    // Show additional options for international users.
    // Require the visa expiry date and passport number.
    $("#intUser").show();
    $("#visaExpiryDate").attr("required", true);
    $("#passportNum").attr("required", true);
  }
  else
  {
    $("#intUser").hide();
    $("#visaExpiryDate").removeAttr("required", true);
    $("#passportNum").removeAttr("required", true);
  }
});

// Inputs specific to user types:
$("#type").change(function()
{
  // Display administrator-specific forms.
  $(this).val() == "admin" ? $("#admin").show() : $("#admin").hide();
  $(this).val() == "admin" ? $("#adminRights").attr("required", true) : $("#adminRights").removeAttr("required", true);

  // Display tutor-specific forms.
  $(this).val() == "tutor" ? $("#tutor").show() : $("#tutor").hide();
  $(this).val() == "tutor" ? $("#niNumber").attr("required", true) : $("#niNumber").removeAttr("required", true);
  $(this).val() == "tutor" ? $("#officeAddL1").attr("required", true) : $("#officeAddL1").removeAttr("required", true);
  $(this).val() == "tutor" ? $("#officeAddL2").attr("required", true) : $("#officeAddL2").removeAttr("required", true);
  $(this).val() == "tutor" ? $("#officeCounty").attr("required", true) : $("#officeCounty").removeAttr("required", true);
  $(this).val() == "tutor" ? $("#officePostcode").attr("required", true) : $("#officePostcode").removeAttr("required", true);
  $(this).val() == "tutor" ? $("#tutorRights").attr("required", true) : $("#tutorRights").removeAttr("required", true);

  // Display student-specific forms.
  $(this).val() == "student" ? $("#student").show() : $("#student").hide();
  $(this).val() == "student" ? $("#studentRights").attr("required", true) : $("#studentRights").removeAttr("required", true);

  // Display next of kin forms.
  $(this).val() == "tutor" || $(this).val() == "student" ? $("#nextOfKin").show() : $("#nextOfKin").hide();
  $(this).val() == "tutor" || $(this).val() == "student" ? $("#nokForename").attr("required", true) : $("#nokForename").removeAttr("required", true);
  $(this).val() == "tutor" || $(this).val() == "student" ? $("#nokSurname").attr("required", true) : $("#nokSurname").removeAttr("required", true);
  $(this).val() == "tutor" || $(this).val() == "student" ? $("#nokRelationship").attr("required", true) : $("#nokRelationship").removeAttr("required", true);
  $(this).val() == "tutor" || $(this).val() == "student" ? $("#nokDaytimeTel").attr("required", true) : $("#nokDaytimeTel").removeAttr("required", true);
  $(this).val() == "tutor" || $(this).val() == "student" ? $("#nokEveningTel").attr("required", true) : $("#nokEveningTel").removeAttr("required", true);
  $(this).val() == "tutor" || $(this).val() == "student" ? $("#nokMobile").attr("required", true) : $("#nokMobile").removeAttr("required", true);
});
