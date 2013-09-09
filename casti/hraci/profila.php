<br />
<?php
$idc = $_SESSION["ali"];
//echo $idc ;
if($_MYGET["id"]){
$idc = $_MYGET["id"];
}
if(!$idc){
$idc = 2;
}

$tmp = hnet2("towns2_ali","select * from towns2_ali WHERE id='".$idc."'");
$row = $tmp[0];
//$odpoved =mysql_query("select * from towns2_ali WHERE id='".$idc."'");
//echo (mysql_error());
//while ($row = mysql_fetch_array($odpoved)) {	
 	$idp = $row["id"]; 	 	 
 	$meno = $row["meno"];
 	$body = $row["body"];
 	$poradie = $row["poradie"];
 	$popis = $row["popis"];
//}
?>
<table width="570" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <th colspan="5" bgcolor="#DDDDDD" scope="col"><?php echo $GLOBALS["asecond1"]; ?> <?php echo $meno; ?></th>
  </tr>
  <tr>
    <th colspan="3" bgcolor="#EEEEEE"><?php echo $GLOBALS["asecond2"]; ?>:</th>
    <th width="4" rowspan="7">&nbsp;</th>
    <th width="170" bgcolor="#EEEEEE"><?php echo $GLOBALS["asecond3"]; ?>:</th>
  </tr>
  <tr>
    <td></td>
    <th align="left" valign="top"><?php echo $GLOBALS["asecond4"]; ?>:</th>
    <td><?php echo $poradie; ?></td>
    <td rowspan="6" align="center" valign="top"><?php echo convert($popis); ?></td>
  </tr>
  <tr>
    <td width="7"></td>
    <th width="89" align="left" valign="top"><?php echo $GLOBALS["asecond5"]; ?>:</th>
    <td width="118"><?php echo $body; ?></td>
  </tr>
  
  <tr>
    <th height="20" colspan="3" bgcolor="#EEEEEE"><?php echo $GLOBALS["asecond6"]; ?>: </th>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td height="20" colspan="2" align="left">
<?php 
foreach(hnet2("towns2_uziv","SELECT id,hodnost from towns2_uziv WHERE ppp AND ali='$idp' ORDER by poradie") as $row){

$link = profil($row["id"]);
if($row["hodnost"]){ $hodnost="<b>".$row["hodnost"].": </b>"; }else{ $hodnost=""; }
echo("$hodnost $link<br />");
}
?></td>
  </tr>
</table>
