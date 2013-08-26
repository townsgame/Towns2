<br/>
<style type="text/css">
<!--
.online {color: #000000}
.xchotina {color: #004400}
.xten {color: #008800}
.xdyten {color: #00cc00}
.xoffline {color: #00ff00}
-->
</style>
<div align="center"><table width="570" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <th bgcolor="#CCCCCC" scope="col" width="1"></th>
    <th bgcolor="#CCCCCC" scope="col">jméno</th>
    <th bgcolor="#CCCCCC" scope="col">hráči</th>
    <th bgcolor="#CCCCCC" scope="col">daně(dohromady)</th>
    <th bgcolor="#CCCCCC" scope="col">body</th>
  </tr>
  <?php
if(!$_SESSION["statuziv_a"]){
$odpoved =mysql_query("select poradie from towns2_uziv WHERE id='".$_SESSION["id"]."'");
while ($row = mysql_fetch_array($odpoved)) {
$_SESSION["statuziv_a"] = $row[0]-10;
}
mysql_free_result($odpoved);
}
 
  
  
if($_MYGET["statuziv_a"]){
$_SESSION["statuziv_a"] = $_MYGET["statuziv_a"];
}
if($_SESSION["statuziv_a"] < 2){
$_SESSION["statuziv_a"] = 1;
}
$statuziv_a = $_SESSION["statuziv_a"];

//$spesl="(SELECT meno FROM towns2_mes WHERE id = (SELECT towns2_mesuziv.mesto FROM towns2_mesuziv WHERE towns2_mesuziv.uzivatel = towns2_uziv.id LIMIT 1 ))";
//$odpoved =mysql_query("select id,meno,poradie,ali,body,typ,farba from towns2_uziv WHERE poradie!= 0 order by poradie LIMIT ".($statuziv-1).",20");
//echo(mysql_error());
//while ($row = mysql_fetch_array($odpoved)) {

$dotaz = ("SELECT (SELECT COUNT(id) from towns2_uziv WHERE ali=towns2_ali.id),(prachydane+jedlodane+kamendane+zelezodane+drevodane),id,meno,poradie,body FROM towns2_ali WHERE ppp AND poradie!= 0 order by poradie");
foreach(hnet2("towns2_ali",$dotaz,($statuziv_a-1).",20") as $row){

if($_SESSION["id"]==$row["id"]){
$bg = "CCCCCC";
}else{
$bg = "FFFFFF";
}

//poradie
//jméno
//hraci
//daně(dohromady)
//body

echo("<tr>
    <td bgcolor=\"#$bg\" scope=\"col\">".$row["poradie"]."</td>
    <td bgcolor=\"#$bg\" scope=\"col\">".(profila($row["id"]))."</td>
    <td bgcolor=\"#$bg\" scope=\"col\">".$row[0]."</td>
    <td bgcolor=\"#$bg\" scope=\"col\">".(zformatovat($row[1]))."</td>
    <td bgcolor=\"#$bg\" scope=\"col\">".(zformatovat($row["body"]))."</td>  
  </tr>");

}
?>
</table>
<?php
$max = hnet("towns2_ali","SELECT COUNT(id) FROM towns2_ali WHERE ppp AND poradie!= 0");

if(($statuziv_a-20) < 0){}else{ $prve = "<a href=\"".gv("?submenu=2&amp;statuziv_a=".($statuziv_a-20)."")."\">&lt;&lt;</a>"; }
if(($statuziv_a+20) > $max){}else{ $druhe = "<a href=\"".gv("?submenu=2&amp;statuziv_a=".($statuziv_a+20)."")."\">&gt;&gt;</a>"; }

echo($prve."--".$druhe);
?></div>