<?php eval(file_get_contents("casti/jazyk/cz.txt")); ?>
<?php
if($_MYGET["poznie"]){
mysql_query("DELETE from towns2_poz WHERE hrac=".$_MYGET["poznie"]." AND ali=".$_SESSION["ali"]);
dc("towns2_poz");
}
//--------------------------------------------------------------
if($_POST["zadanyhrac"]){
if(vyberhraca()){
if(!hnet("towns2_uziv","SELECT 1 from towns2_uziv WHERE ppp AND id = ".vyberhraca()." AND ali = ".$_SESSION["ali"])){

mysql_query("INSERT INTO `towns2_poz` ( `ali` , `hrac` ) VALUES (".$_SESSION["ali"]." ,".vyberhraca().")");
dc("towns2_poz");
}else{
chyba1($xtentohrac);
}
}else{
chyba1($xneexsist );
}
}
?><br/>
<table width="119" border="0">
  <tr>
    <td width="84"></td>
    <td width="25"></td>
  </tr>
<?php
foreach(hnet2("towns2_poz","SELECT hrac from towns2_poz WHERE ppp AND ali = ".$_SESSION["ali"]) as $row){
//$odpoved =mysql_query("select hrac from towns2_poz where ali = ".$_SESSION["ali"]);
//while ($row = mysql_fetch_array($odpoved)) {
$profil = profil($row["hrac"]);
echo("
  <tr>
    <td height=\"21\">$profil</td>
    <td><a href=\"".gv("?submenu=5&amp;poznie=".$row["hrac"]."")."\"><img src=\"casti/desing/no.bmp\" width=\"20\" height=\"20\" /></a></td>
  </tr>
");
}
//mysql_free_result($odpoved);
?>
</table><br/>
<form action="<?php gv("?submenu=5"); ?>" method="post"><?php zadajhraca(); ?><input type="submit" value="OK"></form>