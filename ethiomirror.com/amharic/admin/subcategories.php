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
<title>Content management ::: Ethiomirror ::: Subcategories</title>
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
  if (confirm("Are you sure you want remove this sub-category ?"))
  {
    document.location = delUrl;
  }
}

function resetForm()
{

	document.form1.hidsubcatid.value=0;
	document.form1.txtsubcategoryname.value="";
	document.form1.selectcategory.value="";
}
</script>
<style type="text/css">
<!--
body,td,th {
	font-family: Nyala;
	font-size: 14px;
}
.style42 {
	font-size: 14;
	font-family: "geez unicode";
}
.style48 {font-weight: bold; color: #FFFFFF; text-align: justify;}
.style49 {font-size: 14}
.style53 {font-family: Nyala}
.style54 {color: #333333}
.style55 {color: #969685}
.style56 {
	font-family: Arial, Helvetica, sans-serif;
	color: #0066FF;
	font-weight: bold;
}
.style57 {
	font-family: Arial, Helvetica, sans-serif;
	color: #0066FF;
}
.style58 {
	color: #333333;
	font-family: "Times New Roman", Times, serif;
}
.style59 {
	color: #333333;
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style></head>
<?php 



if($_REQUEST['action']=="fetch")
{
	$editsubcategory=array($_REQUEST['subcatid'],$_REQUEST['subcat'],$_REQUEST['catid']);

}
if($_REQUEST['action']=="addnew")
{
	$category->saveSubCategory($_POST['hidsubcatid'],$_POST['txtsubcategoryname'],$_POST['selectcategory']);		
	echo "<script>window.location.href='subcategories.php'</script>";
}
if($_REQUEST['action']=="remove")
{

	$category=new Category();
	$category->deleteSubCategory($_REQUEST['id']);
	echo "<script>window.location.href='subcategories.php'</script>";

	
}


?>
<body class="style42">
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
        <td height="135" colspan="2" align="center" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="style42">
          <tr>
            <td width="14%" rowspan="2" valign="top"><?php 
			if($_SESSION['isadmin']==1)
				include('menu.php');
            else
            	include('usermenu.php');?>              &nbsp;</td>
            <td height="134">&nbsp;</td>
            <td valign="top"><form action="subcategories.php?action=addnew" method="post" name="form1" class="style49 style53" id="form1">
              <table width="100%"  border="0" cellpadding="0" cellspacing="2">
                <tr bgcolor="#CB9F94">
                  <td colspan="6" bgcolor="#B7C7F8"><div align="center"><span class="style48">Add Subcategory</span></div></td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="left" valign="bottom" class="style54">&nbsp;</td>
                  <td width="86%" height="17" colspan="4" align="left" valign="bottom" class="style54"><input name="hidsubcatid" type="hidden" id="hidsubcatid" value="<?php echo $editsubcategory[0]; ?>" /></td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="right" valign="middle" class="style58">Category:</td>
                  <td height="17" colspan="4" align="left" valign="middle" class="style54"><select name="selectcategory" class="style42" id="selectcategory" >
                    <option selected="selected" value="<?php echo $editsubcategory[2]; ?>">
                      <?php 
					  
					  if(!empty($editsubcategory[2]))
					  {
					  	$catid=$editsubcategory[2];
						echo $category->getCategoryName($catid);
					}
					else
						echo " ";
											  ;?>
                      </option>
                    <?php $category->getCategoryforCombo();?>
                  </select></td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="right" valign="middle" class="style59">Subcategory name:</td>
                  <td height="17" colspan="4" align="left" valign="middle" class="style54"><input name="txtsubcategoryname" type="text" class="style42" id="txtsubcategoryname" value="<?php echo $editsubcategory[1]; ?>" size="40" /></td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="right" valign="middle" class="style54">&nbsp;</td>
                  <td height="17" colspan="4" align="left" valign="middle" class="style54">&nbsp;</td>
                </tr>
                <tr bgcolor="f2f2f2">
                  <td width="3%" height="19" align="right" valign="middle" bgcolor="#FFFFFF"><label></label></td>
                  <td height="19" colspan="5" align="left" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      
                      <tr>
                        <td width="15%"><span class="style54">
                          <input name="Button" type="button" class="style55" onclick="resetForm();" value="NEW SUBCATEGORY"/ >
                        </span></td>
                        <td width="85%"><span class="style54">
                          <input name="Submit2" type="submit" class="style55" value="SAVE SBUCATEGORY" />
                        </span></td>
                      </tr>
                  </table></td>
                </tr>
              </table>
                        </form>
              <table width="100%"  border="0" cellpadding="0" cellspacing="0">
              <tr bgcolor="#CB9F94">
                <td bgcolor="#B7C7F8" class="style42"><div align="center"><span class="style48">List of  news Subcategories</span></div></td>
              </tr>
              
              <tr>
                <td align="left" valign="bottom" class="style42"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableboarder">
                    
                    <tr>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="30%" height="24" align="left" class="style57">
						<strong>Subcategory name</strong></td>
                      <td width="15%" align="left" class="style56"><strong>Category</strong></td>
                      <td width="19%" align="center" class="style56"><strong>Action</strong></td>
                    </tr>
                    <?php $category->getSubCategory1();?>
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
