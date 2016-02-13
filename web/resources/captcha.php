<?php

//use Dever4eg\Framework\Session;

$string = "";
for ($i = 0; $i < 6; $i++)
	$string .= chr(rand(97, 122));

//$string = 'wwwwww';

//Session::start();
session_start();
$_SESSION['rand_code'] = $string;

$dir = __DIR__ . "/../fonts/";

$image = imagecreatetruecolor(160, 40);
$black = imagecolorallocate($image, 0, 0, 0);
$color = imagecolorallocate($image, 101, 121, 60);
$white = imagecolorallocate($image, 199, 199, 199);

imagefilledrectangle($image,0,0,399,99,$white);
imagettftext ($image, 18, 0, 10, 30, $color, $dir."20db.ttf", $_SESSION['rand_code']);

header("Content-type: image/png");
imagepng($image);