<table width="159" border="0" cellpadding="0" cellspacing="0">
<?php
eval(file_get_contents("casti/jazyk/".$_SESSION["lang"].".txt"));
if($_GET["zprava"]){
mysql_query("
DELETE from `townszpr` WHERE id='".$_GET["zprava"]."' and  komu='".$_SESSION["id"]."'");  
}
  
$odpoved =mysql_query("select * from townszpr WHERE komu = '".$_SESSION["id"]."' AND precitane=3 order by cas desc");

if (mysql_num_rows($odpoved)== 0 ) {
echo "<strong>$xnamate2</strong><hr width=\"150\" />";
}

while ($row = mysql_fetch_array($odpoved)) {

$profil = profil($row["od"]);
$predmet = $row["predmet"];
if(!$predmet){
$predmet = "$xzadnypredmet ";
}

echo("
  <tr>
  <th align=\"left\" width=\"136\" scope=\"col\">
    <u><a href=\"?idz=4&amp;zprava=".$row["id"]."\">$predmet</a>...</u><br/>
   $xod $profil<br/>
   ".($row["cas"])."<hr width=\"130\" />
   </th>
    <th valign=\"top\" width=\"20\" scope=\"col\">&nbsp;<a href=\"?id=1&amp;zprava=".$row["id"]."\"><img src=\"casti/desing/no.bmp\" border=\"1\"  width=\"20\" height=\"20\"/></a></th>
  </tr>
");

}
mysql_free_result($odpoved);
?>
</table>
