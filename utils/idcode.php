<?
session_start();

for($i=0;$i<4;$i++){
	$rand.=dechex(rand(1,15));
	}
$_SESSION[check_pic]=$rand;//set a session as the $rand


$im = imagecreatetruecolor(70,20);//Create a image area

$bc = imagecolorallocate($im,0,0,0);//background color
$te = imagecolorallocate($im,255,255,255);

for($i=0;$i<=10;$i++){
	$te2 = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
	imageline($im,rand(0,70),0,rand(0,70),20,$te2);
	}
	
for($i=0;$i<=400;$i++){
	$te2 = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
	imagesetpixel($im,rand()%70,rand()%20,$te2);
	}	
	

imagestring($im,rand(1,6),rand(1,30),rand(1,5),$rand,$te);


header("Content-type: image/jpeg");
imagejpeg($im);//print image


?>




