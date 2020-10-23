<?php

class Upload
{
    private $_fileName;
    private $_fileSize;
    private $_fileTmp;
    private $_fileExt;
    private $_errors;
    private $_uploadDir;

    // Method contrust
    public function __construct($fileName)
    {
        $fileInfo                   = $_FILES[$fileName];
        $this->_fileName            = $fileInfo['name'];
        $this->_fileSize            = $fileInfo['size'];
        $this->_fileTmp             = $fileInfo['tmp_name'];
        $this->_fileExt             = $this->getFileExtention();
    }

    // Method get extention file
    public function getFileExtention()
    {
        $ext    = pathinfo($this->_fileName, PATHINFO_EXTENSION);
        return $ext;
    }
    // Method set extention file
    public function setFileExtention($arrExtention)
    {
        if (@in_array(strtolower($this->_fileExt), $arrExtention) == false) {
            $this->_errors[] = 'Dinh dang khong hop le';
        } else {
            echo 'abc';
        }
    }

    // Method get size file
    public function getFileSize()
    {
        return $this->_fileSize;
    }
    // Method set size file
    public function setFileSize($min, $max)
    {
        if ($this->_fileSize < $min || $this->_fileSize > $max) {
            $this->_errors[] = 'Kich thuoc tap tin khong hop le';
        } else {
            echo 'Hop le';
        }
    }

    // Method set upload directory
    public function setUploadDir($path)
    {
        if (file_exists($path)) {
            $this->_uploadDir = $path;
        } else {
            $this->_errors[] = 'Thu muc khong hop le';
        }
    }

    // Method check vailid file
    public function isVail()
    {
        $flag = false;
        if (@count($this->_errors) > 0) $flag = true;
        return $flag;
    }
    // Method upload File
    public function upLoad($rename = true)
    {
        if ($rename) {
            $fileName = $this->randomString(6);
            move_uploaded_file($this->_fileTmp, $this->_uploadDir . $fileName);
        } else {
            move_uploaded_file($this->_fileTmp, $this->_uploadDir . $this->randomString($this->_fileName,7));
        }
    }

    // Method show error
    public function showError()
    {
        echo '<pre>';
        print_r($this->_errors);
        echo '</pre>';
    }
    
    // Method random
    private function randomString($length = 5){
		$arrCharacter = array_merge(range('A','Z'), range('a','z'), range(0,9));
		$arrCharacter = implode('',$arrCharacter);
		$arrCharacter = str_shuffle($arrCharacter);
	
		$result		= substr($arrCharacter, 0, $length) . '.' . $this->_fileExt;
		return $result;
	}
}
