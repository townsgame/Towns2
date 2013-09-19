<?php
$surky=new index("towns2","SELECT COUNT( xc ) FROM towns2 WHERE ppp AND cas='1' AND obrazok = 'trziste'");
$surkyu = $surky->get("vlastnik = '".$_SESSION["id"]."'");
$typy=array(1,1,1,2,1,1,1);
if($surkyu[0] == 0){
$typy=array(1,2,2,2,1,1,1);
}
//chyba1(budova("banka"));
if(budova("banka") > 0){
$typy[3]=1;
}

/*if(budova("banka") == 0){
$typy[4]=2;	
}*/

submenu(array($GLOBALS["sindex1"],$GLOBALS["sindex2"],$GLOBALS["sindex3"],/*$GLOBALS["sindex4"],*/$GLOBALS["sindex5"],$GLOBALS["sindex6"]/*,$GLOBALS["sindex7"]*//*,$GLOBALS["sindex8"]*/),array("casti/suroviny/viac.php","casti/suroviny/poslat.php","casti/suroviny/poslatali.php",/*"casti/suroviny/vymena.php",*/"casti/suroviny/banka.php","casti/suroviny/surowiny.php"/*,"casti/stah/index.php"*//*,"casti/suroviny/kod.php"*/),$typy,
        array("",$GLOBALS["sindex9"],$GLOBALS["sindex9"],$GLOBALS["sindex10"],/*$GLOBALS["sindex10"],*/"",""));
?>