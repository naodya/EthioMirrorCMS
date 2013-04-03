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
<title>Content management ::: Ethiomirror ::: Archived news</title>
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
.style40 {font-size: 12px; font-weight: bold; color: #0066FF; }
-->
</style>
<script language="JavaScript" type="text/JavaScript">
function confirmDelete(delUrl)
{
  if (confirm("Are you sure you want to Remove the news from the website?"))
  {
    document.location = delUrl;
  }
}
</script>
</head>
<?php 

if($_REQUEST['action']=="archive")
{
	$news=new News();
	
	$news->id=$_REQUEST['id'];
	$news->archiveNews();
}

?>
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
                <td bgcolor="#B7C7F8"><div align="center"><span class="style11">News archive</span></div></td>
              </tr>
              <tr>
                <td align="left" valign="bottom" class="style8"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableboarder">
                    <tr>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      </tr>
                    <tr>
                      <td width="11%" height="28" align="left"><span class="style40">Date Posted</span></td>
                      <td width="38%" align="left"><span class="style40">Headline</span></td>
                      <td width="13%" align="left" class="style40"><span class="style33">Category</span></td>
                      <td width="17%" align="left" class="style40"><span class="style33">Reported by</span></td>
                      </tr>
					<?php $news->getArchivedNews();?>
                </table>
                  <br />
                  <br /></td>
              </tr>

              
              <tr bgcolor="f2f2f2">
                <td height="19" align="left" bgcolor="f2f2f2">&nbsp;</td>
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
