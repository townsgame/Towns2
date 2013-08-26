<?php
//---------------------
if($_POST["anov"]){
$vysledok = vojakboj(vojakvlozx(),$_POST["zivot"],$_POST["utokna"],$_POST["vzdalenost"]);
//echo($vysledok);
if(is_numeric($vysledok)){
echo "Budově zůstane ".intval($vysledok)." životů.";
echo("<hr/>");
}else{
echo "Budova bude zničena. A z vojska zůstane:";
vojakzobraz($vysledok);
echo("<hr/>");
}
}
?>
<form id="form1" name="form1" method="post" action="<?php echo(gv("?submenu=3")); ?>">

<input name="anov" type="hidden" value="a" checked="checked" />
<?php vojakvloz2(vojakvlozx()); ?>

<table border="0">
<tr><td>Vzdálenost: </td><td><input name="vzdalenost" type="text" value="<?php echo($_POST["vzdalenost"]); ?>" /></td></tr>
<tr><td>Život: </td><td><input name="zivot" type="text" value="<?php echo($_POST["zivot"]); ?>" /></td></tr>
<tr><td>Obrana: </td><td><input name="utokna" type="text" value="<?php echo($_POST["utokna"]); ?>" /></td></tr>
</table>

<input type="submit" name="Submit" value="vyslat" />
<br />
</form>
<?php zobraztbl(1); ?>