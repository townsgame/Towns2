<?php
$_SESSION["im"] = imagecreate(100, 100);
$color2 = imagecolorallocate($_SESSION["im"], 0, 0, 0); 
imagefill($_SESSION["im"],0,0,$color2);
function polygonim($colordat,$x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4){
$x=100;
$y=100;
$im = imagecreate($x, $y);
$color2 = imagecolorallocate($im, 255, 255, 255);
$alpha = imagecolorallocatealpha($im, 255, 255, 255,127);  
$bg = imagecolorallocate($im, 0, 0, 0);
//----------
/*$colordat2[0]=$colordat1[0]+rand(0,10)-5;
$colordat2[1]=$colordat1[1]+rand(0,10)-5;
$colordat2[2]=$colordat1[2]+rand(0,10)-5;
$newp2 = imagecolorallocate($im, $colordat1[0], $colordat1[1], $colordat1[2]);*/
for ($i = 1; $i <= $colordat[3]; $i++) {
//eval("\$colordat".$i."[0]=\$colordat1[0]+".$i.";");
//eval("\$colordat".$i."[1]=\$colordat1[1]+".$i.";");
//eval("\$colordat".$i."[2]=\$colordat1[2]+".$i.";");
eval("\$newp".$i." = imagecolorallocate(\$im, \$colordat[0]+".$i.", \$colordat[1]+".$i.", \$colordat[2]+".$i.");");
}
//----------
imagefill($im,0,0,$bg);
imagefilledpolygon($im,array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4),4,$color2);
for($xx= 0; $xx <= $x; $xx++){
for($yy= 0; $yy <= $y; $yy++){
if(imagecolorat($im, $xx ,$yy)){
imagesetpixel($im,$xx,$yy,$alpha);
}else{
//imagesetpixel($im,$xx,$yy,$newp2);
eval("imagesetpixel(\$_SESSION[\"im\"],\$xx,\$yy,\$newp".rand(1,$colordat[3]).");");
}
}
}
//imagecopy($_SESSION["im"],$im,0,0,0,0,$x,$y);
}
polygonim(array(100,100,100,10),40,10,40,90,90,90,90,10);
header('Content-type: image/png');
imagepng($_SESSION["im"]);
imagedestroy($_SESSION["im"]);
?>