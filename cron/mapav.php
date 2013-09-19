<?php
if(session_id() == '')
{
    session_save_path(__DIR__ . "/../sessions");
}
$root = __DIR__ . "/../";
require_once(__DIR__ . "/../" . "general.php");
require_once(__DIR__ . "/../casti/funkcie/index.php");

foreach(premhnet("SELECT * FROM towns2 WHERE RAND()>0.99 AND obrazok='les'") as $row){
echo("(".$row["xc"].",".$row["yc"].")");
}

echo("<br />All good.");
?>