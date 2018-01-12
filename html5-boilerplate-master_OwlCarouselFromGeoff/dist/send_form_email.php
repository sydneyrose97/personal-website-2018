<html>
	<head>
		<title>Sydney Lynn Designs</title>
		<link rel="stylesheet" href="Personal-website.css" type="text/css" media="all" />
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		
		<script src="https://use.typekit.net/iia3ofr.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
		
		<script>
		function goToByScroll(id){
     			$('html,body').animate({scrollTop: $("#"+id).offset().top -50},'slow');
		}
	</script>
		
	</head>

<body>
	<section="php-wrapper">
<?php
	
 
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "hello@sydneylynndesigns.com";
 
    $email_subject = "Hello!";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "<br /><br /><h4>We are very sorry, but there were error(s) found with the form you submitted.</h4>";
 
        echo $error."<br /><br />";
 
        echo "<h4 class=\"smaller\">Please go back and fix these errors.</h4><br /><br />";
        
                echo "<a href=\"index.html\" id=\"return-button\">Return to form</a><br /><br />";

 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['first_name']) ||
 
 
        !isset($_POST['email']) ||
 
 
        !isset($_POST['comments'])) {
 
        died('<br /><br /><h4 class=\"smaller\">We are sorry, but there appears to be a problem with the form you submitted.</h4>');       
 
    }
 
     
 
    $first_name = $_POST['first_name']; // required
 
 
    $email_from = $_POST['email']; // required
 
 
    $comments = $_POST['comments']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= '<br /><br /><h4 class="smaller">The email address you entered does not appear to be valid.</h4>';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= '<br /><br /><h4 class="smaller">The First Name you entered does not appear to be valid.</h4><br />';
 
  }
 
 
 
  if(strlen($comments) < 2) {
 
    $error_message .= '<br /><br /><h4 class="smaller">The Comments you entered do not appear to be valid.</h4><br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
 
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
 
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
	
 
 
 
<!-- include your own success html here -->
 
 
<h2 class="php-h2">Thanks contacting me! I'll get back to you soon!
	<br> - Sydney
</h2>
 
 </section="php-wrapper">
</body>
 
<?php
 
}
 
?>
</html>
