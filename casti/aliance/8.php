<?php
echo("<h1>" . $GLOBALS["afourth1a"] . "</h1>(" . $GLOBALS["afourth2"] . ")");
//-----------------------------
if($_POST["ano"]){
$prachy = vybersurku("prachy",999999);
$jedlo = vybersurku("jedlo",999999);
$kamen = vybersurku("kamen",999999);
$zelezo = vybersurku("zelezo",999999);
$drevo = vybersurku("drevo",999999);
mysql_query("UPDATE towns2_ali SET prachydane=".$prachy.", jedlodane=".$jedlo.", kamendane=".$kamen.", zelezodane=".$zelezo.", drevodane=".$drevo." WHERE id=".$_SESSION["ali"]);
dc("towns2_ali");
chyba2($GLOBALS["aeighth1"]);
}
//-----------------------------
$tmp = hnet2("towns2_ali","SELECT prachydane,jedlodane,kamendane,zelezodane,drevodane FROM towns2_ali WHERE ppp AND id = ".$_SESSION["ali"]);
$tmp = $tmp[0];
$prachy = $tmp[0];
$jedlo = $tmp[1];
$kamen = $tmp[2];
$zelezo = $tmp[3];
$drevo = $tmp[4];
?>
<form name="formular" method="POST" action="<?php echo gv("?submenu=8"); ?>">
<input type="hidden" name="ano" value="1">
<table border="0">
<tr>
<td><?php zadajsurku("prachy",999999,"</td><td>",$prachy); ?></td>
</tr>
<tr>
<td><?php zadajsurku("jedlo",999999,"</td><td>",$jedlo); ?></td>
</tr>
<tr>
<td><?php zadajsurku("kamen",999999,"</td><td>",$kamen); ?></td>
</tr>
<tr>
<td><?php zadajsurku("zelezo",999999,"</td><td>",$zelezo); ?></td>
</tr>
<tr>
<td><?php zadajsurku("drevo",999999,"</td><td>",$drevo); ?></td>
</tr>
</table>
<button name="OK" value="OK" type="submit"><?php echo $GLOBALS["sbanka11"]; ?></button>
</form>
<?php
//-----------------------------------------------
echo("<h1>" . $GLOBALS["sindex2"] . "</h1>");
$tmp = hnet2("towns2_ali","SELECT prachy,jedlo,kamen,zelezo,drevo FROM towns2_ali WHERE ppp AND id = ".$_SESSION["ali"]);
$tmp = $tmp[0];
$prachy = $tmp[0];
$jedlo = $tmp[1];
$kamen = $tmp[2];
$zelezo = $tmp[3];
$drevo = $tmp[4];

if($_POST["ano2"]){
$tmp=vyberhraca();
if($tmp){
surovinanew($tmp,"prachy","+",vybersurku("prachy",$prachy));
surovinanew($tmp,"jedlo","+",vybersurku("jedlo",$jedlo));
surovinanew($tmp,"kamen","+",vybersurku("kamen",$kamen));
surovinanew($tmp,"zelezo","+",vybersurku("zelezo",$zelezo));
surovinanew($tmp,"drevo","+",vybersurku("drevo",$drevo));
mysql_query("UPDATE towns2_ali SET prachy=prachy-".vybersurku("prachy",$prachy).",jedlo=jedlo-".vybersurku("jedlo",$jedlo).",kamen=kamen-".vybersurku("kamen",$kamen).",zelezo=zelezo-".vybersurku("zelezo",$zelezo).",drevo=drevo-".vybersurku("drevo",$drevo)." WHERE id=".$_SESSION["ali"]);
mysql_query("INSERT INTO towns2_alipris ( `hrac` , `ali` ) VALUES (".$tmp.",".$_SESSION["ali"].")");
mysql_query("UPDATE towns2_alipris SET prachy=prachy-".vybersurku("prachy",$prachy).",jedlo=jedlo-".vybersurku("jedlo",$jedlo).",kamen=kamen-".vybersurku("kamen",$kamen).",zelezo=zelezo-".vybersurku("zelezo",$zelezo).",drevo=drevo-".vybersurku("drevo",$drevo)." WHERE ali=".$_SESSION["ali"]);
dc("towns2_mes");
dc("towns2_ali");
dc("towns2_alipris");
chyba2($GLOBALS["sposlata1"]);
}else{
chyba1($GLOBALS["aeighth2"]);
}
}

?>
<form name="formular" method="POST" action="<?php echo gv("?submenu=8"); ?>">
<input type="hidden" name="ano2" value="1">
<table border="0">
<tr>
<td><?php zadajhraca("1","</td><td>"); ?></td>
</tr>
<tr>
<td><?php zadajsurku("prachy",$prachy,"</td><td>"); ?></td>
</tr>
<tr>
<td><?php zadajsurku("jedlo",$jedlo,"</td><td>"); ?></td>
</tr>
<tr>
<td><?php zadajsurku("kamen",$kamen,"</td><td>"); ?></td>
</tr>
<tr>
<td><?php zadajsurku("zelezo",$zelezo,"</td><td>"); ?></td>
</tr>
<tr>
<td><?php zadajsurku("drevo",$drevo,"</td><td>"); ?></td>
</tr>
</table>
<button name="OK" value="OK" type="submit"><?php echo $GLOBALS["sposlat1"]; ?></button>
</form>