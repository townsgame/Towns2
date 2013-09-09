<?php
if(session_id() == '')
{
    session_save_path(__DIR__ . "/../sessions");
}
$root = __DIR__ . "/../";
require_once(__DIR__ . "/../" . "general.php");
require_once(__DIR__ . "/../casti/funkcie/index.php");

if(!function_exists("prevest")){
function prevest($kolik) {
function file_post_contents($url,$headers=false,$cookie="a=a",$wasistdas="POST") {
	  $urlx=$url;
    $url = parse_url($url);

    if (!isset($url['port'])) {
      if ($url['scheme'] == 'http') { $url['port']=80; }
      elseif ($url['scheme'] == 'https') { $url['port']=443; }
    }
    $url['query']=isset($url['query'])?$url['query']:'';
    $url['query']=$headers;
    $url['protocol']=$url['scheme'].'://';
    $eol="\r\n";

    $headers =  $wasistdas." "./*$url['protocol'].$url['host'].$url['path']."*/$urlx." HTTP/1.0".$eol. 
    						"Cookie: ".$cookie.$eol. 
                "Host: ".$url['host'].$eol. 
                "Referer: ".$url['protocol'].$url['host'].$url['path'].$eol. 
                "Content-Type: application/x-www-form-urlencoded".$eol. 
                "Content-Length: ".strlen($url['query']).$eol.
                $eol.$url['query'];
                //echo($headers);
    $fp = fsockopen($url['host'], $url['port'], $errno, $errstr, 30); 
    if($fp) {
      fputs($fp, $headers);
      $result = '';
      while(!feof($fp)) { $result .= fgets($fp, 128); }
      fclose($fp);
      if (!$headers) {
        //removes headers
        $pattern="/^.*\r\n\r\n/s";
        $result=preg_replace($pattern,'',$result);
      }
      return $result;
    }
}


/*
$stream = file_post_contents("http://www.websurf.cz/admin_sess.php","akce=prihlasit_se&jmeno=towns&heslo=heslo190077");
$tmp = strpos($stream,"PHPSESSID=");
$stream = substr($stream,$tmp);
$tmp = strpos($stream,";");
$stream = substr($stream,0,$tmp);

//file_post_contents("http://www.websurf.cz/admin_sess.php","",$stream);
file_post_contents("http://www.websurf.cz/admin_sess.php?akce=web_pridat_kredity","typ=NORMAL&odkud=sporci&kam=346ea1f70140e97ad36479931fa9d3&kolik=$kolik",$stream,"POST");
//echo($stream); */
}
//==================================================================================================================================================
function budova_t($budova){
$row['obrazok'] = $budova;
//------------------------------------------
if($row['obrazok'] == "sklad"){
$rnd = rand(1,4);
if($rnd == 1){ $postavit = "tdrevo"; }
if($rnd == 2){ $postavit = "tkamen"; }
if($rnd == 3){ $postavit = "tzelezo"; }
if($rnd == 4){ $postavit = "pole"; }
}
if($row['obrazok'] == "tdrevo"){
$rnd = rand(1,2);
if($rnd == 1){ $postavit = "vlajka"; }
if($rnd == 2){ $postavit = "banka"; }
}
if($row['obrazok'] == "tkamen"){
$rnd = rand(1,2);
if($rnd == 1){ $postavit = "dom"; }
if($rnd == 2){ $postavit = "velkydom"; }
}
if($row['obrazok'] == "tzelezo"){
$rnd = rand(1,2);
if($rnd == 1){ $postavit = "schromazdiste"; }
if($rnd == 2){ $postavit = "kyasarny"; }
}
if($row['obrazok'] == "pole"){
$postavit = "sklad";
}
if($row['obrazok'] == "vlajka"){
$postavit = "veza";
}
if($row['obrazok'] == "banka"){
$rnd = rand(1,2);
if($rnd == 1){ $postavit = "ambasada"; }
if($rnd == 2){ $postavit = "trziste"; }
}
if($row['obrazok'] == "schromazdiste"){
$postavit = "veza";
}
if($row['obrazok'] == "kyasarny"){
$postavit = "veza";
}
if($row['obrazok'] == "veza"){
$postavit = "sklad";
}
if($row['obrazok'] == "ambasada"){
$postavit = "sklad";
}
if($row['obrazok'] == "trziste"){
$postavit = "veza";
}
if($row['obrazok'] == "dom"){
$postavit = "veza";
}
if($row['obrazok'] == "velkydom"){
$postavit = "veza";
}
if($row['obrazok'] == "hlbudova"){
$postavit = "dom";
}
//------------------------------------------
return($postavit);
}
//==================================================================================================================================================
function onebot($id){
foreach(premhnet("SELECT xc,yc,obrazok,vlastnik FROM towns2 WHERE cas=1 AND vlastnik = '".$id."' ORDER by RAND()",1) as $row){
$tmp = premhnet("SELECT 
(SELECT 1 FROM towns2 WHERE xc=".($row["xc"]+1)." AND yc = ".($row["yc"])." AND obrazok = '0'),
(SELECT 1 FROM towns2 WHERE xc=".($row["xc"])." AND yc = ".($row["yc"]+1)." AND obrazok = '0'),
(SELECT 1 FROM towns2 WHERE xc=".($row["xc"]-1)." AND yc = ".($row["yc"])." AND obrazok = '0'),
(SELECT 1 FROM towns2 WHERE xc=".($row["xc"])." AND yc = ".($row["yc"]-1)." AND obrazok = '0')
");
$podminka = "nein";
if($tmp[0]){ $podminka = "xc = '".($row["xc"]+1)."' AND yc = '".($row["yc"])."'"; }
if($tmp[1]){ $podminka = "xc = '".($row["xc"])."' AND yc = '".($row["yc"]+1)."'"; }
if($tmp[2]){ $podminka = "xc = '".($row["xc"]-1)."' AND yc = '".($row["yc"])."'"; }
if($tmp[3]){ $podminka = "xc = '".($row["xc"])."' AND yc = '".($row["yc"]-1)."'"; }
if($podminka != "nein"){
mysql_query("UPDATE towns2 SET obrazok = '".budova_t($row["obrazok"])."',vlastnik=".$row["vlastnik"]." , cas = 2, casovac = ".time()."+(SELECT casovac2 FROM towns2_uni WHERE towns2_uni.obrazok = towns2.obrazok) WHERE $podminka");
dc("towns2");
dcmapa($row["xc"]+1,$row["yc"]);
dcmapa($row["xc"],$row["yc"]+1);
dcmapa($row["xc"]-1,$row["yc"]);
dcmapa($row["xc"],$row["yc"]-1);
}
}	
}
//==================================================================================================================================================
function meno_g(){
$cash = premhnet("SELECT meno FROM towns2_nextbot ORDER BY RAND()");
$cash = $cash[0]["meno"];
if(!$cash){
$cash = "";
for ($i = 1; $i <= rand(2,3); $i++) {	
//----
$cash = $cash.substr(str_shuffle("rtpsdfghjklzcvbnm"),1,1);
$cash = $cash.substr(str_shuffle("eyuioa"),1,1);
//----
}
if(rand(1,4) == 4){ $cash = $cash.substr(str_shuffle("123456789_-"),1,1); }
}else{
mysql_query("DELETE FROM towns2_nextbot WHERE meno = '$cash'");
dc("towns2_nextbot");
}
return($cash);
}
//==================================================================================================================================================
function p_bot(){
$i1 = premhnet("SELECT MAX(id) FROM towns2_uziv");
$i2 = premhnet("SELECT MAX(poradie) FROM towns2_uziv");
$pocet = 1+$i1[0]["MAX(id)"];
$poradie = 1+$i1[0]["MAX(poradie)"];
$dir_reg = "../2/";
//echo("(zac)--")

eval(file_get_contents("../2/reg.txt"));

//echo("--(kon1)");
mysql_query("INSERT INTO towns2_uziv (id,typ,meno,ali,body,poradie,heslo,lista,aktivita,farba,vojaci,vojacit,hlbudovaxc,hlbudovayc,jedlo,prachy,kamen,zelezo,drevo) 
VALUES ($pocet,9,'".meno_g()."',0,100,$poradie,'heslo','".file_get_contents("../2/casti/lavalista/zakladne.txt")."','".time()."','user','.1(v10,s0,k0,r0,j0,t0,z0,b0,a0,e0,n0,d0,m0)','.1(v0,s0,k0,r0,j0,t0,z0,b0,a0,e0,n0,d0,m0)',$xcreg,$ycreg,5000,5000,5000,5000,5000)");
mysql_query("UPDATE towns2 SET zivot=(SELECT zivot from towns2_uni WHERE towns2_uni.obrazok='hlbudova'), cas=1, obrazok = 'hlbudova', vlastnik = '$pocet' WHERE xc = ".($xcreg+0)." AND  yc = ".($ycreg+0));
//echo("--(kon2)");
//mysql_query("UPDATE towns2 SET zivot=(SELECT zivot from towns2_uni WHERE towns2_uni.obrazok='dom'), cas=1, obrazok = 'dom', vlastnik = '$pocet' WHERE xc = ".($xcreg+0)." AND  yc = ".($ycreg+1));
//mysql_query("UPDATE towns2 SET zivot=(SELECT zivot from towns2_uni WHERE towns2_uni.obrazok='sklad'), cas=1, obrazok = 'sklad', vlastnik = '$pocet' WHERE xc = ".($xcreg+1)." AND  yc = ".($ycreg+0));
//mysql_query("UPDATE towns2 SET zivot=(SELECT zivot from towns2_uni WHERE towns2_uni.obrazok='tdrevo'), cas=1, obrazok = 'tdrevo', vlastnik = '$pocet' WHERE xc = ".($xcreg+1)." AND  yc = ".($ycreg+1));
//mysql_query("UPDATE towns2 SET zivot=(SELECT zivot from towns2_uni WHERE towns2_uni.obrazok='tkamen'), cas=1, obrazok = 'tkamen', vlastnik = '$pocet' WHERE xc = ".($xcreg+1)." AND  yc = ".($ycreg-1));
dc("towns2_uziv");
dc("towns2");
dcmapa($xcreg,$xcreg);

}
//==================================================================================================================================================
function m_bot(){
$u = premhnet("SELECT id FROM towns2_uziv WHERE typ = '9' ORDER BY RAND()");
smazatuziv($u[0]["id"]);
}
//==================================================================================================================================================
}
//echo("toto_1_ano");
foreach(premhnet("SELECT * from towns2_botdis WHERE cas<".time()." order by cas") as $row){
/*if(hnet("towns2_tem","SELECT tema FROM towns2_tem where tema='".$row["to"]."'")){
echo("exist-");
}{
echo("noexist-");*/
mysql_query("INSERT INTO towns2_tem ( `id` , `typ` , `sekce` , `tema` ) VALUES (".maxid("towns2_tem").",1,7,'".$row["to"]."')");	
dc("towns2_tem");
//}
$ui = premhnet("SELECT id FROM towns2_tem WHERE tema = '".$row["to"]."'");
$idtem = $ui[0]["id"];
mysql_query("INSERT INTO towns2_dis ( `id` , `tema` , `nadpis` , `meno` , `text` ) VALUES (".maxid("towns2_dis").",".$idtem.",'".$row["nadpis"]."',".$row["od"].",'".$row["text"]."')");	
mysql_query("DELETE FROM towns2_botdis WHERE nadpis = '".$row["nadpis"]."'");
mysql_query("DELETE FROM towns2_tem WHERE (SELECT count(id) from towns2_dis WHERE tema = towns2_tem.id)= 0");
dc("towns2_botdis");
dc("towns2_dis");
}
//----------------------------------------------
//echo("toto_2_ano");

$botlimiter = file_get_contents("../2/cron/botlimiter.txt");
$botpocet = premhnet("SELECT count(1) FROM towns2_uziv WHERE typ = '9'");
$botpocet = $botpocet[0]["count(1)"];
echo("toto_2_p_ano");
if($botlimiter > $botpocet){ p_bot(); }
echo("toto_2_m_ano");
if($botlimiter < $botpocet){ m_bot(); }

//echo("toto_3_ano");

$plusn = 0;
foreach(premhnet("SELECT id FROM towns2_uziv WHERE typ = '9'") as $row){
echo($row["id"]);
if(rand(1,100/*288*/) == 5){
echo(" - 1");
onebot($row["id"]);
$plusn = $plusn + 1;
}
echo("<br />");
//onebot(186);
}

echo("toto_4_ano");

if($plusn != 0){
prevest($plusn);
echo("<br />na WS:".$plusn);

}

echo("<br />All good.");
?>