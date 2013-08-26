<?php
require("casti/funkcie/index.php");
//eval(file_get_contents("../jazyk/".$_SESSION["lang"].".txt"));
//chyba1("Omlouvám se, ale mapa ještě není funkční.");
//die();
/*s */ ?>


<?php
if($_GET["zoom"]){
$_SESSION["zooms"] = $_GET["zoom"];
}

if($_GET["xc"]){
$_SESSION["xcs"] = $_GET["xc"];
}

if($_GET["yc"]){
$_SESSION["ycs"] = $_GET["yc"];
}

if($_POST["plus"]){
$_SESSION["pluss"] = $_POST["plus"];
}

if($_POST["zoom"]){
$_SESSION["zooms"] = $_POST["zoom"];
}

if($_POST["xc"]){
$_SESSION["xcs"] = $_POST["xc"];
}

if($_POST["yc"]){
$_SESSION["ycs"] = $_POST["yc"];
}
/*
$odpoved =mysql_query("SELECT hlbudovaxc, hlbudovayc FROM townsmes WHERE id = '".$_SESSION["mestoid"]."'");
while ($row = mysql_fetch_array($odpoved)) {
$xcreg = $row["hlbudovaxc"]-1;
$ycreg = $row["hlbudovayc"]-1;
}
mysql_free_result($odpoved);
*/
	if(!$_SESSION["zooms"] or $_SESSION["zooms"]<1){
	$_SESSION["zooms"]=xcyczoom($_SESSION["mestoid"],"zoom");
	}
	if(!$_SESSION["pluss"] or $_SESSION["pluss"]<1){
	$_SESSION["pluss"]=1;
	}
	if(!$_SESSION["xcs"] or $_SESSION["xcs"]<1){
	$_SESSION["xcs"]=xcyczoom($_SESSION["mestoid"],"xc");
	}
	if(!$_SESSION["ycs"] or $_SESSION["ycs"]<1){
	$_SESSION["ycs"]=xcyczoom($_SESSION["mestoid"],"yc");
	}
    if($_SESSION["xcs"]>map_x+1-$_SESSION["zooms"]){
	$_SESSION["xcs"]=map_x-$_SESSION["zooms"];
	}
	if($_SESSION["ycs"]>map_y+1-$_SESSION["zooms"]){
	$_SESSION["ycs"]=map_y-$_SESSION["zooms"];
	}
//418


$xc = $_SESSION["xcs"];
$yc = $_SESSION["ycs"];
$zoom = $_SESSION["zooms"];

$brdr = 1;
if($zoom > 20){
$brdr = 0;
}

$size=intval(418/$_SESSION["zooms"])-$brdr-$brdr;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>towns</title>  
<script> 
<!-- 
function info(xc,yc,obrazok,utokna,zivot,zivotmax,vlastnik) 
{  
document.show.xc.value = xc 	
document.show.yc.value = yc 
document.show.obrazok.value = obrazok 
document.show.utokna.value = utokna
document.show.zivot.value = zivot
document.show.zivotmax.value = zivotmax
document.show.vlastnik.value = vlastnik
} 

//--> 
</script>
<script type="text/javascript">
xc= 1;
yc= 1;
zoom= 5;
plus= 1;
function poslat(zoom,xc,yc){
alert(zoom+","+xc+","+yc);
var ajax = (window.XMLHttpRequest ? new XMLHttpRequest() : (window.ActiveXObject ? new ActiveXObject("Microsoft.XMLHTTP") : false));
if(!ajax){
alert("Tak tady to nepoběží!");
return true;
}
ajax.onreadystatechange= function () {zpracuj(ajax); } ;

ajax.open("GET", "casti/mapa/let3.php?zoom="+zoom+"&amp;xc="+xc+"&amp;yc="+yc, true);
ajax.send(null);


return false
}
function zpracuj(ajax){
var txt;
if (ajax.readyState == 4){ //bylo odpovězeno
if(ajax.status == 200 || ajax.status==0){
txt=ajax.responseText;
document.getElementById("md5").innerHTML = txt;
}
else alert("Chyba: "+ ajax.status +":"+ ajax.statusText);
}
}

</script> 
<style type="text/css">
<!--
#Layer2 {
	position:absolute;
	left:1px;
	top:1px;
	width:500px;
	height:700px;
	z-index:4;
	background-color: #FFFFFF;
}
-->
</style>
</head>
<body>
<div id="Layer2">
<table width="700" border="0" bgcolor="#FFFFFF">
<tr>
	<th width="420" height="434" scope="col">
  </th>
<span id="md5"></span>
    	<th align="left" valign="top"  scope="col">
  <table width="170" border="0" bgcolor="#FFFFFF">
    <tr>
      <th width="50" scope="col">&nbsp;</th>
      <th width="46" scope="col"><a onclick="yc = yc-plus; poslat(zoom,xc,yc);" ><img src="desing/hore.jpg" alt="nahoru" width="50" height="30" border="0" /></a></th>
      <th width="62" scope="col">&nbsp;</th>
    </tr>
    <tr>
      <td align="right"><a onclick="xc = xc-plus; poslat(zoom,xc,yc);"><img src="desing/dolava.jpg" alt="doleva" width="30" height="50" border="0" /></a></td>
      <td>&nbsp;</td>
      <td><a onclick="xc = xc+plus; poslat(zoom,xc,yc);"><img src="desing/doprava.jpg" alt="doprava" width="30" height="50" border="0" /></a></td>
    </tr>
    <tr>
      <td align="right"><a onclick="zoom = zoom+plus; poslat(zoom,xc,yc);"><img src="desing/plus.jpg" alt="nahoru" width="30" height="30" border="0" /></a></td>
      <td><a onclick="yc = yc+plus; poslat(zoom,xc,yc);"><img src="desing/dole.jpg" alt="dolu" width="50" height="30" border="0" /></a></td>
      <td><a onclick="zoom = zoom-plus; poslat(zoom,xc,yc);"><img src="desing/minus.jpg" alt="nahoru" width="30" height="15" border="0" /></a></td>
    </tr>
    <tr>
      <td colspan="3">

<form id="form1" name="form1" method="post" action="?dir=index.php">
  
        <table width="170" border="0">
          <tr>
            <th align="left" scope="col"><?php echo $xzoom; ?>
              </th>
            <th height="31" scope="col"><input name="zoom" type="text" id="zoom" value="<?php echo($_SESSION["zooms"]); ?>" size="4" /></th>
          </tr>
          <tr>
            <th align="left" scope="col"><?php echo $xplus; ?></th>
            <th height="31" scope="col"><input name="plus" type="text" id="plus" value="<?php echo($_SESSION["pluss"]); ?>" size="4" /></th>
          </tr>
          <tr>
            <th align="left" scope="col"><?php echo $xx; ?></th>
            <th height="31" scope="col"><input name="xc" type="text" id="xc" value="<?php echo($_SESSION["xcs"]); ?>" size="4" /></th>
          </tr>
          <tr>
            <th width="56" align="left" scope="col"><?php echo $xy; ?></th>
            <th width="78" height="31" scope="col"><input name="yc" type="text" id="yc" value="<?php echo($_SESSION["ycs"]); ?>" size="4" /></th>
          </tr>
        </table>
        <label>
        <input name="submit" type="submit" value="<?php echo $xok; ?>" />
          </label>
</form>	  </td>
    </tr>
  </table>
  <hr/>   
<form name="show"> 
<b>x:&nbsp;&nbsp;&nbsp;&nbsp;</b>
 <input size="3" name="xc" style="border:0px solid #FFFFFF"/><b>y:&nbsp;&nbsp;&nbsp;&nbsp;</b> <input size="3" name="yc" style="border:0px solid #FFFFFF"/>
<br />
<b>vlastník:&nbsp;&nbsp;&nbsp;&nbsp;<input name="vlastnik" id="vlastnik" size="14" style="border:0px solid #FFFFFF"/></b>
<br/> 
<b>budova:&nbsp;&nbsp;&nbsp;&nbsp;<input size="14" name="obrazok" style="border:0px solid #FFFFFF"/>  </b> 
<br/>   
<b>život:&nbsp;&nbsp;&nbsp;&nbsp;</b> <input size="3" name="zivot" style="border:0px solid #FFFFFF"/> / <input size="3" name="zivotmax" style="border:0px solid #FFFFFF"/>  <br/>
<b>obrana:&nbsp;&nbsp;&nbsp;&nbsp;</b> <input size="4" name="utokna" style="border:0px solid #FFFFFF"/>

</form>   
  </th>
    </tr>
  </table>
</div>

</body>
</html>
<?php
/*
require("casti/funkcie/index.php"); 
require("casti/funkcie/vojak.php"); 

echo xcyczoom(2,"xc");
echo "a";
echo xcyczoom(2,"yc");
echo "a";
echo xcyczoom(2,"zoom");

$fields = array(
    'TextBoxjmeno' => 'hejny',
    'TextBoxheslo' => 'kkkk'
);


echo http_post_data("http://www.gvp.cz:8080/info/login.aspx", $fields);






$odpoved =mysql_query("select * from townsutok ORDER BY id");
while ($row = mysql_fetch_array($odpoved)) {
if(vlastnikxcyc($row["xc"],$row["yc"]) == vlastnikxcyc($row["xczo"],$row["yczo"])){
//------------------------
$odpoved1 = mysql_query("SELECT utokna,zivot FROM towns WHERE xc=".$row["xczo"]." AND yc=".$row["yczo"]);
while ($row1 = mysql_fetch_array($odpoved1)) {
$utokna = $row1["utokna"];
$zivot = $row1["zivot"];
} mysql_free_result($odpoved1);
//------------------------
$vysledok = vojakboj($row["vojak"],$zivot,$utokna,    (sqrt(pow(($row["xczo"]-$row["xc2"]),2)+pow(($row["yczo"]-$row["yc2"]),2)))    );
if(!is_string($vysledok)){
mysql_query("UPDATE towns SET zivot=$vysledok WHERE xc=".$row["xc"]." AND yc=".$row["yc"]);
zpravames(vlastnikxcyc($row["xc2"],$row["yc2"]),"útok na x:".$row["xc"]." y:".$row["yc"]," Ztratil jste všechny jednotky a budově zůstalo $vysledok životů.");
zpravames(vlastnikxcyc($row["xc"],$row["yc"]),"obrana x:".$row["xc"]." y:".$row["yc"],"Útočník(město ".profilm(vlastnikxcyc($row["xc2"],$row["yc2"])).") Ztratil všechny jednotky a budově zůstalo $vysledok životů.");
}else{
$odpoved1 =mysql_query("select napis from towns where xc = ".$row["xc2"]." AND yc = ".$row["yc2"]);
while ($row1 = mysql_fetch_array($odpoved1)) {
$vojaci = $row1["napis"];
}
mysql_free_result($odpoved1);
mysql_query("UPDATE towns SET napis='".vojakplus($vysledok,$vojaci)."' WHERE xc=".$row["xc2"]." AND yc=".$row["yc2"]);
echo mysql_error();
mysql_query("UPDATE towns SET obrazok='', cas=1, zivot=0, napis='', budovanas='' WHERE xc=".$row["xc"]." AND yc=".$row["yc"]);
zpravames(vlastnikxcyc($row["xc2"],$row["yc2"]),"útok na x:".$row["xc"]." y:".$row["yc"],"Budova byla zničena a vám zůstalo <br/>".vojaktext($vysledok));
zpravames(vlastnikxcyc($row["xc"],$row["yc"]),"obrana x:".$row["xc"]." y:".$row["yc"],"Budova byla zničena a utočníkovi(městu ".profilm(vlastnikxcyc($row["xc2"],$row["yc2"])).") zůstalo <br/>".vojaktext($vysledok));
}
}else{
zpravames(vlastnikxcyc($row["xc2"],$row["yc2"]),"nelze","nevlastni...");
}
//mysql_query("DELETE FROM townsutok WHERE id = ".$row["id"]);
}
mysql_free_result($odpoved);  
   
   
      
   
   
   
   
   
   
   
   
   
   
   

$odpoved1 = mysql_query("SELECT xc,yc FROM towns WHERE vlastnik = 1 AND obrazok = 'schromazdiste' LIMIT 0,1");
while ($row1 = mysql_fetch_array($odpoved1)) {
$xc = $row1["xc"];
$yc = $row1["yc"];
}
mysql_free_result($odpoved1);

$odpoved1 = mysql_query("SELECT xc,yc FROM towns WHERE obrazok != '0' LIMIT ".rand(0,1000).",1");
while ($row1 = mysql_fetch_array($odpoved1)) {
$xc1 = $row1["xc"];
$yc1 = $row1["yc"];
}
mysql_free_result($odpoved1);

$asa = rand(1,2);
if($asa==1){ $asa=("(v50,s0,k0,r0,j0,t0,z0,b0,a0,e0,n0,d0,m0)"); }
if($asa==2){ $asa=("(v0,s0,k0,r0,j0,t0,z0,b0,a0,e0,n0,d0,m1)"); }

$odpoved1 = mysql_query("SELECT MAX(id) maxId FROM townsutok");
$row1 = mysql_fetch_array($odpoved1);
$pocetz=$row1["maxId"];
mysql_free_result($odpoved1);
$pocetz = $pocetz+1;
   
echo("INSERT INTO `townsutok` ( `id` , `cas` , `xc` , `yc` , `xczo` , `yczo` , `xc2` , `yc2` , `vojak` )
VALUES (
$pocetz, 1, $xc1 , $yc1 , $xc1 , $yc1 , $xc , $yc , '$asa'
);");   
   
   
   
   
   
   
   
   
   
   

$odpoved =mysql_query("select * from townsld");
while ($row = mysql_fetch_array($odpoved)) {

$kod = rand(111111111,999999999);

mysql_query("INSERT INTO townskod ( kod, prachy , seria ) VALUES
('".($kod*$kod)."', '".$row["prachy"]."', '2')");

zprava($row["hrac"],"příjem z anket","Váš dnešní příjem z anket je ".$row["prachy"]." peněz a je připsán na kód ".$kod);

}
mysql_free_result($odpoved);
mysql_query("TRUNCATE TABLE townsld");













$x = 5;
while ($x > 0){

sin()
$x = 5;
while ($x > 0){





$x=$x-1;
}


$x=$x-1;
}


if(vojakvlozx()){
echo vojakcena(vojakvlozx());
}

vojakvloz("(v0,s0,k0,r0,j0,t0,z0,b0,a0,e0,n0,d0,m0)","OK");

//lista lng ==> <lj/>
//reklama nps ==> <rn/>
//reklama ==> <re/>
//typ nps ==> <ty/>
//lavalista ==> <ll/>
//suroviny ==> <s1/>
//opsach ==> <op/>
//suroviny2 ==> <s2/>
//<ti/>
//<co/>
$mystring = file_get_contents("casti/desing/data/".$_SESSION["dsgx"].".htm");
$z   = array("<ti/>","<co/>");
$do  = array($xtowns,$xcopy);
//$do  = array("$_SESSION['voj", "; $_SESSION['voj", ";");
$mystring = str_replace($z, $do, $mystring);
$p1 = strpos($mystring, "<lj/>");
$p2 = strpos($mystring, "<rn/>");
$p3 = strpos($mystring, "<re/>");
$p4 = strpos($mystring, "<ty/>");
$p5 = strpos($mystring, "<ll/>");
$p6 = strpos($mystring, "<s1/>");
$p7 = strpos($mystring, "<op/>");
$p8 = strpos($mystring, "<s2/>");
$s1 = substr($mystring, 0, $p1);
$s2 = substr($mystring, ($p1+5), ($p2-$p1-5));
$s3 = substr($mystring, ($p2+5), ($p3-$p2-5));
$s4 = substr($mystring, ($p3+5), ($p4-$p3-5));
$s5 = substr($mystring, ($p4+5), ($p5-$p4-5));
$s6 = substr($mystring, ($p5+5), ($p6-$p5-5));
$s7 = substr($mystring, ($p6+5), ($p7-$p6-5));
$s8 = substr($mystring, ($p7+5), ($p8-$p7-5));
$s9 = substr($mystring, ($p8+5), (strlen($mystring)-$p8));
?>
<?php echo($s1); ?>
<table width="808" border="0">
    <tr>
      <td width="128"><strong>jazyk:</strong> <a href="?lang=cz">česky</a></td>
      <td width="670"><strong>design:</strong> <a href="?dsgx=standart">standart</a></td>
    </tr>
  </table>
<?php echo($s2); ?>
<?php echo $xreklama; ?>
<?php echo($s3); ?>
<?php
$odpoved = mysql_query("SELECT html from townsrek");
$pocet = mysql_num_rows($odpoved);
$rnd = rand(1,$pocet);
$q = 1;
while ($row = mysql_fetch_array($odpoved)) {
if($rnd == $q){
echo $row["html"];
}
$q = $q + 1;
}
?>
<?php echo($s4); ?>
<?php if($_SESSION["typ"] < 6){ echo(typuziv($_SESSION["typ"])); } ?>
<?php echo($s5); ?>
<?php
require("casti/lavalista/index.php");  
?>
<?php echo($s6); ?>
  <?php 
  if($_SESSION["uzivatel"]){
  require("casti/suroviny/lista.php");
  }
  ?>
<?php echo($s7); ?>
  <?php
if($_SESSION["typ"] == "7"){
chyba2("Váš účet byl úspěšně aktivován.");
echomysql_query("UPDATE townsuziv SET `typ` = '6' WHERE id='".$_SESSION["id"]."'");
$_SESSION["typ"] = "6";
}
  
  
  
if($_GET["dir"]){
$_SESSION["dir"] = $_GET["dir"];
} 
	  
$dir = $_SESSION["dir"];
if(!$dir){
$dir="casti/uvod/prehlad.php";
}
require($dir);
?>
<?php echo($s8); ?>
  <?php 
  if($_SESSION["uzivatel"]){
  require("casti/suroviny/lista.php");
  }
  ?>
<?php echo($s9); ?>
<?php

 ob_end_clean();
 header("Connection: close");
 ignore_user_abort(); // optional
 ob_start();
 echo ('Text the user will see');
 $size = ob_get_length();
 header("Content-Length: $size");
 ob_end_flush(); // Strange behaviour, will not work
 flush();            // Unless both are called !
 // Do processing here 
require("casti/funkcie/index.php"); 
$x = 7;
while ($x > 0){
zpravames("1","HURA - $x ","funguje to");
 sleep(1200);
$x=$x-1;
}
?>
<?php

require("casti/funkcie/index.php"); 

$x = 100;
while ($x >= 1){
$y = 100;
while ($y >= 1){

mysql_query("INSERT into towns VALUES ('$x', '".($y)."', '0', '1', 'trava' , '1', '0', NULL , '1', NULL); ");
echo(mysql_error());
$y=$y-1;
}
$x=$x-1;
}

*/
/*
require("casti/funkcie/index.php"); 
//require("casti/funkcie/vojak.php"); 
//vojaktext("(v100,s100,k100,r100,j100,t100,z100,b100,a100,e100,n100,d10,m10)");

echo aktivita(1);
echo "<br>";
echo aktivita(2);


//-----------------------------------------------------AAAAAAAAAAAAAAAA-----------mapa
$odpoved =mysql_query("select ali,body from townsuziv");
while ($row = mysql_fetch_array($odpoved)) {
mysql_query("UPDATE townsali SET  body = body+".$row["body"]." WHERE id=".$row["ali"]);
}
mysql_free_result($odpoved);

vojakvloz("(v1,s2,k3,r4,j5,t6,z7,b8,a9,e10,n11,d12,m13)","OK");
echo vojakvlozx();
vojakzobraz(vojakvlozx());

echo("vojaci:<br/>");
echo "(v1,s2,k3,r4,j5,t6,z7,b8,a9,e10,n11,d12,m13)";
vojakzobraz("(v1,s2,k3,r4,j5,t6,z7,b8,a9,e10,n11,d12,m13)");
echo("vojaci2:<br/>");
echo "(v0,s2,k3,r4,j5,t6,z7,b8,a9,e10,n11,d12,m13)";
vojakzobraz("(v0,s2,k3,r4,j5,t6,z7,b8,a9,e10,n11,d12,m13)");
echo("vojaci sucet:<br/>");
echo vojakplus("(v1,s2,k3,r4,j5,t6,z7,b8,a9,e10,n11,d12,m13)","(v0,s2,k3,r4,j5,t6,z7,b8,a9,e10,n11,d12,m13)");
vojakzobraz(vojakplus("(v1,s2,k3,r4,j5,t6,z7,b8,a9,e10,n11,d12,m13)","(v0,s2,k3,r4,j5,t6,z7,b8,a9,e10,n11,d12,m13)"));
echo("vojaci odocet:<br/>");
echo vojakminus("(v1,s2,k3,r4,j5,t6,z7,b8,a9,e10,n11,d12,m13)","(v0,s2,k3,r4,j5,t6,z7,b8,a9,e10,n11,d12,m13)");
vojakzobraz(vojakminus("(v1,s2,k3,r4,j5,t6,z7,b8,a9,e10,n11,d12,m13)","(v0,s2,k3,r4,j5,t6,z7,b8,a9,e10,n11,d12,m13)"));


v - vojak - $voj
s - sermir - $ser
k - kopijnik - $kop
r - strelec - $str
j - jezdec - $jez
t - tezky jezdec - $tez
z - jezdec s lukem - $jsl
b - beranidlo - $ber
a - katapult - $kat
e - vez - $vez
n - tank - $tan
d - letadlo - $let
m - vesmirna lod - $ves
*/
/*
$poradie=0;
$odpoved =mysql_query("select id from townsuziv order by body desc,meno");
while ($row = mysql_fetch_array($odpoved)) {
$poradie = $poradie+1;
mysql_query("UPDATE townsuziv SET  poradie=$poradie WHERE id=".$row["id"]);
}
mysql_free_result($odpoved);

function mesto($mesto){

$odpoved =mysql_query("SELECT hlbudovaxc, hlbudovayc FROM townsmes WHERE id = '$mesto'");
while ($row = mysql_fetch_array($odpoved)) {
$x = $row["hlbudovaxc"];
$y = $row["hlbudovayc"];
}

mysql_query("UPDATE towns SET cas=1, obrazok = 'hlbudova', vlastnik = '$mesto' WHERE xc = ".($x+0)." AND  yc = ".($y+0));
mysql_query("UPDATE towns SET cas=1, obrazok = 'dom', vlastnik = '$mesto' WHERE xc = ".($x+0)." AND  yc = ".($y+1));
mysql_query("UPDATE towns SET cas=1, obrazok = 'sklad', vlastnik = '$mesto' WHERE xc = ".($x+1)." AND  yc = ".($y+0));
mysql_query("UPDATE towns SET cas=1, obrazok = 'tdrevo', vlastnik = '$mesto' WHERE xc = ".($x+1)." AND  yc = ".($y+1));
mysql_query("UPDATE towns SET cas=1, obrazok = 'tkamen', vlastnik = '$mesto' WHERE xc = ".($x+1)." AND  yc = ".($y-1));

mysql_query("UPDATE townsmes SET hlbudovaxc = $x, hlbudovayc = $y WHERE id = '$mesto'");
}


mesto(15);
mesto(11);
mesto(12);
mesto(19);
mesto(17);
mesto(18);
mesto(27);
mesto(30);
mesto(31);
mesto(32);


hamburg	mesto(2,5,5);*/
/*Killer	mesto(3,86,3);*/
/*ReX	mesto(3,56,45);*/
/*mike1234	mesto(13,10,20);*/
/*gurmáni	mesto(7,15,20);*/
/*domažlice	mesto(8,78,65);*/
/*mima	mesto( 9,89,78);*/
/*cvok	mesto(10,86,6);*/
/*qwerty	mesto(12,20,78);*/
/*Melisk	mesto(11,25,78);*/
/*:-)	mesto(18,20,85);*/
/*hobado	mesto(20,40,40);*/
/*debil	mesto(21,45,45);*/
/*dacawe	mesto(24,50,50);*/
/*OMGmesto(25,65,65);*/	
/*drtka	mesto(26,70,70);*/
/*Kerry	mesto( 27,50,98);*/
/*PH	mesto( 28,60,98);*/
/*sojka	mesto( 29,70,98);*/
/*kkt	mesto(30,40,98);*/
/*eminem	mesto(31,30,98);*/

?>
