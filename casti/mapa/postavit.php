<table width="404" height="199" border="0">
  <tr>
    <th width="394" height="21" align="left" scope="col"><h3><?php echo $xpostavitnovou; ?></h3></th>
  </tr>
  <tr>
    <th height="172" align="left" valign="top" scope="col"> <?php
$odpoved =mysql_query("select * from townsuni WHERE akce != '0' order by meno");
while ($row = mysql_fetch_array($odpoved)) {

$cas = $row["casovac2"];
$hod = intval($cas/3600);
$cas = $cas - $hod * 3600;
$min = intval($cas/60) ;
$cas = $cas - $min * 60;
$cas = "$hod:$min:$cas";
echo("
<table width=\"291\" border=\"0\">
  <tr>
    <th colspan=\"7\" align=\"left\" scope=\"col\"><h3>".($row["meno"])."</h3></th>
  </tr>
  <tr>
    <th width=\"22\" scope=\"col\"><img src=\"casti/suroviny/desing/kamen.jpg\" alt=\"kámen\" width=\"20\" height=\"20\" border=\"1\" /></th>
    <th width=\"64\" scope=\"col\">&nbsp;</th>
    <td width=\"53\" scope=\"col\">".$row["kamen"]."</td>
    <th width=\"134\" colspan=\"4\" rowspan=\"6\" align=\"center\" valign=\"middle\" scope=\"col\"><img src=\"casti/jednotky/obrazky/".$row["obrazok"].".jpg\" width=\"120\" height=\"120\" /></th>
  </tr>
  <tr>
    <td><img src=\"casti/suroviny/desing/drevo.jpg\" alt=\"dřevo\" width=\"20\" height=\"20\" border=\"1\" /></td>
    <td>&nbsp;</td>
    <td>".$row["drevo"]."</td>
  </tr>
  <tr>
    <td colspan=\"2\">$xutok</td>
    <td>".$row["utok"]."</td>
  </tr>
  <tr>
    <td colspan=\"2\">$xzivot</td>
    <td>".$row["zivot"]."</td>
  </tr>
  <tr>
    <td colspan=\"2\">$xvzdalenost</td>
    <td>".$row["vutok"]."</td>
  </tr>
  <tr>
    <td colspan=\"2\">$xpopka</td>
    <td>".$row["ludia"]."</td>
  </tr>
  <tr>
    <td height=\"1\" colspan=\"7\" align=\"left\" valign=\"top\">".(convertl($row["popis"]))."</td>
  </tr>
  <tr>
    <td colspan=\"7\"><strong><a href=\"?dir=casti/admin/postavit.php&amp;co=".$row["obrazok"]."&amp;xc=".$xc."&amp;yc=".$yc."\">".$row["akce"]."</a></strong> $cas</td>
  </tr>
</table>
");

}
mysql_free_result($odpoved);
?>
    </th>
  </tr>
</table>
<table width="404" height="238" border="0">
  <tr>
    <th height="21" colspan="2" align="left" scope="col"><h3><?php echo $xzmenitp; ?></h3></th>
  </tr>
  <tr>
    <th width="80" height="21" align="left" scope="col"><a href="?dir=casti/admin/teren.php&amp;prachy=10&amp;jedlo=100&amp;drevo=2&amp;zelezo=0&amp;kamen=1&amp;xc=<?php echo($xc); ?>&amp;yc=<?php echo($yc); ?>&amp;co=trava"><?php echo $xtrava; ?></a></th>
    <th width="314" align="left" scope="col"><img src="casti/suroviny/desing/kamen.jpg" alt="jídlo" width="20" height="20" border="1" /> &nbsp;100</th>
  </tr>
  <tr>
    <th height="21" align="left" scope="col"><a href="?dir=casti/admin/teren.php&amp;prachy=50&amp;jedlo=0&amp;drevo=0&amp;zelezo=0&amp;kamen=100&amp;xc=<?php echo($xc); ?>&amp;yc=<?php echo($yc); ?>&amp;co=piesok"><?php echo $xpisek; ?></a></th>
    <th align="left" scope="col"><img src="casti/suroviny/desing/kamen.jpg" alt="kámen" width="20" height="20" border="1" /> &nbsp; 100 </th>
  </tr>
  <tr>
    <th height="21" align="left" scope="col"><a href="?dir=casti/admin/teren.php&amp;prachy=40&amp;jedlo=0&amp;drevo=0&amp;zelezo=0&amp;kamen=100&amp;xc=<?php echo($xc); ?>&amp;yc=<?php echo($yc); ?>&amp;co=hlina"><?php echo $xhlina; ?></a></th>
    <th align="left" scope="col"><img src="casti/suroviny/desing/kamen.jpg" alt="kámen" width="20" height="20" border="1" /> &nbsp; 100 </th>
  </tr>
  <tr>
    <th height="21" align="left" scope="col"><a href="?dir=casti/admin/teren.php&amp;prachy=100&amp;jedlo=0&amp;drevo=0&amp;zelezo=0&amp;kamen=100&amp;xc=<?php echo($xc); ?>&amp;yc=<?php echo($yc); ?>&amp;co=kamene"><?php echo $xkameny; ?></a></th>
    <th align="left" scope="col"><img src="casti/suroviny/desing/kamen.jpg" alt="kámen" width="20" height="20" border="1" /> &nbsp; 100 </th>
  </tr>
  <tr>
    <th height="21" align="left" scope="col"><a href="?dir=casti/admin/teren.php&amp;prachy=10&amp;jedlo=0&amp;drevo=0&amp;zelezo=0&amp;kamen=100&amp;xc=<?php echo($xc); ?>&amp;yc=<?php echo($yc); ?>&amp;co=cesta"><?php echo $xcesta; ?></a></th>
    <th align="left" scope="col"><img src="casti/suroviny/desing/kamen.jpg" alt="kámen" width="20" height="20" border="1" /> &nbsp; 100</th>
  </tr>
</table>
