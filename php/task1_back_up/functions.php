<?php 
function del($name){
    global $file;
        if(is_writable($name)){;
            unlink($name);
            $var = "File $file deleted";
        return $var;
        }
        else{
            $var = "Access denied to file $file";
        return $var;
        }
}

function sizefile($size){
    if($size < 1000){
        return number_format($size, 2) . "bite";
    }elseif($size < 1000*1024){
        return number_format($size/1024, 2) . "Kb";
    }else{
        return number_format($size/1024/1024, 2) . "Mb";
    }
}
?>