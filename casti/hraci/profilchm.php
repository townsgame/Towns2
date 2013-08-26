<?php
/*
if ($_POST["zheslo"]){

mysql_query("UPDATE `towns2_uziv` SET "
."popis = '".($_POST["popis"])."' , "
."kpopis = '".($_POST["kpopis"])."' , "
."heslo = '".($_POST["zheslo"])."' , "
."mail = '".($_POST["mail"])."' , "
."zmail = '".($_POST["zmail"])."' , "
."www = '".($_POST["www"])."'
 WHERE meno = '".$_SESSION["uzivatel"]."'");

echo "nastavení změněno";
}

$odpoved =mysql_query("select * from towns2_uziv WHERE meno='".$_SESSION["uzivatel"]."'");
while ($row = mysql_fetch_array($odpoved)) {

$popis = $row["popis"];
$kpopis = $row["kpopis"];
$zheslo = $row["heslo"];
$mail = $row["mail"];
$zmail = $row["zmail"];
$www = $row["www"];

}
mysql_free_result($odpoved);
?>
<form id="form1" name="form1" method="post" action="">
  <table width="437" height="385" border="0">
    <tr>
      <td width="242" height="339" align="left" valign="top" scope="col"><a href="?dir=casti/hraci/profil.php&amp;meno=<?php echo($_SESSION["uzivatel"]); ?>">k profilu</a> <br />
        krátký popis(max. 100 znaků):<br />
        <label>
        <input name="kpopis" type="text" id="kpopis" value="<?php echo $kpopis; ?>" maxlength="100" />
        <br />
        váš e-mail:<br />
        <input name="mail" type="text" id="mail" value="<?php echo $mail; ?>" maxlength="100" />
</label>
      <br />
      <br />
      <label>
      zobrazovat váš e-mail jiným uživatelům:
      <input name="zmail" type="checkbox" id="zmail" value="1" <?php if($zmail){echo "checked=\"checked\"";} ?> />
      </label>
      <br />
      vaše www:<br />
      <label>
      <input name="www" type="text" id="www" value="<?php echo $www; ?>" maxlength="100" />
      <br />
      heslo:<br />
      <input name="zheslo" type="text" id="zheslo" value="<?php echo $zheslo; ?>" />
      </label></td>
      <td width="185" colspan="4" rowspan="2" align="left" valign="top" scope="col">popis:<br />
        <label>
        <textarea name="popis" rows="20" id="popis"><?php echo $popis; ?></textarea>
      </label></td>
    </tr>
    
    <tr>
      <td height="26"><label>
        <input type="submit" name="Submit" value="OK" />
      </label></td>
    </tr>
  </table>
</form>
*/ ?>
