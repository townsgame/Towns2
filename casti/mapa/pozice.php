<form  method="post" action="<?php echo(gv("?submenu=2")); ?>">
<?php
$q = 1;
foreach(hnet2("towns2_zal","SELECT meno,xc_d,yc_d FROM towns2_zal WHERE hrac = '".$_SESSION["id"]."' ORDER BY meno") as $row){
if($_MYGET["del"] == $q){
mysql_query("DELETE FROM towns2_zal WHERE meno='".$row["meno"]."'");
dc("towns2_zal");
}
if($_POST["meno$q"]){
mysql_query("UPDATE towns2_zal SET meno = '".$_POST["meno$q"]."' WHERE meno='".$row["meno"]."'");
dc("towns2_zal");
$row["meno"] = $_POST["meno$q"];
}
echo("<input name=\"meno$q\" type=\"text\" id=\"meno$q\" value=".$row["meno"]." />
<a href=\"".gv("?submenu=2&del=$q")."\"><img src=\"casti/desing/no.bmp\" width=\"20\" height=\"20\" /></a>
<a href=\"".gv("?dir=casti/mapa/uniindex.php&amp;glob_sc=1&amp;xc=".((10*($row["xc_d"]-1))+1)."&amp;yc=".((10*($row["yc_d"]-1))+1))."\">" . $GLOBALS["mdrag20"] . "</a>
<br />");
$q = $q+1;
}
?>
<input type="submit" name="Submit" value="<?php echo $GLOBALS["mpos1"]; ?>" />
</form>
<i><?php echo $GLOBALS["mpos2"]; ?></i>