<?php
if(!function_exists("hnet")){
$root = "../../";
$no_c = "1";
$no_ss = "1";
require("../funkcie/index.php");
require("../funkcie/vojak.php");
?>
<SCRIPT LANGUAGE="JavaScript">
<!--
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=600,height=400');");
}
function popUpx(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=680,height=200');");
}
-->
</script>
<?php
}else{
?>

<SCRIPT LANGUAGE="JavaScript">
<!--
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=600,height=400');");
}
function popUpx(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=680,height=200');");
}
-->
</script>


<!-- STEP TWO: Use the following link to open the new window -->

<A HREF="javascript:popUp('http://2.towns.cz/casti/mapa/budovy.php')">(nové okno)</A>

<!-- Script Size:  0.73 KB  -->
<?php
}
/*$odpoved =mysql_query("select * from townsuni WHERE akce != '0' order by meno");
while ($row = mysql_fetch_array($odpoved)) { */
//popis pludia	budovavedla		budovap		budoval
echo("<table><tr>
<th bgcolor=\"#cccccc\">jméno</th>
<th bgcolor=\"#cccccc\">dřevo</th>
<th bgcolor=\"#cccccc\">kámen</th>
<th bgcolor=\"#cccccc\">život</th>
<th bgcolor=\"#cccccc\">čas</th>
<th bgcolor=\"#cccccc\">útok</th>
<th bgcolor=\"#cccccc\">vzdálenost</th>
<th bgcolor=\"#cccccc\">obyvatel</th>
<th bgcolor=\"#cccccc\">autor</th>
<th bgcolor=\"#cccccc\">AP</th>
<th bgcolor=\"#cccccc\"></th>
</tr>");

foreach(hnet2("towns2_uni","select * from towns2_uni WHERE akce != '0' AND obrazok != '0' AND schvelene=1 order by typ,meno") as $row){
$ne=0;
if($row["ps"]==1 and $row["autor"]!=$_SESSION["id"]){ $ne=1; }
if($row["ps"]==2 and $row["autor"]!=$_SESSION["id"]){ $ne=1; }
if(!$ne){

$cas = $row["casovac2"];
$hod = intval($cas/3600);
$cas = $cas - $hod * 3600;
$min = intval($cas/60) ;
$cas = $cas - $min * 60;
$cas = "$hod:$min:$cas";
/*echo("
<table width=\"291\" border=\"0\">
  <tr>
    <th colspan=\"7\" align=\"left\" scope=\"col\"><h3>".($row["meno"])."</h3></th>
  </tr>
  <tr>
    <th width=\"22\" scope=\"col\"><img src=\"casti/suroviny/desing/kamen.jpg\" alt=\"kámen\" width=\"20\" height=\"20\" border=\"1\" /></th>
    <th width=\"64\" scope=\"col\">&nbsp;</th>
    <td width=\"53\" scope=\"col\">".$row["kamen"]."</td>
    <th width=\"134\" colspan=\"4\" rowspan=\"6\" align=\"center\" valign=\"middle\" scope=\"col\"><img src=\"casti/jednotky/obrazky/".$row["obrazok"].".jpg\" width=\"120\" height=\"120\" /></th>
  </tr>
  <tr>
    <td><img src=\"casti/suroviny/desing/drevo.jpg\" alt=\"dřevo\" width=\"20\" height=\"20\" border=\"1\" /></td>
    <td>&nbsp;</td>
    <td>".$row["drevo"]."</td>
  </tr>
  <tr>
    <td colspan=\"2\">Útok</td>
    <td>".$row["utok"]."</td>
  </tr>
  <tr>
    <td colspan=\"2\">Život</td>
    <td>".$row["zivot"]."</td>
  </tr>
  <tr>
    <td colspan=\"2\">Vzdálenost útoku</td>
    <td>".$row["vutok"]."</td>
  </tr>
  <tr>
    <td colspan=\"2\">Populace</td>
    <td>".$row["ludia"]."</td>
  </tr>
  <tr>
    <td height=\"1\" colspan=\"7\" align=\"left\" valign=\"top\">".($row["popis"])."</td>
  </tr>
  <tr>
    <td colspan=\"7\"><strong><a href=\"?dir=casti/admin/postavit.php&amp;co=".$row["obrazok"]."&amp;xc=".$xc."&amp;yc=".$yc."\">".$row["akce"]."</a></strong> $cas</td>
  </tr>
</table>
");*/

if($last!=$row["typ"]){
echo("<th colspan=\"8\" bgcolor=\"#aacccc\">");
if($row["typ"]=="1"){ echo("infrastruktura"); }
if($row["typ"]=="2"){ echo("surovinové"); }
if($row["typ"]=="3"){ echo("obyvatelé"); }
if($row["typ"]=="4"){ echo("vojenské"); }
if($row["typ"]=="5"){ echo("obrana"); }
echo("</th>");
}
$last=$row["typ"];
/*echo("
<b><u><a onClick=\"if(".$row["obrazok"].".style.display=='none'){ ".$row["obrazok"].".style.display='inline' }else{ ".$row["obrazok"].".style.display='none' }\">".($row["meno"])."</a></u></b><br/>
<div style=\"display: none;\" id=\"".$row["obrazok"]."\" ><hr/>
<b>Kámen: </b>".$row["kamen"]."<br/>
<b>Dřevo: </b>".$row["drevo"]."<br/>
<b>Útok: </b>".$row["utok"]."<br/>
<b>Život: </b>".$row["zivot"]."<br/>
<b>Vzdálenost útoku: </b>".$row["vutok"]."<br/>
<b>Populace: </b>".$row["ludia"]."<br/>
<b>Čas: </b>".$cas."<br/>
".$row["popis"]." <hr/>
</div>
");*/
//popis pludia	budovavedla		budovap		budoval
$popis = $row["popis"];
if($row["pludia"]){ $popis=$popis."<br/><b>++</b>Přidává ".$row["pludia"]." míst pro obyvatele."; }
if($row["budovavedla"]){ $popis=$popis."<br/><b>++</b>Dá se postavit pouze vedle vaší budovy ".hnet("towns2_uni","SELECT meno FROM towns2_uni WHERE obrazok='".$row["budovavedla"]."'")."."; }
if($row["budovap"]){ $popis=$popis."<br/><b>++</b>Musíte mít ".hnet("towns2_uni","SELECT meno FROM towns2_uni WHERE obrazok='".$row["budovap"]."'")." na úrovni ".$row["budoval"]."."; }
echo("<tr>
<th bgcolor=\"#cccccc\">".$row["meno"]."</th>
<td bgcolor=\"#eeeeee\">".$row["drevo"]."</td>
<td bgcolor=\"#eeeeee\">".$row["kamen"]."</td>
<td bgcolor=\"#eeeeee\">".$row["zivot"]."</td>
<td bgcolor=\"#eeeeee\">".$cas."</td>
<td bgcolor=\"#eeeeee\">".$row["utok"]."</td>
<td bgcolor=\"#eeeeee\">".$row["vutok"]."</td>
<td bgcolor=\"#eeeeee\">".$row["ludia"]."</td>
<td bgcolor=\"#eeeeee\">".hnet("towns2_uziv","SELECT meno FROM towns2_uziv WHERE id='".$row["autor"]."'")."</td>
<td bgcolor=\"#eeeeee\">".$row["ap"]."</td>
<td bgcolor=\"#eeeeee\"><A HREF=\"javascript:popUpx('http://2.towns.cz/casti/mapa/budovym.php?co=".$row["obrazok"]."')\"><b>obrázek</b></A></td>
</tr><tr>
<td colspan=\"11\">".$popis."</td>
</tr>");
}
}
echo("</table>");
?>