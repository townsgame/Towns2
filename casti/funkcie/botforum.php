<form action="" method="get">
<table width="530" border="0">
  <tr>
    <th width="152" align="left" valign="top">Nadpis:</th>
    <td width="368"><input name="nedpis" type="text" id="nedpis" /></td>
  </tr>
  <tr>
    <th align="left" valign="top">Do fóra: </th>
    <td><input name="to" type="text" id="to" value="<?php echo(hnet("towns2_tem","SELECT tema FROM towns2_tem ORDER by id desc")); ?>" /></td>
  </tr>
  <tr>
    <th height="24" align="left" valign="top">Od:</th>
    <td><select name="od" size="5" id="od">
<?php
foreach(hnet2("towns2_uziv","SELECT meno,id FROM towns2_uziv WHERE typ = '9' ORDER BY (SELECT count(1) FROM towns2_dis WHERE towns2_dis.meno=towns2_uziv.id)") as $row){

echo("<option value=\"".$row["id"]."\">".$row["meno"]."</option>");
} ?>
    </select></td>
  </tr>
  <tr>
    <th height="24" align="left" valign="top">Text:</th>
    <td><textarea name="text" cols="50" rows="10" id="text"></textarea></td>
  </tr>
</table>
<br />
<label>
<input type="submit" name="Submit" value="OK" />
</label>
</form>
<?php
if($_POST["nadpis"]){


}
/*
nadpis varchar(20) utf8_bin  Ne ne                
  text text utf8_bin  Ne                 
  cas int(11)   Ne                 
  od int(11)   Ne 0                
  to va 

*/
if($_SESSION["id"] != 1){ exit(); }
foreach(hnet2("towns2_dis","SELECT * from towns2_botdis order by cas") as $row){
//$odpoved = mysql_query("select * from towns2_dis where tema='".$_SESSION['tema']."' order by id");
//while ($row = mysql_fetch_array($odpoved)) {
$meno = profil($row["od"]);
$smaz = "";

$smaz = "<a href=\"".gv("?del=".$row["nadpis"])."\"><img src=\"casti/desing/no.bmp\" width=\"15\" height=\"15\" border=\"1\"></a>";


echo("<br/><br/><div align=\"left\"><div id=\"menu3\"><span class=\"submenu\">".$row["nadpis"]." (napíše ".$meno." do ".$row["to"]." ".(zcas($row["cas"])).") $smaz</span></div></div>".$row["text"]."<br/><br/>");
}

//mysql_free_result($odpoved);


?>