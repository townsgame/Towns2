<?php
//ini_set("max_execution_time",10000);
if(session_id() == '')
{
    session_save_path(__DIR__ . "/../sessions");
}
$root = __DIR__ . "/../";
require_once(__DIR__ . "/../" . "general.php");
require_once(__DIR__ . "/../casti/funkcie/index.php");

//mysql_query(file_get_contents("zalohasad.txt"));
//echo(mysql_error());
mysql_query("UPDATE towns2_uziv SET ludia = (SELECT SUM(towns2_uni.ludia) FROM towns2,towns2_uni WHERE towns2.vlastnik = id AND towns2.obrazok=towns2_uni.obrazok GROUP BY towns2.vlastnik)");
echo(mysql_error());
mysql_query("UPDATE towns2_uziv SET ludiamax = (SELECT SUM(towns2_uni.pludia) FROM towns2,towns2_uni WHERE towns2.vlastnik = id AND towns2.obrazok=towns2_uni.obrazok GROUP BY towns2.vlastnik)");
echo(mysql_error());
//============body=================================================
mysql_query("UPDATE towns2_uziv SET body = (SELECT SUM(towns2_uni.ludia*towns2.uroven) FROM towns2,towns2_uni WHERE towns2.vlastnik = id AND towns2.obrazok=towns2_uni.obrazok GROUP BY towns2.vlastnik)");
echo(mysql_error());
mysql_query("UPDATE towns2 SET obrazok = '0' WHERE vlastnik='0'");
//mysql_query("UPDATE towns2_uziv SET body = (SELECT SUM(towns2_uni.drevo) FROM towns2,towns2_uni WHERE towns2.vlastnik = id AND towns2.obrazok=towns2_uni.obrazok GROUP BY towns2.vlastnik)+(SELECT SUM(towns2_uni.kamen) FROM towns2,towns2_uni WHERE towns2.vlastnik = id AND towns2.obrazok=towns2_uni.obrazok GROUP BY towns2.vlastnik)");
echo(mysql_error());
//mysql_query("UPDATE towns2_uziv SET body = body+prachy+jedlo+kamen+zelezo+drevo");
//echo(mysql_error());
//===========/body=================================================
//$q = 0;
//foreach(hnet("towns2_uziv","SELECT id FROM towns2_uziv ORDER by body desc") as $row){
//$q = $q+1;
//mysql_query("UPDATE towns2_uziv SET poradie='".$q."' WHERE id = '".$row["id"]."'");
//} a
mysql_query("CREATE TABLE `towns2_z_tmp` (
 `id` INT NOT NULL ,
 `body` INT NOT NULL ,
 PRIMARY KEY ( `id` ) ,
 INDEX ( `body` )
 ) ENGINE = MYISAM");
echo(mysql_error());
mysql_query("INSERT INTO towns2_z_tmp SELECT towns2_uziv.id,towns2_uziv.body FROM towns2_uziv");
echo(mysql_error());
mysql_query("UPDATE towns2_uziv SET poradie = (SELECT count(1) FROM towns2_z_tmp WHERE towns2_z_tmp.body>towns2_uziv.body)+1");
echo(mysql_error());
mysql_query("UPDATE towns2_uziv SET poradie = '0' WHERE body IS NULL");
mysql_query("UPDATE towns2_uziv SET poradie = poradie-1");
echo(mysql_error());
mysql_query("DROP TABLE towns2_z_tmp");
echo(mysql_error());
dc("towns2_uziv");
//==================================
mysql_query("DELETE FROM towns2_ali WHERE (SELECT COUNT(id) from towns2_uziv WHERE ali=towns2_ali.id) = 0");
echo(mysql_error());
mysql_query("UPDATE towns2_ali SET body = (SELECT SUM(body) from towns2_uziv WHERE ali=towns2_ali.id)");
echo(mysql_error());
//---------------------------------
mysql_query("CREATE TABLE `towns2_z_tmp` (
 `id` INT NOT NULL ,
 `body` INT NOT NULL ,
 PRIMARY KEY ( `id` ) ,
 INDEX ( `body` )
 ) ENGINE = MYISAM");
echo(mysql_error());
mysql_query("INSERT INTO towns2_z_tmp SELECT towns2_ali.id,towns2_ali.body FROM towns2_ali");
echo(mysql_error());
mysql_query("UPDATE towns2_ali SET poradie = (SELECT count(1) FROM towns2_z_tmp WHERE towns2_z_tmp.body>towns2_ali.body)+1");
echo(mysql_error());
mysql_query("UPDATE towns2_ali SET poradie = '0' WHERE body IS NULL");
echo(mysql_error());
mysql_query("DROP TABLE towns2_z_tmp");
echo(mysql_error());
dc("towns2_ali");

echo("<br />All good.");
?>