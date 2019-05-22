<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "ryanb2340@gmail.com";
    $email_subject = "New Beauty State Request";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['fname']) ||
        !isset($_POST['lname']) ||
        !isset($_POST['email']) ||
        !isset($_POST['phone'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $fname = $_POST['fname']; // required
    $lname = $_POST['lname']; // required
    $email_from = $_POST['email']; // required
    $phone = $_POST['phone']; // not required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$fname)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  
  if(!preg_match($string_exp,$lname)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
   
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "First Name: ".clean_string($fname)."\n";
    $email_message .= "Last Name: ".clean_string($lname)."\n";
    $email_message .= "Email Address: ".clean_string($email_from)."\n";
    $email_message .= "Phone: ".clean_string($phone)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>BeautyState by SQ</title>
		<meta name="title" content="" />
        <meta name="robots" content="noodp">
        <link rel="canonical" href="https://www.beautystatebysq.com/">
        <link rel="shortlink" href="https://www.beautystatebysq.com/">
        <meta property="og:locale" content="en_US">
		<meta property="og:type" content="website">
		<meta property="og:title" content="BeautyState by SQ">
		<meta property="og:description" content="">
		<meta property="og:url" content="https://www.beautystatebysq.com/">
		<meta property="og:site_name" content="BeautyState by SQ">
	    <meta name="author" content="Boxy" />
	    
	    <!-- Favicons -->
	    <link rel="apple-touch-icon" sizes="180x180" href="../favicons/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="../favicons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="../favicons/favicon-16x16.png">
		<link rel="manifest" href="../favicons/manifest.json">
		<link rel="mask-icon" href="../favicons/safari-pinned-tab.svg" color="#333333">
		<meta name="theme-color" content="#ffffff">
		
		<!-- Bootstrap core CSS -->
		<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Great+Vibes|Montserrat:300" rel="stylesheet">
		<link href="../css/ionicons.min.css" rel="stylesheet">
		<link href="../css/font-awesome.min.css" rel="stylesheet">
		<script src="../js/fontawesome-all.js"></script>
		<script defer src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>
		
		<!-- Custom styles for this template -->
		<link href="../css/simple-sidebar-right.css" rel="stylesheet">
		<link href="../css/main.css" rel="stylesheet">
	</head>

	<body class="bg-thanks animate-in">

    	<!-- Main Top
		============================================================== -->
        <section id="start">
	        <div class="start-container d-flex flew-row align-items-center">
	            <div class="container-fluid container-fluid-1440">
		            <div class="row justify-content-sm-center">
						<div class="col-md-10 col-lg-8">
				            <div class="caption-box">
				            	<div class="inner-caption box">
						        	<div class="text-center">
										<h2 class="display-4">Thank you!</h2>
										<h3 class="mb-4">We'll be in touch.</h3>
										<a class="btn btn-black" href="/">Go Back</a>
						        	</div>
						        </div>
				            </div>
			            </div>
			        </div>
	            </div>
	        </div>
        </section><!-- #main top close -->
					
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="../js/vendor/popper.min.js"></script>
		<script src="../../dist/js/bootstrap.min.js"></script>
		<script src="../js/main.js"></script>
	</body>
</html>

<?php
 
}
?>