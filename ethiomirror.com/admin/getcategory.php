<?php
include("class/includes/dbconnect.php");
include("class/dataaccess.php");
$q=$_GET["q"];

/*$con = mysql_connect('localhost', 'peter', 'abc123');
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }

mysql_select_db("ajax_demo", $con);*/


$dac=new DataAccess();
$sql ="SELECT * FROM subcategory WHERE category= ".$category;

//$result=$dac->GetRecord($sql);
$result = mysql_query($sql);		
while ($row=mysql_fetch_array($result))
{
	$this->id=$row['id'];
	$this->subcategory=$row['subcategory'];
	$this->category=$row['category'];
	if(!empty($this->subcategory))
	{
		echo "<option value='$this->id'>$this->subcategory</option>";
	}
	
}


/*$sql="SELECT * FROM subcategory WHERE id = '".$q."'";



echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";

while($row = mysql_fetch_array($result))
 {
 echo "<tr>";
 echo "<td>" . $row['FirstName'] . "</td>";
 echo "<td>" . $row['LastName'] . "</td>";
 echo "<td>" . $row['Age'] . "</td>";
 echo "<td>" . $row['Hometown'] . "</td>";
 echo "<td>" . $row['Job'] . "</td>";
 echo "</tr>";
 }
echo "</table>";

mysql_close($con);
*/?>
