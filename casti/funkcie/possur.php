<?php
$root = "../";
require("../casti/funkcie/index.php");
require("../casti/funkcie/vojak.php");  
//ini_set("max_execution_time",10000);

foreach(hnet2("towns2_possur","SELECT * FROM towns2_possur WHERE cas < ".(time()+1)." ORDER BY cas") as $row){
//echo(zobrazsur($row["prachy"],$row["jedlo"],$row["kamen"],$row["zelezo"],$row["drevo"]));
mysql_query("DELETE FROM towns2_possur WHERE od='".$row["od"]."' AND kam='".$row["kam"]."' AND cas='".$row["cas"]."' AND prachy='".$row["prachy"]."' AND jedlo='".$row["jedlo"]."' AND kamen='".$row["kamen"]."' AND zelezo='".$row["zelezo"]."' AND drevo='".$row["drevo"]."' LIMIT 1");
//echo/*mysql_query*/("DELETE FROM towns2_possur WHERE od='".$row["od"]."' AND kam='".$row["kam"]."' AND cas='".$row["cas"]."' AND prachy='".$row["prachy"]."' AND jedlo='".$row["jedlo"]."' AND kamen='".$row["kamen"]."' AND zelezo='".$row["zelezo"]."' AND drevo='".$row["drevo"]."' LIMIT 0,1");
echo("<br/>");
echo(mysql_error());
echo("<br/>");
if(
zsur("prachy",$row["prachy"],$row["od"]) and
zsur("jedlo",$row["jedlo"],$row["od"]) and
zsur("kamen",$row["kamen"],$row["od"]) and
zsur("zelezo",$row["zelezo"],$row["od"]) and
zsur("drevo",$row["drevo"],$row["od"])
){
zprava($row["kam"],"Suroviny od hrĂˇÄŤe ".profil($row["od"]),zobrazsur($row["prachy"],$row["jedlo"],$row["kamen"],$row["zelezo"],$row["drevo"]),31415);
surovinanew($row["od"],"prachy","-",$row["prachy"],1);
surovinanew($row["od"],"jedlo","-",$row["jedlo"],1);
surovinanew($row["od"],"kamen","-",$row["kamen"],1);
surovinanew($row["od"],"zelezo","-",$row["zelezo"],1);
surovinanew($row["od"],"drevo","-",$row["drevo"],1);
//----
surovinanew($row["kam"],"prachy","+",$row["prachy"],1);
surovinanew($row["kam"],"jedlo","+",$row["jedlo"],1);
surovinanew($row["kam"],"kamen","+",$row["kamen"],1);
surovinanew($row["kam"],"zelezo","+",$row["zelezo"],1);
surovinanew($row["kam"],"drevo","+",$row["drevo"],1);
dc("towns2_uziv");
dc("towns2_possur");
dc("towns2_zpr");
}
}

$nexttime = hnet("towns2_possur","SELECT min(cas) FROM towns2_possur")
//echo($nexttime);
//od  kam  cas  prachy  jedlo  kamen  zelezo  drevo  protect  
?>

