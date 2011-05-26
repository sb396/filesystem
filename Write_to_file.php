<?php
function Write_to_file(){

    $filename = 'test.txt';
    $somecontent = "Add this to the file\n";

    try{
        if (is_dir_writable($filename)) {
        
            $fh = fopen($filename, 'w');
            fwrite($fh, $somecontent);
            fclose($fh);

        }
   }  catch (is_dir_writable $e) {
     
        echo $e->getMessage();
     
    }
}
?>

