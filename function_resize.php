<?php
function resize($src,$des,$desired_width)
{
	$src_img=imagecreatefromjpeg($src);
	$width=imagesx($src_img);
	$height=imagesy($src_img);

	$desired_height=floor($height*($desired_width/$width));

	$virtual_img=imagecreatetruecolor($desired_width, $desired_height);

	imagecopyresampled($virtual_img, $src_img, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

	imagejpeg($virtual_img,$des);
}
?>