<?php

  // Check for Submission
  if (isset($_POST['submit']))
  {
    // Get form data.
    $fn = $_POST['forename']; // $fn = Forename
    $sn = $_POST['surname']; // $sn = Surname
    $em = $_POST['email']; // $em = Email
    $ce = $_POST['confirm']; // $ce = Confirm email
    $sj = $_POST['subject']; // $sj = Subject
    $cm = $_POST['comment']; // $cm = Comment

    // Create a variable that sends a message to a customer information
    // account.
    $sendTo = "info@ace.com";
    $sentFrom = "From: " . $em;
    $txt = "You have received an email from " . $fn . " " . $sn . ".\n\n" . $cm;

    // Activate a function that sends the email.
    sendMail($sendTo, $subject, $txt, $sentFrom);
    header("Location: index.php?mailsend");
  }
?>
