<?php
 

    $first_name		=	$_POST['first_name'];
    $last_name		=	$_POST['last_name'];
    $email			=	$_POST['email'];
    $phone			=	$_POST['phone'];
     $package_type	=	$_POST['package_type'];
    

    $packages = 'No languages selected';  /* This sets this variable if no boxes are checked. */
	if (isset($_POST['packages'])){          /* This builds an array from all those checkboxes. */
	  $packages = implode(',
	  ', $_POST['packages']);  /* This line break will put each item on a new line in the email. */
    }
     
	 

	    $from		=	"From: $first_name $last_name<$email>\r\nReturn-path: $email";
	    $from_noreply	= "no_reply@mycompany.com";
        $subject	=	"Web contact form: $last_name";
		$date 		=	date('m/d/Y - h:i:s A');
		$courtesy 	=	"
Thank you for your interest in contacting My Company.
(Here is a copy of the form you recently sent to us.)
";
        $message	=	"

------
Name: $first_name $last_name\r
Email: $email\r
Phone: $phone\r
Package: $package_type\r";

        $courtesy_message = "$courtesy \r\r $message";

		mail("annerturner27@gmail.com", $subject, $message, $from);  // This one goes to ME.
       // mail($from, $subject, $courtesy_message, $from_noreply);    // This one goes to the guest.
        
        
		header("Location: index.html");
	    
    
?>
