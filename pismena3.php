<form action="" method="POST">
<textarea name="text" cols="40" rows="10">
</textarea>
<!--<input type="text" name="text"/>-->
	<input type="submit" value="zobrazit"/>
	</form>
<span style="font-family: Courier New;">
<?php
$textt = strtoupper($_POST["text"]);
if($text){
$textt = split("[
]",$textt);
foreach($textt as $text){
	
$size = 5;

//echo($_SESSION["obrazokk"]);
$h = 25;
$w = $size*strlen($text)*1.8;
$im = ImageCreate($w, $h);

$b = ImageColorAllocate($im,0xFF,0xFF,0xFF);
$farba = ImageColorAllocate($im,0,0,0);


ImageFill($im,0,0,$b);
ImageString($im,$size,1,1,$text,$farba);

$hh = 0;
while($hh != $h){ 
$hh=$hh+1;
$ww = 0;
if($hh>3 AND $hh<14){
while($ww != $w){ 
$ww=$ww+1;


if(imagecolorat($im, $ww ,$hh)){
echo(substr($text,intval($ww/((9/5)*$size)),1));
}else{
echo("&nbsp;");
//echo("_");
}
}
echo("<br/>");
}


}

//header("Content-type: image/png");
//ImagePng($im);
//ImageDestroy($im);
echo("<br/>");
}
}
?>
</span>