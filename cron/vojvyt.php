<?php
//ini_set("max_execution_time",10000);
if(session_id() == '')
{
    session_save_path(__DIR__ . "/../sessions");
}
$root = __DIR__ . "/../";
require_once(__DIR__ . "/../" . "general.php");
require_once(__DIR__ . "/../casti/funkcie/index.php");
require_once(__DIR__ . "/../casti/funkcie/vojak.php");

if($nexttime_vojvyt <= time()){

/*
mysql_query("CREATE TABLE `towns2_z_tmp` (
 `id` INT NOT NULL ,
 `body` INT NOT NULL ,
 PRIMARY KEY ( `id` ) ,
 INDEX ( `body` )
 ) ENGINE = MYISAM");
mysql_query("INSERT INTO towns2_z_tmp SELECT towns2_uziv.id,towns2_uziv.ludia FROM towns2_uziv");
mysql_query("UPDATE towns2_uziv SET jedlo=jedlo-(SELECT body FROM towns2_z_tmp WHERE towns2_z_tmp.id=towns2_uziv.id )");
mysql_query("UPDATE towns2_uziv SET jedlo=0 WHERE jedlo <1");
mysql_query("DROP TABLE towns2_z_tmp");

// very long part (takes time)
mysql_query("UPDATE towns2 SET utokna = 
(SELECT celkovyUtok
FROM 
(SELECT b.xc,b.yc, sum(towns2_uni.utok) celkovyUtok
FROM towns2 a,towns2 b,towns2_uni
WHERE a.vlastnik = b.vlastnik AND
 towns2_uni.utok != 0 AND
 towns2_uni.obrazok = a.obrazok AND
 ABS(a.xc - b.xc) <= towns2_uni.vutok AND
 ABS(a.yc - b.yc) <= towns2_uni.vutok AND
 pow(towns2_uni.vutok,2) >= pow(a.xc - b.xc,2) + pow(a.yc - b.yc,2)
GROUP BY b.xc,b.yc
) xtownstmp 
WHERE xtownstmp.xc=towns2.xc AND xtownstmp.yc=towns2.yc)");
*/

foreach(premhnet("SELECT zelezo,id,vojaci,vojacit FROM towns2_uziv WHERE vojacit != '.1(v0,s0,k0,r0,j0,t0,z0,b0,a0,e0,n0,d0,m0)' and vojacit") as $row){
//echo(zobrazsur($row["prachy"],$row["jedlo"],$row["kamen"],$row["zelezo"],$row["drevo"]));

mysql_query("UPDATE towns2_uziv SET vojacit='.1(v0,s0,k0,r0,j0,t0,z0,b0,a0,e0,n0,d0,m0)', vojaci='".vojakplus($row["vojacit"],$row["vojaci"])."' WHERE id=".$row["id"]);
surovinanew1($row["id"],"zelezo","-",vojakcena($row["vojacit"]));
dc("towns2_uziv");
//echo("<br />");
}
$nexttime = (intval((time()+3600)/3600)*3600);
$nexttime_vojvyt = $nexttime;
echo($nexttime);
}
//od  kam  cas  prachy  jedlo  kamen  zelezo  drevo  protect  
echo("<br />All good.");
?>
