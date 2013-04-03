<?php
session_start();
require_once('includes/wdg/WDG.php');

	
	include('class/dataaccess.php');
	include('class/category.php');
	include('class/section.php');
	include('class/news.php');
	
	$category=new Category();
	$section=new Section();
	$news=new News();
	
	
	if (isset($_SESSION['valid_user']))
	{
		$fullname = $HTTP_SESSION_VARS['fullname'];
	}
	else
	  	echo "<script>window.location.href='login.php?ermsg=Please login first'</script>";
	  
 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wdg="http://ns.adobe.com/addt">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Content management ::: Ethiomirror ::: Settings</title>
<style type="text/css">
<!--
.style11 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12pt;
	text-align: justify;
	font-weight: bold;
	color: #FFFFFF;
}
#apDiv1 {
	position:absolute;
	left:236px;
	top:59px;
	width:512px;
	height:122px;
	z-index:1;
}
#apDiv2 {
	position:absolute;
	left:309px;
	top:305px;
	width:363px;
	height:174px;
	z-index:1;
}
.style18 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 9px;
}
.style19 {font-size: 12px; color: #859AD3;}
.style21 {font-size: 12pt; text-align: justify; color: #FFFFFF; font-family: Verdana, Arial, Helvetica, sans-serif;}
.style22 {
	color: #666666;
	font-size: 12px;
}
a {
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
.style23 {font-size: 10px}
.style26 {font-size: 9px}
.style27 {font-size: 12px; font-family: Verdana, Arial, Helvetica, sans-serif; }
.tableboarder {
	border: 100% dashed #999999;
}
-->
</style>
<script type="text/javascript" src="includes/common/js/sigslot_core.js"></script>
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script type="text/javascript" src="includes/wdg/classes/MXWidgets.js"></script>
<script type="text/javascript" src="includes/wdg/classes/MXWidgets.js.php"></script>
<script type="text/javascript" src="includes/wdg/classes/Calendar.js"></script>
<script type="text/javascript" src="includes/wdg/classes/SmartDate.js"></script>
<script type="text/javascript" src="includes/wdg/calendar/calendar_stripped.js"></script>
<script type="text/javascript" src="includes/wdg/calendar/calendar-setup_stripped.js"></script>
<script src="includes/resources/calendar.js"></script>
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<style type="text/css">
<!--
.style33 {font-size: 12px; font-weight: bold; }
.style38 {font-size: small}
.style8 {font-family: tahoma}
.style28 {color: #666666}
.style29 {font-size: 12px; font-family: Verdana, Arial, Helvetica, sans-serif; color: #666666; }
-->
</style>
<script language="JavaScript" type="text/JavaScript">

</script>
</head>

<body>
<table width="100%" height="644" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="122" colspan="2" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="19" align="left"><table width="50%" height="21" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="7%"><strong><span class="style11"><span class="style19">Welcome </span></span></strong></td>
                  <td width="8%">&nbsp;</td>
                  <td width="85%" align="left"><span class="style21"><span class="style22"> <?php echo $fullname;?></span></span></td>
                </tr>
              </table></td>
              <td align="right"><table width="200" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="123" align="right"><span class="style18 style26"><a href="logout.php">LOGOUT</a></span></td>
                    <td width="20" align="center"><span class="style18 style23">|</span></td>
                    <td width="57" align="right"><span class="style18 style26"><a href="settings.php">SETTINGS</a></span></td>
                  </tr>
                </table></td>
            </tr>
            <tr>
              <td height="122" colspan="2" align="center" background="images/banner_bg.jpg"><img src="images/banner.jpg" width="512" height="122" /></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td width="73%" height="18" align="left">&nbsp;</td>
        <td width="27%" align="right"><span class="style27"><?php echo date('jS F, Y');?></span></td>
        </tr>
      <tr>
        <td height="135" colspan="2" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="14%" rowspan="2" valign="top"><?php 
			if($_SESSION['isadmin']==1)
				include('menu.php');
            else
            	include('usermenu.php');?>              &nbsp;</td>
            <td height="134">&nbsp;</td>
            <td valign="top"><table width="100%"  border="0" cellpadding="0" cellspacing="0">
              <tr bgcolor="#CB9F94">
                <td bgcolor="#B7C7F8"><div align="center"><span class="style11">User Settings</span></div></td>
              </tr>
              <tr>
                <td align="left" valign="bottom" class="style8"><table width="560" height="260"  border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="311" valign="middle">&nbsp;</td>
                    <td width="249" align="right" valign="middle">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="34" colspan="2" align="left" valign="middle"><span class="style27">Change your password </span>
                        <hr noshade="noshade" /></td>
                  </tr>
                  <tr class="style14">
                    <td height="34" colspan="2" align="left" valign="middle"><span class="style7">
                      <?php $ermsg=$_REQUEST['ermsg']; echo '<p><h5><font color="#ff0000">'.$ermsg.'</font></h5> </font>';?>
                      <?php $msg=$_REQUEST['msg']; echo '<p><h5><font color="#2d97d5">'.$msg.'</font></h5> </font>';?>
                    </span> </td>
                  </tr>
                  <tr>
                    <td height="171" colspan="2" align="left" valign="middle"><form action="settings.php?execute=yes" method="post" enctype="multipart/form-data" name="form1" id="form1">
                        <table width="409" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#EFEBEF">
                          <tr>
                            <td width="405" height="114"><table width="100%" height="84" 
											  border="0" align="center" cellpadding="0" cellspacing="4" class="style14" id="AutoNumber" style="BORDER-COLLAPSE: collapse">
                                <tr class="style1">
                                  <td width="31%" height="16" align="left" class="style22" ><p class="style27">Old Password </p></td>
                                  <td width="69%" ><span class="style16copy">
                                    <input name="txtoldpassword" type="password" id="txtoldpassword" />
                                  </span></td>
                                </tr>
                                <tr class="style1">
                                  <td height="16" align="left" class="style27 style28" >New Password </td>
                                  <td ><input name="txtnewpassword" type="password" id="txtnewpassword" />                                  </td>
                                </tr>
                                <tr class="style1">
                                  <td height="16" align="left" class="style29" >Confirm Password </td>
                                  <td ><input name="txtconfirmpassword" type="password" id="txtconfirmpassword" />                                  </td>
                                </tr>
                                <tr class="style1">
                                  <td height="16" colspan="2" ><div align="center">
                                      <input name="Submit" type="submit" class="style19" value="Change Password" />
                                  </div></td>
                                </tr>
                            </table></td>
                          </tr>
                        </table>
                    </form>
                        <?php 

							$oldpassword=$_POST['txtoldpassword'];
							$newpassword=$_POST['txtnewpassword'];
							$confirmpassword=$_POST['txtconfirmpassword'];
							
							$sql="SELECT * FROM users WHERE PASSWORD = MD5('$oldpassword') AND fullname ='$fullname'";
							$result=mysql_query($sql);
							$numrows=mysql_num_rows($result);

						if($_REQUEST['execute']=="yes")
						{
							if($numrows>0)
							{	
								$row=mysql_fetch_array($result);
								$id=$row['id'];
							
							
								if ($newpassword==$confirmpassword)
								{
									if (!empty($newpassword)&&!empty($confirmpassword))
									{
										$sql1="UPDATE users SET password=MD5('$newpassword') WHERE id='$id'";
										mysql_query($sql1);
	
										echo "<script>window.location.href='settings.php?ermsg=Password changed successfuly'</script>";

									}
									else
										echo "<script>window.location.href='settings.php?ermsg=Missing fields to complete password change'</script>";

								}
								else
								{
									echo "<script>window.location.href='settings.php?ermsg=Password confirmation incorrect'</script>";


								}
								
							
							}
							else
							{
								echo "<script>window.location.href='settings.php?ermsg=Invalid old password'</script>";

							}
						}

					  

				 
				 ?>
                      &nbsp;
                      </p></td>
                  </tr>
                </table>
                  <br />
                  <br /></td>
              </tr>

            </table></td>
          </tr>
          <tr>
            <td width="1%" height="134">&nbsp;</td>
            <td width="85%" valign="top">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
