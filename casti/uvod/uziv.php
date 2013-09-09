<style type="text/css">
<!--
.style10 {
	color: #006600;
	font-size: 18px;
}
.style11 {font-family: "Comic Sans MS"}
-->
</style>
<table width="505" height="215" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th height="20" colspan="2" align="left" valign="top" scope="col"><h2 align="center" class="style11"><?php echo $GLOBALS["uvuziv1"]; ?> <?php echo($_SESSION["uzivatel"]);?></h2></th>
  </tr>
  <tr>
    <td width="330" height="21"><span class="style10"> <?php echo $GLOBALS["uvuziv2"]; ?>:</span></td>
    <td width="200" align="left" valign="top" scope="col"><span class="style10"><?php echo $GLOBALS["afourth3"]; ?>: </span></td>
  </tr>
  <tr>
    <td height="76" align="left" valign="top"><strong><?php echo $GLOBALS["uvuziv3"]; ?>:</strong><span class="style10"><br />      </span>
<?php
$odpoved = mysql_query/*echo*/("select drevo,kamen,zelezo,jedlo from townsmes WHERE id = ".$_SESSION["mestoid"]);
while ($row = mysql_fetch_array($odpoved)) {
$drevo = $row["drevo"];
$kamen = $row["kamen"];
$zelezo = $row["zelezo"];
$jedlo = $row["jedlo"];
}
?>
<?php echo $GLOBALS["uvuziv5"]; ?>: <?php echo($drevo);?> <?php echo $GLOBALS["uvuziv4"]; ?><br />
<?php echo $GLOBALS["uvuziv6"]; ?>: <?php echo($kamen);?> <?php echo $GLOBALS["uvuziv4"]; ?><br />
<?php echo $GLOBALS["uvuziv7"]; ?>: <?php echo($zelezo);?> <?php echo $GLOBALS["uvuziv4"]; ?><br />
<?php echo $GLOBALS["uvuziv8"]; ?>: <?php echo($jedlo);?> <?php echo $GLOBALS["uvuziv4"]; ?><br />
<strong>Jednotky:</strong></td>
    <td width="200" rowspan="3" align="left" valign="top" scope="col"><?php
echo "<table width=\"100\" border=\"0\">";

$odpoved = mysql_query("select * from townstem order by tema LIMIT 0,7");


while ($row = mysql_fetch_array($odpoved)) {

   echo "<tr>";
   
echo "<th align=\"left\" scope=\"col\"><a href=\"?dir=casti/diskuse/prispevky.php&amp;tema=".$row["id"]."\">".$row["tema"]."</a> </th>";
   
   echo "</tr>";

}
echo "</table>";


mysql_free_result($odpoved);
?></td>
  </tr>
  <tr>
    <td height="24" class="style10"><?php echo $GLOBALS["uvuziv9"]; ?>:</td>
  </tr>
  <tr>
    <td height="59" align="left" valign="top"><p><?php echo $GLOBALS["uvuziv10"]; ?><br />
    <?php echo $GLOBALS["uvuziv11"]; ?><br />
    <?php echo $GLOBALS["uvuziv12"]; ?><br />
    <?php echo $GLOBALS["uvuziv13"]; ?><br />
    <?php echo $GLOBALS["uvuziv14"]; ?><br />
    <?php echo $GLOBALS["uvuziv15"]; ?><br />
    <?php echo $GLOBALS["uvuziv16"]; ?></p>
    </td>
  </tr>
</table>
