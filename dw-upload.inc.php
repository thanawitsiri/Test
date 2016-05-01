<?php
function dwUpload($file,$path="./img-rooms/"){
	if(@copy($file['tmp_name'],$path.$file['name'])){
		@chmod($path.$file,0777);
		return $file['name'];
	}else{
		return false;
	}
}
?>