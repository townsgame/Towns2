<?php
eval(file_get_contents("casti/jazyk/".$_SESSION["lang"].".txt"));
if($_MYGET["zprava"]){
$_SESSION["zprava"] = $_MYGET["zprava"];
} 


$odpoved =mysql_query("select * from towns2_zpr WHERE id = '".$_SESSION["zprava"]."'");
while ($row = mysql_fetch_array($odpoved)) {
$od = profil($row["od"]);
$od2 = $row["od"];
$predmet = $row["predmet"];
$zprava = $row["zprava"];
}
mysql_free_result($odpoved);

if(!$predmet){
$predmet = $xzadnypredmet;
}

//$zpravax = nl2br($_SESSION["zprava"]);

echo("<strong>$xodesilatel</strong> ".$od."
<br/><strong>$xpredmet</strong>".$predmet."...
<br/><strong>$xtext</strong><br/>".$zprava."<br/>
<a href=\"".gv("?piszpr2=".$_SESSION["zprava"]."&amp;piszpr=".$od2."&amp;idz=2")."\">$xodpovedet</a>
");
if(!$_MYGET["nemprecitat"]){
/*echo*/mysql_query("UPDATE `towns2_zpr` SET `precitane` = '1' WHERE id='".$_MYGET["zprava"]."'");
}
?>