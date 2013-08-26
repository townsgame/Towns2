<table width="611" border="1" cellpadding="0" cellspacing="0">
  <tr>
      <th width="10" bgcolor="#CCCCCC" scope="col"></th>
    <th width="139" bgcolor="#CCCCCC" scope="col"><?php echo $xjmeno; ?></th>
    <th width="112" bgcolor="#CCCCCC" scope="col"><?php echo $xbody; ?></th>
    <th width="112" bgcolor="#CCCCCC" scope="col"><?php echo $xpobka; ?></th>
    <th width="112" bgcolor="#CCCCCC" scope="col"><?php echo $xmapicka; ?></th>
    <th width="112" bgcolor="#CCCCCC" scope="col"><?php echo $xakcie; ?></th>
  </tr>
  <?php
 if($_MYGET["statuziv"]){
$_SESSION["statuziv"] = $_MYGET["statuziv"];
}
if($_SESSION["statuziv"] < 2){
$_SESSION["statuziv"] = 1;
}
$statuziv = $_SESSION["statuziv"];
if(!$statuziv){
$odpoved =mysql_query("select poradie from towns2_mes WHERE id='".$_SESSION["id"]."'");
while ($row = mysql_fetch_array($odpoved)) {
$statuziv = $row["poradie"];
}
mysql_free_result($odpoved);
}
  
  
$odpoved =mysql_query("select id,meno,poradie,body,ludia,ludiamax,hlbudovaxc,hlbudovayc from towns2_mes WHERE poradie!= 0 order by poradie LIMIT ".($statuziv-1).",20");
while ($row = mysql_fetch_array($odpoved)) {
if($_SESSION["id"]==$row["id"]){
$bg = "EEEEEE";
}else{
$bg = "FFFFFF";
}
echo("
  <tr>
      <th bgcolor=\"#$bg\" scope=\"col\">".$row["poradie"]."</th>
    <th bgcolor=\"#$bg\" scope=\"col\"><a href=\"".gv("?dir=casti/hraci/profilm.php&amp;id=".$row["id"]."\">".$row["meno"]."")."</a></th>
      <th bgcolor=\"#$bg\" scope=\"col\">".$row["body"]."</th>
    <th bgcolor=\"#$bg\" scope=\"col\">".$row["ludia"]." / ".$row["ludiamax"]."</th>
    <th bgcolor=\"#$bg\" scope=\"col\">".(pxy($row["hlbudovaxc"],$row["hlbudovayc"]))."</th>
    <th bgcolor=\"#$bg\" scope=\"col\"></th>
  </tr>
");

}
mysql_free_result($odpoved);
?>
</table>
<?php
echo("<a href=\"".gv("?statuziv=".($statuziv-20)."")."\">&lt;&lt;</a>--<a href=\"".gv("?statuziv=".($statuziv+20)."")."\">&gt;&gt;</a>");
?>