<style type="text/css">
<!--
.style10 {	color: #FFFF00;
	font-size: 18px;
}
.style11 {
	color: #FFFF00;
	font-size: 16px;
	font-weight: bold;
}
-->
</style>
<?php
//echo $_SESSION["obrazokk"];
if($_POST["menor"] and $_POST["heslor"] and $_POST["mailr"] and $_POST["mestor"]){
if($_POST["kod"] == $_SESSION["obrazokk"]){
if($_POST["heslor"] == $_POST["heslo2r"]){
if($_POST["pravidlar"] == "1"){

/*echo*/$odpoved1 = mysql_query("SELECT id FROM towns2_uziv WHERE meno = '".$_POST["menor"]."'");
$row1 = mysql_fetch_array($odpoved1);
mysql_free_result($odpoved1);
if(!$row1){
//chyba1("chyba registrace");
//die();
//-------------------------------------------------------------------------
eval(file_get_contents("reg.txt"));
//-------------------------------------------------------------------------
$odpoved1 = mysql_query("SELECT MAX(id) maxId FROM towns2_uziv");
$row1 = mysql_fetch_array($odpoved1);
$pocet1=$row1["maxId"];
mysql_free_result($odpoved1);
$pocet = $pocet1+1;
$heslor=crypt($_POST["heslor"],"PH");

mysql_query("
INSERT INTO `towns2_uziv` ( `id` ,`typ` , `meno`, `ali` , `body` , `poradie`, `heslo` , `popis` , `pohlavie` , `vek` , `mail` , `zmail` , `www`, `mestozal`,  `lista`) 
VALUES (
'$pocet',7 , '".$_POST["menor"]."', '0', '0', '0', '$heslor', '', '0', '0', '".$_POST["mailr"]."', '".$_POST["zmailr"]."', '','0','lista(2); lista(4); lista(6); lista(8); lista(3); lista(5); lista(7);'
);
");
echo(mysql_error());

$odpoved1 = mysql_query("SELECT MAX(id) maxId FROM towns2_mes");
$row1 = mysql_fetch_array($odpoved1);
$pocet1=$row1["maxId"];
mysql_free_result($odpoved1);
$pocet2 = $pocet1+1;
mysql_query("
INSERT INTO `towns2_mes` ( `id` , `meno` , `popis`, `body` , `poradie`, `hlbudovaxc` , `hlbudovayc` , `prachy` , `jedlo` , `kamen`, `zelezo` , `drevo`, `ludia`, `ludiamax` ) 
VALUES (
'$pocet2', '".$_POST["mestor"]."', '',  '0', '0','$xcreg', '$ycreg', '5000', '5000', '5000', '5000', '5000','0','0'
);
");




mysql_query("
INSERT INTO `towns2_mesuziv` ( `mesto` , `uzivatel` , `prava`) 
VALUES (
'$pocet2', '$pocet', 'admin'
);
");

mysql_query("UPDATE towns2_ SET zivot=(SELECT zivot from towns2_uni WHERE towns2_uni.obrazok='hlbudova'), cas=1, obrazok = 'hlbudova', vlastnik = '$pocet2' WHERE xc = ".($xcreg+0)." AND  yc = ".($ycreg+0));
mysql_query("UPDATE towns2_ SET zivot=(SELECT zivot from towns2_uni WHERE towns2_uni.obrazok='dom'), cas=1, obrazok = 'dom', vlastnik = '$pocet2' WHERE xc = ".($xcreg+0)." AND  yc = ".($ycreg+1));
mysql_query("UPDATE towns2_ SET zivot=(SELECT zivot from towns2_uni WHERE towns2_uni.obrazok='sklad'), cas=1, obrazok = 'sklad', vlastnik = '$pocet2' WHERE xc = ".($xcreg+1)." AND  yc = ".($ycreg+0));
mysql_query("UPDATE towns2_ SET zivot=(SELECT zivot from towns2_uni WHERE towns2_uni.obrazok='tdrevo'), cas=1, obrazok = 'tdrevo', vlastnik = '$pocet2' WHERE xc = ".($xcreg+1)." AND  yc = ".($ycreg+1));
mysql_query("UPDATE towns2_ SET zivot=(SELECT zivot from towns2_uni WHERE towns2_uni.obrazok='tkamen'), cas=1, obrazok = 'tkamen', vlastnik = '$pocet2' WHERE xc = ".($xcreg+1)." AND  yc = ".($ycreg-1));

$zpravax = $xdopis1.$_POST["menor"].$xdopis2;
$zpravax = nl2br(htmlspecialchars($zpravax));
$odpoved1 = mysql_query("SELECT MAX(id) maxId FROM towns2_zpr");
$row1 = mysql_fetch_array($odpoved1);
$pocetz=$row1["maxId"];
mysql_free_result($odpoved1);
$pocetz = $pocetz+1;
mysql_query("INSERT INTO towns2_zpr VALUES('".$pocetz."','1', '$pocet', '0',CURRENT_TIMESTAMP , 'Vítejte v towns2_', '".$zpravax."')");

alog("new user ".$_POST["menor"],1);
chyba2($xpodekovani);
}else{
chyba1("uživatel již existuje");
}
}else{
chyba1($xmusitesouhlasit);
}
}else{
chyba1($xheslanicht );
}
}else{
chyba1($xkodneopsany);
}
}
?>
<table width="484" height="515" border="0" cellpadding="0" cellspacing="0" bgcolor="#000000">
   <tr>
     <td height="24" align="center" valign="middle"><h3><?php echo $xvitejte; ?></h3>

<a href="http://www.toplist.cz/stat/639792"><script language="JavaScript" type="text/javascript">
<!--
document.write ('<img src="http://toplist.cz/count.asp?id=639792&logo=mc&http='+escape(document.referrer)+'&wi='+escape(window.screen.width)+'&he='+escape(window.screen.height)+'&cd='+escape(window.screen.colorDepth)+'&t='+escape(document.title)+'" width="88" height="60" border=0 alt="TOPlist" />'); 
//--></script><noscript><img src="http://toplist.cz/count.asp?id=639792&logo=mc" border="0"
alt="TOPlist" width="88" height="60" /></noscript></a>

<?php
$stats = new index("towns2_uziv","select COUNT(id) FROM towns2_uziv WHERE ppp");
$stat2 = $stats->get("UNIX_TIMESTAMP() < aktivita + 302400");
$stat1 = $stats->get("1");


echo("<br/>Registrovaných: ");
//print_r($stat1);
echo($stat1[0]);
echo("<br/>Aktivních: ");
echo($stat2[0]);

?>
</td>
   </tr>
   <tr>
     <td width="1060" height="155" align="center" valign="middle">
       
               </td>
   </tr>
   <tr>
     <td height="49" align="center" valign="middle"><table width="484" border="0">
       <tr>
         <td width="161" align="left" bgcolor="#000033"><span class="style10"><?php echo $xnejhraci; ?></span></td>
         <td width="161" align="left" bgcolor="#000033"><span class="style10"><?php echo $xnejali; ?></span></td>
         <td width="161" height="22" align="left" bgcolor="#000033"><span class="style10"><?php echo $xnejmesta; ?></span></td>
       </tr>
       <tr>
         <td width="161" align="left" valign="top">
<?php $object_nejhraci->show("1,10","1"); ?>
</td>
         <td width="161" align="left" valign="top">
<?php $object_nejali->show("1,10","1"); ?>
         	</td>
         <td width="161" align="left" valign="top">
<?php $object_nejmes->show("1,10","1"); ?>
		 </td>
         </tr>
       
     </table></td>
   </tr>
   <tr>
     <td height="287" align="center" valign="middle"><form id="form4" name="form4" method="post" action="?logof=0">
       <table width="484" border="0">
         <tr>
           <td colspan="2" align="left" bgcolor="#000033"><span class="style10"><?php echo $xregistrace; ?></span></td>
         </tr>
         <tr>
           <td colspan="2" align="left" valign="top"><p><span class="style10"><span class="style11"><?php echo $xvocem; ?></span><br />
               </span><?php echo $xtowns2_je; ?><br />
               <span class="style11"><?php echo $xvyhody; ?></span><br />
             <?php echo $xvyhoda1; ?><br />
             <?php echo $xvyhoda2; ?><br />
             <?php echo $xvyhoda3; ?></p></td>
         </tr>
         <tr>
           <th width="102" align="left"><?php echo $xjmeno; ?></th>
           <td width="372"><input name="menor" type="text" id="menor" value="<?php echo $_POST["menor"]; ?>" /></td>
         </tr>
         <tr>
           <th align="left"><?php echo $xheslo; ?></th>
           <td><input name="heslor" type="password" id="heslor" value="<?php echo $_POST["heslor"]; ?>" /></td>
         </tr>
         <tr>
           <th align="left"><?php echo $xhesloznovu; ?></th>
           <td><input name="heslo2r" type="password" id="heslo2r" value="<?php echo $_POST["heslo2r"]; ?>" /></td>
         </tr>
         <tr>
           <th align="left"><?php echo $xmail; ?></th>
           <td><input name="mailr" type="text" id="mailr" value="<?php echo $_POST["mailr"]; ?>" /></td>
         </tr>
         <tr>
           <th align="left"><?php echo $xjmenomesta; ?></th>
           <td><input name="mestor" type="text" id="mestor" value="<?php echo $_POST["mestor"]; ?>" /></td>
         </tr>
         <tr>
           <th colspan="2" align="left"><?php echo $xzobrazovatmail; ?> 
             <label>
             <input name="zmailr" type="checkbox" id="zmailr" value="1" />
             </label></th>
           </tr>
         <tr>
           <th colspan="2" align="left"><label>
             <textarea name="textarea" cols="50" rows="10" readonly="readonly"><?php echo $xpravidla; ?></textarea>
           </label></th>
           </tr>
         <tr>
           <th colspan="2" align="left"><label>
             <input name="pravidlar" type="checkbox" id="pravidlar" value="1" />
             <?php echo $xprectenapravidla; ?></label></th>
           </tr>
         <tr>
           <th colspan="2" align="left" valign="top"><?php echo $xkod; ?><img src="obrazok.php" width="52" height="25" border="2" /> <label>
             <input name="kod" type="text" id="kod" />
           </label></th>
         </tr>
         <tr>
           <th colspan="2" align="left"><label>
             <input type="submit" name="Submit2" value="<?php echo $xtlreg; ?>" />
           <?php echo $xvarovani; ?></label></th>
           </tr>
       </table>
          </form>     </td>
   </tr>
 </table>