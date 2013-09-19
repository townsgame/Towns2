<?php
echo("<h1>" . $GLOBALS["afourth1"] . "</h1>");
$tmp = hnet2("towns2_ali","SELECT prachy,jedlo,kamen,zelezo,drevo FROM towns2_ali WHERE ppp AND id = ".$_SESSION["ali"]);
$tmp = $tmp[0];
$prachy = $tmp[0];
$jedlo = $tmp[1];
$kamen = $tmp[2];
$zelezo = $tmp[3];
$drevo = $tmp[4];
//echo($prachy);
//zobrazsur(1,1,1,1,1);
echo(zobrazsur($prachy,$jedlo,$kamen,$zelezo,$drevo));
//---------------------------
echo("<h1>" . $GLOBALS["afourth1a"] . "</h1>(". $GLOBALS["afourth2"] . ")");
$tmp = hnet2("towns2_ali","SELECT prachydane,jedlodane,kamendane,zelezodane,drevodane FROM towns2_ali WHERE ppp AND id = ".$_SESSION["ali"]);
$tmp = $tmp[0];
$prachy = $tmp[0];
$jedlo = $tmp[1];
$kamen = $tmp[2];
$zelezo = $tmp[3];
$drevo = $tmp[4];
//echo($prachy);
//zobrazsur(1,1,1,1,1);
echo(zobrazsur($prachy,$jedlo,$kamen,$zelezo,$drevo));
//---------------------------
echo("<h1>" . $GLOBALS["afourth3"] . "</h1><a href=\"".gv("?dir=casti/suroviny/index.php&amp;glob_sc=5&amp;submenu=3")."\">(" . $GLOBALS["afourth4"] . ")</a>");
echo("<table><tr bgcolor=\"#dddddd\"><th>" . $GLOBALS["afourth5"] . "</th><th>" . $GLOBALS["afourth6"] . "</th></tr>");
foreach(hnet2("towns2_alipris","SELECT prachy,jedlo,kamen,zelezo,drevo,hrac FROM towns2_alipris WHERE ppp AND ali = ".$_SESSION["aliance"]) as $row){

echo('<tr>
<td>'.profil($row["hrac"]).'</td>
<td>'.zobrazsur($row[0],$row[1],$row[2],$row[3],$row[4]).'</td>
</tr>
');

}
echo("</table>");
?>