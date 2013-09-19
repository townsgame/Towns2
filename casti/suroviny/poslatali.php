<?php
if($_POST["ano"]){
$tmp=vyberali();
if($tmp){
surovinanew($_SESSION["id"],"prachy","-",vybersurku("prachy"));
surovinanew($_SESSION["id"],"jedlo","-",vybersurku("jedlo"));
surovinanew($_SESSION["id"],"kamen","-",vybersurku("kamen"));
surovinanew($_SESSION["id"],"zelezo","-",vybersurku("zelezo"));
surovinanew($_SESSION["id"],"drevo","-",vybersurku("drevo"));
mysql_query("UPDATE towns2_ali SET prachy=prachy+".vybersurku("prachy").",jedlo=jedlo+".vybersurku("jedlo").",kamen=kamen+".vybersurku("kamen").",zelezo=zelezo+".vybersurku("zelezo").",drevo=drevo+".vybersurku("drevo")." WHERE id=".vyberali());
mysql_query("INSERT INTO towns2_alipris ( `hrac` , `ali` ) VALUES (".$_SESSION["id"].",".vyberali().")");
mysql_query("UPDATE towns2_alipris SET prachy=prachy+".vybersurku("prachy").",jedlo=jedlo+".vybersurku("jedlo").",kamen=kamen+".vybersurku("kamen").",zelezo=zelezo+".vybersurku("zelezo").",drevo=drevo+".vybersurku("drevo")." WHERE ali=".vyberali());
dc("towns2_mes");
dc("towns2_ali");
dc("towns2_alipris");
chyba2($GLOBALS["sposlata1"]);
}else{
chyba1($GLOBALS["sposlata2"]);
}
}

?>
<form name="formular" method="POST">
<input type="hidden" name="ano" value="1">
<table border="0">
<tr>
<td><?php zadajali("dífult","</td><td>"); ?></td>
</tr>
<tr>
<td><?php zadajsurku("prachy","dífult","</td><td>"); ?></td>
</tr>
<tr>
<td><?php zadajsurku("jedlo","dífult","</td><td>"); ?></td>
</tr>
<tr>
<td><?php zadajsurku("kamen","dífult","</td><td>"); ?></td>
</tr>
<tr>
<td><?php zadajsurku("zelezo","dífult","</td><td>"); ?></td>
</tr>
<tr>
<td><?php zadajsurku("drevo","dífult","</td><td>"); ?></td>
</tr>
</table>
<button name="OK" value="OK" type="submit"><?php echo $GLOBALS["sposlat1"]; ?></button>
</form>