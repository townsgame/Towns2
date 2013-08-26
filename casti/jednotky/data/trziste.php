<?php
die();
if($_POST["mesto"]){
$odpoved = mysql_query("select id from townsmes WHERE meno='".$_POST["mesto"]."'");
while ($row = mysql_fetch_array($odpoved)) {	 	 	 
 	$idmesta = $row["id"];
}
//echo $idmesta;

if($idmesta != 1){
if(zsur("prachy",$_POST["prachy"]) and zsur("jedlo",$_POST["jedlo"]) and zsur("kamen",$_POST["kamen"]) and zsur("zelezo",$_POST["zelezo"]) and zsur("drevo",$_POST["drevo"])){


surovina("prachy","-",$_POST["prachy"]);
surovina("jedlo","-",$_POST["jedlo"]);
surovina("kamen","-",$_POST["kamen"]);
surovina("zelezo","-",$_POST["zelezo"]);
surovina("drevo","-",$_POST["drevo"]);

surovinames($idmesta, "prachy","+",$_POST["prachy"]);
surovinames($idmesta, "jedlo","+",$_POST["jedlo"]);
surovinames($idmesta, "kamen","+",$_POST["kamen"]);
surovinames($idmesta, "zelezo","+",$_POST["zelezo"]);
surovinames($idmesta, "drevo","+",$_POST["drevo"]);

$odmesta = profilmx($_SESSION["mestoid"]);
$domesta = profilmx($idmesta);
zpravames($idmesta,"$odmesta zásobil $domesta","$odmesta zásobil $domesta<hr/>".$_POST["prachy"]." peněz<br/>".$_POST["jedlo"]." jídla<br/>".$_POST["kamen"]." kamene<br/>".$_POST["zelezo"]." železa<br/>".$_POST["drevo"]." dřeva");
chyba2("odesláno");
}else{
chyba1("nedostatek surovin");
}
}else{
chyba1("neexistující město");

}
}

?>
<?php echo $xnatrzisti; ?><br />
<strong><?php echo $xposlatsuroviny; ?>:</strong><br />
<br />  
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="229" height="186" border="0">
    <tr>
      <td align="left"><?php echo $xmesto; ?>:      </td>
      <td align="left"><input name="mesto" type="text" id="mesto" size="25" maxlength="20" /></td>
    </tr>
    <tr>
      <td width="64"><?php echo $xpenize; ?>: </td>
      <td width="155"><input name="prachy" type="text" id="prachy" value="0" size="6" /></td>
    </tr>
    <tr>
      <td><?php echo $xjidlo; ?>: </td>
      <td><input name="jedlo" type="text" id="jedlo" value="0" size="6" /></td>
    </tr>
    <tr>
      <td><?php echo $xkamen; ?>: </td>
      <td><input name="kamen" type="text" id="kamen" value="0" size="6" /></td>
    </tr>
    <tr>
      <td><?php echo $xzelezo; ?>: </td>
      <td><input name="zelezo" type="text" id="zelezo" value="0" size="6" /></td>
    </tr>
    <tr>
      <td><?php echo $xdrevo; ?>: </td>
      <td><input name="drevo" type="text" id="drevo" value="0" size="6" /></td>
    </tr>
    <tr>
      <td colspan="2"><label>
        <input type="submit" name="Submit" value="<?php echo $xposlat; ?>" />
      </label></td>
    </tr>
  </table>
</form>
