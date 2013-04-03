<?php 
	  include ('../admin/class/news.php');
	  include ('../admin/class/category.php');
	  include ('../admin/class/blog.php');
	  include ('../admin/class/otherlinks.php');
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
<link rel="stylesheet" href="3col_leftNav.css" type="text/css" />
<script language="JavaScript">
<!--
function mmLoadMenus() {
  if (window.mm_menu_0917122124_0) return;
  window.mm_menu_0917122124_0 = new Menu("root",65,16,"Verdana, Arial, Helvetica, sans-serif",10,"#006699","#8E2A12","#999999","#FFFFCC","left","middle",3,0,1000,-5,7,true,false,true,0,true,true);
  mm_menu_0917122124_0.addMenuItem("Books","location='#'");
  mm_menu_0917122124_0.addMenuItem("Media","location='#'");
  mm_menu_0917122124_0.addMenuItem("Movies","location='#'");
  mm_menu_0917122124_0.addMenuItem("Music","location='#'");
   mm_menu_0917122124_0.fontWeight="bold";
   mm_menu_0917122124_0.hideOnMouseOut=true;
   mm_menu_0917122124_0.bgColor='#555555';
   mm_menu_0917122124_0.menuBorder=1;
   mm_menu_0917122124_0.menuLiteBgColor='#FFFFFF';
   mm_menu_0917122124_0.menuBorderBgColor='#777777';

mm_menu_0917122124_0.writeMenus();
} // mmLoadMenus()
//-->
</script>
<script language="JavaScript" src="mm_menu.js"></script>
<style type="text/css">
<!--
body {
	margin-top: 0px;
}
.style1 {
	font-family: Nyala;
	font-size: 16px;
	font-weight: bold;
}
-->
</style></head>
<body>
<script language="JavaScript1.2">mmLoadMenus();</script>
<table width="100%" height="188" border="0">
  <tr>
    <td height="121" valign="top" background="banner_bg.jpg"><img src="banner.jpg" alt="ethiomirror" width="512" height="119" align="top" /></td>
  </tr>
  <tr>
    <td height="61" valign="top"><div id="breadCrumb">
      <div id="globalNav">
        <div align="right"><a href="../../ethiomirror/index.php">English Version</a></div>
        <div id="globalNav2">
          <div align="left"><a href="../../ethiomirror/index.php"><span class="style1"><?php 
  $category=new Category();
  
  $category->getCategoryForTab();
  
  
  	function limit_words( $str, $num, $append_str='' )
	{
	  $words = preg_split( '/[\s]+/', $str, -1, PREG_SPLIT_OFFSET_CAPTURE );
	  if( isset($words[$num][1]) )
	  {
		$str = substr( $str, 0, $words[$num][1] ) . $append_str;
	  }
	  unset( $words, $num );
	  return trim( $str );
	}
  
  ?>
          </span></a></div>
        </div>
      </div>
      <div align="right"><a href="index.php">Home</a> / <a href="#">About us</a> / <a href="#">Contact us</a> / <a href="#">Site map</a></div>
    </div></td>
  </tr>
</table>
<div id="navBar">
  <div id="search">
    <form action="searchresult.php" method="post">
      <label>Search</label>
      <input name="txtsearch" type="text" size="20" id="txtsearch" />
      <input name="goButton" type="submit" value="GO" />
    </form>
  </div>
  <div id="sectionLinks">
    <h3>Blogs</h3>
    <ul>
		<?php
        	$blog=new Blog();
			
			$blog->getBlog();
		
		?>
    </ul>
  </div>
  <div id="sectionLinks">
    <h3>Other Links</h3>
    <ul>
      <?php
        	$otherlinks=new OtherLinks();
			
			$otherlinks->getOtherLink();
		
		?>
    </ul>
    </div>
</div>
<!--end navBar div -->
<div id="headlines">
  <h3>Other Headlines/Stories</h3>
  <?php 
$news=new News();

$news->fetchOtherHeadlines();


?>
  <h3><br />
  </h3>
  <h3>Headlines</h3>
  <?php 
$news=new News();

$news->fetchHeadlines();


?>
</div>
<!--end headlines -->
<div id="content">
  <div class="feature"> 
  
  
  
<?php   
	$news=new News();
	$image=new Image();
	$newsid=$news->getHomeNewsIds(1);
	if ($newsid <>0)
	{
		$newsimage=$news->getNewsImage($newsid);
	}
	else
		$newsimage="";	
	$osize= getimagesize($newsimage);

	if (!empty ($newsimage))
		echo '<a href="'.$newsimage.'"><img src="'.$newsimage.'" alt="" '.$image->resize($osize[0], $osize[1], 250).' border="0" /></a>';


	
	  
	  ?>
      
      

    <p align="justify">
      <?php 
	  
	  

	  
	  
	  $news=new News;
	  

	  echo " <h3> ".$news->fetchHeadline(1)." </h3>";
	  
		$file = $news->fetchBody(1);
		if(!empty($file))
		{
			$fh = fopen($file, 'r');
			$content = fread($fh,filesize($file));
			fclose($fh);
			echo limit_words($content,120,'...&nbsp'.$news->readMore(1));
		}	
	  ?></p>
    </div>
  <div class="feature">
    <?php   
	$news=new News();
	$image=new Image();
	$newsid=$news->getHomeNewsIds(2);
	if ($newsid <>0)
	{
		$newsimage=$news->getNewsImage($newsid);
	}
	else
		$newsimage="";	
	$osize= getimagesize($newsimage);

	if (!empty ($newsimage))
		echo '<a href="'.$newsimage.'"><img src="'.$newsimage.'" alt="" '.$image->resize($osize[0], $osize[1], 150).' border="0" /></a>';


	
	  
	  ?>
    <p align="justify">
      <?php 
	  $news=new News;
	  

	  echo " <h3> ".$news->fetchHeadline(2)." </h3>";
	  
		$file = $news->fetchBody(2);
		if(!empty($file))
		{
			$fh = fopen($file, 'r');
			$content = fread($fh,filesize($file));
			fclose($fh);
			echo limit_words($content,120,'...&nbsp'.$news->readMore(2));
		}
		?>
      </p>
  </div>
  <div class="feature">
    <?php   
	$news=new News();
	$image=new Image();
	$newsid=$news->getHomeNewsIds(3);
	if ($newsid <>0)
	{
		$newsimage=$news->getNewsImage($newsid);
	}
	else
		$newsimage="";	
	$osize= getimagesize($newsimage);

	if (!empty ($newsimage))
		echo '<a href="'.$newsimage.'"><img src="'.$newsimage.'" alt="" '.$image->resize($osize[0], $osize[1], 150).' border="0" /></a>';


	
	  
	  ?>
    <p align="justify">
      <?php 
	  $news=new News;
	  

	  echo " <h3> ".$news->fetchHeadline(3)." </h3>";
	  
		$file = $news->fetchBody(3);
		if(!empty($file))
		{
			$fh = fopen($file, 'r');
			$content = fread($fh,filesize($file));
			fclose($fh);
			echo limit_words($content,120,'...&nbsp'.$news->readMore(3));
		}
		?>
    </p>
  </div>
  <div class="feature">
    <?php   
	$news=new News();
	$image=new Image();
	$newsid=$news->getHomeNewsIds(4);
	if ($newsid <>0)
	{
		$newsimage=$news->getNewsImage($newsid);
	}
	else
		$newsimage="";
	
	$osize= getimagesize($newsimage);

	if (!empty ($newsimage))
		echo '<a href="'.$newsimage.'"><img src="'.$newsimage.'" alt="" '.$image->resize($osize[0], $osize[1], 150).' border="0" /></a>';


	
	  
	  ?>
    <p align="justify">
      <?php 
	  $news=new News;
	  

	  echo " <h3> ".$news->fetchHeadline(4)." </h3>";
	  
		$file = $news->fetchBody(4);
		if(!empty($file))
		{
			$fh = fopen($file, 'r');
			$content = fread($fh,filesize($file));
			fclose($fh);
			echo limit_words($content,120,'...&nbsp'.$news->readMore(4));
		}
		?>
    </p>
  </div>
  <div class="feature">
    <?php   
	$news=new News();
	$image=new Image();
	$newsid=$news->getHomeNewsIds(5);
	if ($newsid <>0)
	{
		$newsimage=$news->getNewsImage($newsid);
	}
	else
		$newsimage="";
	
	$osize= getimagesize($newsimage);

	if (!empty ($newsimage))
		echo '<a href="'.$newsimage.'"><img src="'.$newsimage.'" alt="" '.$image->resize($osize[0], $osize[1], 150).' border="0" /></a>';


	
	  
	  ?>
    <p align="justify">
      <?php 
	  $news=new News;
	  

	  echo " <h3> ".$news->fetchHeadline(5)." </h3>";
	  
		$file = $news->fetchBody(5);
		if(!empty($file))
		{
			$fh = fopen($file, 'r');
			$content = fread($fh,filesize($file));
			fclose($fh);
			echo limit_words($content,120,'...&nbsp'.$news->readMore(5));
		}
		?>
    </p>
  </div>
</div>
<!--end content -->
<div id="siteInfo"> Page Designed by<img src="Clear Logo small.jpg" width="85" height="40" /> <a href="#">About Us</a> | <a href="#">Site Map</a> | <a href="#">Privacy Policy</a> | <a href="#">Contact Us</a> | &copy;2007 Ethio Mirror</div>
<br />
</body>
</html>
