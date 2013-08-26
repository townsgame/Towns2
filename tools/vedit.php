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
echo("<th>meno<th>");
echo("<th>meno2p<th>");
echo("<th>zivot<th>");
echo("<th>regenerace<th>");
echo("<th>utok<th>");
echo("<th>vydrz<th>");
echo("<th>rychlost<th>");
echo("<th>cena<th>");
echo("</tr>");
foreach(hnet2("towns2_voj","SELECT * FROM towns2_voj") as $row){
if($_POST[("meno_".$row["id"])]){
mysql_query2("UPDATE towns2_voj SET 
meno = '\"".$_POST[("meno_".$row["id"])]."\"',
meno2p = '\"".$_POST[("meno2p_".$row["id"])]."\"',
zivot = '".$_POST[("zivot_".$row["id"])]."',
regenerace = '".$_POST[("regenerace_".$row["id"])]."',
utok = '".$_POST[("utok_".$row["id"])]."',
vydrz = '".$_POST[("vydrz_".$row["id"])]."',
rychlost = '".$_POST[("rychlost_".$row["id"])]."',
cena = '".$_POST[("cena_".$row["id"])]."'
WHERE id = '".$row["id"]."'");
dc("towns2_voj");
}
}
//-----------------------------------------
foreach(hnet2("towns2_voj","SELECT * FROM towns2_voj") as $row){
echo("<tr>");
echo("<td>".$row["id"]."<th>");
echo("<td><input name=\"meno_".$row["id"]."\" type=\"text\" size=\"10\" value=".$row["meno"]." /><td>");
echo("<td><input name=\"meno2p_".$row["id"]."\" type=\"text\" size=\"10\" value=".$row["meno2p"]." /><td>");
echo("<td><input name=\"zivot_".$row["id"]."\" type=\"text\" size=\"10\" value=\"".$row["zivot"]."\" /><td>");
echo("<td><input name=\"regenerace_".$row["id"]."\" type=\"text\" size=\"10\" value=\"".$row["regenerace"]."\" /><td>");
echo("<td><input name=\"utok_".$row["id"]."\" type=\"text\" size=\"10\" value=\"".$row["utok"]."\" /><td>");
echo("<td><input name=\"vydrz_".$row["id"]."\" type=\"text\" size=\"10\" value=\"".$row["vydrz"]."\" /><td>");
echo("<td><input name=\"rychlost_".$row["id"]."\" type=\"text\" size=\"10\" value=\"".$row["rychlost"]."\" /><td>");
echo("<td><input name=\"cena_".$row["id"]."\" type=\"text\" size=\"10\" value=\"".$row["cena"]."\" /><td>");
echo("</tr>");
}
echo("</table><input type=\"submit\" name=\"Submit\" value=\"OK\" /></form>");
?>