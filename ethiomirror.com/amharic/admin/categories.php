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
	
	
	if (isset($_SESSION['valid_user']) && $_SESSION['isadmin']==1)
	{
		$fullname = $HTTP_SESSION_VARS['fullname'];
	}
	else
	  	echo "<script>window.location.href='login.php?ermsg=You do not have permission to access this page'</script>";
	  
 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wdg="http://ns.adobe.com/addt">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Content management ::: Ethiomirror ::: Categories</title>
<style type="text/css">
<!--
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
<script language="JavaScript" type="text/JavaScript">
function confirmAction(delUrl)
{
  if (confirm("You are about to publish the news do you want to continiue?"))
  {
    document.location = delUrl;
  }
}

function confirmDelete(delUrl)
{
  if (confirm("Are you sure you want remove this category and it's sub categories?"))
  {
    document.location = delUrl;
  }
}

function resetForm()
{

	document.form1.hidcatid.value=0;
	document.form1.txtcategoryname.value="";
	document.form1.txtdescription.value="";
}
</script>

<style type="text/css">
<!--
.style43 {
	font-family: Nyala;
	font-size: 14px;
}
.style51 {font-weight: bold; color: #FFFFFF; text-align: justify;}
.style52 {
	color: #859AD3;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style53 {color: #FFFFFF; text-align: justify;}
.style54 {
	color: #666666;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style55 {color: #333333}
.style56 {color: #969685}
.style57 {color: #0066FF; font-weight: bold;}
.style61 {
	color: #0066FF;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style66 {color: #333333; font-size: 10; }
.style71 {color: #333333; font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style73 {font-weight: bold; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; }
.style75 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; }
body,td,th {
	font-family: Nyala;
}
-->
</style></head>
<?php 



if($_REQUEST['action']=="fetch")
{
	$editcategory=array($_REQUEST['catid'],$_REQUEST['cat'],$_REQUEST['description']);
}
if($_REQUEST['action']=="addnew")
{
	$category->id=$_POST['hidcatid'];
	$category->category=$_POST['txtcategoryname'];
	$category->description=$_POST['txtdescription'];
	
	$category->saveCategory();		
	echo "<script>window.location.href='categories.php'</script>";
}
if($_REQUEST['action']=="remove")
{

	
	$category->id=$_REQUEST['id'];
	
	$category->deletecategory();
	$sql="DELETE FROM subcategory WHERE category = ".$_REQUEST['id'];
	$category->deleteSubcategory1($sql);
	echo "<script>window.location.href='categories.php'</script>";

	
}


?>
<body>
<table width="100%" height="644" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top" class="style43"><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="122" colspan="2" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="19" align="left"><table width="53%" height="21" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="7%"><strong><span class="style51"><span class="style52">Welcome </span></span></strong></td>
                  <td width="8%">&nbsp;</td>
                  <td width="85%" align="left"><span class="style53"><span class="style54"> <?php echo $fullname;?></span></span></td>
                </tr>
              </table></td>
              <td align="right"><table width="200" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="123" align="right"><a href="logout.php" class="style75">LOGOUT</a></td>
                    <td width="20" align="center"><span class="style75">|</span></td>
                    <td width="57" align="right"><a href="settings.php" class="style75">SETTINGS</a></td>
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
        <td width="27%" align="right"><?php echo date('jS F, Y');?></td>
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
            <td align="left" valign="top"><form id="form1" name="form1" method="post" action="categories.php?action=addnew">
              <table width="100%"  border="0" cellpadding="0" cellspacing="2">
                <tr bgcolor="#CB9F94">
                  <td colspan="6" bgcolor="#B7C7F8"><div align="center"><span class="style51">Add Category</span></div></td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="left" valign="bottom" class="style55">&nbsp;</td>
                  <td width="86%" height="17" colspan="4" align="left" valign="bottom" class="style55"><input name="hidcatid" type="hidden" id="hidcatid" value="<?php echo $editcategory[0]; ?>" /></td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="right" valign="middle" class="style71">Category name:</td>
                  <td height="17" colspan="4" align="left" valign="middle" class="style55"><input name="txtcategoryname" type="text" id="txtcategoryname" value="<?php echo $editcategory[1]; ?>" size="40" /></td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="right" valign="middle" class="style71">Description:</td>
                  <td height="17" colspan="4" align="left" valign="middle" class="style55"><input name="txtdescription" type="text" id="txtdescription" value="<?php echo $editcategory[2]; ?>" size="40" /></td>
                </tr>
                <tr bgcolor="f2f2f2">
                  <td width="3%" height="19" align="right" valign="middle" bgcolor="#FFFFFF"><label></label></td>
                  <td height="19" colspan="5" align="left" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td width="11%"><span class="style66">
                          <input name="Button" type="button" class="style56" onclick="resetForm();" value="NEW CATEGORY"/ >
                        </span></td>
                        <td width="89%"><span class="style66">
                          <input name="Submit2" type="submit" class="style56" value="SAVE CATEGORY" />
                        </span></td>
                      </tr>
                  </table></td>
                </tr>
              </table>
                        </form>
              <br />
                <table width="100%"  border="0" cellpadding="0" cellspacing="0">
              <tr bgcolor="#CB9F94">
                <td bgcolor="#B7C7F8"><div align="center"><span class="style51">List of  news Categories</span></div></td>
              </tr>
              
              <tr>
                <td align="left" valign="bottom"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableboarder">
                    
                    <tr>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="30%" height="28" align="left"><span class="style61">Category name</span></td>
                      <td width="15%" align="left" class="style57"><span class="style73">Description</span></td>
                      <td width="19%" align="center" class="style57"><span class="style73">Action</span></td>
                    </tr>
                    
                    <?php $category->getCategory();?>
                  </table>
                    <br />              </tr>
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
