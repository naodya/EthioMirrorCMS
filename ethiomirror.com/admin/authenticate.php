<?php
session_start(); 

if (isset($_POST['txtusername']) && isset($_POST['txtpassword'])) 
{
	include ('class/dataaccess.php');
	
	$username = $_POST['txtusername'];
	$password = $_POST['txtpassword'];
   
  	$sql = "SELECT * FROM users WHERE username = '$username' AND password = MD5('$password') AND active=1";

	$result = mysql_query($sql); 
	$row=mysql_fetch_array($result);

	$id=$row['id'];
	$username=$row['username'];
	$fullname=$row['fullname'];
	$isadmin=$row['isadmin'];
	
	

	if (mysql_num_rows($result) > 0) 
	{

		$_SESSION['id'] = $id;
		$_SESSION['valid_user']=$username;
		$_SESSION['fullname']=$fullname;
		$_SESSION['isadmin']=$isadmin;
		
		if($isadmin==1)
			header ('Location:controlpannel.php?msg='.$fullname);
		else if($isadmin==0)
			header ('Location:user_controlpannel.php?msg='.$fullname);
	} 
	else 
	{
		header('Location:login.php?ermsg=Sorry, wrong username and or password');
		exit;
		
		if (isset($_SESSION['valid_user']))
		
			 unset($_SESSION['valid_user']);
			 unset($_SESSION['fullname']);
			 unset($_SESSION['id']);
			 unset($_SESSION['isadmin']);
	}
}

?>