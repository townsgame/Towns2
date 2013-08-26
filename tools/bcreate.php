<?php
/*
INSERT INTO `towns2_uni` ( `meno` , `popis` , `casovac2` , `obrazok` , `skupina` , `akce` , `drevo` , `kamen` , `jedlo` , `zivot` , `utok` , `vutok` , `ludia` , `pludia` , `size` , `budovavedla` , `budovap` , `budoval` , `typ` ) 
VALUES (
'beze jména', '', '0', '', '', 'postavit budovu', '0', '0', NULL , '10', '0', '1', '1', '0', '1', '0', '', '', '1'
);
*/
if($_SESSION["id"]!=1){
die();
}
echo("<form method=\"POST\">");
?>
<table width="351" height="202" border="0">
  <tr>
    <th width="148" align="left">Jmeno:</th>
    <td width="193"><label>
      <input name="meno" type="text" id="meno">
    </label></td>
  </tr>
  <tr>
    <th align="left">Popis:</th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th colspan="2" align="left"><textarea name="popis" cols="50" rows="5" id="popis"></textarea></th>
  </tr>
  <tr>
    <th align="left">Zivot:</th>
    <td><input name="zivot" type="text" id="zivot"></td>
  </tr>
  <tr>
    <th align="left">Utok:</th>
    <td><input name="utok" type="text" id="utok"></td>
  </tr>
  <tr>
    <th align="left">Vzdalenost:</th>
    <td><input name="vutok" type="text" id="vutok"></td>
  </tr>
  <tr>
    <th align="left">Populace:</th>
    <td><input name="lidia" type="text" id="lidia"></td>
  </tr>
  <tr>
    <th align="left">Mesto v domech:</th>
    <td><input name="pludia" type="text" id="pludia"></td>
  </tr>
  <tr>
    <th align="left">Typ:</th>
    <td><label>
      <select name="typ" id="typ">
        <option value="1">infrastruktura</option>
        <option value="2">surovinov&eacute;</option>
        <option value="3">obyvatel&eacute;</option>
        <option value="4">vojensk&eacute;</option>
        <option value="5">obrana</option>
      </select>
    </label></td>
  </tr>
  <tr>
    <th align="left">Obrazek: </th>
    <td><select name="select" id="select">
      <option value="1">infrastruktura</option>
      <option value="2">surovinov&eacute;</option>
      <option value="3">obyvatel&eacute;</option>
      <option value="4">vojensk&eacute;</option>
      <option value="5">obrana</option>
    </select></td>
  </tr>
</table>
<?php
echo("<br/><b>xxx</b>: <input type=\"submit\" name=\"Submit\" value=\"OK\" /></form>");
?>