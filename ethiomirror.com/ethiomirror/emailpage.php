<?php 
	  include ('../admin/class/news.php');
	  include ('../admin/class/category.php');
	  include ('../admin/class/blog.php');
	  include ('../admin/class/otherlinks.php');
	  include ('../admin/class/dataaccess.php');
  	  include ('../admin/class/includes/image.php');

?>

<!doctype html public "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html>
<head>
<title>Ethiomirror.com | E-Mail this page to a friend</title>
  <meta name="ROBOTS" content="NOARCHIVE">
  <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1">
  <link type="text/css" rel="stylesheet" href="/shared/css/emailthispage.css">
  <style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: small;
}
.style2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-size: small;
}
.style3 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: small;
	font-weight: bold;
}
.style4 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: x-small;
}
.style6 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: small;
}
.style7 {font-size: small}
.style11 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #FF0000;}
-->
  </style>
  <script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
  <link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
  <style type="text/css">
<!--
.style12 {font-size: 9px}
.style13 {
	color: #0099CC;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
  </style>
</head>
<body class="news" bgcolor="#ffffff" text="#000000" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">

<span class="l1  style11">Send the page:</span>
<span class="style13">
<?php $news=new News(); $news->fetchHeadlineForInside($_REQUEST['newsid']);?>
<?php 
	
    $reporter=$_REQUEST['reporter'];
 	$section=$_REQUEST['section'];
	$newsid=$_REQUEST['newsid'];
	
	$newsurl="http://ethiomirror.com/ethiomirror/inside.php?section=".$section."&reporter=".$reporter."&newsid=".$newsid;
?>
</span>
<form action="sendemail.php?action=send" method="post"><div class="form">
  <table width="100%" border="0" cellpadding="2" cellspacing="0">
          <tr>
            <th colspan="3" align="left" bgcolor="#0099CC"><span class="style2">To:</span></th>
          </tr>
          <tr>
            <td width="287" bgcolor="#CCCCCC" class="left style3">E-mail address:</td>
            <td width="17" bgcolor="#CCCCCC"><span class="error"><span class="spacer"><span class="error style1">*</span></span></span></td>
            <td width="193" bgcolor="#CCCCCC" class="right"><span id="sprytextfield1">
            <input type="text" maxlength="120" name="txtto" value="" id="txtto">
            <span class="textfieldRequiredMsg">A value is required.</span> </span></td>
          </tr>
          <tr>
            <td colspan="3" bgcolor="#CCCCCC" class="fill" style="border-bottom: 1px solid #000000;"><span class="small style4">Separate multiple addresses with a comma (,)</span> </td>
          </tr>
          <tr>
            <td height="14" colspan="3" class="spacer"><input name="hidurl" type="hidden" id="hidurl" value="<?php echo $newsurl;?>"></td>
      </tr>
          <tr>
            <th colspan="3" bgcolor="#CCCCCC"><span class="style6">Your Details:</span></th>
          </tr>
          <tr>
            <td bgcolor="#CCCCCC"><span class="style6">Your name:</span> </td>
            <td bgcolor="#CCCCCC"><span class="error"><span class="spacer"><span class="error style1">*</span></span></span></td>
            <td bgcolor="#CCCCCC" class="right"><span id="sprytextfield3">
            <input type="text" maxlength="120" name="txtfromname" value="" id="txtfromname">
            <span class="textfieldRequiredMsg">A value is required.</span> </span><span class="textfieldRequiredMsg"><span class="style12">A value is required</span>.</span>            </td>
          </tr>
          <tr>
            <td bgcolor="#CCCCCC" class="left style4 style7">E-mail address: </td>
            <td bgcolor="#CCCCCC">&nbsp;</td>
            <td bgcolor="#CCCCCC" class="right"><span id="sprytextfield4">
              <input type="text" maxlength="120" name="txtfromemail" value="" id="txtfromemail">
            <span class="textfieldInvalidFormatMsg">Invalid format.</span>            </span></td>
          </tr>
          <tr>
            <td valign="top" bgcolor="#CCCCCC" class="left style6"> Message:<br>
                <span class="small">(maximum message length of 1,000 characters)</span> </td>
            <td bgcolor="#CCCCCC">&nbsp;</td>
            <td valign="top" bgcolor="#CCCCCC" class="right"><textarea cols="21" rows="5" name="txtmessage" id="txtmessage"></textarea></td>
          </tr>
          <tr>
            <td class="fill" style="border-bottom: 1px solid #000000;" colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" class="spacer"><span class="error style1">* Information Require</span> </td>
            <td align="right" class="spacer"><input class="button" type="submit" value="send" >            </td>
          </tr>
    </table>
      </div>
</form>


<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "email", {isRequired:false});
//-->
</script>
</body>
</html>
