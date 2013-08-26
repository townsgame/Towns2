<?php
$tmp = hnet("towns2_uziv","SELECT ali FROM towns2_uziv WHERE ppp AND id = ".$_SESSION["id"]);
$_SESSION["aliance"] = $tmp;
if($tmp){
$tmp = array(1,1,1,1,1,1,1,1,1,1);
}else{
$tmp = array(1,2,2,2,2,2,2,2,2,2);
}
$tmp2 = split("[,]",hnet("towns2_uziv","SELECT pravomoci FROM towns2_uziv WHERE ppp AND id=".$_SESSION["id"]));

if(!$tmp2[0]){ $tmp[6] = 2; }
if(!$tmp2[2]){ $tmp[7] = 2; }
if(!$tmp2[3]){ $tmp[4] = 2; }
if(!$tmp2[4]){ $tmp[5] = 2; }
if(!$tmp2[5]){ $tmp[8] = 2; }

submenu(array("Aliance","Profil aliance","Fórum aliance","Pokladna","Pozvat hráče","Vyhodit hráče","Změna profilu aliance","Správa pokladny","Hodnosti &amp; pravomoci"),array("casti/aliance/1.php","casti/hraci/profila.php","casti/aliance/3.php","casti/aliance/4.php","casti/aliance/5.php","casti/aliance/6.php","casti/aliance/7.php","casti/aliance/8.php","casti/aliance/9.php"),$tmp,array("","Pro tuto možnost musíte být v alianci.","Pro tuto možnost musíte být v alianci.","Pro tuto možnost musíte být v alianci.","Pro tuto možnost musíte být v alianci a mít na to pravomoci.","Pro tuto možnost musíte být v alianci a mít na to pravomoci.","Pro tuto možnost musíte být v alianci a mít na to pravomoci.","Pro tuto možnost musíte být v alianci a mít na to pravomoci.","Pro tuto možnost musíte být v alianci a mít na to pravomoci.","Pro tuto možnost musíte být v alianci a mít na to pravomoci."));
?>