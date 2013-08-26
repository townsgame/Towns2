<?php
$xc = 1;
$yc = 1;
if($_GET["xc1"]){
$xc = $_GET["xc1"];
$yc = $_GET["yc1"];
$_SESSION["xcg"] = $_GET["xc1"];
$_SESSION["ycg"] = $_GET["yc1"];
}else{
$xc = $_SESSION["xcg"];
$yc = $_SESSION["ycg"];
}
/*
$xc = $_GET["xc"];
$yc = $_GET["yc"];
*/

$quit = 0;


$odpoved = mysql_query("select towns.vlastnik,towns.obrazok,townsmes.meno,townsmes.id from towns,townsmes where townsmes.id = towns.vlastnik  AND xc = ".$xc." AND yc = ".$yc);

//echo(mysql_error());

while ($row = mysql_fetch_array($odpoved)) {
$hrac = $row["meno"];
$idmesta = $row["id"];
$obrazok = $row["obrazok"];
  $quit = 1;
}
mysql_free_result($odpoved);



$odpoved2 = mysql_query("select meno from townsuni where obrazok = '".$obrazok."'");
//echo(mysql_error());
while ($row = mysql_fetch_array($odpoved2)) {
$meno = $row["meno"];
}
if(!$meno){
$meno = "prezdnepole";
}
mysql_free_result($odpoved2);


if(!$quit){
die("$xtadysenada <a href=\"?dir=casti/mapa/index.php\">zpět</a>");
}


if($idmesta == $_SESSION["mestoid"]){ $pravo=1; }
//if($hrac == "příroda" and $_SESSION["uzivatel"]){ $pravo=2; } 
?>
<a href="?dir=casti/mapa/index.php">zpět</a>
<table border="0">
  <tr>
    <th width="120" rowspan="3" align="left" valign="top" scope="col"><img src="casti/jednotky/obrazky/<?php echo($obrazok); ?>.jpg" width="100" height="100" /></th>
    <th align="left" valign="top" scope="col"><?php echo $xbudovicka; ?></th>
    <th align="left" valign="top" scope="col"><i> <?php echo($meno); ?></i></th>
  </tr>
  <tr>
    <th width="70" align="left" valign="top" scope="col">pozice: </th>
    <th align="left" valign="top" scope="col"><i> <?php echo pxy($xc,$yc); ?></i></th>
  </tr>
  <tr>
    <th align="left" valign="top" scope="col"><?php echo $xvlastnicek; ?></th>
    <th align="left" valign="top" scope="col"><i><?php echo($hrac); ?></i></th>
  </tr>
</table>
<br />
<br />
<?php
if($pravo == 1){ require("casti/mapa/polickouziv.php"); }else{ require("casti/jednotky/data2/$obrazok.php"); }
?>
