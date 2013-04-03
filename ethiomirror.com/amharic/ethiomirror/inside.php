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
<link rel="stylesheet" href="2col_rightNav.css" type="text/css" />
<style type="text/css">
<!--
.style1 {
	color: #999999
}
.style2 {font-size: small}
.style4 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: small; }
.style15 {font-family: Nyala;
	font-size: 16px;
	font-weight: bold;
}
.style18 {font-size: 80%}
-->
</style>
</head>
<!-- The structure of this file is exactly the same as 2col_leftNav.html;
     the only difference between the two is the stylesheet they use -->
<body>
<table width="100%" height="188" border="0">
  <tr>
    <td height="121" valign="top" background="banner_bg.jpg"><img src="banner.jpg" alt="ethiomirror" width="512" height="119" align="top" /></td>
  </tr>
  <tr>
    <td height="61" valign="top"><div id="breadCrumb2">
      <div id="globalNav">
        <div align="right"><a href="../../ethiomirror/index.php" class="style18">English Version</a></div>
        <div id="globalNav2">
          <div align="left"><a href="../../ethiomirror/index.php"><span class="style15">
            <?php 
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
            <br />
            <hr width="100%" size="1" noshade="noshade" />
          </span></a></div>
        </div>
      </div>
      <div align="right"></div>
    </div></td>
  </tr>
</table>
<!-- end masthead -->
<div id="content">
  <div id="breadCrumb">
    <div align="right"><a href="index.php">Home</a> / <a href="#">About us</a> / <a href="#">Contact us</a> / <a href="#">Site map</a></div>
  </div>
  
    <div>
       <div align="right">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td width="2%"><span class="style2"></span></td>
             <td width="3%" align="left" valign="bottom"><img src="images/print_friendly.gif" alt="Printable Version" width="28" height="19" /></td>
             <td width="15%" align="left" valign="middle"><span class="style4">
             <?php 
		$news=new News();
		
		$news->printableVersion($_REQUEST['newsid']);
	
	?>
             </span></td>
             <td width="3%" align="left" valign="bottom"><img src="images/email.gif" alt="Email this page to a friend" width="28" height="19" /></td>
             <td width="77%" align="left" valign="middle"><span class="style4">

<?php 

$reporter=$_REQUEST['reporter'];
$section=$_REQUEST['section'];
$newsid=$_REQUEST['newsid'];
?>
             <a href="javascript:void(0);" NAME="My Window Name" title=" Email News "onClick=window.open("emailpage.php?reporter=<?php echo $reporter ?>&section=<?php echo $section ?>&newsid=<?php echo $newsid ?>","Ratting","width=550,height=400,0,status=0,");>Email this page to a friend</a></span></td>
           </tr>
         </table>
         
<br />
      </div>
    </div>
 
  <div class="feature">
    <p>
<?php   
	$news=new News();
	$image=new Image();
	
	$newsimage=$news->getNewsImage($_REQUEST['newsid']);
	
	$osize= getimagesize($newsimage);

	if (!empty ($newsimage))
		echo '<a href="'.$newsimage.'"><img src="'.$newsimage.'" alt="" '.$image->resize($osize[0], $osize[1], 250).' border="0"/></a>';


	
	  
	  ?>
    </p>
    <p class="style1">
    <h3>
      <?php 
		$news=new News();
		
		$news->fetchHeadlineForInside($_REQUEST['newsid']);
	
	?>
    </h3>
    </p>
    <p><span class="style1">By:<?php
    	echo $news->getReporterName($_REQUEST['reporter'])
	?>
    </span>
    </p>
    <p> 
    
    <?php 
		$news=new News();
		
		
		$file = $news->fetchBodyForInside($_REQUEST['newsid']);
		readfile($file);

	
	?></p>
  </div>
  <div class="story">
    <div class="relatedLinks">
      
      <ul class="style2">
      <?php 
	  	$news=new News();
		
		$news->getRelatedPictures($_REQUEST['newsid']);
	  
	  ?></ul>
    </div>
    <h3>&nbsp;</h3>
  </div>
  <div class="story"></div>
</div>
<div id="navBar"><div id="search">
  <form action="searchresult.php" method="post">
    <label>Search</label>
    <input name="txtsearch" type="text" size="20" id="txtsearch" />
    <input name="goButton" type="submit" value="GO" />
  </form>
</div>
  <div class="relatedLinks">
    <h3>Blogs</h3>
    <div id="sectionLinks">
      <ul class="style9">
        <?php
        	$blog=new Blog();
			
			$blog->getBlog();
		
		?>
      </ul>
    </div>
          <h3>Otherlinks</h3>
          <div id="sectionLinks">
            <ul class="style9">
              <?php
        	$otherlinks=new OtherLinks();
			
			$otherlinks->getOtherLink();
		
		?>
            </ul>
      </div>     
  </div>
    <div id="headlines">
      <h3 class="style2">Headlines</h3>
      
        
          <span class="style2">
          <?php 
$news=new News();

$news->fetchHeadlines();


?>
          </span>
        <h3 class="style2">Other Headlines/Stories</h3>
          <span class="style2">
        <?php 
$news=new News();

$news->fetchOtherHeadlines();


?>
        </p>
          </span>
      <p>&nbsp;    </p>
    </div>
  </div>
  <p>&nbsp;</p>
</div>
<!--end navBar div -->
<div id="siteInfo"> Page Designed by <img src="Clear Logo small.jpg" width="85" height="40" /> <a href="#">About Us</a> | <a href="#">Site Map</a> | <a href="#">Privacy Policy</a> | <a href="#">Contact Us</a> | &copy;2007 EthioMirror.com </div>
<br />
</body>
</html>
