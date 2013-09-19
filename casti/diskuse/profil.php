<br />
<?php
$idc = $_SESSION["id"];
if($_MYGET["id"]){
$idc = $_MYGET["id"];
}

$tmp = hnet2("towns2_uziv","select * from towns2_uziv WHERE id='".$idc."'");
$row = $tmp[0];
	$idp = $row["id"];
	$menoc = $row["menoc"]; 	 	 	 
 	$meno = $row["meno"];
 	$typ = typuziv($row["typ"]);
 	$body = $row["body"];
 	$poradie = $row["poradie"];
 	$popis = $row["popis"];
 	$pohlavie = $row["pohlavie"];
 	$vek = $row["vek"];
 	$mail = $row["mail"];
 	$zmail = $row["zmail"];
 	$www = $row["www"];
	$ali = profila($row["ali"]);
	$popka= ($row["ludia"]."/".$row["ludiamax"]);
	$pozice= qpxy($row["hlbudovaxc"],$row["hlbudovayc"]);
	$hodnost = $row["hodnost"];
	//$aktivita = aktivita($row["id"]);

$akce = "<a href=\"".gv("?dir=casti/zpravy/index.php&amp;submenu=2&amp;piszpr=".$idp."&amp;glob_sc=7")."\">" . $GLOBALS["hprofil1"] . "</a>";
if($idp == $_SESSION["id"]){ $akce = $akce."<br /><a href=\"".gv("?submenu=4")."\">" . $GLOBALS["hprofil2"] . "</a>"; };
$akce = $akce."<br /><a href=\"".gv("?dir=casti/mapa/uniindex.php&amp;glob_sc=1&amp;xc=".$row["hlbudovaxc"]."&amp;yc=".$row["hlbudovayc"])."\">" . $GLOBALS["hprofil3"] . " $pozice</a>";

if(!$zmail){
$mail = "";
}
$zmena = "";
if($idc == $_SESSION["id"]){
$zmena = $xzmenitprofil;
}
if($pohlavie == 0){ $pohlavie = ""; }
if($pohlavie == 1){ $pohlavie = $xmuz; }
if($pohlavie == 2){ $pohlavie = $xzena; }
?>


<table width="570" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <th colspan="5" bgcolor="#DDDDDD" scope="col"><?php echo $GLOBALS["asixth1"]; ?> <?php echo $meno; ?></th>
  </tr>
  <tr>
    <th colspan="3" bgcolor="#EEEEEE"><?php echo $GLOBALS["asecond2"]; ?>:</th>
    <th width="4" rowspan="17">&nbsp;</th>
    <th width="170" bgcolor="#EEEEEE"><?php echo $GLOBALS["asecond3"]; ?>:</th>
  </tr>
    <tr>
    <td width="7" rowspan="13"></td>
    <th width="89" align="left" valign="top"><?php echo $GLOBALS["asecond4"]; ?>:</th>
    <td width="118"><?php echo $poradie; ?></td>
    <td rowspan="18" align="center" valign="top"><?php echo convert($popis,$idc); ?></td>
  </tr>
    <tr>
    <th align="left" valign="top"><?php echo $GLOBALS["asecond5"]; ?>:</th>
    <td><?php echo $body; ?></td>
  </tr>

    <tr>
      <th align="left" valign="top"><strong>ID:</strong>*</th>
      <td><?php echo $idp; ?></td>
    </tr>
  <tr>
    <th align="left" valign="top"><?php echo $GLOBALS["hprofil6"]; ?>:</th>
    <td><?php echo $typ; ?></td>
  </tr>
  <tr>
    <th align="left" valign="top"><?php echo $GLOBALS["asecond1"]; ?>:</th>
    <td><?php echo $ali; ?></td>
  </tr>
  <tr>
    <th align="left" valign="top"><?php echo $GLOBALS["hprofil7"]; ?>:</th>
    <td><?php echo($hodnost); ?></td>
  </tr>
  <tr>
    <th align="left" valign="top"><?php echo $GLOBALS["hprofil8"]; ?>:</th>
    <td><?php echo($pozice); ?></td>
  </tr>
  <tr>
    <th align="left" valign="top"><?php echo $GLOBALS["hprofil9"]; ?>:</th>
    <td><?php echo($popka); ?></td>
  </tr>
    <tr>
    <th align="left" valign="top"><?php echo $GLOBALS["mdrag17a"]; ?>:</th>
    <td><?php echo convert($menoc); ?></td>
  </tr>
  <tr>
    <th align="left" valign="top"><?php echo $GLOBALS["hprofil10"]; ?>:</th>
    <td><?php echo convert($vek); ?></td>
  </tr>
  <tr>
    <th align="left" valign="top"><?php echo $GLOBALS["hprofil11"]; ?>:</th>
    <td><?php echo $pohlavie; ?></td>
  </tr>
  <tr>
    <th align="left" valign="top">E-mail:</th>
    <td><a href="mailto:<?php echo $mail; ?>"><?php echo convert($mail); ?></a></td>
  </tr>
  <tr>
    <th align="left" valign="top">Web:</th>
    <td><a href="http://<?php echo $www; ?>/"><?php echo convert($www); ?></a></td>
  </tr>
  
  <tr>
    <th height="20" colspan="3" bgcolor="#EEEEEE"><?php echo $GLOBALS["hprofil12"]; ?>:</th>
  </tr>
  <tr>
    <td></td>
    <td height="21" colspan="2" align="left" valign="top"><?php echo($akce); ?></td>
  </tr>
</table>
<br />
*<?php echo $GLOBALS["hprofil13"]; ?>