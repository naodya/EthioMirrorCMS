<?php 
	  include ('../admin/class/news.php');
	  include ('../admin/class/category.php');
	  include ('../admin/class/dataaccess.php');
  	  include ('../admin/class/includes/image.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>EthioMirror.com</title>
<link rel="stylesheet" href="2col_rightNav.css" type="text/css" />
<style type="text/css">
<!--
.style3 {
	color: #006699;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: small;
}
.style6 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style8 {color: #666666}
-->
</style>
</head>
<!-- The structure of this file is exactly the same as 2col_leftNav.html;
     the only difference between the two is the stylesheet they use -->
<body>
<table width="100%" height="128" border="0">
  <tr>
    <td height="124" valign="top" background="banner_bg.jpg"><img src="banner.jpg" alt="ethiomirror" width="512" height="119" align="top" />
      <div id="globalNav">
        <?php 
  $category=new Category();
  
  $category->getCategoryForTab();
  
  ?>
        <br />
    <hr size="1" noshade="noshade" />
      </div></td>
  </tr>
</table>

<!-- end masthead -->
<div id="content">
  <div id="breadCrumb">
    <div align="left"><a href="index.php">Home</a> / <a href="#">About us</a> / <a href="#">Contact us</a> / <a href="#">Site map</a></div>
  </div>
  <h2 id="pageName">&nbsp;</h2>
</div>
<p>
  <!--end navBar div --></p>
<form action="searchresult.php" method="post">
  <label>Search</label>
  <input name="txtsearch" type="text" size="20" id="txtsearch" />
  <input name="goButton" type="submit" value="GO" />
</form>
<div id="siteInfo2"></div>
<div id="globalNav2">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="left"><span class="style3">Search Results</span></td>
    </tr>
    <tr>
      <td><h2>&nbsp;</h2>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="5%">&nbsp;</td>
            <td width="95%">
			
			<?php
            
				$news=new News();
				
				$keyword=$_POST['txtsearch'];
				$news->searchNews($keyword);
			?>&nbsp;</td>
          </tr>
        </table>
        <br />
      <p>&nbsp;</p></td>
    </tr>
  </table>
  </div>
<div id="siteInfo"> Page Designed by <img src="Clear Logo small.jpg" width="85" height="40" /> <a href="#">About Us</a> | <a href="#">Site Map</a> | <a href="#">Privacy Policy</a> | <a href="#">Contact Us</a> | &copy;2007 EthioMirror.com </div>
<br />
</body>
</html>
