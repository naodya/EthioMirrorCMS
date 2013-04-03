<?php
class Blog
{
	var $id;
	var $blog;
	var $url;
	
	
	function saveBlog()
	{
		$dac=new DataAccess();
		
		if (!$dac->Exists("blogs", "id", $this->id))
		{
		$value="'".$this->id."','"
				  .$this->blog."','"
				  .$this->url."'";
				
				  $dac->Insert("blogs",$value);
		}
		else
		{
			$value="blog='".$this->blog."', url='"
					  .$this->url."'";
			$dac->Update("blogs", "id", $this->id, $value);
		}
		

	}	
	function deleteBlog()
	{
	
		$dac=new DataAccess();
		
		$dac->Delete("blogs",$this->id);
		
	}	
	
	function getBlog1()
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM blogs";
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
        {
			$this->id=$row['id'];
			$this->blog=$row['blog'];
			$this->url=$row['url'];


			echo"

                    <tr onmouseover=this.style.backgroundColor='#E8E8E8'; onmouseout=this.style.backgroundColor='#ffffff';>
                      <td><span class='style27 style38'>".$this->blog."</span></td>
                      <td><span class='style27 style38'><a href='".$this->url."' target='_blank'>".$this->url."</a></span></td>";
					  
             echo    '<td align="center"><span class="style27 style38"><a href="blogs.php?blogid='.$this->id.'&blog='.$this->blog.'&url='.$this->url.'&action=fetch">Edit</a> | 
			 		<a href="javascript:confirmDelete(\''.blogs."."."php?id=$this->id&action=remove".'\')">Remove</a>
					</span></td></tr>';
					  
			
		}
	}
 	
	
	function getBlog()
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM blogs ORDER BY `blog` ASC";
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
        {
			$this->id=$row['id'];
			$this->blog=$row['blog'];
			$this->url=$row['url'];
			echo '<li><a href="'.$this->url.'" target="_blank">'.$this->blog.'</a></li>';
			
	
		}
	}
}
	
?>