<?php
if($_GET["togox"]){
refresh(gv("?dir=casti/mapa/uniindex.php&amp;glob_sc=1&amp;xc=".$_GET["togox"]."&amp;yc=".$_GET["togoy"]));
}else{
//ini_set("memory_limit","10M");
$sb =  gv("?submenu=4");

$size = map_x;
echo("<table width=\"".($size*2.2)."\" height=\"".($size*2.2)."\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tr>");
foreach(hnet2("towns2","SELECT xc,yc,pozadie FROM towns2 WHERE xc<10 AND yc<10 ORDER BY yc,xc",99999999) as $row1){
//if($row1["xc"] == 1){ echo(""); }

if($row1["xc"]-1 == 1){ echo("</tr><tr>");
if((($row1["yc"]-1)/10) == intval(($row1["yc"]-1)/10)){
echo("<td bgcolor=\"#000000\" width=\"1\" height=\"1\" colspan=\"".intval($size*1.1)."\" ></td></tr><tr>");
}	
}
//if($row1["yc"] == 1){
if((($row1["xc"]-1)/10) == intval(($row1["xc"]-1)/10)){
echo("<td bgcolor=\"#000000\" width=\"1\" height=\"1\" ></td>");
}//}

//echo("(".$row1["obrazok"].",".$row1["pozadie"].") / ");	
if($row1["pozadie"] == 10){ $bg = "#6699FF"; }
elseif($row1["pozadie"] == 11){ $bg = "#cccccc"; }
elseif($row1["pozadie"] == 12){ $bg = "#663300"; }
elseif($row1["pozadie"] == 13){ $bg = "#000000"; }
elseif($row1["pozadie"] == 14){ $bg = "#66FFFF"; }
elseif($row1["pozadie"] == 15){ $bg = "#CC9900"; }
elseif($row1["pozadie"] == 16){ $bg = "#FFFF00"; }
elseif($row1["pozadie"] == 17){ $bg = "#000000"; }
elseif($row1["pozadie"] == 18){ $bg = "#66FFCC"; }
elseif($row1["pozadie"] == 19){ $bg = "#669900"; }

/*$x_o = ((((intval(($xc-1)/10))*10)+1)/10)-1;
$y_o = ((((intval(($yc-1)/10))*10)+1)/10)-1;
if(!$mapaodkaz[$x_o][$y_o ]){
$mapaodkaz[$x_o][$y_o ] = "?togox=".$row1["xc"]."&amp;togoy=".$row1["yc"]	gv("?dir=casti/mapa/uniindex.php&amp;glob_sc=1&amp;xc=".$row1["xc"]."&amp;yc=".$row1["yc"]);
}*/

echo("<td bgcolor=\"".$bg."\" width=\"1\" height=\"1\"><a href=\"".$sb."&amp;togox=".$row1["xc"]."&amp;togoy=".$row1["yc"]."\"><img src=\"casti/mapa/bod.gif\" width=\"2\" height=\"2\" /></a></td>");

//echo("<br />");
}
echo("</tr></table>");


?>
<table>
<tr><td bgcolor="#6699FF" width="20"></td>
<td><?php echo $GLOBALS["uniglob1"]; ?></td></tr>
	
<tr><td bgcolor="#cccccc" width="20"></td>
<td><?php echo $GLOBALS["uniglob2"]; ?></td></tr>
	
<tr><td bgcolor="#663300" width="20"></td>
<td><?php echo $GLOBALS["uniglob3"]; ?></td></tr>
	
<tr><td bgcolor="#000000" width="20"></td>
<td><?php echo $GLOBALS["uniglob4"]; ?></td></tr>
	
<tr><td bgcolor="#66FFFF" width="20"></td>
<td><?php echo $GLOBALS["uniglob5"]; ?></td></tr>
		
<tr><td bgcolor="#CC9900" width="20"></td>
<td><?php echo $GLOBALS["uniglob6"]; ?></td></tr>
		
<tr><td bgcolor="#FFFF00" width="20"></td>
<td><?php echo $GLOBALS["uniglob7"]; ?></td></tr>
		
<tr><td bgcolor="#66FFCC" width="20"></td>
<td><?php echo $GLOBALS["uniglob8"]; ?></td></tr>
	
<tr><td bgcolor="#669900" width="20"></td>
<td><?php echo $GLOBALS["uniglob9"]; ?></td></tr>
</table>
<?php
}
?>