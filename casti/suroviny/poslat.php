<?php
if($_POST["ano"]){
$tmp=vyberhraca();

chyba2(poslatsurzc($tmp,vybersurku("prachy"),vybersurku("jedlo"),vybersurku("kamen"),vybersurku("zelezo"),vybersurku("drevo")));
//}
/*
surovina("prachy","-",vybersurku("prachy"));
surovinames($tmp,"prachy","+",vybersurku("prachy"));
surovina("jedlo","-",vybersurku("jedlo"));
surovinames($tmp,"jedlo","+",vybersurku("jedlo"));
surovina("prachy","-",vybersurku("prachy"));
surovinames($tmp,"kamen","+",vybersurku("kamen"));
surovina("kamen","-",vybersurku("kamen"));
surovinames($tmp,"zelezo","+",vybersurku("zelezo"));
surovina("drevo","-",vybersurku("drevo"));
surovinames($tmp,"drevo","+",vybersurku("drevo"));*/


}

?>
<form name="formular" method="POST">
<input type="hidden" name="ano" value="1">
<table border="0">
<tr>
<td><?php zadajhraca(2,"</td><td>"); ?></td>
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
<h1><?php echo $GLOBALS["sviac8"]; ?></h1>
<?php surkyposlane(); ?>