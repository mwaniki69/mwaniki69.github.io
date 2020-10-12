<?php
     /* You should set your timezone. */

    $first_name		=	$_POST['first_name'];
    $last_name		=	$_POST['last_name'];
    $email			=	$_POST['email'];
    $phone			=	$_POST['phone'];

    // $business_type	=	$_POST['business_type'];
    // // $company_name	=	$_POST['company_name'];
    // $business_type	=	$_POST['business_type'];

    // $nda			=	$_POST['nda'];

    $packages = 'No languages selected';  /* This sets this variable if no boxes are checked. */
	if (isset($_POST['packages'])){          /* This builds an array from all those checkboxes. */
	  $packages = implode(',
	  ', $_POST['packages']);  /* This line break will put each item on a new line in the email. */
    }
    $addons = 'No languages selected';  /* This sets this variable if no boxes are checked. */
	if (isset($_POST['addons'])){          /* This builds an array from all those checkboxes. */
	  $packages = implode(',
	  ', $_POST['addons']);  /* This line break will put each item on a new line in the email. */
	}


    if (($first_name=="")||($email=="")||($last_name==""))
        {
		echo "Certain fields are required, please fill <a href=\"\">the form</a> again.";
	    }
    else{
	    $date 		=	date('m/d/Y - h:i:s A');

	    $from		=	"From: $first_name $last_name<$email>\r\nReturn-path: $email";
	    $from_noreply	= "no_reply@mycompany.com";
        $subject	=	"Web contact form: $last_name";
		$date 		=	date('m/d/Y - h:i:s A');
		$courtesy 	=	"
Thank you for your interest in contacting My Company.
(Here is a copy of the form you recently sent to us.)
";
        $message	=	"
Sent:   $date \r
---------------------------------------------------
Name:    $first_name $last_name\r
Company: $company_name\r
Type:    $business_type\r
Email:   $email\r
Phone:   $phone\r
package:\r $packages\r
premium add-ons:     $addons\r


        				";
        $courtesy_message = "$courtesy \r\r $message";

		mail("mwanikimose@gmail.com", $subject, $message, $from);  // This one goes to ME.
        // mail($from, $subject, $courtesy_message, $from_noreply);    // This one goes to the guest.
        

		header("Location: index.html");
	    }
    
?>
