<a href="<?php echo gv("?dir=casti/mapa/drag.php&amp;glob_sc=1"); ?>">zpět</a>

<form method="post">
<?php
$ppol=hnet("towns2","SELECT COUNT(1) FROM towns2 WHERE vlastnik='".$_SESSION["id"]."'");
echo("Poplatek za políčko je ".zformatovat($ppol)." dřeva.");
?>
<table width="570" cellpading="3" cellspacing="3">
<tr>
<td></td>
<th bgcolor="#eeeeee">akce</th>
<th bgcolor="#eeeeee">budova</th>
<th bgcolor="#eeeeee">stav</th>
<th bgcolor="#eeeeee">dřevo</th>
<th bgcolor="#eeeeee">kámen</th>
<th bgcolor="#eeeeee">autorský poplatek</th>
<th bgcolor="#eeeeee">autor</th>
<th bgcolor="#eeeeee">pozice</th>
<th></th>
</tr>

<?php
$stream = "";
$pocet=0;
$xc = split("[,]",$_GET["coxc"]);
$yc = split("[,]",$_GET["coyc"]);
foreach(split("[,]",$_GET["coco"]) as $row){

$xc3 = $xc[$pocet];
$yc3 = $yc[$pocet];
$tmp = hnet2("towns2_uni","SELECT meno,drevo,kamen,budovavedla,akce,casovac2,ap,autor,voda FROM towns2_uni WHERE obrazok='".$row."' ");
$tmp = $tmp[0];
if($tmp["akce"] == "0"){ chyba3(); }
$budovavedla = $tmp["budovavedla"];
//echo($budovavedla);
$meno = $tmp["meno"];
$drevo = $tmp["drevo"]+$ppol;
$kamen = $tmp["kamen"];
$casovac2 = $tmp["casovac2"];
if($row == "0"){$akce="zbourat"; $meno=hnet("towns2","SELECT (SELECT meno from towns2_uni WHERE obrazok=towns2.obrazok) FROM towns2 WHERE xc=".$xc3." AND yc=".$yc3); $drevo="---"; $kamen="---";}else{$akce="postavit";}
if($row == "0"){
$stav = "Budovu lze zbourat.";
$stav2 = "1";
if(hnet("towns2","SELECT vlastnik FROM towns2 WHERE xc=".$xc3." AND yc=".$yc3) != $_SESSION["id"]){
$stav = "Nejste vlastník této budovy.";
$stav2 = "";
}

if(hnet("towns2","SELECT obrazok FROM towns2 WHERE xc=".$xc3." AND yc=".$yc3) == "hlbudova"){
$stav = "Hlavní budovu nelze zbourat.";
$stav2 = "";
}

if(hnet("towns2","SELECT obrazok FROM towns2 WHERE xc=".$xc3." AND yc=".$yc3) == "0"){
$stav = "Na tomto políčku není žádná budova. ";
$stav2 = "";
}

}else{
$stav = "Budovu lze postavit.";
$stav2 = "1";

$a = hnet("towns2","SELECT obrazok FROM towns2 WHERE xc=".$xc3." AND yc=".$yc3);
if($a != "0"){
$stav = "Na tomto políčku už budova je.";
$stav2 = "";
}

$a = hnet("towns2","SELECT pozadie FROM towns2 WHERE xc=".$xc3." AND yc=".$yc3);
if($a != "0" AND $a == "10" AND !$tmp["voda"]){
$stav = "Na vodě se nedá stavět.";
$stav2 = "";
}

$ludia    = hnet("towns2_uziv","SELECT ludia    FROM towns2_uziv WHERE id = ".$_SESSION["id"]);
$ludiamax = hnet("towns2_uziv","SELECT ludiamax FROM towns2_uziv WHERE id = ".$_SESSION["id"]);
$b = hnet("towns2_uni","SELECT ludia FROM towns2_uni WHERE obrazok='".$row."'");
if($b!="0" and ($ludia+$b) > $ludiamax){
$stav = "Nedostatek domů";
$stav2 = "";
}

$a = hnet("towns2","SELECT vlastnik FROM towns2 WHERE cas = '1' AND xc=".($xc3)." AND yc=".($yc3+1));/*(vlastnikxcyc(($xc3+1),($yc3)))*/;
$b = hnet("towns2","SELECT vlastnik FROM towns2 WHERE cas = '1' AND xc=".($xc3+1)." AND yc=".($yc3));/*(vlastnikxcyc(($xc3),($yc3+1)))*/;
$c = hnet("towns2","SELECT vlastnik FROM towns2 WHERE cas = '1' AND xc=".($xc3-1)." AND yc=".($yc3));/*(vlastnikxcyc(($xc3-1),($yc3)))*/;
$d = hnet("towns2","SELECT vlastnik FROM towns2 WHERE cas = '1' AND xc=".($xc3)." AND yc=".($yc3-1));/*(vlastnikxcyc(($xc3),($yc3-1)))*/;
//echo($a." / ".$b." / ".$b." / ".$d);
if($a != $_SESSION["id"] AND $b != $_SESSION["id"] AND $c != $_SESSION["id"] AND $d != $_SESSION["id"]){
$stav = "Toto políčko není vedle vaší dostavěné budovy.";
$stav2 = "";
}


$a = hnet("towns2","SELECT obrazok FROM towns2 WHERE cas = '1' AND vlastnik=".$_SESSION["id"]." AND xc=".($xc3+1)." AND yc=".($yc3));
$b = hnet("towns2","SELECT obrazok FROM towns2 WHERE cas = '1' AND vlastnik=".$_SESSION["id"]." AND xc=".($xc3)." AND yc=".($yc3+1));
$c = hnet("towns2","SELECT obrazok FROM towns2 WHERE cas = '1' AND vlastnik=".$_SESSION["id"]." AND xc=".($xc3-1)." AND yc=".($yc3));
$d = hnet("towns2","SELECT obrazok FROM towns2 WHERE cas = '1' AND vlastnik=".$_SESSION["id"]." AND xc=".($xc3)." AND yc=".($yc3-1));
//echo($budovavedla);
//echo($a." / ".$b." / ".$c." / ".$d);
$budovavedla = hnet("towns2_uni","SELECT budovavedla FROM towns2_uni WHERE obrazok='".$row."'");
$budovavedla2 = hnet("towns2_uni","SELECT meno FROM towns2_uni WHERE obrazok='".$budovavedla."'");
if($budovavedla != $a AND $budovavedla != $b AND $budovavedla != $c AND $budovavedla != $d AND $budovavedla != "0"){
$stav = "Tato budova může být postavena pouze vedle vedle vaší budovy $budovavedla2.";
$stav2 = "";
}


$budovap = hnet("towns2_uni","SELECT budovap FROM towns2_uni WHERE obrazok='".$row."'");
if($budovap){
$budovap2 = hnet("towns2_uni","SELECT meno FROM towns2_uni WHERE obrazok='".$budovap."'");
$budoval = hnet("towns2_uni","SELECT budoval FROM towns2_uni WHERE obrazok='".$row."'");
$budoval2 = budoval($budovap);
if($budoval > $budoval2){
$stav = "Musíte mít postavenou budovu ".$budovap2." na úrovni ".$budoval.".";
$stav2 = "";
}}


}
if($_POST["b".$pocet] AND $stav2 == "1"){
$surky=new index("towns2_uziv","select prachy,jedlo,kamen,zelezo,drevo,prachy,body,ludia,ludiamax from towns2_uziv where ppp");
$surkyu = $surky->get("id = '".$_SESSION["id"]."'");
//echo("".$surkyu["drevo"]." kamen ".$surkyu["kamen"]);
$ap = hnet("towns2_uni","SELECT ap FROM towns2_uni WHERE obrazok='".$row."'");
if($surkyu["drevo"] >= $drevo AND $surkyu["kamen"] >= $kamen AND $surkyu["prachy"] >= $ap){
mysql_query("UPDATE towns2_uziv SET drevo = drevo-".$drevo.", kamen = kamen-".$kamen.", prachy = prachy-".$ap." WHERE id =".$_SESSION["id"]);
//echo/*mysql_query*/("UPDATE towns2 SET obrazok='".$row."', cas='2', vlastnik='".$_SESSION["id"]."',casovac='".($casovac2+time())."' WHERE xc=".$xc3." AND yc=".$yc3);
$casovac2_x = 0;
if($row != "0"){$casovac2_x = $casovac2;}
mysql_query("UPDATE towns2 SET obrazok='".$row."', cas='2', vlastnik='".$_SESSION["id"]."',casovac='".($casovac2+time())."', uroven='1', zivot=(SELECT zivot FROM towns2_uni WHERE obrazok='".$row."') WHERE xc=".$xc3." AND yc=".$yc3);
if($row == "0"){
mysql_query("UPDATE towns2 SET cas='1',casovac='0' WHERE xc=".$xc3." AND yc=".$yc3);	
}
dc("towns2_uziv");
dc("towns2");
dcmapa($xc3,$yc3);
$stream = $stream."<br/>".($pocet+1)."- postaveno / zbouráno";
}else{
$stream = $stream."<br/>".($pocet+1)."- nedostatek surovin";
}
//$stream = $stream."a";
}


if($stav2 == "1"){ $stav2 = "<input type=\"checkbox\" name=\"b".$pocet."\" value=\"1\" checked>"; }

$ap = hnet("towns2_uni","SELECT ap FROM towns2_uni WHERE obrazok='".$row."'");
$autor = hnet("towns2_uni","SELECT autor FROM towns2_uni WHERE obrazok='".$row."'");
$autor = hnet("towns2_uziv","SELECT meno FROM towns2_uziv WHERE id='".$autor."'");

echo("<tr bgcolor=\"#eeeeee\">
<td>".($pocet+1)."</td>
<td>".$akce."</td>
<td>".$meno."</td>
<td>".$stav."</td>
<td>".$drevo."</td>
<td>".$kamen."</td>
<td>".$ap."</td>
<td>".$autor."</td>
<td>".(qpxy($xc3,$yc3))."</td>
<td>".$stav2."</td>
</tr>");

$pocet = $pocet+1;
}
?>

</table>
<input type="submit" name="Submit" value="postavit / zbourat" />

<?php echo($stream); ?>
</form>