<?php
session_start();

	include('class/dataaccess.php');
	include('class/category.php');
	include('class/section.php');
	include('class/reporters.php');
	include('class/news.php');
	

function createNewsPath($foldername)
{
	if(!empty($foldername))
	{
		mkdir("../ethiomirror/files/news/$foldername",0777);
		mkdir("../ethiomirror/files/news/$foldername/media",0777);
		$fp = fopen("../ethiomirror/files/news/$foldername/news.txt", 'w');
		flock($fp, LOCK_EX); 
		$string=stripslashes($_POST['FCKeditor1']);
		if (!$fp)
		{
			echo "COULD NOT CREATE FILE";
		}
		fwrite($fp,$string);
		flock($fp, LOCK_UN);
		fclose($fp);
	}
	return $foldername;
}

function uploadMedia($usfile,$finame,$fitype,$foname)
{
	$userfile = $usfile;
	$userfile_name = $finame;
	$userfile_type = $fitype;
	$upfile = '../ethiomirror/files/news/'.$foname.'/media/'.$userfile_name;
	
	
	if (is_uploaded_file($userfile)) 
	{
		if (!move_uploaded_file($userfile, $upfile))
		{
			echo 'Problem: Could not move file to destination directory';
			exit;
		}
		return $upfile;
	}
	
}
	  
$news=new News();

$news->id=$_REQUEST['id'];
$news->headline=$_POST['txtheadline'];

if($_REQUEST['id']==0)
{
	$foldername=createNewsPath($_SESSION['id'].'_'.date('dmyHis'));
	$news->body='files/news/'.$foldername.'/news.txt';	
}
else
	{
		$dir='../ethiomirror/'.$_REQUEST['path'];
		$position=strrpos($dir,'/');
		$dir=substr($dir,0,$position);
		$foldername=substr($dir,26,$position);
		$filename=$dir.'/news.txt';
		$fp = fopen($filename,'w');
		flock($fp, LOCK_EX); 
		$string=stripslashes($_POST['FCKeditor1']);
		if (!$fp)
		{
			echo "COULD NOT CREATE FILE";
		}
		fwrite($fp,$string);
		flock($fp, LOCK_UN);
		fclose($fp);
		$news->body=$_REQUEST['path'];
	}




$news->keyword=$_POST['txtkeyword'];


	if(!empty($_FILES['txtmedia1']['tmp_name']))
		$news->media1=uploadMedia($_FILES['txtmedia1']['tmp_name'],$_FILES['txtmedia1']['name'],$_FILES['txtmedia1']['type'],$foldername);
	else
	{
		if($_POST['chkremovemedia1']==0)
			$news->media1=$_POST['hidmedia1'];
		else
			$news->media1="";
	}

	if(!empty($_FILES['txtmedia2']['tmp_name']))
		$news->media2=uploadMedia($_FILES['txtmedia2']['tmp_name'],$_FILES['txtmedia2']['name'],$_FILES['txtmedia2']['type'],$foldername);
	else
	{
		if($_POST['chkremovemedia2']==0)
			$news->media2=$_POST['hidmedia2'];
		else
			$news->media2="";
	}
	
	if(!empty($_FILES['txtmedia3']['tmp_name']))
		$news->media3=uploadMedia($_FILES['txtmedia3']['tmp_name'],$_FILES['txtmedia3']['name'],$_FILES['txtmedia3']['type'],$foldername);
	else
	{
		if($_POST['chkremovemedia3']==0)
			$news->media3=$_POST['hidmedia3'];
		else
			$news->media3="";
	}	
	
	if(!empty($_FILES['txtmedia4']['tmp_name']))
		$news->media4=uploadMedia($_FILES['txtmedia4']['tmp_name'],$_FILES['txtmedia4']['name'],$_FILES['txtmedia4']['type'],$foldername);
	else
	{
		if($_POST['chkremovemedia4']==0)
			$news->media4=$_POST['hidmedia4'];
		else
			$news->media4="";
	}
	
	if(!empty($_FILES['txtmedia5']['tmp_name']))
		$news->media5=uploadMedia($_FILES['txtmedia5']['tmp_name'],$_FILES['txtmedia5']['name'],$_FILES['txtmedia5']['type'],$foldername);
	else
	{
		if($_POST['chkremovemedia5']<>1)
			$news->media5=$_POST['hidmedia5'];
		else
			$news->media5="";
	}	

if(!empty($_POST['selectsection']))
	$news->section=$_POST['selectsection'];
else
	$news->section=	9;	
	
$news->posteddate=$_POST['txtpostdate'];
$news->lastmodified=$_POST['txtlastmodified'];
if(!empty($_POST['selectreporter']))
	$news->reporter=$_POST['selectreporter'];
else
	$news->reporter=5;
$news->postedby=$_SESSION['id'];
if(!empty($_POST['selectcategory']))
	$news->category=$_POST['selectcategory'];
else
	$news->category=23;
if(!empty($_POST['selectsubcategory']))
	$news->subcategory=$_POST['selectsubcategory'];
else
	$news->subcategory=12;
	
if($_POST['chkpublishnow']==1)
{
	$news->ispublished=1;
	$news->show=1;
}
else
{
	$news->ispublished=0;
	$news->show=1;
}	
$news->saveNews();		

echo "<script>window.location.href='news.php'</script>";

?>	
