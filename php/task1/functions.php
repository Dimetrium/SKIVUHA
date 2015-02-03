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

function upload(){
    global $name;
    global $tmp_name;
	if(file_exists(DIR) && $name!=''){
        $var = "The file $name already uploaded!";
    return $var;}
    else{
        if(move_uploaded_file($tmp_name, DIR)){
		    $var = "File upload successful!";
            return $var;
    }
        else
            {
            $var = "File not uploaded";
        return $var;}
}

}
function display(){
	$files = scandir(DIR_DEST);
	array_shift($files);
	array_shift($files);
	if(empty($files)){
		$display='style="display: none;"';
		return $display;}
	else{
		$display='';
		return $display;}
	}


?>