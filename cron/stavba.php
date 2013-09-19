<?php
if(session_id() == '')
{
    session_save_path(__DIR__ . "/../sessions");
}
$root = __DIR__ . "/../";
require_once(__DIR__ . "/../" . "general.php");
require_once(__DIR__ . "/../casti/funkcie/index.php");

foreach(premhnet("SELECT xc,yc,obrazok,vlastnik FROM towns2 WHERE cas='2' AND casovac<'".time()."'") as $row){
mysql_query("UPDATE towns2 SET cas='1', casovac='0' WHERE xc='".$row["xc"]."' AND yc='".$row["yc"]."'");	
if($row["obrazok"] == "pole"){ 
//echo("poleano(-".$row["vlastnik"]."-)");
mysql_query("UPDATE towns2 SET obrazok='0' WHERE xc='".$row["xc"]."' AND yc='".$row["yc"]."'");
surovinanew1($row["vlastnik"],"jedlo","+",1000);	
}
//echo("UPDATE towns2 SET cas='1', casovac='0' WHERE xc='".$row["xc"]."' AND yc='".$row["yc"]."'");
//echo("<br />");
echo($row["xc"]." / ".$row["yc"] . "<br />");
dcmapa($row["xc"],$row["yc"]);
dc("towns2");	
}
$nexttime = premhnet("SELECT min(casovac) FROM towns2 WHERE cas = '2' and ".rand(10000,99999));
$nexttime = $nexttime[0]["min(casovac)"];

echo("All good.");
?>