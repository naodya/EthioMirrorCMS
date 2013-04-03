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
.style1 {
	color: #999999
}
.style2 {font-size: small}
body {
	background-color: #FFFFFF;
}
.style3 {
	font-size: x-large
}
.style4 {color: #999999; font-size: small; }
-->
</style>
</head>
<!-- The structure of this file is exactly the same as 2col_leftNav.html;
     the only difference between the two is the stylesheet they use -->
<body>
<div class="logo">
  <table width="100%" height="128" border="0">
    <tr>
      <td height="124" valign="top" background="banner_bg.jpg"><img src="banner.jpg" alt="ethiomirror" width="512" height="119" align="top" /></td>
    </tr>
  </table>
  <br />
<hr align="center" noshade="noshade" />
</div>
<div class="headline">
  <h1 class="style3">
    <?php 
		$news=new News();
		
		$news->fetchHeadlineForInside($_REQUEST['newsid']);
	
	?>
    <br />
    <br />
  </h1>
</div>
<table width="897">
  <tbody>
    <tr>
      <td width="827" valign="bottom"><!--Smvb-->
        <span class="style4">By:
        <?php
    	echo $news->getReporterName($_REQUEST['reporter'])
	?>
        </span><br />
        <br />
        <span class="style2">Ethiomirror News<br /> 
        Addis Ababa,Ethiopia</span></td>
    </tr>
  </tbody>
</table>
<div class="feature">
  <p>
    <?php   
	$news=new News();
	$image=new Image();
	
	$newsimage=$news->getNewsImage($_REQUEST['newsid']);
	
	$osize= getimagesize($newsimage);

	if (!empty ($newsimage))
		echo '<a href="'.$newsimage.'"><img src="'.$newsimage.'" alt="" '.$image->resize($osize[0], $osize[1], 250).' border="0"/></a>';


	
	  
	  ?></p>
  <p class="style1">&nbsp; </p>
  <h3>&nbsp;</h3>
  </p>
  <p>&nbsp;</p>
  <p>
    <?php 
		$news=new News();
		
		
		$file = $news->fetchBodyForInside($_REQUEST['newsid']);
		readfile($file);

	
	?>
  </p>
</div>
<div class="relatedLinks"></div>
<div id="siteInfo">&copy;2007 EthioMirror.com Addis Ababa, Ethiopia</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<!--end navBar div -->
<br />
</body>
</html>
