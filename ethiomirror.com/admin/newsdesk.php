<?php
//session_start();

include("fckeditor/fckeditor.php") ;


	require_once('includes/wdg/WDG.php');

	include('class/dataaccess.php');
	include('class/category.php');
	include('class/section.php');
	include('class/reporters.php');
	include('class/news.php');
	
	$category=new Category();
	$section=new Section();
	$reporters=new Reporters();
	$news=new News();	
	
	
	if (isset($_SESSION['valid_user']))
	{
		$fullname = $HTTP_SESSION_VARS['fullname'];
	}
	else
	  	echo "<script>window.location.href='login.php?ermsg=Please login first'</script>";

	$currentdate=$_REQUEST['currentdate'];  
	  
/*	  
function getNewsForEdit()
{
	$news=new News();

	$news->id=$_REQUEST['id'];

	$news->getNewsForEdit();		

}



if($_REQUEST['action']=="save")
{
	collectAndSave();
	
}*/

?>  
 


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Content management ::: Ethiomirror ::: News desk</title>
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
.style2 {color: #969685;
	font-size: 9px;
	font-family: tahoma;
}
.style7 {color: #333333; font-size: 10px; font-family: tahoma; }
.style8 {font-family: tahoma}
-->
</style>
<style type="text/css">
<!--
.style30 {
	font-family: Verdana, Arial, Helvetica, sans-serif
}
-->
</style>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script language="JavaScript" type="text/JavaScript">

function chkHome()
{
	if(document.form1.chkhome.checked==true)
		document.form1.selectsection.disabled=false;
	else
		{
			document.form1.selectsection.disabled=true;
			document.form1.selectsection.value=0;	
		}
}
function enableSubcat()
{
	if(document.form1.selectcategory.value==0)
	{
		document.form1.selectsubcategory.disabled=true;
		document.form1.selectsubcategory.value=0;
	}
	else
		{
			document.form1.selectsubcategory.disabled=false;
			document.form1.hidcat.value=document.form1.selectcategory.value;
		}
}


function createCookie(name, value, days)
{
  if (days) {
    var date = new Date();
    date.setTime(date.getTime()+(days*24*60*60*1000));
    var expires = "; expires="+date.toGMTString();
    }
  else var expires = "";
  document.cookie = name+"="+value+expires+"; path=/";
}

function eraseCookie(name)
{
  createCookie(name, "", -1);
}



</script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
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
            <td width="14%" valign="top"><?php 
			if($_SESSION['isadmin']==1)
				include('menu.php');
            else
            	include('usermenu.php');?>              &nbsp;</td>
            <td width="1%" height="134">&nbsp;</td>
            <td width="85%" valign="top">
            <form enctype="multipart/form-data" action="postnews.php?id=0" method="post" name="form1">
              <table width="100%"  border="0" cellpadding="0" cellspacing="2">
                <tr bgcolor="#CB9F94">
                  <td colspan="6" bgcolor="#B7C7F8"><div align="center"><span class="style11">News Desk</span></div></td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="left" valign="bottom" class="style7">&nbsp;</td>
                  <td height="17" colspan="4" align="left" valign="bottom" class="style7">&nbsp;</td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="right" valign="middle" class="style7"><span class="style24">Headline</span><span class="style24">:</span></td>
                  <td height="17" colspan="4" align="left" valign="middle" class="style7"><span id="sprytextfield1">
                    <input name="txtheadline" type="text" id="txtheadline" size="106" />
                    <span class="textfieldRequiredMsg">Required value</span>                    </span></td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="right" valign="middle" class="style7"><span class="style24">Posted date</span><span class="style24">:</span></td>
                  <td height="17" align="left" valign="middle" class="style7"><input name="txtpostdate" type="text" id="txtpostdate" value="<?php echo $currentdate; ?>" readonly="readonly"=true /></td>
                  <td height="17" colspan="2" align="right" valign="middle" class="style7"><span class="style24">Last modified date</span><span class="style24">:</span>                    <label></label></td>
                  <td width="37%" align="left" valign="middle" class="style7"><input name="txtlastmodified" type="text" id="txtlastmodified" value="<?php echo $currentdate; ?>" readonly="readonly"=true /></td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="right" valign="middle" class="style7"><span class="style24">Category</span><span class="style24">:</span></td>
                  <td height="17" align="left" valign="middle" class="style7"><span id="spryselect1">
                    <select name="selectcategory" id="selectcategory" onchange="enableSubcat();">
                      <option selected="selected">Select category</option>
                      <?php $category->getCategoryforCombo();?>
                                        </select>
                    <span class="selectRequiredMsg">Please select a catgory.</span></span></td>
                  <td height="17" colspan="2" align="right" valign="middle" class="style7"><span class="style24">
                    <input name="chkhome" type="checkbox" id="chkhome"  onclick="chkHome();"/>
                    Put on home page</span></td>
                  <td height="17" align="left" valign="middle" class="style7">
                  <select name="selectsection" id="selectsection" disabled="disabled">
                    <option value="0">Select section </option>
                      <?php $section->getSectionforCombo();?>
                  </select></td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="right" valign="middle" class="style7"><span class="style24">Sub category</span><span class="style24">:</span></td>
                  <td height="17" align="left" valign="middle" class="style7">
                  <select name="selectsubcategory" id="selectsubcategory" disabled="disabled">
                    <option value="0">Select sub category</option>
                    <?php $cat=$_COOKIE['selectedcat']; $category->getSubCategoryforCombo1(); $cat=0;setcookie('selectedcat','');?>
                   </select>
                  <input type="hidden" name="hidcat" id="hidcat" />                  </td>
                  <td colspan="2" align="right" valign="middle" class="style7"><span class="style24">Reported by</span><span class="style24">:</span></td>
                  <td align="left" valign="middle" class="style7"><select name="selectreporter" id="selectreporter">
                    <option value="0">Select reporter</option>
                    <?php $reporters->getReportersforCombo();?>
                                    </select></td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="right" valign="middle" class="style7"><span class="style24">media 1:</span></td>
                  <td width="32%" height="17" align="left" valign="middle" class="style7"><input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                    <input name="txtmedia1" type="file" id="txtmedia1" /></td>
                  <td colspan="2" align="right" valign="middle" class="style7"><span class="style24">media 4:</span></td>
                  <td align="left" valign="middle" class="style7"><input name="txtmedia4" type="file" id="txtmedia4" /></td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="right" valign="middle" class="style7"><span class="style24">media 2:</span></td>
                  <td height="17" align="left" valign="middle" class="style7"><input name="txtmedia2" type="file" id="txtmedia2" /></td>
                  <td height="17" colspan="2" align="right" valign="middle" class="style7"><span class="style24">media 5:</span></td>
                  <td height="17" align="left" valign="middle" class="style7"><input name="txtmedia5" type="file" id="txtmedia5" /></td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="right" valign="middle" class="style7"><span class="style24">media 3:</span></td>
                  <td height="17" align="left" valign="middle" class="style7"><input name="txtmedia3" type="file" id="txtmedia3" /></td>
                  <td width="6%" height="17" align="left" valign="middle" class="style7">&nbsp;</td>
                  <td height="17" colspan="2" align="left" valign="middle" class="style7">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2" align="right" valign="middle" class="style8"><span class="style7"><span class="style24">Search keyowrd:</span></span></td>
                  <td align="left" valign="middle" class="style8"><textarea name="txtkeyword" id="txtkeyword"></textarea></td>
                  <td align="left" valign="middle" class="style8">&nbsp;</td>
                  <td width="11%" align="left" valign="middle" class="style8">&nbsp;</td>
                  <td align="left" valign="middle" class="style8">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2" align="right" valign="middle" class="style8"><span class="style7"><span class="style24">News body:</span></span></td>
                  <td align="left" valign="middle" class="style8">&nbsp;</td>
                  <td align="left" valign="middle" class="style8">&nbsp;</td>
                  <td align="left" valign="middle" class="style8">&nbsp;</td>
                  <td align="left" valign="middle" class="style8">&nbsp;</td>
                </tr>
                <tr>
                  <td width="3%" height="19" align="right" valign="middle" class="style7">&nbsp;</td>
                  <td height="19" colspan="5" align="left" valign="middle" class="style7"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="86%">
					  <?php
						
						$oFCKeditor = new FCKeditor('FCKeditor1') ;
						$oFCKeditor->BasePath	= 'fckeditor/' ;
						$oFCKeditor->Value		= '' ;
						$oFCKeditor->Create() ;
					?>                    </td>
                      <td width="14%">&nbsp;</td>
                    </tr>
                  </table>                    </td>
                  </tr>
                <tr>
                  <td height="33" align="left" valign="bottom" class="style8">&nbsp;</td>
                  <td colspan="2" align="left" valign="top" class="style8"><input name="chkpublishnow" type="checkbox" id="chkpublishnow" value="1" />
                    <span class="style24">Publish now</span></td>
                  <td align="left" valign="bottom" class="style8">&nbsp;</td>
                  <td align="left" valign="bottom" class="style8">&nbsp;</td>
                  <td align="left" valign="bottom" class="style8">&nbsp;</td>
                </tr>
                <tr bgcolor="f2f2f2">
                  <td height="19" align="right" valign="middle" bgcolor="#FFFFFF"><label class="style24 style30"></label></td>
                  <td height="19" colspan="5" align="left" valign="middle" bgcolor="f2f2f2"><span class="style7">
                    <input name="Submit2" type="submit" class="style2" value="POST NEWS" />
                  </span></td>
                  </tr>
              </table>
            </form>            </td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
//-->
</script>
</body>
</html>
