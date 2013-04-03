<?php 

class Image
{
	var $width;
	var $height;
	var $target;
	
	
	function resize($width, $height, $target)
	{ 
		$this->width=$width;
		$this->height=$height;
		$this->target=$target;
	
		if ($this->width > $this->height)
		{ 
			$percentage = ($this->target / $this->width); 
		}
		else
		{
			$percentage = ($this->target / $this->height); 
		} 
	
		$this->width = round($this->width * $percentage); 
		$this->height = round($this->height * $percentage); 
	
		return "width=\"$this->width\" height=\"$this->height\""; 
	
	}
} 

?>

