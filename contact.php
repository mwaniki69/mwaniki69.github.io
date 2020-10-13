<?php
     /* You should set your timezone. */

    $first_name		=	$_POST['first_name'];
    $last_name		=	$_POST['last_name'];
    $email			=	$_POST['email'];
    $phone			=	$_POST['phone'];

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

	 

	    $from		=	"From: $first_name $last_name<$email>\r\nReturn-path: $email";
	   
        $subject	=	"Premium Service Order From: $last_name";
		
		
        $message	=	"
------
Name:    $first_name $last_name\r
Email:   $email\r
Phone:   $phone\r
package: $packages\r
premium add-ons:  $addons\r
        				";       

		mail("annerturner27@gmail.com", $subject, $message, $from);  // This one goes to ME.        

		header("Location: index.html");
	    
    
?>
