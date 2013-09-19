<?php
/*
if($_MYGET["aliodchod"]=="1"){
//odpoved =mysql_query("SELECT ali from towns2_uziv WHERE id='".$_SESSION["id"]."'");
//while ($row = mysql_fetch_array($odpoved)) {
$aliancia = hnet("towns2_uziv","SELECT ali from towns2_uziv WHERE ppp AND id='".$_SESSION["id"]."'");
//}
//mysql_free_result($odpoved);
if($aliancia){
$aliancia = profila($aliancia);
echo("Opravdu chcete opustit alianci $aliancia?<br /><a href=\"".gv("?aliodchodano=1")."\">$xyes</a> - <a href=\"".gv("?submenu=1")."\">$xno</a>");
}else{
chyba1($xnynijste);
}
}*/
if($_MYGET["aliodchodano"]=="1"){
mysql_query("UPDATE towns2_uziv SET ali=0 WHERE id='".$_SESSION["id"]."'");
//mysql_query("DELETE from towns2_ali WHERE (SELECT COUNT(id) from towns2_uziv WHERE ali=towns2_ali.id)=0");
dc("towns2_uziv");
refresh(gv("?submenu=1"));
chyba2($GLOBALS["afirst1"]);
}
//alizal
if($_POST["alizal"]){
$aliancia = hnet("towns2_uziv","SELECT ali from towns2_uziv WHERE ppp AND id='".$_SESSION["id"]."'");

if(!$aliancia){
if(budova("ambasada") == 0){
chyba1($GLOBALS["afirst2"]);
}else{
if(hnet("towns2_uziv","SELECT id from towns2_ali WHERE ppp AND meno='".$_POST["alizal"]."'")){
chyba1($GLOBALS["afirst3"]);
}else{
$odpoved1 = mysql_query("SELECT MAX(poradie) maxId FROM towns2_ali");
$row1 = mysql_fetch_array($odpoved1);
$pocet1=$row1["maxId"];
mysql_free_result($odpoved1);
$poradie = $pocet1+1;
$odpoved1 = mysql_query("SELECT MAX(id) maxId FROM towns2_ali");
$row1 = mysql_fetch_array($odpoved1);
$pocet1=$row1["maxId"];
mysql_free_result($odpoved1);
$pocet = $pocet1+1;
logx("alizal ".$_POST["alizal"]);
mysql_query("INSERT INTO `towns2_ali` ( `id` , `meno` , `body` , `poradie`,  `popis`) 
VALUES (
'$pocet', '".$_POST["alizal"]."', '0', '$poradie' , ''
);");

mysql_query("UPDATE towns2_uziv SET ali=$pocet, hodnost='president', pravomoci='1,1,1,1,1,1' WHERE id='".$_SESSION["id"]."'");
dc("towns2_uziv");
dc("towns2_ali");
refresh(gv("?submenu=1"));
}

}
}else{
chyba1($GLOBALS["afirst4"]);
}
}
//poznie
if($_MYGET["poznie"]){
mysql_query("DELETE from towns2_poz WHERE hrac='".$_SESSION["id"]."' AND ali='".$_MYGET["poznie"]."'");
dc("towns2_poz");
}
//pozali
if($_MYGET["pozano"]){
$aliancia = hnet("towns2_uziv","SELECT ali from towns2_uziv WHERE ppp AND id='".$_SESSION["id"]."'");
if(!$aliancia){

$odpoved =mysql_query("select ali from towns2_poz where hrac = '".$_SESSION["id"]."' AND ali='".$_MYGET["pozano"]."'");
while ($row = mysql_fetch_array($odpoved)) {
$faktano = $row["ali"];
}
mysql_free_result($odpoved);
if($faktano){
if(budova("ambasada") == 0){
chyba1($GLOBALS["afirst5"]);
}else{

mysql_query("UPDATE towns2_uziv SET ali = '".$_MYGET["pozano"]."', hodnost='', pravomoci='0,0,0,0,0,0' WHERE id = '".$_SESSION["id"]."'");
mysql_query("DELETE FROM towns2_poz WHERE hrac = '".$_SESSION["id"]."' AND ali = '".$_MYGET["pozano"]."'");

dc("towns2_uziv");
dc("towns2_poz");
refresh(gv("?submenu=1"));
}
}else{
chyba1($GLOBALS["afirst6"]);
}
}else{
chyba1($GLOBALS["afirst7"]);
}
}
?>
<h3>
<?php
$ali = hnet("towns2_uziv","SELECT ali from towns2_uziv WHERE ppp AND id='".$_SESSION["id"]."'");

if($ali){
$profil = profila($ali);
echo($GLOBALS["afirst8"] . " " . $profil);
//require("casti/admin/sprava/ali/ano.php");
}else{
echo($GLOBALS["afirst8a"]);
//require("casti/admin/sprava/ali/ne.php");
}
?>
</h3>
<?php

ramcekh1($GLOBALS["afirst9"],"#CCCCCC");
echo "<a onClick=\"if(window.confirm('" . $GLOBALS["afirst10"] . "') == true){ location.assign('".gv("?aliodchodano=1")."'); }\" href=\"#\">" . $GLOBALS["afirst11"] . "</a>";

ramcekh1($GLOBALS["afirst12"],"#CCCCCC");
?>
 <form id="form1" name="form1" method="post" action="<?php gv("?aliid=1"); ?>">
        <label>
          <?php echo $GLOBALS["afirst13"] . ":"; ?>
          <input name="alizal" type="text" id="alizal" size="10" />
        </label>
        <label>
        <input type="submit" name="Submit" value="<?php echo $GLOBALS["afirst14"]; ?>" />
        </label>
    </form>
<?php
ramcekh1($GLOBALS["afirst15"],"#CCCCCC");
//$odpoved =mysql_query("select ali from towns2_poz where hrac = '".$_SESSION["id"]."'");
//while ($row = mysql_fetch_array($odpoved)) {
foreach(hnet2("towns2_poz","SELECT ali from towns2_poz WHERE ppp AND hrac = '".$_SESSION["id"]."'") as $row){
$profil = profila($row["ali"]);
echo("
  <tr>
    <td height=\"21\">$profil</td>
    <td><a onClick=\"if(window.confirm('" . $GLOBALS["afirst16"] . "') == true){ location.assign('".gv("?pozano=".$row["ali"]."")."'); }\" href=\"#\"><img src=\"casti/desing/yes.bmp\" width=\"20\" height=\"20\" /></a></td>
    <td><a onClick=\"if(window.confirm('" . $GLOBALS["afirst17"] . "') == true){ location.assign('".gv("?poznie=".$row["ali"]."")."'); }\" href=\"#\"><img src=\"casti/desing/no.bmp\" width=\"20\" height=\"20\" /></a></td>
  </tr>
");
}
//mysql_free_result($odpoved);
?>
</table>