<?php session_start();
$image = imagecreatetruecolor(100, 30);
$background_color = imagecolorallocate($image, 255 ,255, 255);
imagefill($image, 0, 0, $background_color);
$str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$captcha_code = '';
for($i=0; $i<4; $i++)
{
	$fontsize = 6;
	$fontcolor = imagecolorallocate($image, rand(0,255) ,rand(0,255), rand(0,255));
	$fontcontent = rand(0, 61); $fontcontent = $str[$fontcontent];
	$captcha_code .= $fontcontent;
	$x = 25 * $i + rand(5,10);
	$y = rand(5,10);

	imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
}
$_SESSION['author_code'] = $captcha_code;

for($i=0; $i<200; $i++)
{
	$pointcolor = imagecolorallocate($image, rand(50,200), rand(50,200), rand(50,200));
	imagesetpixel($image, rand(0,100), rand(0,30), $pointcolor);
}

for($i=0; $i<5; $i++)
{
	$linecolor = imagecolorallocate($image, rand(0,255), rand(0,255), rand(0,255));
	imageline($image, rand(0, 100), rand(0, 30), rand(0, 100), rand(0, 30), $linecolor);
}

header('content-type: image/png');
imagepng( $image );

	//end
imagedestroy( $image );
