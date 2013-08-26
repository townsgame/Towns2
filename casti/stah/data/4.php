<form action="" method="post" name="form1" id="form1">
vsadit 
<input name="kolik" type="text" size="5" maxlength="5" />
pen&#283;z  
<input type="submit" name="Submit" value="OK" /></form><br/>
<?php
if($_POST["kolik"] > 0){
if(zsur("prachy",$_POST["kolik"])){
if(is_numeric($_POST["kolik"])){
if(isok($_POST["kolik"])){
  //------------------
$maxi=$_POST["kolik"]-1+1; 
$rotation=0;
$rot=rand(300,1000);
$rotx=$rot;
$xxx=1+(rand(100,150)/rand(1000,9000));
while($rot>=0.2){
$rot=$rot/$xxx;
$rotation=$rotation+$rot;
if($rotation>=360){
$rotation=$rotation-360;
}
}

$vyh=$maxi;
if($rotation<45+90 and $rotation>-45+90){ $vyh=$maxi/-2; }
if($rotation<45+180 and $rotation>-45+180){ $vyh=$maxi/2; }
if($rotation<45+270 and $rotation>-45+270){ $vyh=-$maxi; }


surovinanew($_SESSION["id"],"prachy","+",$vyh);
$ano=1;
  //------------------
  }else{
	chyba1("Nemůžete vsadit víc než 10% peněz, co máte.");
  }
 }else{
	chyba1("Musíte zadat číslo.");
 }
}else{
	chyba1("Nedostatek peněz");
}
}
if($ano){
?>
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="400" height="300">
    <param name="quality" value="high" />
    <param name="SRC" value="casti/stah/data/los.swf?maxi=<?php echo($maxi); ?>&amp;vyh=<?php echo($vyh); ?>&amp;rot=<?php echo($rotx); ?>&amp;xxx=<?php echo($xxx); ?>" />
    <embed src="casti/stah/data/los.swf?maxi=<?php echo($maxi); ?>&amp;vyh=<?php echo($vyh); ?>&amp;rot=<?php echo($rotx); ?>&amp;xxx=<?php echo($xxx); ?>" width="400" height="300" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
  </object>
<?php } ?>

