<?php

function showAll($path, &$newString)
{
	$arrExt = [
		'video' => ['mp3', 'mp4', 'avi'],
		'picture' => ['mp3', 'mp4', 'avi'],
		'code' => ['html', 'css', 'php'],

	];
	$data	= scandir($path);
	$png	= '';
	$newString .= '<ul>';
	foreach ($data as $key => $value) {
		if ($value != '.' && $value != '..') {
			$pathExt = pathinfo($value, PATHINFO_EXTENSION);
			if (in_array($pathExt,$arrExt['video'])) {
				$png 	= 'video.png';
			} else if(in_array($pathExt,$arrExt['code'])) {
				$png 	= 'code.png';
			} else if (in_array($pathExt,$arrExt['picture'])) {
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
