<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Content management ::: Ethiomirror ::: Login</title>
<style type="text/css">
<!--
.style11 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12pt;
	text-align: justify;
	font-weight: bold;
	color: #FFFFFF;
}
.style2 {color: #969685;
	font-size: 9px;
	font-family: tahoma;
}
.style7 {color: #333333; font-size: 10px; font-family: tahoma; }
.style8 {font-family: tahoma}
#apDiv1 {
	position:absolute;
	left:236px;
	top:59px;
	width:512px;
	height:122px;
	z-index:1;
}
.style12 {font-size: 12px}
#apDiv2 {
	position:absolute;
	left:309px;
	top:305px;
	width:363px;
	height:174px;
	z-index:1;
}
.style14 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10pt; text-align: justify; font-weight: bold; color: #FFFFFF; }
-->
</style>
</head>

<body>
<table width="100%" height="644" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="left">
      <table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="122" colspan="2" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="122" align="center" background="images/banner_bg.jpg"><img src="images/banner.jpg" width="512" height="122" /></td>
            </tr>
          </table>
            </td>
          </tr>
        <tr>
          <td width="33%" height="19" align="center"><div align="center"></div></td>
          <td width="67%" align="center"><div align="left"><font size="5"><strong><span class="style11">
            <?php $ermsg=$_REQUEST['ermsg'];echo '<p><h5><font color="#ff0000">'.$ermsg.'</font></h5> </font>';?>
          </span></strong></font></div></td>
        </tr>
        <tr>
          <td height="19" colspan="2" align="center"><table width="35%"  border="0" align="center" cellpadding="0" cellspacing="3">
            <tr bgcolor="f2f2f2">
              <td width="100%" height="88"><form action="authenticate.php" method="post" name="form1" id="form1">
                  <span class="style7"></span>
                  <table width="100%"  border="0" cellpadding="0" cellspacing="0">
                    <tr bgcolor="#CB9F94">
                      <td colspan="3" bgcolor="#B7C7F8"><div align="center"><span class="style14">User login</span></div></td>
                    </tr>
                    <tr>
                      <td height="17" colspan="2" align="left" valign="bottom" class="style7">&nbsp;</td>
                      <td height="17" align="left" valign="bottom" class="style7">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="17" align="right" valign="middle" class="style7"><span class="style12">Username:</span></td>
                      <td align="right" valign="middle" class="style7">&nbsp;</td>
                      <td height="17" align="left" valign="middle" class="style7"><input type="text" name="txtusername" id="txtusername" /></td>
                    </tr>
                    <tr>
                      <td colspan="3" align="left" valign="middle" class="style8">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="25%" height="12" align="right" valign="middle" class="style7"><span class="style12">Password:</span></td>
                      <td width="2%" height="12" align="right" valign="middle" class="style7">&nbsp;</td>
                      <td width="73%" align="left" valign="middle" class="style7"><input type="password" name="txtpassword" id="txtpassword" /></td>
                    </tr>
                    <tr>
                      <td colspan="3" align="left" valign="bottom" class="style8">&nbsp;</td>
                    </tr>
                    <tr bgcolor="f2f2f2">
                      <td height="19" colspan="2">&nbsp;</td>
                      <td height="19" align="left"><span class="style7">
                        <input name="Submit2" type="submit" class="style2" value="LOGIN" />
                      </span></td>
                    </tr>
                  </table>
              </form></td>
            </tr>
          </table></td>
          </tr>
      </table>
      <div align="left"> </div>
      </div></td>
  </tr>
</table>
</body>
</html>
