<?php
include 'config.php';

include 'functions.php';
$dir = opendir(DIR_DEST);

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(file_exists(DIR) && $name!=''){
        echo "The file $name already uploaded!";}
    else{
        if(move_uploaded_file($tmp_name, DIR)){
            echo "File upload successful!";
    }
        else
            {echo "File not uploaded";}
}}
if(isset($_GET['name'])){
    $file = $_GET['name'];
    $file_del = DIR_DEST . $file;
    
        if($var = del($file_del)){
        echo $var;
        }else{
            echo "Access denided";
        }
}
    //if(isset($_SERVER['HTTP_REFERER'])){
    //header("location: $_SERVER[HTTP_REFERER]");

          
include VIEW;

?>