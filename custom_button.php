<?php

$string = $_GET['text'];

$xoffset      = $_GET['x'];

$yoffset      = $_GET['y'];

$font   = 'fonts/AfternooninStereoPersonalUse.ttf';

$size   = $_GET['size'];

$checked = $_GET['checked'];

$box    = imagettfbbox($size, 0, $font, $string);

$width  = abs($box[0] + $box[2]);

$height = abs($box[7] + $box[1]);

$im     = imagecreatefromjpeg('images/thanksgiving.jpg');

$overlay  = imagecreatefrompng('images/thanksgiving-overlay.png');

$white = imagecolorallocate($im, 255, 255, 255);

$grey = imagecolorallocate($im, 148, 107, 3);

$x      = (imagesx($im) / 2) - ($width / 2) + $xoffset;

$y      = (imagesy($im) / 2) + ($height / 2) + $yoffset;

imagettftext($im, $size, 0, $x -3, $y -1, $grey, $font, $string);

imagettftext($im, $size, 0, $x, $y, $white, $font, $string);

if ($checked == 'true') {
imagecopy($im, $overlay, 0, 0, 0, 0, imagesx($overlay), imagesy($overlay));
}
header('Content-type: image/png');

imagepng($im);

imagedestroy($im);

//imagedestroy($check);

?>