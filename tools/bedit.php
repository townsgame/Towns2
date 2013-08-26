<?php
if(!function_exists("hnet")){
$root = "../";
require("../casti/funkcie/index.php"); 
require("../casti/funkcie/vojak.php");
}

if($_SESSION["id"]!=1){
die();
}
echo("<form method=\"POST\"><table>");
echo("<tr>");
echo("<th><th>");
echo("<th>help<th>");
echo("<th>popis<th>");
echo("<th>casovac<th>");
echo("<th>zkupina<th>");
echo("<th>akce<th>");
echo("<th>drevo<th>");
echo("<th>kamen<th>");
echo("<th>jedlo<th>");
echo("<th>zivot<th>");
echo("<th>utok<th>");
echo("<th>vutok<th>");
echo("<th>ludia<th>");
echo("<th>pludia<th>");
echo("<th>size<th>");
echo("<th>budovavedla<th>");
echo("<th>budovap<th>");
echo("<th>budoval<th>");
echo("<th>typ<th>");
echo("<th>poutok<th>");
echo("</tr>");
foreach(hnet2("towns2_uni","SELECT * FROM towns2_uni") as $row){
if($_POST[("casovac2_".$row["obrazok"])]){
mysql_query2("UPDATE towns2_uni SET 
popis = '".$_POST[("popis_".$row["obrazok"])]."',
casovac2 = '".$_POST[("casovac2_".$row["obrazok"])]."',
skupina = '".$_POST[("skupina_".$row["obrazok"])]."',
akce = '".$_POST[("akce_".$row["obrazok"])]."',
drevo = '".$_POST[("drevo_".$row["obrazok"])]."',
kamen = '".$_POST[("kamen_".$row["obrazok"])]."',
jedlo = '".$_POST[("jedlo_".$row["obrazok"])]."',
zivot = '".$_POST[("zivot_".$row["obrazok"])]."',
utok = '".$_POST[("utok_".$row["obrazok"])]."',
vutok = '".$_POST[("vutok_".$row["obrazok"])]."',
ludia = '".$_POST[("ludia_".$row["obrazok"])]."',
pludia = '".$_POST[("pludia_".$row["obrazok"])]."',
size = '".$_POST[("size_".$row["obrazok"])]."',
budovavedla = '".$_POST[("budovavedla_".$row["obrazok"])]."',
budovap = '".$_POST[("budovap_".$row["obrazok"])]."',
budoval = '".$_POST[("budoval_".$row["obrazok"])]."',
typ = '".$_POST[("typ_".$row["obrazok"])]."',
poutok = '".$_POST[("poutok_".$row["obrazok"])]."',
help = '".$_POST[("help_".$row["obrazok"])]."'
WHERE obrazok = '".$row["obrazok"]."'");
dc("towns2_uni");
}
}
//-----------------------------------------
foreach(hnet2("towns2_uni","SELECT * FROM towns2_uni") as $row){
echo("<tr>");
echo("<td>".$row["obrazok"]."<th>");
echo("<td><input name=\"help_".$row["obrazok"]."\" type=\"text\" size=\"2\" value=\"".$row["help"]."\" /><td>");
echo("<td><input name=\"popis_".$row["obrazok"]."\" type=\"text\" size=\"10\" value=\"".$row["popis"]."\" /><td>");
echo("<td><input name=\"casovac2_".$row["obrazok"]."\" type=\"text\" size=\"1\" value=\"".$row["casovac2"]."\" /><td>");
echo("<td><input name=\"skupina_".$row["obrazok"]."\" type=\"text\" size=\"1\" value=\"".$row["skupina"]."\" /><td>");
echo("<td><input name=\"akce_".$row["obrazok"]."\" type=\"text\" size=\"1\" value=\"".$row["akce"]."\" /><td>");
echo("<td><input name=\"drevo_".$row["obrazok"]."\" type=\"text\" size=\"1\" value=\"".$row["drevo"]."\" /><td>");
echo("<td><input name=\"kamen_".$row["obrazok"]."\" type=\"text\" size=\"1\" value=\"".$row["kamen"]."\" /><td>");
echo("<td><input name=\"jedlo_".$row["obrazok"]."\" type=\"text\" size=\"1\" value=\"".$row["jedlo"]."\" /><td>");
echo("<td><input name=\"zivot_".$row["obrazok"]."\" type=\"text\" size=\"1\" value=\"".$row["zivot"]."\" /><td>");
echo("<td><input name=\"utok_".$row["obrazok"]."\" type=\"text\" size=\"1\" value=\"".$row["utok"]."\" /><td>");
echo("<td><input name=\"vutok_".$row["obrazok"]."\" type=\"text\" size=\"1\" value=\"".$row["vutok"]."\" /><td>");
echo("<td><input name=\"ludia_".$row["obrazok"]."\" type=\"text\" size=\"1\" value=\"".$row["ludia"]."\" /><td>");
echo("<td><input name=\"pludia_".$row["obrazok"]."\" type=\"text\" size=\"1\" value=\"".$row["pludia"]."\" /><td>");
echo("<td><input name=\"size_".$row["obrazok"]."\" type=\"text\" size=\"1\" value=\"".$row["size"]."\" /><td>");
echo("<td><input name=\"budovavedla_".$row["obrazok"]."\" type=\"text\" size=\"1\" value=\"".$row["budovavedla"]."\" /><td>");
echo("<td><input name=\"budovap_".$row["obrazok"]."\" type=\"text\" size=\"1\" value=\"".$row["budovap"]."\" /><td>");
echo("<td><input name=\"budoval_".$row["obrazok"]."\" type=\"text\" size=\"1\" value=\"".$row["budoval"]."\" /><td>");
echo("<td><input name=\"typ_".$row["obrazok"]."\" type=\"text\" size=\"1\" value=\"".$row["typ"]."\" /><td>");
echo("<td><input name=\"poutok_".$row["obrazok"]."\" type=\"text\" size=\"2\" value=\"".$row["poutok"]."\" /><td>");
echo("</tr>");
}
echo("</table><input type=\"submit\" name=\"Submit\" value=\"OK\" /></form>");
?>