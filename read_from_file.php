<?php
function read_from_file($filename){

    $readcontent;

    try{
        if(fileExists($filename)){
            try{
                if(if_file_readable($filename)){
            
                    $fh = fopen($filename, 'r');
                    $readcontent = fread($fh, $filename);
                    fclose($fh);
                }
            }
            catch(if_file_readable $e){
            
                echo $e->getMessage();
            }
        
        }
    } 
    catch(fileExists $e){
     
        echo $e->getMessage();
     
    }
}
?>

