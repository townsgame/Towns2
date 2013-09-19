<style type="text/css">
<!--
.zpravyh1 {font-size: 20px}
-->
</style>
<?php
//eval(file_get_contents("casti/jazyk/".$_SESSION["lang"].".txt"));
if($_MYGET["zprava"]){
mysql_query("
DELETE from `towns2_zpr` WHERE id='".$_MYGET["zprava"]."' and  komu='".$_SESSION["id"]."'");
deletecash("towns2_zpr");
}
//---------------------------------------------
//$docastna_premenna = new index(" <u><span class=\\\"zpravyh1\\\">\$predmet</span></u>   <br /> <b>\$xod \$profil<br /> \".(zcas(\$row[\"cas\"])).\"</b><br /><br /> \".\$row[\"zprava\"].\"<br /><br />  <b><a href=\\\"\\\".gv('?dir=casti/zpravy/index.php&amp;submenu=2&amp;piszpr2=\".\$row[\"id\"].\"&amp;piszpr=\".\$row[\"od\"].\"&amp;idz=2').\\\"\\\">$xodpovedet</a> | <a href=\\\"?archyv=\".\$row[\"id\"].\"\\\">$xarchyvpr</a> | <a href=\\\"\\\".gv('?id=1&amp;zprava=\".\$row[\"id\"].\"').\\\"\\\">smazat</a></b>","","","<strong>$xnamate</strong>","\$profil = profil(\$row[\"od\"]); \$predmet = \$row[\"predmet\"]; if(!\$predmet){ \$predmet = \"$xzadnypredmet \"; }");
//$docastna_premenna->show("0,9999","1");
$tmp = 0;
foreach(hnet2("towns2_zpr","select * from towns2_zpr WHERE od = '".$_SESSION["id"]."' AND ppp order by cas desc") as $row){
$tmp = 1;
$profil = profil(convert($row["komu"]));
$predmet = $row["predmet"];
if(!$predmet){ $predmet = $GLOBALS["zprijate5"]; }
if($row["precitane"] == "0"){ $row["precitane"]=$GLOBALS["zodeslane1"]; }
if($row["precitane"] == "1"){ $row["precitane"]=$GLOBALS["zodeslane2"]; }
if($row["precitane"] == "3"){ $row["precitane"]=$GLOBALS["zodeslane3"]; }

echo("<hr/>");
echo("<u><span class=\"zpravyh1\">" . zpravback($predmet) . "</span></u>   <br /> <b>" . $GLOBALS["zodeslane4"] . ": $profil<br /> ".(zcas($row["cas"]))."</b><br /><br />".zpravback($row["zprava"])."<br /><br />(".$row["precitane"].")");
}
if($tmp == 0){
echo("<b>" . $GLOBALS["zodeslane5"] . "</b>");
}
/*
$odpoved =mysql_query("select * from towns2_zpr WHERE komu = '".$_SESSION["id"]."' AND precitane!=3 order by cas desc");

if (mysql_num_rows($odpoved)== 0 ) {
echo "<strong>$xnamate</strong><hr width=\"150\" />";
}

while ($row = mysql_fetch_array($odpoved)) {
if(0==$row["precitane"]){
$bg = "#A6894D";
}else{
$bg = "";
}

$profil = profil($row["od"]);
$predmet = $row["predmet"];
if(!$predmet){
$predmet = "$xzadnypredmet ";
}




echo("<hr />
<u><span class=\"zpravyh1\">$predmet</span></u>
  <br />
<b>$xod $profil<br />
".(zcas($row["cas"]))."</b><br /><br />
".$row["zprava"]."<br /><br />
 <b><a href=\"?piszpr2=".$row["id"]."&amp;piszpr=".$row["od"]."&amp;idz=2\">$xodpovedet</a> | <a href=\"?archyv=".$row["id"]."\">$xarchyvpr</a> | <a href=\"?id=1&amp;zprava=".$row["id"]."\">smazat</a></b>
");

}
mysql_free_result($odpoved);
*/


        $docastny_objekt = new index("towns2_zpr","SELECT COUNT(id) FROM towns2_zpr WHERE komu = '".$_SESSION["id"]."' AND precitane='0' AND ppp");
        $docastna_premenna = $docastny_objekt->get("1");
        $docastna_premenna = $docastna_premenna[0];
if($docastna_premenna > 0){
mysql_query("UPDATE towns2_zpr SET precitane=1 WHERE precitane=0 AND komu='".$_SESSION["id"]."'");
deletecash("towns2_zpr");
}
?>