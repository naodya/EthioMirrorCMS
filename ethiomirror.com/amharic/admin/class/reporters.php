<?php

class Reporters
{
	var $id;
	var $fullname;
	var $tel;
	var $address;
	var $email;
	var $location;



	function saveReporter()
	{
		$dac=new DataAccess();
		
		if (!$dac->Exists("reporters", "id", $this->id))
		{
		$value="'".$this->id."','"
				  .$this->fullname."','"
				  .$this->tel."','"	
				  .$this->address."','"	
				  .$this->email."','"		  
				  .$this->location."'";
				
				  $dac->Insert("reporters",$value);
		}
		else
		{
			$value="fullname='".$this->fullname."', tel='"
					  .$this->tel."',address='".$this->address."',email='".$this->email."',location='".$this->location."'";
			$dac->Update("reporters", "id", $this->id, $value);
		}
		

	}

	function getReporter()
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM reporters WHERE id <> 5 ORDER BY fullname ";
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
        {
			$this->id=$row['id'];
			$this->fullname=$row['fullname'];
			$this->tel=$row['tel'];
			$this->address=$row['address'];
			$this->email=$row['email'];
			$this->location=$row['location'];

			echo"

                    <tr onmouseover=this.style.backgroundColor='#E8E8E8'; onmouseout=this.style.backgroundColor='#ffffff';>
                      <td><span class='style27 style38'>".$this->fullname."</span></td>
                      <td><span class='style27 style38'>".$this->tel."</span></td>
                      <td><span class='style27 style38'>".$this->address."</a></span></td>
                      <td><span class='style27 style38'><a href='mailto:".$this->email."'>".$this->email."</a></span></td>
                      <td><span class='style27 style38'>".$this->location."</span></td>";
					  
             echo    '<td align="center"><span class="style27 style38"><a href="reporters.php?reporterid='.$this->id.'&fullname='.$this->fullname.'&telephone='.$this->tel.'&address='.$this->address.'&email='.$this->email.'&location='.$this->location.'&action=fetch">Edit</a> | 
			 		<a href="javascript:confirmDelete(\''.reporters."."."php?id=$this->id&action=remove".'\')">Remove</a>
					</span></td></tr>';
					  
			
		}
	}
	function deleteReporter()
	{
	
		$dac=new DataAccess();
		
		$dac->Delete("reporters",$this->id);
		
	}	
	
	
	
	
	function getReportersforCombo()
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM reporters";
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
        {
			$this->id=$row['id'];
			$this->fullname=$row['fullname'];
			$this->tel=$row['tel'];
			$this->address=$row['address'];
			$this->email=$row['email'];
			$this->location=$row['location'];
			
			echo "<option value='$this->id'>$this->fullname</option>";
			
		}
	}
	function getReporterName($id)
	{
	
		$dac=new DataAccess();
		$sql ="SELECT * FROM reporters where `id`=".$id;
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
        {
			$this->id=$row['id'];
			$this->fullname=$row['fullname'];
		}
		
		return $this->fullname;
				
	}



}


?>