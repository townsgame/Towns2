<?php
if(!function_exists("hnet")){
$root = "../";
require("../casti/funkcie/index.php"); 
require("../casti/funkcie/vojak.php");
}

if($_SESSION["id"]!=1){
die();
}

?>
<form action="" method="post">
  <select name="od" id="od">
  <?php
foreach(hnet2("towns2_uziv","SELECT meno,id FROM towns2_uziv WHERE typ = '9' ORDER BY (SELECT count(1) FROM towns2_dis WHERE towns2_dis.meno=towns2_uziv.id) desc") as $row){

echo("<option value=\"".$row["id"]."\">".$row["meno"]."</option>");
} ?>
</select>
<br />
<input name="nadpis" type="text" id="nadpis" />
<br />
<label></label>
<textarea name="text" id="text"></textarea>
<br />
<input type="submit" name="Submit" value="OK" />
</form>
<?php
if($_POST["nadpis"]){
$cas = hnet("towns2_botdis","SELECT max(cas) FROM towns2_botdis");
if(!$cas){ $cas = time(); }
mysql_query("INSERT INTO towns2_botdis (`nadpis`,`text`,`cas`,`od`,`to`) VALUES('".$_POST["nadpis"]."', '".convert($_POST["text"])."', '".($cas+rand(3600,3600*48))."', '".$_POST["od"]."', '".$_POST["nadpis"]."')");
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

$smaz = "<a href=\"".gv("?del_x=".$row["nadpis"])."\">X</a>";


echo("<br/><br/><div align=\"left\"><span class=\"submenu\">".$row["nadpis"]." (napíše ".$meno." do ".$row["to"]." ".(zcas_t($row["cas"]))." za ".(pocitadlo($row["cas"])).") $smaz</span></div>".$row["text"]."<br/><br/>");
}

//mysql_free_result($odpoved);


?>
