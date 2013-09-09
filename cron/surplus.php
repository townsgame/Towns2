<?php
//ini_set("max_execution_time",10000);
if(session_id() == '')
{
    session_save_path(__DIR__ . "/../sessions");
}
$root = __DIR__ . "/../";
require_once(__DIR__ . "/../" . "general.php");
require_once(__DIR__ . "/../casti/funkcie/index.php");
                                    
if($nexttime_vojvyt <= time()){
//===================================================
foreach(premhnet("SELECT id FROM towns2_uziv WHERE  typ!='9'") as $user){
echo($user["id"]."<br />");
$cashsz=0;
$cashsk=0;
$cashsd=0;
foreach(premhnet("SELECT obrazok,xc,yc,(SELECT xc FROM towns2 towns2_2 WHERE  IF(towns2.obrazok='tdrevo','les',IF(towns2.obrazok='tzelezo','zelezo','kamen')) = towns2_2.obrazok ORDER BY sqrt(pow(towns2_2.xc-towns2.xc,2)+pow(towns2_2.yc-towns2.yc,2)) LIMIT 0,1),(SELECT yc FROM towns2 towns2_2  WHERE IF(towns2.obrazok='tdrevo','les',IF(towns2.obrazok='tzelezo','zelezo','kamen')) = towns2_2.obrazok ORDER BY sqrt(pow(towns2_2.xc-towns2.xc,2)+pow(towns2_2.yc-towns2.yc,2)) LIMIT 0,1) FROM towns2 WHERE (obrazok='tkamen' OR obrazok='tzelezo' OR obrazok='tdrevo') AND vlastnik='".$user["id"]."'") as $row){
$vzdalenost = ((intval(0.5+(10*(sqrt(pow($row[3]-$row["xc"],2)+pow($row[4]-$row["yc"],2))))))/10);
if($vzdalenost != 0){
$surovin = intval((100/$vzdalenost)+0.5);

if($row["obrazok"] == "tzelezo"){ $typxx = "železo"; $cashsz=$cashsz+$surovin; }
if($row["obrazok"] == "tkamen"){ $typxx = "kámen"; $cashsk=$cashsk+$surovin; }
if($row["obrazok"] == "tdrevo"){ $typxx = "dřevo"; $cashsd=$cashsd+$surovin; }

}
}

surovinanew1($user["id"],"zelezo","+",$cashsz+20);
surovinanew1($user["id"],"kamen","+",$cashsk+20);
surovinanew1($user["id"],"drevo","+",$cashsd+20);
}
//echo("<b>kámen: </b>".$cashsk."<br />");
//echo("<b>železo: </b>".$cashsz."<br />");
//echo("<b>dřevo: </b>".$cashsd);
//===================================================
$nexttime = (intval((time()+3600)/3600)*3600);
$nexttime_vojvyt = $nexttime;
echo($nexttime);
}

echo("<br />All good.");
//od  kam  cas  prachy  jedlo  kamen  zelezo  drevo  protect  
?>