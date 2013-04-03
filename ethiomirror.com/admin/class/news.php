
<?php

class News
{
	var $id;
	var $headline;
	var $body;
	var $keyword;
	var $media1;
	var $media2;
	var $media3;
	var $media4;
	var $media5;
	var $section;	
	var $posteddate;
	var $lastmodified;		
	var $reporter;
	var $postedby;
	var $category;
	var $subcategory;
	var $ispublished;
	var $show;		

	
	function getHomeNewsIds($section)
	{	
		
		$dac=new DataAccess();
		$sql ="SELECT * FROM `news` WHERE `show` = 1 AND `section`=".$section;
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
		{
			$this->id=$row['id'];

		}
		return $this->id;
	}

	function searchNews($keyword)
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM news WHERE keyword LIKE '%".$keyword."%' AND ispublished=1";
		
		$result=$dac->GetRecord($sql);
		$num=mysql_num_rows($result);
		
		if(($num>0))
		{
           	echo '<p><span class="style3">'.$num.' Results found</span></br>';

			 $i=1;   
			while ($row=mysql_fetch_array($result))
			{
				
							
				
				$this->id=$row['id'];
				$this->headline=$row['headline'];
				$this->body=$row['body'];
				$this->keyword=$row['keyword'];
				$this->media1=$row['media1'];
				$this->media2=$row['media2'];
				$this->media3=$row['media3'];
				$this->media4=$row['media4'];
				$this->media5=$row['media5'];
				$this->section=$row['section'];
				$this->posteddate=$row['posteddate'];
				$this->lastmodified=$row['lastmodified'];
				$this->reporter=$row['reporter'];
				$this->postedby=$row['postedby'];
				$this->category=$row['category'];
				$this->subcategory=$row['subcategory'];
				$this->ispublished=$row['ispublished'];
				$this->show=$row['show'];
				
				
				$image=new Image();
				$osize= getimagesize($this->media1);
				if($osize<>0)
				{
					$imagedimension=$image->resize($osize[0], $osize[1], 100);
				}
				else
					$imagedimension="width=0 height=0";
						
				echo'<p>';
				echo'
				
				<table width="66%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="16%" rowspan="2" align="center" valign="middle">
						<a href="'.$this->media1.'"><img src="'.$this->media1.'" alt="'.$this->headline.'" '.$imagedimension.' border="0" /></a>
					</td>
					<td width="3%" rowspan="2">&nbsp;</td>
					<td>
						<h3><a href="inside.php?newsid='.$this->id.'&section='.$this->section.'&reporter='.$this->reporter.'">'.$i." - ".$this->headline.'</a></h3>
					</td>
				  </tr>
				  <tr>
					<td valign="top"><p class="style6"><span class="style8">';
					
						$file = $this->body;
						if(!empty($file))
						{
							$fh = fopen($file, 'r');
							$content = fread($fh,250);
							fclose($fh);
							echo $content.'...&nbsp';
						}
				echo'<strong></strong></span></p>
					
					</td>
				  </tr>
				</table>
				
					
				';
				$i++;
				
			}
		}
		else
			echo "No Results Found";
		
	}
	function getCategoryName($id)
	{
		$dac=new DataAccess();
		$sql ="SELECT category FROM category WHERE id=".$id;
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
        {
			$this->category=$row['category'];
		}
		
		return $this->category;
	}
	function getSectionName($id)
	{
		$dac=new DataAccess();
		$sql ="SELECT section FROM section WHERE id=".$id;
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
        {
			$this->section=$row['section'];
		}
		
		return $this->section;
	}	
	
	function getReporterName($id)
	{
		if($id<>5)
		{
			$dac=new DataAccess();
			$sql ="SELECT fullname FROM reporters WHERE id=".$id;
			
			$result=$dac->GetRecord($sql);
					
			while ($row=mysql_fetch_array($result))
			{
				$this->reporter=$row['fullname'];
			}
			return $this->reporter;
		}
	}
	
	function getNews()
	{	
		
		$dac=new DataAccess();
		$sql ="SELECT * FROM `news` WHERE `ispublished` = 1 AND `show` = 1 ORDER BY `posteddate` DESC ";
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
		{
        
			$this->id=$row['id'];
			$this->headline=$row['headline'];
			$this->body=$row['body'];
			$this->media1=$row['media1'];
			$this->media2=$row['media2'];
			$this->media3=$row['media3'];
			$this->media4=$row['media4'];
			$this->media5=$row['media5'];
			$this->section=$row['section'];
			$this->posteddate=$row['posteddate'];
			$this->lastmodified=$row['lastmodified'];
			$this->reporter=$row['reporter'];
			$this->postedby=$row['postedby'];
			$this->category=$row['category'];
			$this->subcategory=$row['subcategory'];
			$this->show=$row['show'];
			
			$categoryname=$this->getCategoryName($this->category=$row['category']);
			$sectionname=$this->getSectionName($this->section=$row['section']);
			if($this->reporter<>5)
				$reportername=$this->getReporterName($this->reporter);
			else
				$reportername="Not specified";
			$currentdate=date('Y-m-d');


			echo"

                    <tr onmouseover=this.style.backgroundColor='#E8E8E8'; onmouseout=this.style.backgroundColor='#ffffff';>
                      <td align='left'><span class='style27 style38'>".$this->posteddate."</span></td>
                      <td><span class='style27 style38'>
					  <a href='../ethiomirror/inside.php?reporter=".$row['reporter']."&section=".$row['section']."&newsid=".$this->id."' target='_blank' >".$this->headline."</a></span></td>
                      <td><span class='style27 style38'>".$categoryname."</span></td>
                      <td align='left'><span class='style27 style38'>".$sectionname."</span></td>
                      <td><span class='style27 style38'>".$reportername."</span></td>";
					  
             echo    '<td align="center"><span class="style27 style38"><a href="newsedit.php?newsid='.$this->id.'&action=fetch&currentdate='.$currentdate.'">Edit</a> | 
			 		<a href="javascript:confirmAction(\''.news."."."php?id=$this->id&action=archive".'\')">Unpublish</a> | 
					<a href="javascript:confirmDelete(\''.news."."."php?id=$this->id&action=remove&dir=$this->body".'\')">Remove</a>
					</span></td></tr>';
					
		}
	}
	function getDraftNews()
	{	
		
		$dac=new DataAccess();
		$sql ="SELECT * FROM `news` WHERE `ispublished` = 0 AND `show` = 1 ORDER BY `posteddate` DESC ";
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
		{
        
			$this->id=$row['id'];
			$this->headline=$row['headline'];
			$this->body=$row['body'];
			$this->media1=$row['media1'];
			$this->media2=$row['media2'];
			$this->media3=$row['media3'];
			$this->media4=$row['media4'];
			$this->media5=$row['media5'];
			$this->section=$row['section'];
			$this->posteddate=$row['posteddate'];
			$this->lastmodified=$row['lastmodified'];
			$this->reporter=$row['reporter'];
			$this->postedby=$row['postedby'];
			$this->category=$row['category'];
			$this->subcategory=$row['subcategory'];
			$this->show=$row['show'];
			
			$categoryname=$this->getCategoryName($this->category=$row['category']);
			$sectionname=$this->getSectionName($this->section=$row['section']);
			if($this->reporter<>5)
				$reportername=$this->getReporterName($this->reporter);
			else
				$reportername="Not specified";
			
			$currentdate=date('Y-m-d');


			echo"

                    <tr onmouseover=this.style.backgroundColor='#E8E8E8'; onmouseout=this.style.backgroundColor='#ffffff';>
                      <td align='left'><span class='style27 style38'>".$this->posteddate."</span></td>
                      <td><span class='style27 style38'>
					  <a href='../ethiomirror/inside.php?reporter=".$row['section']."&section=".$row['section']."&newsid=".$this->id."' target='_blank' >".$this->headline."</a></span></td>
                      <td><span class='style27 style38'>".$categoryname."</span></td>
                      <td align='left'><span class='style27 style38'>".$sectionname."</span></td>
                      <td><span class='style27 style38'>".$reportername."</span></td>";
					  
             echo    '<td align="center"><span class="style27 style38"><a href="newsedit.php?newsid='.$this->id.'&action=fetch&currentdate='.$currentdate.'">Edit</a> | 
			 		<a href="javascript:confirmAction(\''.draftnews."."."php?id=$this->id&action=publish".'\')">Publish</a> | 
					<a href="javascript:confirmDelete(\''.news."."."php?id=$this->id&action=remove&dir=$this->body".'\')">Remove</a>
					</span></td></tr>';
					
		}
	}
	
	function getNewsImage($newsid)
	{	
		
		$dac=new DataAccess();
		$sql ="SELECT * FROM `news` WHERE `id` = ".$newsid;
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
		{
        
			$this->media1=$row['media1'];
			$this->media2=$row['media2'];
			$this->media3=$row['media3'];
			$this->media4=$row['media4'];
			$this->media5=$row['media5'];
		}
		
		if (!empty ($this->media1))
			return $this->media1;
		else
			return $this->media2;
	}
	function getCategoryNewsImage($category)
	{	
		
		$dac=new DataAccess();
		$sql ="SELECT * FROM `news` WHERE `category` = ".$category. " AND `show`=1 ORDER BY `posteddate` ASC";
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
		{
        
			$this->media1=$row['media1'];
			$this->media2=$row['media2'];
			$this->media3=$row['media3'];
			$this->media4=$row['media4'];
			$this->media5=$row['media5'];
		}
		if (!empty ($this->media1))
			return $this->media1;
			//echo'<img src="'.$this->media1.'" alt="" width="250" height="250" />';
		//if (!empty ($this->media2)
	}

	function getRelatedPictures($newsid)
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM `news` WHERE `id` = ".$newsid;
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
		{
        
			
			$this->media1=$row['media1'];
			$this->media2=$row['media2'];
			$this->media3=$row['media3'];
			$this->media4=$row['media4'];
			$this->media5=$row['media5'];
		}

		if (!empty($this->media1)||!empty($this->media2)||!empty($this->media3)||!empty($this->media4)||!empty($this->media5))
		{
			echo '<h3>Related media</h3>';
			if (!empty ($this->media1))
				echo '<li><a href="'.$this->media1.'">Related media - 1</a></li>';
			if (!empty ($this->media2))
				echo '<li><a href="'.$this->media2.'">Related media - 2</a></li>';
			if (!empty ($this->media3))
				echo '<li><a href="'.$this->media3.'">Related media - 3</a></li>';
			if (!empty ($this->media4))
				echo '<li><a href="'.$this->media4.'">Related media - 4</a></li>';
			if (!empty ($this->media5))
				echo '<li><a href="'.$this->media5.'">Related media - 5</a></li>';		
		}
	}
	function getNewsForEdit($newsid)
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM `news` WHERE `id` = ".$newsid;
		
		$result=$dac->GetRecord($sql);
		
		while ($row=mysql_fetch_array($result))
		{
			$this->id=$row['id'];
			$this->headline=$row['headline'];
			$this->body=$row['body'];
			$this->keyword=$row['keyword'];
			$this->media1=$row['media1'];
			$this->media2=$row['media2'];
			$this->media3=$row['media3'];
			$this->media4=$row['media4'];
			$this->media5=$row['media5'];
			$this->section=$row['section'];
			$this->posteddate=$row['posteddate'];
			$this->lastmodified=$row['lastmodified'];
			$this->reporter=$row['reporter'];
			$this->postedby=$row['postedby'];
			$this->category=$row['category'];
			$this->subcategory=$row['subcategory'];
			$this->ispublished=$row['ispublished'];
			$this->show=$row['show'];
		}
		$editnews=array($this->id,$this->headline,$this->body,$this->keyword,$this->media1,$this->media2,$this->media3,$this->media4,$this->media5,$this->section,$this->posteddate,$this->lastmodified,$this->reporter,$this->postedby,$this->category,$this->subcategory,$this->ispublished,$this->show);
		return $editnews;
		
	}
	
	function getArchivedNews()
	{	
	
		$dac=new DataAccess();
		$sql ="SELECT * FROM `news` WHERE `ispublished` = 0 AND `show` = 0 ORDER BY `posteddate` DESC ";
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
		{
        
			$this->id=$row['id'];
			$this->headline=$row['headline'];
			$this->body=$row['body'];
			$this->media1=$row['media1'];
			$this->media2=$row['media2'];
			$this->media3=$row['media3'];
			$this->media4=$row['media4'];
			$this->media5=$row['media5'];
			$this->section=$row['section'];
			$this->posteddate=$row['posteddate'];
			$this->lastmodified=$row['lastmodified'];
			$this->reporter=$row['reporter'];
			$this->postedby=$row['postedby'];
			$this->category=$row['category'];
			$this->show=$row['show'];
			
			$categoryname=$this->getCategoryName($this->category=$row['category']);
			$sectionname=$this->getSectionName($this->section=$row['section']);
			if($this->reporter<>5)
				$reportername=$this->getReporterName($this->reporter);
			else
				$reportername="Not specified";				


			echo"

                    <tr onmouseover=this.style.backgroundColor='#E8E8E8'; onmouseout=this.style.backgroundColor='#ffffff';>
                      <td align='left'><span class='style27 style38'>".$this->posteddate."</span></td>
                      <td><span class='style27 style38'><a href='../ethiomirror/inside.php?reporter=".$row['reporter']."&section=".$row['section']."&newsid=".$this->id."' target='_blank' >".$this->headline."</a></span></td>
                      <td><span class='style27 style38'>".$categoryname."</span></td>
                      <td><span class='style27 style38'>".$reportername."</span></td></tr>";
					  

					
		}
	}


	
	function saveNews()
	{
		$dac=new DataAccess();
		
		if (!$dac->Exists("news", "id", $this->id))
		{
		$value="'".$this->id."','"
				  .$this->headline."','"
				  .$this->body."','"
				  .$this->keyword."','"
				  .$this->media1."','"
				  .$this->media2."','"
				  .$this->media3."','"
				  .$this->media4."','"
				  .$this->media5."','"
				  .$this->section."','"
				  .$this->posteddate."','"
				  .$this->lastmodified."','"
				  .$this->reporter."','"
				  .$this->postedby."','"
				  .$this->category."','"
				  .$this->subcategory."','"
				  .$this->ispublished."','"
				  .$this->show."'";
				
				  $dac->Insert("news",$value);
		}
		else
		{
			$value="headline='".$this->headline."', body='"
					  .$this->body."', keyword='"
					  .$this->keyword."', media1='"
					  .$this->media1."', media2='"
					  .$this->media2."', media3='"
					  .$this->media3."', media4='"
					  .$this->media4."', media5='"
					  .$this->media5."', section='"
					  .$this->section."', posteddate='"
					  .$this->posteddate."', lastmodified='"
					  .$this->lastmodified."', reporter='"
					  .$this->reporter."', postedby='"
					  .$this->postedby."', category='"
					  .$this->category."', subcategory='"
					  .$this->subcategory."', ispublished='"
					  .$this->ispublished."', news.show='"
					  .$this->show."'";
				  
			$dac->Update("news", "id", $this->id, $value);
		}
		

	}

	function publishDraftNews($id)
	{
		$dac=new DataAccess();
		$value="`ispublished` = 1";
		$dac->Update("news", "id", $id, $value);
	}
	function deleteNews()
	{
	
		$dac=new DataAccess();
		
		$dac->Delete("news",$this->id);
		
	}
	
	function archiveNews()
	{
		$dac=new DataAccess();
		
		$dac->Update("news", "`id`", $this->id, "`ispublished` = 0,`show` = 0");
		
	}
	function fetchHeadline($section)
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM `news` WHERE `ispublished` = 1 AND`show` = 1 AND section=".$section;
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
		{
			$this->headline=$row['headline'];
			$this->id=$row['id'];
			$this->section=$row['section'];
			$this->reporter=$row['reporter'];
		}
		return '<a href="inside.php?reporter='.$this->reporter.'&section='.$this->section.'&newsid='.$this->id.'">'.$this->headline.'</a>';
	}
	function readMore($section)
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM `news` WHERE `show` = 1 AND section=".$section;
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
		{
			$this->headline=$row['headline'];
			$this->id=$row['id'];
			$this->section=$row['section'];
			$this->reporter=$row['reporter'];
		}
		return '<a href="inside.php?reporter='.$this->reporter.'&section='.$this->section.'&newsid='.$this->id.'"> READ MORE </a>';
	}
	function categoryReadMore($category)
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM `news` WHERE `category` = ".$category." AND `show`=1 ORDER BY `posteddate` ASC";
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
		{
			$this->headline=$row['headline'];
			$this->id=$row['id'];
			$this->section=$row['section'];
			$this->reporter=$row['reporter'];
		}
		return '<a href="inside.php?reporter='.$this->reporter.'&section='.$this->section.'&newsid='.$this->id.'"> READ MORE </a>';
	}	
	function fetchCategoryHeadline($category, $section)
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM `news` WHERE `category` =".$category." AND `section` =".$section." HAVING `show` =1 ORDER BY `posteddate` ASC";
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
		{
			$this->headline=$row['headline'];
			$this->id=$row['id'];
			$this->section=$row['section'];
			$this->reporter=$row['reporter'];
		}
		return '<a href="inside.php?reporter='.$this->reporter.'&section='.$this->section.'&newsid='.$this->id.'">'.$this->headline.'</a>';
	}	
	
	
	function fetchHeadlineForInside($id)
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM `news` WHERE `id` = ".$id;
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
		{
			$this->id=$row['id'];
			$this->headline=$row['headline'];
		}
		echo $this->headline;
	}
	function printableVersion($id)
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM `news` WHERE `id` = ".$id;
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
		{
			$this->id=$row['id'];
			$this->headline=$row['headline'];
			$this->section=$row['section'];
			$this->reporter=$row['reporter'];
		}
		echo '<a href="printableversion.php?reporter='.$this->reporter.'&section='.$this->section.'&newsid='.$this->id.'" target="_blank">Printable version</a>';
	}
	function emailPage($id)
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM `news` WHERE `id` = ".$id;
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
		{
			$this->id=$row['id'];
			$this->headline=$row['headline'];
			$this->section=$row['section'];
			$this->reporter=$row['reporter'];
		}	
		echo '<a href="emailpage.php" target="_blank">Email this page to a friend</a>';
	}

	function fetchBody($section)
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM `news` WHERE `ispublished` = 1 AND `show` = 1 AND section=".$section;
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
		{
			$this->body=$row['body'];
			$this->id=$row['id'];

		}
		return $this->body;
	}
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
	
	function fetchCategoryNews($category)
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM `news` WHERE `ispublished` = 1 AND `show` = 1 AND category=".$category;
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
		{
			$id=$row['id'];
			$headline=$row['headline'];
			$body=$row['body'];
			$section=$row['section'];
			$reporter=$row['reporter'];
			$media1=$row['media1'];
			
			$osize= getimagesize($media1);
			$image=new Image();

		if (!empty ($media1))
			echo '<a href="'.$media1.'"><img src="'.$media1.'" alt="'.$headline.'" '.$image->resize($osize[0], $osize[1], 150).' border="0" /></a>';
			
			echo '<h3><a href="inside.php?newsid='.$id.'&section='.$section.'&reporter='.$reporter.'">'.$headline.'</a></h3>';
			$file = $body;
			if(!empty($file))
			{
				$fh = fopen($file, 'r');
				$content = fread($fh,filesize($file));
				fclose($fh);
				echo $this->limit_words($content,120,'...&nbsp'.'<a href="inside.php?newsid='.$id.'&section='.$section.'&reporter='.$reporter.'">READ MORE</a></br>');

			}
			echo '<br/><br/><p>';
		}

		
		
		

	}
	function fetchSubCategoryNews($subcategory)
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM `news` WHERE `ispublished` = 1 AND `show` = 1 AND subcategory=".$subcategory;
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
		{
			$id=$row['id'];
			$headline=$row['headline'];
			$body=$row['body'];
			$section=$row['section'];
			$reporter=$row['reporter'];
			$media1=$row['media1'];
			
			$osize= getimagesize($media1);
			$image=new Image();

		if (!empty ($media1))
			echo '<a href="'.$media1.'"><img src="'.$media1.'" alt="'.$headline.'" '.$image->resize($osize[0], $osize[1], 150).' border="0" /></a>';
			
			echo '<h3><a href="inside.php?newsid='.$id.'&section='.$section.'&reporter='.$reporter.'">'.$headline.'</a></h3>';
			$file = $body;
			if(!empty($file))
			{
				$fh = fopen($file, 'r');
				$content = fread($fh,filesize($file));
				fclose($fh);
				echo $this->limit_words($content,120,'...&nbsp'.'<a href="inside.php?newsid='.$id.'&section='.$section.'&reporter='.$reporter.'">READ MORE</a></br>');

			}
			echo '<br/><br/><p>';
		}

		
		
		

	}
	function fetchCategoryBody($category,$section)
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM `news` WHERE category=".$category." AND section=".$section." HAVING `ispublished` = 1 AND `show` = 1 ORDER BY `posteddate` ASC";
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
		{
			$this->body=$row['body'];
			$this->id=$row['id'];

		}
		return $this->body;
	}
	function fetchBodyForInside($id)
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM `news` WHERE `id` = ".$id;
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
		{
			$this->id=$row['id'];
			$body=$this->body=$row['body'];
		}
		return $body;
	}	
	

	function fetchHeadlines()
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM `news` WHERE `ispublished` = 1 AND `show` = 1 AND `section`<=5 ORDER BY `news`.`section` ASC ";
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
		{
			$this->headline=$row['headline'];
			$this->id=$row['id'];
			$this->section=$row['section'];
			$this->reporter=$row['reporter'];
				
			echo '<p> <a href="inside.php?reporter='.$this->reporter.'&section='.$this->section.'&newsid='.$this->id.'">'.$this->headline.'</a> </p>';
		}
		
		//return '<a href="#?newsid'.$this->id.'">'.$this->headline.'</a>';
	}
	function fetchCategoryHeadlines($categoryid)
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM `news` WHERE `category`=".$categoryid." AND `ispublished` = 1 AND `show` = 1";
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
		{
			$this->headline=$row['headline'];
			$this->id=$row['id'];
			$this->section=$row['section'];
			$this->reporter=$row['reporter'];
				
			echo '<p> <a href="inside.php?reporter='.$this->reporter.'&section='.$this->section.'&newsid='.$this->id.'">'.$this->headline.'</a> </p>';
		}
		
	}
	
		
	function fetchSubCategoryHeadlines($subcategoryid)
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM `news` WHERE `subcategory`=".$subcategoryid." AND `ispublished` = 1 AND`show` = 1";
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
		{
			$this->headline=$row['headline'];
			$this->id=$row['id'];
			$this->section=$row['section'];
			$this->reporter=$row['reporter'];
				
			echo '<p> <a href="inside.php?reporter='.$this->reporter.'&section='.$this->section.'&newsid='.$this->id.'">'.$this->headline.'</a> </p>';
		}
		
	}
	function fetchOtherHeadlines()
	{
		$dac=new DataAccess();
		$sql ="SELECT * FROM `news` WHERE `ispublished` = 1 AND `show` = 1 AND `section`>5 ORDER BY `news`.`section` ASC ";
		
		$result=$dac->GetRecord($sql);
                
	    while ($row=mysql_fetch_array($result))
		{
			$this->headline=$row['headline'];
			$this->id=$row['id'];
			$this->section=$row['section'];
			$this->reporter=$row['reporter'];
				
			echo '<p><a href="inside.php?reporter='.$this->reporter.'&section='.$this->section.'&newsid='.$this->id.'">'.$this->headline.'</a> </p>';
		}
		
		//return '<a href="#?newsid'.$this->id.'">'.$this->headline.'</a>';
	}


}


?>