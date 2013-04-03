<?php
class OtherLinks
{
	var $id;
	var $link;
	var $url;
	
	
	function saveLink()
	{
		$dac=new DataAccess();
		
		if (!$dac->Exists("otherlinks", "id", $this->id))
		{
		$value="'".$this->id."','"
				  .$this->link."','"
				  .$this->url."'";
				
				  $dac->Insert("otherlinks",$value);
		}
		else
		{
			$value="link='".$this->link."', url='"
					  .$this->url."'";
			$dac->Update("otherlinks", "id", $this->id, $value);
		}
		

	}	
	function deleteLink()
	{
	
		$dac=new DataAccess();
		
		$dac->Delete("otherlinks",$this->id);
		
	}	
	
	
	function getOtherLink1()
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM otherlinks";
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
        {
			$this->id=$row['id'];
			$this->link=$row['link'];
			$this->url=$row['url'];


			echo"

                    <tr onmouseover=this.style.backgroundColor='#E8E8E8'; onmouseout=this.style.backgroundColor='#ffffff';>
                      <td><span class='style27 style38'>".$this->link."</span></td>
                      <td><span class='style27 style38'><a href='".$this->url."' target='_blank'>".$this->url."</a></span></td>";
					  
             echo    '<td align="center"><span class="style27 style38"><a href="othermedialinks.php?linkid='.$this->id.'&link='.$this->link.'&url='.$this->url.'&action=fetch">Edit</a> | 
			 		<a href="javascript:confirmDelete(\''.othermedialinks."."."php?id=$this->id&action=remove".'\')">Remove</a>
					</span></td></tr>';
					  
			
		}
	}
 	
 	
	
	function getOtherLink()
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM otherlinks ORDER BY `link` ASC";
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
        {
			$this->id=$row['id'];
			$this->link=$row['link'];
			$this->url=$row['url'];
			echo '<li><a href="'.$this->url.'" target="_blank">'.$this->link.'</a></li>';
			
	
		}
	}
}
	
?>