<form action="" method="post">
<table width="475" border="0">
  <tr>
    <th width="114" align="left" valign="top">Nadpis:</th>
    <td colspan="2"><input name="nadpis" type="text" id="nadpis" /></td>
    </tr>
  <tr>
    <th align="left" valign="top">Do fóra: </th>
    <td colspan="2"><input name="to" type="text" id="to" value="<?php echo(hnet("towns2_tem","SELECT tema FROM towns2_tem ORDER by id desc")); ?>" /></td>
    </tr>
  <tr>
    <th height="59" align="left" valign="top">Za:</th>
    <td width="78"><p>Dny:            <br />
      Hodiny:
      <br />
      Minuty:    </p></td>
    <td width="269"><input name="od_d" type="text" id="od_d" value="0" />
      <br />
      <input name="od_h" type="text" id="od_h" value="0" />
      <br />
      <input name="od_m" type="text" id="od_m" value="0" /></td>
    </tr>
  <tr>
    <th height="24" align="left" valign="top">Od:</th>
    <td colspan="2"><select name="od" size="5" id="od">
    	<option value="1">admin</option>
        <?php
foreach(hnet2("towns2_uziv","SELECT meno,id FROM towns2_uziv WHERE typ = '9' ORDER BY (SELECT count(1) FROM towns2_dis WHERE towns2_dis.meno=towns2_uziv.id) desc") as $row){

echo("<option value=\"".$row["id"]."\">".$row["meno"]."</option>");
} ?>
    </select></td>
    </tr>
  <tr>
    <th height="24" align="left" valign="top">Text:</th>
    <td colspan="2"><textarea name="text" cols="50" rows="10" id="text"></textarea></td>
    </tr>
</table>
<br />
<label>
<input type="submit" name="Submit" value="OK" />
</label>
</form>
<?php
if($_POST["nadpis"]){
mysql_query("INSERT INTO towns2_botdis (`nadpis`,`text`,`cas`,`od`,`to`) VALUES('".$_POST["nadpis"]."', '".convert($_POST["text"])."', '".(time()+($_POST["od_d"]*3600*24)+($_POST["od_h"]*3600)+($_POST["od_m"]*60))."', '".$_POST["od"]."', '".$_POST["to"]."')");
echo(mysql_error());
dc("towns2_botdis");
}
//echo($_MYGET["del_x"]);
if($_MYGET["del_x"]){
/*echo*/mysql_query("DELETE FROM towns2_botdis WHERE nadpis = '".$_MYGET["del_x"]."'");
echo(mysql_error());
dc("towns2_botdis");
}
/*
nadpis varchar(20) utf8_bin  Ne ne                
  text text utf8_bin  Ne                 
  cas int(11)   Ne                 
  od int(11)   Ne 0                
  to va 

*/
if($_SESSION["id"] != 1){ exit(); }
foreach(hnet2("towns2_botdis","SELECT * from towns2_botdis order by cas") as $row){
//$odpoved = mysql_query("select * from towns2_dis where tema='".$_SESSION['tema']."' order by id");
//while ($row = mysql_fetch_array($odpoved)) {
$meno = profil($row["od"]);
$smaz = "";

$smaz = "<a href=\"".gv("?del_x=".$row["nadpis"])."\"><img src=\"casti/desing/no.bmp\" width=\"15\" height=\"15\" border=\"1\"></a>";


echo("<br/><br/><div align=\"left\"><div id=\"menu3\"><span class=\"submenu\">".$row["nadpis"]." (napíše ".$meno." do ".$row["to"]." ".(zcas_t($row["cas"]))." za ".(pocitadlo($row["cas"])).") $smaz</span></div></div>".$row["text"]."<br/><br/>");
}

//mysql_free_result($odpoved);


?>
