<?php
function file_get_contentst($filename)   { 
    return join( " ",file($filename)); 
} 


function file_put_contentst($filename,$string)   { 
    $fp =  fopen($filename, "w "); 
   fwrite($fp,$string); 
    fclose($fp); 
} 
?>