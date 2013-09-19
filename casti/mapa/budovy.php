<?php
if(!function_exists("hnet")){
$root = "../../";
$no_c = "1";
$no_ss = "1";
require_once("../funkcie/index.php");
require_once("../funkcie/vojak.php");
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
<!-- Script Size:  0.73 KB  -->
<?php
}
/*$odpoved =mysql_query("select * from townsuni WHERE akce != '0' order by meno");
while ($row = mysql_fetch_array($odpoved)) { */
//popis pludia	budovavedla		budovap		budoval
echo("<table align=\"center\">");

foreach(hnet2("towns2_uni","select * from towns2_uni WHERE akce != '0' AND obrazok != '0' AND schvelene=1 order by typ," . $GLOBALS["name"]) as $row){
$ne=0;
if($row["ps"]==1 && $row["autor"]!=$_SESSION["id"]){ $ne=1; }
if($row["ps"]==2 && $row["autor"]!=$_SESSION["id"]){ $ne=1; }
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
/*
if($last!=$row["typ"]){
echo("<th colspan=\"8\" bgcolor=\"#aacccc\">");
if($row["typ"]=="1"){ echo($GLOBALS["mbuild11"]); }
if($row["typ"]=="2"){ echo($GLOBALS["mbuild12"]); }
if($row["typ"]=="3"){ echo($GLOBALS["mbuild13"]); }
if($row["typ"]=="4"){ echo($GLOBALS["mbuild14"]); }
if($row["typ"]=="5"){ echo($GLOBALS["mbuild15"]); }
echo("</th>");
}
$last=$row["typ"];
*/
/*echo("
<b><u><a onClick=\"if(".$row["obrazok"].".style.display=='none'){ ".$row["obrazok"].".style.display='inline' }else{ ".$row["obrazok"].".style.display='none' }\">".($row["meno"])."</a></u></b><br />
<div style=\"display: none;\" id=\"".$row["obrazok"]."\" ><hr/>
<b>Kámen: </b>".$row["kamen"]."<br />
<b>Dřevo: </b>".$row["drevo"]."<br />
<b>Útok: </b>".$row["utok"]."<br />
<b>Život: </b>".$row["zivot"]."<br />
<b>Vzdálenost útoku: </b>".$row["vutok"]."<br />
<b>Populace: </b>".$row["ludia"]."<br />
<b>Čas: </b>".$cas."<br />
".$row["popis"]." <hr/>
</div>
");*/
//popis pludia	budovavedla		budovap		budoval
//$popis = $row["popis"];
if($row["pludia"]){ $popis=$popis."<br /><b>++</b>" . $GLOBALS["mbuild16"] . " ".$row["pludia"]." " . $GLOBALS["mbuild17"] . "."; }
if($row["budovavedla"]){ $popis=$popis."<br /><b>++</b>" . $GLOBALS["mbuild18"] . " ".hnet("towns2_uni","SELECT " . $GLOBALS["name"] . " FROM towns2_uni WHERE obrazok='".$row["budovavedla"]."'")."."; }
if($row["budovap"]){ $popis=$popis."<br /><b>++</b>" . $GLOBALS["mbuild19"] . " ".hnet("towns2_uni","SELECT " . $GLOBALS["name"] . "  FROM towns2_uni WHERE obrazok='".$row["budovap"]."'")." " . $GLOBALS["mbuild20"] . " ".$row["budoval"]."."; }
echo("
<tr>
<td colspan=\"10\">
  <table height=\"150\" border=\"0\">
    " .
/*
    <tr>
        <th>" . $GLOBALS["mbuild22"] . ":</th>
    </tr>
*/
   "
    <tr>
        <td><img src=\"casti/jednotky/drag/mapa/" . $row["obrazok"] . "/1.gif\" width=\"100\" height=\"150\" border=\"1\" /></td>
        <td><img src=\"casti/jednotky/drag/mapa/" . $row["obrazok"] . "/2.gif\" width=\"100\" height=\"150\" border=\"1\" /></td>
        <td><img src=\"casti/jednotky/drag/mapa/" . $row["obrazok"] . "/3.gif\" width=\"100\" height=\"150\" border=\"1\" /></td>
        " // <td><img src=\"casti/jednotky/drag/mapa/" . $row["obrazok"] . "/4.gif\" width=\"100\" height=\"150\" border=\"1\" /></td>
        ."
        <td><img src=\"casti/jednotky/drag/mapa/" . $row["obrazok"] . "/5.gif\" width=\"100\" height=\"150\" border=\"1\" /></td>
        <td><img src=\"casti/jednotky/drag/mapa/" . $row["obrazok"] . "/6.gif\" width=\"100\" height=\"150\" border=\"1\" /></td>
    </tr>
  </table>  
</td>
</tr>        
<tr>
<th bgcolor=\"#cccccc\">" . $GLOBALS["mbuild1"] . "</th>
<th bgcolor=\"#cccccc\">" . $GLOBALS["mbuild2"] . "</th>
<th bgcolor=\"#cccccc\">" . $GLOBALS["mbuild3"] . "</th>
<th bgcolor=\"#cccccc\">" . $GLOBALS["mbuild4"] . "</th>
<th bgcolor=\"#cccccc\">" . $GLOBALS["mbuild5"] . "</th>
<th bgcolor=\"#cccccc\">" . $GLOBALS["mbuild6"] . "</th>
<th bgcolor=\"#cccccc\">" . $GLOBALS["mbuild7"] . "</th>
<th bgcolor=\"#cccccc\">" . $GLOBALS["mbuild8"] . "</th>
<th bgcolor=\"#cccccc\">" . $GLOBALS["mbuild9"] . "</th>
<th bgcolor=\"#cccccc\">" . $GLOBALS["mbuild10"] . "</th>
</tr>    
<tr>
<th bgcolor=\"#cccccc\">".$row[$GLOBALS["name"]] ."</th>
<td bgcolor=\"#eeeeee\">".$row["drevo"]."</td>
<td bgcolor=\"#eeeeee\">".$row["kamen"]."</td>
<td bgcolor=\"#eeeeee\">".$row["zivot"]."</td>
<td bgcolor=\"#eeeeee\">".$cas."</td>
<td bgcolor=\"#eeeeee\">".$row["utok"]."</td>
<td bgcolor=\"#eeeeee\">".$row["vutok"]."</td>
<td bgcolor=\"#eeeeee\">".$row["ludia"]."</td>
<td bgcolor=\"#eeeeee\">".hnet("towns2_uziv","SELECT meno FROM towns2_uziv WHERE id='".$row["autor"]."'")."</td>
<td bgcolor=\"#eeeeee\">".$row["ap"]."</td>
</tr>" /* <tr>
<td colspan=\"11\">".$popis."</td>
</tr>" */);
}
}
echo("</table>");
?>