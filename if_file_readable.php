<?php
function if_file_readable($path){
        if (!is_readable($path)) {
    throw new Exception ('File is not readable!');
        }
}
?>

