<?php
$odpoved =mysql_query("select napis from towns where xc = ".$xc." AND yc = ".$yc);
while ($row = mysql_fetch_array($odpoved)) {
$vojaci = $row["napis"];
}
mysql_free_result($odpoved);
//---------------------
if($_POST["anov"]){
if(vojakv(vojakvlozx(),$vojaci)){
if(vojakdosah(vojakvlozx(),    (sqrt(pow(($_POST["xc1"]-$_POST["xc2"]),2)+pow(($_POST["yc1"]-$_POST["yc2"]),2))))    ){
mysql_query("UPDATE towns SET napis = '".(vojakminus($vojaci,vojakvlozx()))."' WHERE  xc = ".$xc." AND yc = ".$yc);

$odpoved1 = mysql_query("SELECT MAX(id) maxId FROM townsutok");
$row1 = mysql_fetch_array($odpoved1);
$pocet1=$row1["maxId"];
mysql_free_result($odpoved1);
$pocet = $pocet1+1;
mysql_query("INSERT INTO `townsutok` ( `id` , `xc` , `yc` , `xczo` , `yczo` , `xc2` , `yc2` , `vojak` ) 
VALUES (
'$pocet', '".$_POST["xc2"]."', '".$_POST["yc2"]."', '".$_POST["xc1"]."', '".$_POST["yc2"]."', '$xc', '$yc', '".(vojakvlozx())."'
);");
}else{
chyba1("nedostatek vojáků");
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
<strong>Na tomto shromaždišti máte:</strong> 
<?php vojakzobraz($vojaci); ?><br />
<table width="558" border="0">
  <tr>
    <th width="647" align="left" bgcolor="#DDDDDD">vyslané útoky:</th>
  </tr>
</table>
<br />
<table width="551" border="0">
<?php
$odpoved =mysql_query("select * from townsutok where xc2 = ".$xc." AND yc2 = ".$yc." order by id");
while ($row = mysql_fetch_array($odpoved)) {
echo("    <tr>
    <td width=\"551\">");
vojakzobraz($row["vojak"]);
echo("z políčka ".(pxy($row["xczo"],$row["yczo"]))." na políčko ".(pxy($row["xc"],$row["yc"]))." (vlastník políčka: ".profilm(vlastnikxcyc($row["xc"],$row["yc"])).")<hr/></td>
    <td width=\"69\"><a href=\"?del=".$row["id"]."\"><img src=\"casti/desing/no.bmp\" alt=\"x\" width=\"20\" height=\"20\" border=\"0\" /></a></td>
  </tr>
");
}
mysql_free_result($odpoved);
?>
</table>
<form id="form1" name="form1" method="post" action="?del=0">
<table width="558" border="0">
  <tr>
    <th colspan="3" align="left" bgcolor="#DDDDDD">vyslat útok: </th>
    </tr>
  <tr>
    <td height="61" colspan="3" align="left" valign="top">Bude útočit
      <?php vojakvloz2(vojakvlozx()); ?></td>
    </tr>
  <tr>
    <td width="87">Z políčka:</td>
    <td width="10">x:</td>
    <td width="447"><input name="xc1" type="text" id="xc1" value="<?php echo($_POST["xc1"]); ?>" size="7" />
y:
<input name="yc1" type="text" id="yc1" value="<?php echo($_POST["yc1"]); ?>" size="7" /><input name="anov" type="radio" value="a" checked="checked" /></td>
  </tr>
  <tr>
    <td>Na políčko:</td>
    <td>x:</td>
    <td><input name="xc2" type="text" id="xc2" value="<?php echo($_POST["xc2"]); ?>" size="7" />
      y:
      <input name="yc2" type="text" id="yc2" value="<?php echo($_POST["yc2"]); ?>" size="7" /></td>
  </tr>
  <tr>
    <td colspan="3">Varování: Políčko z kterého útočíte musí vlastnit stejné město jako políčko na které útočíte. </td>
    </tr>
  <tr>
    <td colspan="3"><label>
      <input type="submit" name="Submit" value="vyslat" />
    </label></td>
    </tr>
</table>
</form>
