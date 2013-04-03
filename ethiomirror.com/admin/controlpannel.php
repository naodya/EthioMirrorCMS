<?php
	session_start();
	include('class/includes/dbconnect.php');
	
	if (isset($_SESSION['valid_user']) && $_SESSION['isadmin']==1)
	{
		$fullname = $HTTP_SESSION_VARS['fullname'];
	}
	else
	  	echo "<script>window.location.href='login.php?ermsg=You do not have permission to access this page'</script>";
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Content management ::: Ethiomirror ::: Control panel</title>
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
.style24 {font-size: 12px; }
.style26 {font-size: 9px}
.style27 {font-size: 12px; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style1 {color: #575757;
	font-size: 12px;
	font-family: tahoma;
	font-weight: bold;
}
.style10 {	color: #666666;
	font-size: 12px;
	font-family: tahoma;
}
.style16 {	color: #91a2b7;
	font-size: 9px;
	font-family: tahoma;
}
.style28 {color: #FF0000}
.style33 {font-size: 12px; font-weight: bold; }
.style40 {font-size: 12px; font-weight: bold; color: #0066FF; }
.style8 {font-family: tahoma}
.tableboarder {	border: 100% dashed #999999;
}
-->
</style>
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
            <td width="14%" height="134" valign="top">
			<?php 
				if($_SESSION['isadmin']==1)
					include('menu.php');
				else if($_SESSION['isadmin']==0)
					include('usermenu.php');
			?>&nbsp;</td>
            <td width="1%">&nbsp;</td>
            <td width="85%" align="center"><table width="100%"  border="0" cellpadding="0" cellspacing="0">
              <tr bgcolor="#CB9F94">
                <td bgcolor="#B7C7F8"><div align="center"><span class="style11">Control panel</span></div></td>
              </tr>
              <tr>
                <td align="left" valign="bottom" class="style8">&nbsp;</td>
              </tr>
              <tr>
                <td align="center" valign="top" bgcolor="#FFFFFF" class="style8"><table width="63%"  border="0" cellpadding="0" cellspacing="0">

                        <tr>
                          <td width="25%" align="center" valign="middle"><a href="newsdesk.php?currentdate=<?php echo date('Y-m-d');?>"><img src="images/new-folder copy.jpg" alt="Add news" width="64" height="64" border="0" /></a></td>
                          <td width="25%" align="center"><a href="news.php"><img src="images/copy copy.jpg" alt="Published news" width="64" height="64" border="0" /></a></td>
                          <td width="25%" align="center"><a href="draftnews.php"><img src="images/edit copy.jpg" alt="Draft news" width="64" height="64" border="0" longdesc="draftnews.php" /></a></td>
                          <td width="25%" align="center"><a href="archive.php"><img src="images/folder copy.jpg" alt="Archived news" width="64" height="64" border="0" longdesc="archive.php" /></a></td>
                        </tr>
                        <tr>
                          <td align="center"><a href="newsdesk.php?currentdate=<?php echo date('Y-m-d');?>">Add news</a></td>
                          <td align="center"><a href="news.php">Published news</a></td>
                          <td align="center"><a href="draftnews.php">Draft news</a></td>
                          <td><div align="center"><a href="archive.php">Archived news</a></div></td>
                        </tr>
                        <tr>
                          <td align="center">&nbsp;</td>
                          <td align="center">&nbsp;</td>
                          <td align="center">&nbsp;</td>
                          <td align="center">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="center"><a href="categories.php"><img src="images/grafle copy.jpg" alt="Categories" width="64" height="64" border="0" longdesc="categories.php" /></a></td>
                          <td align="center"><a href="subcategories.php"><img src="images/copyy copy.jpg" alt="Subcategories" width="64" height="64" border="0" /></a></td>
                          <td align="center"><a href="sections.php"><img src="images/AlienAqua firewall copy.jpg" alt="Sections" width="64" height="64" border="0" /></a></td>
                          <td align="center"><a href="blogs.php"><img src="images/open-folder copy.jpg" alt="Blogs" width="64" height="64" border="0" /></a></td>
                        </tr>
                        <tr>
                          <td align="center"><a href="categories.php">Categories</a></td>
                          <td align="center"><a href="categories.php">Sub categories</a></td>
                          <td align="center"><a href="sections.php">Sections</a></td>
                          <td align="center"><a href="blogs.php">Blogs</a></td>
                        </tr>
                        <tr>
                          <td align="center">&nbsp;</td>
                          <td align="center">&nbsp;</td>
                          <td align="center">&nbsp;</td>
                          <td align="center">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="center"><a href="othermedialinks.php"><img src="images/connect copy.jpg" alt="Other media links" width="64" height="64" border="0" /></a></td>
                          <td align="center"><a href="reporters.php"><img src="images/announce copy.jpg" alt="Reporters" width="64" height="64" border="0" /></a></td>
                          <td align="center"><a href="users.php"><img src="images/uses copy.jpg" alt="Users" width="64" height="64" border="0" /></a></td>
                          <td align="center"><a href="settings.php"><img src="images/config copy.jpg" alt="Settings" width="64" height="64" border="0" /></a></td>
                        </tr>
                        <tr>
                          <td align="center"><a href="othermedialinks.php">Other links</a></td>
                          <td align="center"><a href="reporters.php">Reporters</a></td>
                          <td align="center"><a href="users.php">Users</a></td>
                          <td align="center"><a href="settings.php">Settings</a></td>
                        </tr>
                        <tr>
                          <td align="center">&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="center"><a href="../ethiomirror/index.php" target="_blank"><img src="images/home copy.jpg" alt="Home" width="64" height="64" border="0" /></a></td>
                          <td align="center"><a href="logout.php"><img src="images/front copy.jpg" alt="Logout" width="64" height="64" border="0" /></a></td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="center"><a href="../ethiomirror/index.php" target="_blank">Home</a></td>
                          <td align="center"><a href="logout.php">Logout</a></td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                      </table>
                    <br /></td></tr>
              <tr>
                <td align="left" valign="bottom" bgcolor="f2f2f2" class="style8">&nbsp;</td>
              </tr>
            </table>
              </td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
