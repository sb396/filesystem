<?php
function append_to_file(){

    $filename = 'test.txt';
    $somecontent = "Add this to the file\n";

    try{
        if (is_dir_writable($filename)) {
            try{
                if(fileExists($filename)){
            
                $fh = fopen($filename, 'a');
                fwrite($fh, $somecontent);
                fclose($fh);
                }
            }
            catch{
                echo $e->getMessage();
            }
        
        }
    } catch (is_dir_writable $e) {
     
        echo $e->getMessage();
     
    }
}
?>
