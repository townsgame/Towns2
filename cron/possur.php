<?php
//$root = "../";
//require("../casti/funkcie/index.php");
//require("../casti/funkcie/vojak.php");  
//ini_set("max_execution_time",10000);
if(session_id() == '')
{
    session_save_path(__DIR__ . "/../sessions");
}
$root = __DIR__ . "/../";
require_once(__DIR__ . "/../" . "general.php");
require_once(__DIR__ . "/../casti/funkcie/index.php");

foreach(premhnet("SELECT * FROM towns2_possur WHERE cas < ".(time()+1)." ORDER BY cas") as $row){
//echo(zobrazsur($row["prachy"],$row["jedlo"],$row["kamen"],$row["zelezo"],$row["drevo"]));
mysql_query("DELETE FROM towns2_possur WHERE od='".$row["od"]."' AND kam='".$row["kam"]."' AND cas='".$row["cas"]."' AND prachy='".$row["prachy"]."' AND jedlo='".$row["jedlo"]."' AND kamen='".$row["kamen"]."' AND zelezo='".$row["zelezo"]."' AND drevo='".$row["drevo"]."' LIMIT 1");
//echo/*mysql_query*/("DELETE FROM towns2_possur WHERE od='".$row["od"]."' AND kam='".$row["kam"]."' AND cas='".$row["cas"]."' AND prachy='".$row["prachy"]."' AND jedlo='".$row["jedlo"]."' AND kamen='".$row["kamen"]."' AND zelezo='".$row["zelezo"]."' AND drevo='".$row["drevo"]."' LIMIT 0,1");
echo("<br />");
echo(mysql_error());
echo("<br />");
/*if(
zsur("prachy",$row["prachy"],$row["od"]) and
zsur("jedlo",$row["jedlo"],$row["od"]) and
zsur("kamen",$row["kamen"],$row["od"]) and
zsur("zelezo",$row["zelezo"],$row["od"]) and
zsur("drevo",$row["drevo"],$row["od"])
){*/
zprava1($row["kam"],"\$GLOBALS[\'zprava1\'] ".profil1($row["od"]),zobrazsur($row["prachy"],$row["jedlo"],$row["kamen"],$row["zelezo"],$row["drevo"]),31415);
/*surovinanew($row["od"],"prachy","-",$row["prachy"],1);
surovinanew($row["od"],"jedlo","-",$row["jedlo"],1);
surovinanew($row["od"],"kamen","-",$row["kamen"],1);
surovinanew($row["od"],"zelezo","-",$row["zelezo"],1);
surovinanew($row["od"],"drevo","-",$row["drevo"],1);*/
//----
surovinanew1($row["kam"],"prachy","+",$row["prachy"],1);
surovinanew1($row["kam"],"jedlo","+",$row["jedlo"],1);
surovinanew1($row["kam"],"kamen","+",$row["kamen"],1);
surovinanew1($row["kam"],"zelezo","+",$row["zelezo"],1);
surovinanew1($row["kam"],"drevo","+",$row["drevo"],1);
dc("towns2_uziv");
dc("towns2_possur");
dc("towns2_zpr");
}

$nexttime = premhnet("SELECT min(cas) FROM towns2_possur WHERE ".rand(10000,99999));
$nexttime = $nexttime[0]["min(cas)"];
//if($nexttime < time()){$nexttime = time()*2;}
//echo($nexttime);
//od  kam  cas  prachy  jedlo  kamen  zelezo  drevo  protect  

echo("<br />All good.");
?>

