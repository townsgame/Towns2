<?php
//echo("c_0");
$root = "../../";
$no_c = "1";
$no_ss = "1";
$neobnov = "1";
//echo("c_1");
require("../funkcie/index.php");
require("../funkcie/vojak.php"); 
//echo("c_2");
//-------------------------------------------------------------
$surky=new index("towns2_uziv","select prachy,jedlo,kamen,zelezo,drevo,body,ludia,ludiamax from towns2_uziv where ppp");
$surkyu = $surky->get("id = '".$_SESSION["id"]."'");

    
echo("
<table border=\"0\" cellpadding=\"1\">
  <tr><td align=\"center\">		
<img src=\"casti/suroviny/desing/prachy.png\" alt=\"" . $GLOBALS["sviac1"] . "\" width=\"17\" height=\"17\" border=\"1\" /> &nbsp; ".zformatovat($surkyu["prachy"])."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
"./*<img src=\"casti/suroviny/desing/jedlo.png\" alt=\"" . $GLOBALS["sviac2"] . "\" width=\"17\" height=\"17\" border=\"1\"> &nbsp; ".zformatovat($surkyu["jedlo"])."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*/"
<img src=\"casti/suroviny/desing/kamen.png\" alt=\"" . $GLOBALS["sviac3"] . "\" width=\"17\" height=\"17\" border=\"1\"> &nbsp; ".zformatovat($surkyu["kamen"])."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src=\"casti/suroviny/desing/zelezo.png\" alt=\"" . $GLOBALS["sviac4"] . "\" width=\"17\" height=\"17\" border=\"1\"> &nbsp; ".zformatovat($surkyu["zelezo"])."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src=\"casti/suroviny/desing/drevo.png\" alt=\"" . $GLOBALS["sviac5"] . "\" width=\"17\" height=\"17\" border=\"1\" /> &nbsp; ".zformatovat($surkyu["drevo"])."&nbsp;&nbsp;&nbsp;&nbsp;
<a class=\"bzp\" href=\"".gv("?dir=casti/suroviny/index.php&amp;glob_sc=5")."\">&gt;&gt;</a></th>
</td>
</tr>
</table>");


?>