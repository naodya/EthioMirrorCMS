<?php

class Section
{
	var $id;
	var $section;
	var $description;

	
	
	function saveSection()
	{
		$dac=new DataAccess();
		
		if (!$dac->Exists("section", "id", $this->id))
		{
		$value="'".$this->id."','"
				  .$this->section."','"
				  .$this->description."'";
				
				  $dac->Insert("section",$value);
		}
		else
		{
			$value="section='".$this->section."', description='"
					  .$this->description."'";
			$dac->Update("section", "id", $this->id, $value);
		}
		

	}	
	function deleteSection()
	{
	
		$dac=new DataAccess();
		
		$dac->Delete("section",$this->id);
		
	}	
	
	function getSection()
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM section WHERE id <> 9 ORDER BY section ";
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
        {
			$this->id=$row['id'];
			$this->section=$row['section'];
			$this->description=$row['description'];


			echo"

                    <tr onmouseover=this.style.backgroundColor='#E8E8E8'; onmouseout=this.style.backgroundColor='#ffffff';>
                      <td><span class='style27 style38'>".$this->section."</span></td>
                      <td><span class='style27 style38'>".$this->description."</span></td>";
					  
             echo    '<td align="center"><span class="style27 style38"><a href="sections.php?secid='.$this->id.'&sec='.$this->section.'&description='.$this->description.'&action=fetch">Edit</a> | 
			 		<a href="javascript:confirmDelete(\''.sections."."."php?id=$this->id&action=remove".'\')">Remove</a>
					</span></td></tr>';
					  
			
		}
	}

	
	
	function getSectionforCombo()
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM section";
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
        {
			$this->id=$row['id'];
			$this->section=$row['section'];
			$this->description=$row['description'];

			echo "<option value='$this->id'>$this->section</option>";
			
		}
	}
	function getSectionName($id)
	{
	
		$dac=new DataAccess();
		$sql ="SELECT * FROM section where `id`=".$id;
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
        {
			$this->id=$row['id'];
			$this->section=$row['section'];
		}
		
		return $this->section;
				
	}	
	
	


}


?>