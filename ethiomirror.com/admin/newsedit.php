
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

	$editnews=$news->getNewsForEdit($_REQUEST['newsid']);
	$currentdate=$_REQUEST['currentdate'];  
?>  
 


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Content management ::: Ethiomirror ::: Edit news</title>
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
function setHidCat()
{

	return document.form1.hidcat.value;
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

function eraseCookie(name,hidmedia)
{
  createCookie(name, "", -1);
}
function removeMedia(word,hidmedia)
{
	var str=word;
	document.form1.write(str.replace(str," "));
	
	document.form1.hidmedia.value="";
}


</script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
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
            <form enctype="multipart/form-data" action="postnews.php?path=<?php echo $editnews[2];?>&id=<?php echo $editnews[0];?>" method="post" name="form1">
              <table width="100%"  border="0" cellpadding="0" cellspacing="2">
                <tr bgcolor="#CB9F94">
                  <td colspan="6" bgcolor="#B7C7F8"><div align="center"><span class="style11">Edit News</span></div></td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="left" valign="bottom" class="style7">&nbsp;</td>
                  <td height="17" colspan="4" align="left" valign="bottom" class="style7">&nbsp;</td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="right" valign="middle" class="style7"><span class="style24">Headline</span><span class="style24">:</span></td>
                  <td height="17" colspan="4" align="left" valign="middle" class="style7"><span id="sprytextfield1">
                    <input name="txtheadline" type="text" id="txtheadline" value="<?php echo $editnews[1]; ?>" size="111" />
                    <span class="textfieldRequiredMsg">Required value required.</span>                    </span></td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="right" valign="middle" class="style7"><span class="style24">Posted date</span><span class="style24">:</span></td>
                  <td height="17" align="left" valign="middle" class="style7"><input name="txtpostdate" type="text" id="txtpostdate" value="<?php echo $editnews[10]; ?>" readonly="readonly"=true /></td>
                  <td height="17" colspan="2" align="right" valign="middle" class="style7"><span class="style24">Last modified date</span><span class="style24">:</span>                    <label></label></td>
                  <td width="37%" align="left" valign="middle" class="style7"><input name="txtlastmodified" type="text" id="txtlastmodified" value="<?php echo $currentdate; ?>" readonly="readonly"=true /></td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="right" valign="middle" class="style7"><span class="style24">Category</span><span class="style24">:</span></td>
                  <td height="17" align="left" valign="middle" class="style7">
                  <select name="selectcategory" id="selectcategory" onchange="enableSubcat();eraseCookie('selectedcat');createCookie('selectedcat', this.form.selectcategory.value, 0);"> 
                    <option value="<?php echo $editnews[14];?>" selected="selected"><?php echo $category->getCategoryName($editnews[14]); ?></option>
                      <?php $category->getCategoryforCombo();?>
                    </select>                  </td>
                  <td height="17" colspan="2" align="right" valign="middle" class="style7"><span class="style24">
                    Section:</span></td>
                  <td height="17" align="left" valign="middle" class="style7">
                  <select name="selectsection" id="selectsection">
                    <option value="<?php echo $editnews[9];?>"><?php echo $section->getSectionName($editnews[9]); ?></option>
                      <?php $section->getSectionforCombo();?>
                  </select></td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="right" valign="middle" class="style7"><span class="style24">Sub category</span><span class="style24">:</span></td>
                  <td height="17" align="left" valign="middle" class="style7">
                  <select name="selectsubcategory" id="selectsubcategory">
                    <option value="<?php echo $editnews[15];?>"><?php echo $category->getSubCategoryName($editnews[15]); ?></option>
					<?php $category->getSubCategoryforCombo1();?>
                    </select></td>
                  <td colspan="2" align="right" valign="middle" class="style7"><span class="style24">Reported by</span><span class="style24">:</span></td>
                  <td align="left" valign="middle" class="style7"><select name="selectreporter" id="selectreporter">
                    <option value="<?php echo $editnews[12];?>"><?php echo $reporters->getReporterName($editnews[12]); ?></option>
                    <?php $reporters->getReportersforCombo();?>
                                    </select></td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="right" valign="middle" class="style7"><span class="style24">media 1:</span></td>
                  <td width="35%" height="17" align="left" valign="middle" class="style7"><input name="txtmedia1" type="file" id="txtmedia1" />
                    <span class="style24"><a href="../ethiomirror/<?php echo $editnews[4]; ?>" target="_blank">
                    <?php 
						if (!empty($editnews[4]))
							echo 'media-1</a>&nbsp;<input name="chkremovemedia1" type="checkbox" id="chkremovemedia1" value="1">Remove  ';
						
					?>
                    <input name="hidmedia1" type="hidden" id="hidmedia1" value="<?php echo $editnews[4]; ?>" /></td>
                  <td colspan="2" align="right" valign="middle" class="style7"><span class="style24">media 4:</span></td>
                  <td align="left" valign="middle" class="style7"><input name="txtmedia4" type="file" id="txtmedia4" />
                  
                                    <a href="../ethiomirror/<?php echo $editnews[7]; ?>" target="_blank">
                                    <?php 
						if (!empty($editnews[7]))
							echo 'media-4</a>&nbsp;<input name="chkremovemedia4" type="checkbox" id="chkremovemedia4" value="1">Remove';
						
					?>
                                    <input name="hidmedia4" type="hidden" id="hidmedia4" value="<?php echo $editnews[7]; ?>" />
                        </td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="right" valign="middle" class="style7"><span class="style24">media 2:</span></td>
                  <td height="17" align="left" valign="middle" class="style7"><input name="txtmedia2" type="file" id="txtmedia2" />
                  <a href="../ethiomirror/<?php echo $editnews[5]; ?>" target="_blank">
                  <?php 
						if (!empty($editnews[5]))
							echo 'media-2</a>&nbsp;<input name="chkremovemedia2" type="checkbox" id="chkremovemedia2" value="1">Remove';
						
					?>
                  <input name="hidmedia2" type="hidden" id="hidmedia2" value="<?php echo $editnews[5]; ?>" />
                    </td>
                  <td height="17" colspan="2" align="right" valign="middle" class="style7"><span class="style24">media 5:</span></td>
                  <td height="17" align="left" valign="middle" class="style7"><input name="txtmedia5" type="file" id="txtmedia5" />
                  
                                    <a href="../ethiomirror/<?php echo $editnews[8]; ?>" target="_blank">
                                    <?php 
						if (!empty($editnews[8]))
							echo 'media-5</a>&nbsp;<input name="chkremovemedia5" type="checkbox" id="chkremovemedia5" value="1">Remove   ';
						
					?>
                                    <input name="hidmedia5" type="hidden" id="hidmedia5" value="<?php echo $editnews[8]; ?>" />
                        </td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="right" valign="middle" class="style7"><span class="style24">media 3:</span></td>
                  <td height="17" align="left" valign="middle" class="style7"><input name="txtmedia3" type="file" id="txtmedia3" />
                    <a href="../ethiomirror/<?php echo $editnews[6]; ?>" target="_blank">
                    <?php 
						if (!empty($editnews[6]))
							echo 'media-3</a>&nbsp;<input name="chkremovemedia3" type="checkbox" id="chkremovemedia3" value="1">Remove';
						
					?>
                    <input name="hidmedia3" type="hidden" id="hidmedia3" value="<?php echo $editnews[6]; ?>" />
                        </td>
                  <td width="6%" height="17" align="left" valign="middle" class="style7">&nbsp;</td>
                  <td height="17" colspan="2" align="left" valign="middle" class="style7">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2" align="right" valign="middle" class="style8"><span class="style7"><span class="style24">Search keyowrd:</span></span></td>
                  <td align="left" valign="middle" class="style8"><textarea name="txtkeyword" id="txtkeyword"><?php echo $editnews[3]; ?></textarea></td>
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
						// Automatically calculates the editor base path based on the _samples directory.
						// This is usefull only for these samples. A real application should use something like this:
						// $oFCKeditor->BasePath = '/fckeditor/' ;	// '/fckeditor/' is the default value.
						//$sBasePath = $_SERVER['PHP_SELF'] ;
						//$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "_samples" ) ) ;
						
						$oFCKeditor = new FCKeditor('FCKeditor1') ;
						$oFCKeditor->BasePath	= 'fckeditor/' ;
						
						$file = $news->fetchBodyForInside($_REQUEST['newsid']);
						$file='../ethiomirror/'.$file;
						$fd = fopen ($file, "r");
						if(filesize($file)>0)
							$filesize=filesize($file);
						else
							$filesize=1;
						$contents = fread ($fd,$filesize);
						fclose ($fd);

						
						$oFCKeditor->Value = $contents;
						$oFCKeditor->Create() ;
					?>                    <input name="hidfolderpath" type="hidden" id="hidfolderpath" value="<?php echo $editnews[2]; ?>" /></td>
                      <td width="14%">&nbsp;</td>
                    </tr>
                  </table>                    </td>
                  </tr>
                <tr>
                  <td height="33" align="left" valign="bottom" class="style8">&nbsp;</td>
                  <td colspan="2" align="left" valign="top" class="style8"><input name="chkpublishnow" type="checkbox" id="chkpublishnow" value="1"  
                  
                  <?php 
				  
				  	if($editnews[16]==1)
						echo 'checked="checked"';
				  ?>/>
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
//-->
</script>
</body>
</html>
