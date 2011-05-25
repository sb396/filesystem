<?php
	function file_modification_time($path, $filename){
			throw new Exception (' Did not track file modification time');
		if(file_exists($filename)){
			echo "$filename was last modified: " . date ("F d Y H:i:s.", filemtime($filename));
		}
	}
?>
		
	
