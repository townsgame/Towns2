<?php
foreach(hnet2("towns2","SELECT xc,yc,obrazok,vlastnik FROM towns2 WHERE cas='2' AND casovac<'".time()."'") as $row){
mysql_query("UPDATE towns2 SET cas='1', casovac='0' WHERE xc='".$row["xc"]."' AND yc='".$row["yc"]."'");	
if($row["obrazok"] == "pole"){ 
//echo("poleano(-".$row["vlastnik"]."-)");
mysql_query("UPDATE towns2 SET obrazok='0' WHERE xc='".$row["xc"]."' AND yc='".$row["yc"]."'");
surovinanew($row["vlastnik"],"jedlo","+",1000);	
}
//echo("UPDATE towns2 SET cas='1', casovac='0' WHERE xc='".$row["xc"]."' AND yc='".$row["yc"]."'");
//echo("<br/>");
echo($row["xc"]." / ".$row["yc"]);
dcmapa($row["xc"],$row["yc"]);
dc("towns2");	
}
$nexttime = hnet("towns2","SELECT min(casovac) FROM towns2 WHERE cas = '2' and ".rand(10000,99999));
?>