<?php

class Users
{
	var $id;
	var $fullname;
	var $username;
	var $password;
	var $isadmin;
	var $active;



	function saveUser()
	{
		$dac=new DataAccess();
		
		if (!$dac->Exists("users", "id", $this->id))
		{
		$value="'".$this->id."','"
				  .$this->fullname."','"
				  .$this->username."',MD5('"	
				  .$this->password."'),'"	
				  .$this->isadmin."','"		  
				  .$this->active."'";
				
				  $dac->Insert("users",$value);
		}
		else
		{
			$value="fullname='".$this->fullname."', username='"
					  .$this->username."',password=MD5('".$this->password."'),isadmin='".$this->isadmin."',active='".$this->active."'";
			$dac->Update("users", "id", $this->id, $value);
		}
		
	
	}
	
	function getUser()
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM users ORDER BY fullname ";
		
		$result=$dac->GetRecord($sql);
				
		while ($row=mysql_fetch_array($result))
		{
			$this->id=$row['id'];
			$this->fullname=$row['fullname'];
			$this->username=$row['username'];
			$this->password=$row['password'];
			$this->isadmin=$row['isadmin'];
			$this->active=$row['active'];
	
			echo"
	
					<tr onmouseover=this.style.backgroundColor='#E8E8E8'; onmouseout=this.style.backgroundColor='#ffffff';>
					  <td><span class='style27 style38'>".$this->fullname."</span></td>
					  <td><span class='style27 style38'>".$this->username."</span></td>
					  <td align='center'><span class='style27 style38'><input name='chkisadmin' type='checkbox' id='chkisadmin' value='1' ";
					  if($this->isadmin==1)
						echo 'checked="checked"';
					  echo "/></span></td>
					  <td align='center'><span class='style27 style38'><input name='chkactive' type='checkbox' id='chkactive' value='1' ";
					  if($this->active==1)
						echo 'checked="checked"';
					  echo"/></span></td>";
			 echo    '<td align="center"><span class="style27 style38"><a href="users.php?userid='.$this->id.'&fullname='.$this->fullname.'&username='.$this->username.'&gg='.$this->password.'&isadmin='.$this->isadmin.'&active='.$this->active.'&action=fetch">Edit</a> | 
					<a href="javascript:confirmDelete(\''.users."."."php?id=$this->id&action=remove".'\')">Remove</a>
					</span></td></tr>';
					  
			
		}
	}
	
	function deleteUser()
	{
	
		$dac=new DataAccess();
		$dac->Delete("users",$this->id);
		
	}	

}


?>