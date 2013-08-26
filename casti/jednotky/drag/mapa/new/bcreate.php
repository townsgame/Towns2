<?php
if($_POST["ano"]){
$temp=hnet("towns2_uni","SELECT 1 FROM towns2_uni WHERE meno = '".$_POST["meno"]."'");
if(!$_POST["meno"]){
chyba1("Musíte zadat jméno.");
}elseif(is_numeric($_POST["meno"])){
chyba1("Název budovy nesmí být pouze číslo.");
}elseif(strtolower($_POST["meno"])!=$_POST["meno"]){
chyba1("Název budovy nesmí obsahovat velká písmena.");
}elseif(!$_POST["popis"]){
chyba1("Musíte zadat popis.");
}elseif(!$_POST["zivot"] or $_POST["zivot"]==0){
chyba1("Život musí být vetší než 0.");
}elseif($_POST["utok"] and (!$_POST["vutok"] or $_POST["vutok"]==0)){
chyba1("Vzdálenost musí být vetší než 0 pokud je útok vetší než 0.");
}elseif($_POST["zivot"]<0){
chyba1("Život nesmí být záporný.");
}elseif($_POST["utok"]<0){
chyba1("Útok nesmí být záporný.");
}elseif($_POST["vutok"]<0){
chyba1("Vzdálenost nesmí být záporná.");
}elseif($_POST["ludia"]<0){
chyba1("Populace nesmí být záporná.");
}elseif($_POST["pludia"]<0){
chyba1("Místo v domech nesmí být záporný.");
}elseif($_POST["ap"]<0){
chyba1("Autorský poplatek nesmí být záporný.");
}elseif($temp){
chyba1("Budova se stejným názvem už existuje.");
}else{
//----------------------------------
$xt1=hnet("towns2_upload","SELECT mime_type FROM towns2_upload WHERE meno='".$_POST["t1"]."' AND hrac='".$_SESSION["id"]."'");
if($_POST["t2t"]){ $xt2=hnet("towns2_upload","SELECT mime_type FROM towns2_upload WHERE meno='".$_POST["t2"]."' AND hrac='".$_SESSION["id"]."'"); }
if($_POST["t3t"]){ $xt3=hnet("towns2_upload","SELECT mime_type FROM towns2_upload WHERE meno='".$_POST["t3"]."' AND hrac='".$_SESSION["id"]."'"); }
if($_POST["t4t"]){ $xt4=hnet("towns2_upload","SELECT mime_type FROM towns2_upload WHERE meno='".$_POST["t4"]."' AND hrac='".$_SESSION["id"]."'"); }
if($_POST["t5t"]){ $xt5=hnet("towns2_upload","SELECT mime_type FROM towns2_upload WHERE meno='".$_POST["t5"]."' AND hrac='".$_SESSION["id"]."'"); }
if($_POST["stavbat"]){ $xstavba=hnet("towns2_upload","SELECT mime_type FROM towns2_upload WHERE meno='".$_POST["stavba"]."' AND hrac='".$_SESSION["id"]."'"); }


if($_POST["io"]==2 and !$_POST["t1"]){
chyba1("Musíte zadat obrázek 1.");
}elseif($_POST["io"]==2 and !$_POST["stavba"] and $_POST["stavbat"]){
chyba1("Musíte zadat obrázek stavba pokud, jste ho označil.");
}elseif($_POST["io"]==2 and !$_POST["t2"] and $_POST["t2t"]){
chyba1("Musíte zadat obrázek 2 pokud, jste ho označil.");
}elseif($_POST["io"]==2 and !$_POST["t3"] and $_POST["t3t"]){
chyba1("Musíte zadat obrázek 3 pokud, jste ho označil.");
}elseif($_POST["io"]==2 and !$_POST["t4"] and $_POST["t4t"]){
chyba1("Musíte zadat obrázek 4 pokud, jste ho označil.");
}elseif($_POST["io"]==2 and !$_POST["t5"] and $_POST["t5t"]){
chyba1("Musíte zadat obrázek 5 pokud, jste ho označil.");
}elseif($_POST["io"]==2 and !$xt1){
chyba1("Obrázek 1 není váš soubor na http://u.towns.cz/.");
}elseif($_POST["io"]==2 and !$xt2 AND $_POST["t2t"]){
chyba1("Obrázek 2 není váš soubor na http://u.towns.cz/.");
}elseif($_POST["io"]==2 and !$xt3 AND $_POST["t3t"]){
chyba1("Obrázek 3 není váš soubor na http://u.towns.cz/.");
}elseif($_POST["io"]==2 and !$xt4 AND $_POST["t4t"]){
chyba1("Obrázek 4 není váš soubor na http://u.towns.cz/.");
}elseif($_POST["io"]==2 and !$xt5 AND $_POST["t5t"]){
chyba1("Obrázek 5 není váš soubor na http://u.towns.cz/.");
}elseif($_POST["io"]==2 and !$xstavba AND $_POST["stavbat"]){
chyba1("Obrázek stavba není váš soubor na http://u.towns.cz/.");
}elseif($_POST["io"]==2 and !strstr($xt1,"image")){
chyba1("Obrázek 1 není soubor PNG nebo GIF");
}elseif($_POST["io"]==2 and !strstr($xt2,"image") and $xt2){
chyba1("Obrázek 2 není soubor PNG nebo GIF");
}elseif($_POST["io"]==2 and !strstr($xt3,"image") and $xt3){
chyba1("Obrázek 3 není soubor PNG nebo GIF");
}elseif($_POST["io"]==2 and !strstr($xt4,"image") and $xt4){
chyba1("Obrázek 4 není soubor PNG nebo GIF");
}elseif($_POST["io"]==2 and !strstr($xt5,"image") and $xt5){
chyba1("Obrázek 5 není soubor PNG nebo GIF");
}elseif($_POST["io"]==2 and !strstr($xstavba,"image") and $xstavba){
chyba1("Obrázek stavba není soubor PNG nebo GIF");
}else{
//----------------------------------
foreach(str_split("abcdefghijklmnopqrstuvwxyz") as $a){
foreach(str_split("abcdefghijklmnopqrstuvwxyz") as $b){
$k=$a.$b;
$ne=0;
foreach(hnet2("towns2_uni","SELECT obrazok FROM towns2_uni") as $k2){
if(substr($k2["obrazok"],0,2)==$k){ $ne=1; }
}
if($ne==0){
$mm=$_POST["meno"];
$mm=str_ireplace(
str_split("ěščřžýáíéúů"),
str_split("escrzyaieuu"),
$mm);
$k=$k.$mm;
break;
}
}
}
//----------------------------------
$drevo=(( $_POST["zivot"] / 5 ) + $_POST["ludia"]+ ( 2 * $_POST["pludia"] ) + ( $_POST["ap"] / 10 ));
$kamen=( $_POST["utok"] * 5 * $_POST["vutok"] );
$casovac=(( $drevo+( $kamen * 1.5 )) *10 );
$budovap = intval(($drevo+$kamen)/100);
/*
Dřevo=(( Život / 5 ) + Populace+ ( 2 * Místo v domech ) + ( Autorský poplatek / 10 ))
Kámen=( Útok * 5 * Vzdálenost ) 
Čas=(( Dřevo+( Kámen * 1.5 )) *10 )
Pokud je kámen+Dřevo: 
100 je potřeba mít hl. budovu na lvl. 1
200 je potřeba mít hl. budovu na lvl. 2 ...
*/
//drevo kamen budovap casovac
mkdir("../casti/jednotky/drag/mapa/".$k);
if($_POST["io"]==1){
file_put_contents("../casti/jednotky/drag/mapa/".$k."/.htaccess",
"Redirect permanent /1.gif http://2.towns.cz/casti/jednotky/drag/mapa/".$_POST["inaobr"]."/1.gif
Redirect permanent /2.gif http://2.towns.cz/casti/jednotky/drag/mapa/".$_POST["inaobr"]."/2.gif
Redirect permanent /3.gif http://2.towns.cz/casti/jednotky/drag/mapa/".$_POST["inaobr"]."/3.gif
Redirect permanent /4.gif http://2.towns.cz/casti/jednotky/drag/mapa/".$_POST["inaobr"]."/4.gif
Redirect permanent /5.gif http://2.towns.cz/casti/jednotky/drag/mapa/".$_POST["inaobr"]."/5.gif
Redirect permanent /6.gif http://2.towns.cz/casti/jednotky/drag/mapa/".$_POST["inaobr"]."/6.gif");
}else{
copy("../casti/upload/data/".$_SESSION["id"]."/".md5($_POST["t1"]).".dat","../casti/jednotky/drag/mapa/".$k."/1.gif");
//-----
if($_POST["t2t"]){
copy("../casti/upload/data/".$_SESSION["id"]."/".md5($_POST["t2"]).".dat","../casti/jednotky/drag/mapa/".$k."/2.gif");
}else{
copy("../casti/upload/data/".$_SESSION["id"]."/".md5($_POST["t1"]).".dat","../casti/jednotky/drag/mapa/".$k."/2.gif");
}
//-----
if($_POST["t3t"]){
copy("../casti/upload/data/".$_SESSION["id"]."/".md5($_POST["t3"]).".dat","../casti/jednotky/drag/mapa/".$k."/3.gif");
}else{
copy("../casti/upload/data/".$_SESSION["id"]."/".md5($_POST["t1"]).".dat","../casti/jednotky/drag/mapa/".$k."/3.gif");
}
//-----
if($_POST["t4t"]){
copy("../casti/upload/data/".$_SESSION["id"]."/".md5($_POST["t4"]).".dat","../casti/jednotky/drag/mapa/".$k."/4.gif");
}else{
copy("../casti/upload/data/".$_SESSION["id"]."/".md5($_POST["t1"]).".dat","../casti/jednotky/drag/mapa/".$k."/4.gif");
}
//-----
if($_POST["t5t"]){
copy("../casti/upload/data/".$_SESSION["id"]."/".md5($_POST["t5"]).".dat","../casti/jednotky/drag/mapa/".$k."/5.gif");
}else{
copy("../casti/upload/data/".$_SESSION["id"]."/".md5($_POST["t1"]).".dat","../casti/jednotky/drag/mapa/".$k."/5.gif");
}
//-----
if($_POST["stavbat"]){
copy("../casti/upload/data/".$_SESSION["id"]."/".md5($_POST["stavba"]).".dat","../casti/jednotky/drag/mapa/".$k."/6.gif");
}else{
copy("../casti/upload/data/".$_SESSION["id"]."/".md5($_POST["t1"]).".dat","../casti/jednotky/drag/mapa/".$k."/6.gif");
}
//-----
}

mysql_query2("INSERT INTO towns2_uni ( `meno` , `popis` , `casovac2` , `obrazok` , `skupina` , `akce` , `drevo` , `kamen` , `jedlo` , `zivot` , `utok` , `vutok` , `ludia` , `pludia` , `size` , `budovavedla` , `budovap` , `budoval` , `typ` , `poutok` , `help` , `ps` , `ap` , `po` , `schvelene`,`autor` ) 
VALUES( '".$_POST["meno"]."' , '".$_POST["popis"]."' , '".$casovac."' , '".$k."' , '' , '1' , '".$drevo."' , '".$kamen."' , '0' , '".$_POST["zivot"]."' , '".$_POST["utok"]."' , '".$_POST["vutok"]."' , '".$_POST["ludia"]."' , '".$_POST["pludia"]."' , '1' , '0' , 'hlbudova' , '".$budovap."' , '".$_POST["typ"]."' , '' , '' , '".$_POST["ps"]."' , '".$_POST["ap"]."' , '".$_POST["po"]."' , '0','".$_SESSION["id"]."' ) ");
dc("towns2_uni");
chyba2("Budova ".$_POST["meno"]." byla přidána na schválení.");
//----------------------------------
}
}
}
?>
<script>
function dis(pole,hodnota,pole2,hodnota2){
if(document.getElementById(pole).value==hodnota){
document.getElementById(pole2).disabled=true;
document.getElementById(pole2).value=hodnota2;
}else{
document.getElementById(pole2).disabled=false;
}
}
</script>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table width="351" height="509" border="0">
  <tr>
    <th colspan="2" align="left"><h2>P&#345;idat budovu 
      <input name="ano" type="hidden" id="ano" value="1" />
    </h2></th>
    </tr>
  <tr>
    <th width="148" align="left">Jm&eacute;no:</th>
    <td width="193"><label>
      <input name="meno" type="text" id="meno" value="<?php echo($_POST["meno"]) ?>" maxlength="20">
    </label></td>
  </tr>
  <tr>
    <th align="left">Popis:</th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th colspan="2" align="left"><textarea name="popis" cols="40" rows="5" id="popis"><?php echo($_POST["popis"]) ?></textarea></th>
  </tr>
  <tr>
    <th align="left">&#381;ivot:</th>
    <td><input name="zivot" type="text" id="zivot" value="<?php echo($_POST["zivot"]) ?>" maxlength="4">
      &gt;0</td>
  </tr>
  <tr>
    <th align="left">&Uacute;tok:</th>
    <td><input name="utok" type="text" id="utok" value="<?php echo($_POST["utok"]) ?>" maxlength="4">
      &gt;-1</td>
  </tr>
  <tr>
    <th align="left">Vzd&aacute;lenost:</th>
    <td><input name="vutok" type="text" id="vutok" value="<?php echo($_POST["vutok"]) ?>" maxlength="4">
      &gt;-1</td>
  </tr>
  <tr>
    <th align="left">Populace:</th>
    <td><input name="ludia" type="text" id="ludia" value="<?php echo($_POST["ludia"]) ?>" maxlength="4">
      &gt;-1</td>
  </tr>
  <tr>
    <th align="left">M&iacute;sto v domech:</th>
    <td><input name="pludia" type="text" id="pludia" value="<?php echo($_POST["pludia"]) ?>" maxlength="4">
      &gt;-1</td>
  </tr>
  <tr>
    <th colspan="2" align="left">Povolit stavbu t&eacute;to budovy: 
      <label>
      <select name="ps" id="ps" onchange="dis('ps','1','ap','0')">
        <option value="1" <?php if($_POST["ps"]==1){echo('selected="selected"');} ?>>pouze v&aacute;m</option>
        <option value="3" <?php if($_POST["ps"]==3){echo('selected="selected"');} ?>>v&scaron;em</option>
      </select>
      </label></th>
    </tr>
  <tr>
    <th align="left">Autorsk&yacute; poplatek: </th>
    <td><input name="ap" type="text" disabled="disabled" id="ap" value="<?php if($_POST["ap"]){ echo($_POST["ap"]); }else{ echo("0"); } ?>" maxlength="4" />
      &gt;-1</td>
  </tr>
  <tr>
    <th align="left">Typ:</th>
    <td><label>
      <select name="typ" id="typ">
        <option value="1" <?php if($_POST["typ"]==1){echo('selected="selected"');} ?>>infrastruktura</option>
        <option value="2" <?php if($_POST["typ"]==2){echo('selected="selected"');} ?>>surovinov&eacute;</option>
        <option value="3" <?php if($_POST["typ"]==3){echo('selected="selected"');} ?>>obyvatel&eacute;</option>
        <option value="4" <?php if($_POST["typ"]==4){echo('selected="selected"');} ?>>vojensk&eacute;</option>
        <option value="5" <?php if($_POST["typ"]==5){echo('selected="selected"');} ?>>obrana</option>
      </select>
    </label></td>
  </tr>
  <tr>
    <td colspan="2" align="left"><p><strong>D&#345;evo=</strong>(( &#381;ivot / 5 ) + Populace+ ( 2 * M&iacute;sto v domech ) + ( Autorsk&yacute; poplatek / 10 ))<br />
        <strong>K&aacute;men=</strong>( &Uacute;tok * 5 *  Vzd&aacute;lenost ) <br />
        <strong>&#268;as=</strong>(( D&#345;evo+( K&aacute;men * 1.5 )) *10 )<br />
        <strong>Pokud je k&aacute;men+D&#345;evo: <br />
        </strong>100 je pot&#345;eba m&iacute;t hl. budovu na lvl. 1<br />
    200 je pot&#345;eba m&iacute;t hl. budovu na lvl. 2 ...<br />
        <br />
    </p>
      </td>
  </tr>
  <tr>
    <th colspan="2" align="left"><h2>Obr&aacute;zek</h2></th>
  </tr>
  <tr>
    <th colspan="2" align="left"><label>
      <input name="po" type="checkbox" id="po" value="checkbox"  <?php if($_POST["po"]){ echo('checked="checked"'); } ?> />
    </label>
      Povolit ostatn&iacute;m u&#382;ivatel&#367;m pou&#382;&iacute;vat va&scaron;e obr&aacute;zky budov.</th>
  </tr>
  <tr>
    <th colspan="2" align="left">
	<input name="io" type="radio" value="1" <?php if($_POST["io"]!=2){ echo('checked="checked"'); } ?>/>
Pou&#382;&iacute;t obr&aacute;zek jin&eacute; budovy: 
<select name="inaobr" id="inaobr">
<?php
foreach(hnet2("towns2_uni","SELECT obrazok,meno FROM towns2_uni WHERE po=1") as $row){
echo("<option value=\"".$row["obrazok"]."\""); 
if($_POST["inaobr"]==$row["obrazok"]){echo('selected="selected"');}
echo(">".$row["meno"]."</option>"); 
}
/*
  <option value="1" <?php if($_POST["inaobr"]==1){echo('selected="selected"');} ?>>infrastruktura</option>
  <option value="2" <?php if($_POST["inaobr"]==2){echo('selected="selected"');} ?>>surovinov&eacute;</option>
  <option value="3" <?php if($_POST["inaobr"]==3){echo('selected="selected"');} ?>>obyvatel&eacute;</option>
  <option value="4" <?php if($_POST["inaobr"]==4){echo('selected="selected"');} ?>>vojensk&eacute;</option>
  <option value="5" <?php if($_POST["inaobr"]==5){echo('selected="selected"');} ?>>obrana</option>
*/
?>
</select></th>
    </tr>
  <tr>
    <th align="left"><input name="io" type="radio" value="2" <?php if($_POST["io"]==2){ echo('checked="checked"'); } ?> />
      Nahr&aacute;t obr&aacute;zek: </th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th align="left"><label>
      <input name="hovno" type="checkbox" disabled="disabled" id="hovno" value="checkbox" checked="checked" />
    </label>
      Typ 1:</th>
    <th align="left"><input name="t1" type="text" id="t1" value="<?php echo($_POST["t1"]) ?>" /></th>
  </tr>
  <tr>
    <th align="left"><input name="t2t" type="checkbox" id="t2t" value="checkbox" <?php if($_POST["t2t"]){ echo('checked="checked"'); } ?> />
      Typ 2:</th>
    <th align="left"><input name="t2" type="text" id="t2" value="<?php echo($_POST["t2"]) ?>" /></th>
  </tr>
  <tr>
    <th align="left"><input name="t3t" type="checkbox" id="t3t" value="checkbox" <?php if($_POST["t3t"]){ echo('checked="checked"'); } ?> />
      Typ 3:</th>
    <th align="left"><input name="t3" type="text" id="t3" value="<?php echo($_POST["t3"]) ?>" /></th>
  </tr>
  <tr>
    <th align="left"><input name="t4t" type="checkbox" id="t4t" value="checkbox" <?php if($_POST["t4t"]){ echo('checked="checked"'); } ?> />
      Typ 4:</th>
    <th align="left"><input name="t4" type="text" id="t4" value="<?php echo($_POST["t4"]) ?>" /></th>
  </tr>
  <tr>
    <th align="left"> <input name="t5t" type="checkbox" id="t5t" value="checkbox" <?php if($_POST["t5t"]){ echo('checked="checked"'); } ?> />
      Typ 5:</th>
    <th align="left"><input name="t5" type="text" id="t5" value="<?php echo($_POST["t5"]) ?>" /></th>
  </tr>
  <tr>
    <th height="21" align="left"><label>
      <input name="stavbat" type="checkbox" id="stavbat" value="checkbox" <?php if($_POST["stavbat"]){ echo('checked="checked"'); } ?> />
      Stavba: </label></th>
    <th align="left"><input name="stavba" type="text" id="stavba" value="<?php echo($_POST["stavba"]) ?>" /></th>
  </tr>
  <tr>
    <td height="21" colspan="2" align="left"><label>Obr&aacute;zky nahrajte na <a href="http://u.towns.cz/"  target="_blank">http://u.towns.cz/</a> a zadejte jm&eacute;na soubor&#367;. Obr&aacute;zky mus&iacute; b&yacute;t pr&#367;hledn&eacute; GIF nebo PNG a v pom&#283;ru 2:3 .</label></td>
  </tr>
  <tr>
    <td height="21" colspan="2" align="left"><input type="submit" name="Submit" value="P&#345;idat na schv&aacute;len&iacute;" /></td>
  </tr>
</table>
<label></label>
</form>