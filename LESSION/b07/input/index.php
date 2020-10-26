<?php

function showAll($path, &$newString)
{
	$data	= scandir($path);
	$png	= '';
	$newString .= '<ul>';
	foreach ($data as $key => $value) {
		if ($value != '.' && $value != '..') {
			$pathExt = pathinfo($value, PATHINFO_EXTENSION);
			if ($pathExt == 'mp3' || $pathExt == 'mp4' || $pathExt == 'avi') {
				$png 	= 'video.png';
			} else if($pathExt == 'html' || $pathExt == 'css' || $pathExt == 'php') {
				$png 	= 'code.png';
			} else if ($pathExt == 'png' || $pathExt == 'jpg' || $pathExt == 'jpeg') {
				$png 	= 'picture.png';
			} else {
				$png 	= 'default.png';
			}
			$dir	= $path . '/' . $value;
			if (is_dir($dir)) {
				$png		= 'folder.png';
				$newString .= '<li><img src="images/'.$png.'" style="width: 16px">' . $value;
				showAll($dir, $newString);
				$newString .= '</li>';
			} else {
				$newString .= '<li><img src="images/'.$png.'" style="width: 16px">' . $value  . '</li>';
			}
		}
	}
	$newString .= '</ul>';
}

showAll('.', $newString);
echo $newString;
