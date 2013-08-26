<?php
$odpoved =mysql_query("select napis from towns where xc = ".$xc." AND yc = ".$yc);
while ($row = mysql_fetch_array($odpoved)) {
$vojaci = $row["napis"];
}
mysql_free_result($odpoved);
//---------------------
if($_POST["anov"]){
if(vojakv(vojakvlozx(),$vojaci)){
if(polickoplat($_POST["xc2"],$_POST["yc2"])){
if(vojakvlozx() != ".1(v0,s0,k0,r0,j0,t0,z0,b0,a0,e0,n0,d0,m0)"){
if(0<vojakutok(vojakvlozx(), sqrt(pow(($xc-$_POST["xc2"]),2)+pow(($yc-$_POST["yc2"]),2)) )){

mysql_query("UPDATE towns SET napis = '".(vojakminus($vojaci,vojakvlozx()))."' WHERE  xc = ".$xc." AND yc = ".$yc);

$odpoved1 = mysql_query("SELECT MAX(id) maxId FROM townsutok");
$row1 = mysql_fetch_array($odpoved1);
$pocet1=$row1["maxId"];
mysql_free_result($odpoved1);
$pocet = $pocet1+1;
mysql_query("INSERT INTO `townsutok` ( `id`, `cas` , `xc` , `yc` , `xc2` , `yc2` , `vojak` ) 
VALUES (
'$pocet', ".(vojakrychlost(vojakvlozx(), sqrt(pow(($xc-$_POST["xc2"]),2)+pow(($yc-$_POST["yc2"]),2)) )+time())." , '".$_POST["xc2"]."', '".$_POST["yc2"]."', '$xc', '$yc', '".(vojakvlozx())."'
);");
}else{
chyba1("jednotky nemají dostatečnou výdrž na překonání vzdálenosti ".intval(sqrt(pow(($xc-$_POST["xc2"]),2)+pow(($yc-$_POST["yc2"]),2)))." políček");
}
}else{
chyba1("musíte vybrat alespoň jednu jednotku");
}
}else{
chyba1("neplatné políčko");
}
}else{
chyba1("nedostatek vojáků");
}
}
//-------------------------------------------------------------------------------
if($_GET["del"]){
$odpoved =mysql_query("select vojak from townsutok WHERE id=".$_GET["del"]." AND  xc2 = ".$xc." AND yc2 = ".$yc);
while ($row = mysql_fetch_array($odpoved)) {
$vojaci2 = $row["vojak"];
}
mysql_free_result($odpoved);


//echo $vojaci." + ".$vojaci2." = ".vojakplus($vojaci1,$vojaci2);

mysql_query("UPDATE towns SET napis = '".(vojakplus($vojaci,$vojaci2))."' WHERE  xc = ".$xc." AND yc = ".$yc);

mysql_query("DELETE from townsutok WHERE id=".$_GET["del"]." AND  xc2 = ".$xc." AND yc2 = ".$yc);
}
//---------------------
$odpoved =mysql_query("select napis from towns where xc = ".$xc." AND yc = ".$yc);
while ($row = mysql_fetch_array($odpoved)) {
$vojaci = $row["napis"];
}
mysql_free_result($odpoved);
?>
<table width="558" border="0">
  <tr>
    <th width="647" align="left" bgcolor="#DDDDDD">na tomto shromaždišti máte:</th>
  </tr>
</table>
<?php vojakzobraz($vojaci); ?><br />
<table width="558" border="0">
  <tr>
    <th width="647" align="left" bgcolor="#DDDDDD">vyslané útoky:</th>
  </tr>
</table>
<br />
<table width="551" border="0">
<?php
$odpoved =mysql_query("select id,cas,xc,yc,xc2,yc2,vojak from townsutok where xc2 = ".$xc." AND yc2 = ".$yc." order by id");
//echo(mysql_error());
$pocet = mysql_num_rows($odpoved);
if($pocet == 0){
echo("žádné útoky nejsou vyslané");
}
$pocet2 = 1;
while ($row = mysql_fetch_array($odpoved)) {
echo("<tr>
    <td width=\"551\">");
vojakzobraz($row["vojak"]);
//echo (sqrt(pow(($row["xc"]-$row["xc2"]),2)+pow(($row["yc"]-$row["yc2"]),2))) ;
//echo vojakutok($row["vojak"], (sqrt(pow(($row["xc"]-$row["xc2"]),2)+pow(($row["yc"]-$row["yc2"]),2))) );
echo("<span id=\"pocitadlox$pocet2\">".($row["cas"])."</span> na políčko ".(pxy($row["xc"],$row["yc"]))." (vlastník políčka: ".profilm(vlastnikxcyc($row["xc"],$row["yc"])).")<hr/></td>
    <td width=\"69\"><a href=\"?del=".$row["id"]."\"><img src=\"casti/desing/no.bmp\" alt=\"x\" width=\"20\" height=\"20\" border=\"0\" /></a></td>
  </tr>
");

$pocet2 = $pocet2 + 1;
}
mysql_free_result($odpoved);

echo"<script type=\"text/javascript\">";
while ($pocet > 0){

echo"
theBigDayx$pocet = new Date();
casx$pocet = Math.ceil((theBigDayx$pocet.getTime()/1000)-0.99999999999999999);
casx$pocet = document.getElementById(\"pocitadlox$pocet\").innerHTML - casx$pocet;
window.setInterval(\"casx$pocet=casx$pocet-1; if(casx$pocet < 1){ casx$pocet = '1'; } cas2x$pocet = casx$pocet; hodx$pocet = Math.ceil((cas2x$pocet/3600)-0.99999999999999999); cas2x$pocet=cas2x$pocet-(3600*hodx$pocet); minx$pocet = Math.ceil((cas2x$pocet/60)-0.99999999999999999); cas2x$pocet=cas2x$pocet-(60*minx$pocet); secx$pocet = cas2x$pocet; document.getElementById(\\\"pocitadlox$pocet\\\").innerHTML=hodx$pocet.toString()+\\\":\\\"+(minx$pocet).toString()+\\\":\\\"+(secx$pocet-1).toString(); \", 1000);
";

$pocet = $pocet - 1;
}
echo "</script>";
?>
</table>
<form id="form1" name="form1" method="post" action="?del=0">
	<table width="558" border="0">
  <tr>
    <th width="647" align="left" bgcolor="#DDDDDD">vyslat útok: </th>
  </tr>
</table>
<table width="558" border="0">
    <td height="61" colspan="3" align="left" valign="top">Bude útočit
      <?php vojakvloz2(vojakvlozx()); ?></td>
    </tr>
  <tr>
    <td width="10">Na políčko:</td>
    <td>x:</td>
    <td><input name="xc2" type="text" id="xc2" value="<?php echo($_POST["xc2"]); ?>" size="7" />
      y:
      <input name="yc2" type="text" id="yc2" value="<?php echo($_POST["yc2"]); ?>" size="7" /><input name="anov" type="radio" value="a" checked="checked" /></td>
  </tr>
  <tr>
    <td colspan="3">útočit se nedá na políčko patřící přírodě, na hlavní budovu nebo na neexistující políčko</td>
    </tr>
  <tr>
    <td colspan="3"><label>
      <input type="submit" name="Submit" value="vyslat" />
    </label></td>
    </tr>
</table>
</form>
