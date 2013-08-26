<?php
if($_MYGET["karta"]){ 
$tmp = hnet("towns2_uziv","SELECT prachy FROM towns2_uziv WHERE id = ".$_SESSION["id"]);
$tmp = $tmp/10;

$karty = array(1,2,3,4);
shuffle($karty);

$i = 0;
foreach($karty as $row){
if($row==1){ $tmpx=$tmp*1; }
if($row==2){ $tmpx=$tmp*0.5; }
if($row==3){ $tmpx=$tmp*-0.5; }
if($row==4){ $tmpx=$tmp*-1; }
$karty[$i] = $tmpx;
$i = $i+1;
}

$tmp = $karty[($_MYGET["karta"])-1];
$vyhraz = $karty;

if($tmp>0){
chyba2("Vyhrál jste $tmp peněz.");	
}else{
chyba1("Prohrál jste $tmp peněz.");	
}	
surovinanew($_SESSION["id"],"prachy","+",$tmp);
}
?>
<table border="0">
<tr>
<td align="center"><a href="<?php echo gv("?karta=1"); ?>"><img src="http://2.towns.cz/casti/upload/soubor.php?meno=karta.png&hrac=1"/><br/><b><?php echo($vyhraz[0]); ?></b></a></td>
<td align="center"><a href="<?php echo gv("?karta=2"); ?>"><img src="http://2.towns.cz/casti/upload/soubor.php?meno=karta.png&hrac=1"/><br/><b><?php echo($vyhraz[1]); ?></b></a></td>
</tr><tr>
<td align="center"><a href="<?php echo gv("?karta=3"); ?>"><img src="http://2.towns.cz/casti/upload/soubor.php?meno=karta.png&hrac=1"/><br/><b><?php echo($vyhraz[2]); ?></b></a></td>
<td align="center"><a href="<?php echo gv("?karta=4"); ?>"><img src="http://2.towns.cz/casti/upload/soubor.php?meno=karta.png&hrac=1"/><br/><b><?php echo($vyhraz[3]); ?></b></a></td>
</tr>
</table>