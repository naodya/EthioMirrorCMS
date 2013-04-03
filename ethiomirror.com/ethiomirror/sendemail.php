<?php

if($_REQUEST['action']=='send')
{
	$url=$_POST['hidurl'];
	$to=$_POST['txtto'];
	$fromname=$_POST['txtfromname'];
	$fromemail=$_POST['txtfromemail'];
	$usermessage=$_POST['txtmessage'];
	$message='
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
	<style type="text/css">
	<!--
	.style1 {
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;
	}
	.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}
	-->
	</style>
	</head>
	
	<body>
	<p class="style1">'.$usermessage.'</p>
	<p class="style1">'.$fromname.' has sent you the following news from <a href="http://ethiomirror.com">ethiomirror.com</a>. Please click on the link below:</p>
	<p class="style1"><a href="'.$url.'"  target="_blank">'.$url.'</a></p>
	<p class="style1">Regards,</p>
	<p class="style1"><a href="http://ethiomirror.com">Ethiomirror</a> </p>
	</body>
	</html>
	';
	
	/*basic mail settings */ 
	$subject  = $fromname." has sent you Ethiomirror news"; 
	$headers  = "MIME-Version: 1.0;\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1;\n"; 
	
	/* additional headers */ 
	$headers .= "To: ;\n"; 
	$headers .= "From: ".$fromname." <".$fromemail.">;\n"; 
	$headers .= "Cc: ;\n"; 
	$headers .= "Bcc: ;\n"; 
	

	/* and now mail it */ 
	mail($to, $subject, $message, $headers);
  	echo "<script>window.close()</script>";

}


?>
