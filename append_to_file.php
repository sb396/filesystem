<?php
function append_to_file($filename,$somecontent){

   
   

    try{
        if (is_dir_writable($filename)) {
            try{
                if(fileExists($filename)){
            
                $fh = fopen($filename, 'a');
                fwrite($fh, $somecontent);
                fclose($fh);
                }
            }
            catch(fileExists $e){
                echo $e->getMessage();
            }
        
        }
    } catch (is_dir_writable $e) {
     
        echo $e->getMessage();
     
    }
}
?>

