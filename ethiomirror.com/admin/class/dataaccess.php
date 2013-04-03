<?php

include ('includes/dbconnect.php');

class DataAccess
{
	

	 function getTotalNumber($str)
	 {
		   $result=mysql_query($str);
           $count = mysql_num_rows($result);
		   return $count;
	 }
	 function Insert1($tbl, $fld, $val)
	 {
	 	$str = "INSERT INTO " . $tbl . " (" . $fld . ")" . "VALUES" . "(" . $val . ")";
		mysql_query($str);
		return true;
	 }
	 function Insert($tbl, $val)
	 { 
	 	echo $str = "INSERT INTO " . $tbl . " VALUES (" . $val . ")";
		mysql_query($str);
		return true;
	 }
	 function Update($tbl, $attribute, $crt, $val)
	 {
		$str = "UPDATE  " . $tbl . " SET " . $val . " " . " WHERE " . $attribute . " = " . $crt;
		mysql_query($str);
		return true;
	 }
	 function Update1($tbl, $attribute1, $crt1, $attribute2, $crt2, $val)
	 {
        $str = "UPDATE  " . $tbl . " SET " . " " . $val . " " . " WHERE " . $attribute1 . " = " . $crt1 ." AND ".$attribute2." = ".$crt2;
		mysql_query($str);
		return true;
	 }
	 function Delete($tbl, $val)
	 {
		$str="DELETE FROM ".$tbl." WHERE `".$tbl."`.`id`=".$val;
		mysql_query($str);
		return true;

	 }
	 function deleteRecord($sql)
	 {
	 	$str=$sql;
		mysql_query($str);
		return true;
	 
	 }
	 function GetRecord($sql)
	 {
	 	$result=mysql_query($sql);
		
		return $result;
	 }
	 function Exists($table, $field, $id)
     {
		
        if ($id == 0)
        {
     	   return false;
        }
        else
        {
        	$str = "Select count(*) from ".$table." where ".$field."= ".$id;
		  	$result=mysql_query($str);
           	$num = mysql_num_rows($result);
            if ($num >= 1)
            {
            	return true;
            }
            else
            	return false;
         }
     }
	
}
?>