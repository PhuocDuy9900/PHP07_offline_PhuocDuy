<?php
	require_once('upload.class.php');
	$config     = parse_ini_file('config.ini');
	$arrExt		= explode('|',$config['extension']);
	$fileUpload = new Upload('file-upload');
	$fileUpload->setFileExtention($arrExt);
	$fileUpload->setFileSize($config['min_size'],$config['max_size']);
	$fileUpload->setUploadDir('files/');
	if($fileUpload->isVail() == false) {
		$fileUpload->upLoad(true);
	} else {
		$fileUpload->showError();
	}
	