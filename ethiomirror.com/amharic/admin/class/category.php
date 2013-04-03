<?php

class Category
{
	var $id;
	var $category;
	var $description;

	
	
	function saveCategory()
	{
		$dac=new DataAccess();
		
		if (!$dac->Exists("category", "id", $this->id))
		{
		$value="'".$this->id."','"
				  .$this->category."','"
				  .$this->description."'";
				
				  $dac->Insert("category",$value);
		}
		else
		{
			$value="category='".$this->category."', description='"
					  .$this->description."'";
			$dac->Update("category", "id", $this->id, $value);
		}
		

	}
	
	
	function saveSubCategory($id,$subcategory,$category)
	{
		$dac=new DataAccess();
		
		if (!$dac->Exists("subcategory", "id", $id))
		{
		$value="'".$id."','"
				  .$subcategory."','"
				  .$category."'";
				
				  $dac->Insert("subcategory",$value);
		}
		else
		{
			$value="subcategory='".$subcategory."', category='"
					  .$category."'";
			$dac->Update("subcategory", "id", $id, $value);
		}
		

	}
		
	function deleteCategory()
	{
	
		$dac=new DataAccess();
		
		$dac->Delete("category",$this->id);
		
	}
	
	function deleteSubCategory($id)
	
	{
	
		$dac=new DataAccess();
		
		$dac->Delete("subcategory",$id);
	}
	function deleteSubCategory1($sql)
	{
		$dac=new DataAccess();
		$dac->deleteRecord($sql);
	}
	
	function getCategory()
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM category WHERE id <> 23 ORDER BY category ";
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
        {
			$this->id=$row['id'];
			$this->category=$row['category'];
			$this->description=$row['description'];


			$editcategory=array($this->id,$this->category,$this->descripion);
			echo"
					<span class='style41'>

                    <tr onmouseover=this.style.backgroundColor='#E8E8E8'; onmouseout=this.style.backgroundColor='#ffffff';>
                      <td><span class='style27 style38'>".$this->category."</span></td>
                      <td><span class='style27 style38'>".$this->description."</span></td>";
					  
             echo    '<td align="center"><span class="style27 style38"><a href="categories.php?catid='.$this->id.'&cat='.$this->category.'&description='.$this->description.'&action=fetch">Edit</a> | 
			 		<a href="javascript:confirmDelete(\''.categories."."."php?id=$this->id&action=remove".'\')">Remove</a>
					</span></td></tr></span>'
					;
					  
			
		}
	}


	function getSubCategory1()
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM subcategory WHERE id <>12 ORDER BY `subcategory`.`category` ASC ";
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
        {
			$id=$row['id'];
			$subcategory=$row['subcategory'];
			$category=$row['category'];


		echo"

                    <tr onmouseover=this.style.backgroundColor='#E8E8E8'; onmouseout=this.style.backgroundColor='#ffffff';>
                      <td><span class='style27 style38'>".$subcategory."</span></td>
                      <td><span class='style27 style38'>".$this->getCategoryName($category)."</span></td>";
					  
             echo    '<td align="center"><span class="style27 style38"><a href="subcategories.php?subcatid='.$id.'&subcat='.$subcategory.'&catid='.$category.'&action=fetch">Edit</a> | 
			 		<a href="javascript:confirmDelete(\''.subcategories."."."php?id=$id&action=remove".'\')">Remove</a>
					</span></td></tr>';
					  
			
		}
	}
	
	function getCategoryforCombo()
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM category WHERE id<>23";
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
        {
			$this->id=$row['id'];
			$this->category=$row['category'];
			$this->description=$row['description'];
			echo "<option value='$this->id'>$this->category</option>";
			
		}
	}
	
	function getSubCategoryforCombo($category)
	{
		$dac=new DataAccess();
	    $sql ="SELECT * FROM subcategory WHERE category= ".$category;
		
		$result=$dac->GetRecord($sql);
                
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
	}
	
	function getSubCategoryforCombo1()
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM subcategory";
		
		$result=$dac->GetRecord($sql);
                
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
	}
	function getCategoryForLeftLink()
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM category ORDER BY `category` ASC";
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
        {
			$this->id=$row['id'];
			$this->category=$row['category'];
			$this->description=$row['description'];
			echo '<li><a href="categoryindex.php?categoryid='.$this->id.'">'.$this->category.'</a></li>';
			
	
		}
	}
	function getCategoryForTab()
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM category WHERE `id`!=23 ORDER BY `category` ASC ";
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
        {
			$this->id=$row['id'];
			$this->category=$row['category'];
			$this->description=$row['description'];
			echo '<a href="categoryindex.php?categoryid='.$this->id.'">'.$this->category.'</a>';
			echo ' | ';

			
	
		}
	}	
	function getCategoryName($id)
	{
	
		$dac=new DataAccess();
		$sql ="SELECT * FROM category where `id`=".$id;
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
        {
			$this->id=$row['id'];
			$this->category=$row['category'];
			$this->description=$row['description'];
		}
		
		return $this->category;
				
	}
	function getSubCategoryName($id)
	{
	
		$dac=new DataAccess();
		$sql ="SELECT * FROM subcategory WHERE `id`=".$id;
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
        {
			$this->id=$row['id'];
			$this->subcategory=$row['subcategory'];
			$this->description=$row['description'];
		}
		
		return $this->subcategory;
				
	}	
	function getSubCategory($categoryid)
	{
	
		$dac=new DataAccess();
		$sql ="SELECT * FROM subcategory where `category`=".$categoryid;
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
        {
			$id=$row['id'];
			$subcategory=$row['subcategory'];
			$category=$row['category'];
			echo '<a href="subcategoryindex.php?categoryid='.$category.'&subcategoryid='.$id.'">'.$subcategory.'</a>';
			if ($subcategory <> " ")
			echo ' | ';
		}
		
		
				
	}	
	
	function getSubCategoryForCategory($categoryid)
	{
	
		$dac=new DataAccess();
		$sql ="SELECT * FROM subcategory where `category`=".$categoryid;
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
        {
			$id=$row['id'];
			$subcategory=$row['subcategory'];
			$category=$row['category'];
			echo $subcategory.",";
		}
		
		
				
	}	


}


?>