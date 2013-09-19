<?php
if(session_id() == '')
{
    session_save_path(__DIR__ . "/../sessions");
}
$root = __DIR__ . "/../";
require_once(__DIR__ . "/../" . "general.php");
require_once(__DIR__ . "/../casti/funkcie/index.php");

mysql_close();
mysql_connect($GLOBALS["db_host"],$GLOBALS["db_user"],$GLOBALS["db_password"]);
mysql_select_db($GLOBALS["db_database"]);

if(!function_exists("prevest")){
function a(){
$tmp = "a".date('G');
$tmp1 = array(
"a0"=> 0.001,
"a1"=> 0.001,
"a2"=> 0.0005,
"a3"=> 0.0005,
"a4"=> 0.0005,
"a5"=> 0.001,
"a6"=> 0.003,
"a7"=> 0.04,
"a8"=> 0.04,
"a9"=>  0.04,
"a10"=>  0.08,
"a11"=>  0.4,
"a12"=>  0.06,
"a13"=>  0.08,
"a14"=> 1,
"a15"=> 1.2,
"a16"=> 1.2,
"a17"=> 1.5,
"a18"=> 2,
"a19"=> 3,
"a20"=> 3,
"a21"=> 3,
"a22"=> 1,
"a23"=> 1,
);
return($tmp1[$tmp]);
}
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
//echo($stream);  */
}
//==================================================================================================================================================
function budova_t($budova){
$row['obrazok'] = $budova;
$postavit = "veza";
//------------------------------------------
if($row['obrazok'] == "sklad"){
$rnd = rand(1,4);
if($rnd == 1){ $postavit = "tdrevo"; }
if($rnd == 2){ $postavit = "tkamen"; }
if($rnd == 3){ $postavit = "tzelezo"; }
}
if($row['obrazok'] == "tdrevo" or $row['obrazok'] == "tkamen" or $row['obrazok'] == "tzelezo"){
$rnd = rand(1,7);
if($rnd == 1){ $postavit = "vlajka"; }
if($rnd == 2){ $postavit = "banka"; }
if($rnd == 3){ $postavit = "dom"; }
if($rnd == 4){ $postavit = "velkydom"; }
if($rnd == 5){ $postavit = "schromazdiste"; }
if($rnd == 6){ $postavit = "kyasarny"; }
if($rnd == 7){ $postavit = "sklad"; }
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
$rnd = rand(1,3);
if($rnd == 1){ $postavit = "sklad"; }
if($rnd == 2){ $postavit = "hradba"; }
if($rnd == 3){ $postavit = "palisada"; }
}
if($row['obrazok'] == "hradba" or $row['obrazok'] == "palisada" or $row['obrazok'] == "0"){
$postavit = "0";
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
mysql_query("UPDATE towns2_uziv SET aktivita='".time()."' WHERE id = ".$id);
dc("towns2_uziv");
//------------------------------------------	
foreach(premhnet("SELECT xc,yc,obrazok,vlastnik FROM towns2 WHERE cas=1 AND vlastnik = '".$id."' ORDER by RAND()") as $row){
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
$ob = budova_t($row["obrazok"]);
mysql_query("UPDATE towns2 SET obrazok = '".$ob."',vlastnik=".$row["vlastnik"]." , cas = 2, casovac = ".time()."+(SELECT casovac2 FROM towns2_uni WHERE towns2_uni.obrazok = '".$ob."'), zivot=(SELECT zivot FROM towns2_uni WHERE towns2_uni.obrazok = '".$ob."') WHERE $podminka");
mysql_query("UPDATE towns2 SET zivot=(SELECT zivot FROM towns2_uni WHERE towns2_uni.obrazok = towns2.obrazok LIMIT 1) WHERE zivot=0");
mysql_query("UPDATE towns2 SET vlastnik='1' WHERE obrazok='0'");
if(rand(1,5) == 1){
echo("-s");
//mysql_query2("UPDATE towns2 SET vlastnik='1' and obrazok='0' WHERE obrazok!='hlbudova' AND vlastnik='".$row["vlastnik"]."'");
}
dc("towns2");
dcmapa($row["xc"]+1,$row["yc"]);
dcmapa($row["xc"],$row["yc"]+1);
dcmapa($row["xc"]-1,$row["yc"]);
dcmapa($row["xc"],$row["yc"]-1);
}
}
//------------------------------------------
/*if(rand(1,2) == 1){
echo("-roz");


	
}*/
//------------------------------------------
$toali = premhnet("SELECT ali FROM towns2_poz WHERE hrac='".$id."' ORDER BY (SELECT body FROM towns2_ali WHERE towns2_ali.id =  towns2_poz.ali)");
$toali = $toali[0]["ali"];
$ali1 = premhnet("SELECT ali FROM towns2_uziv WHERE id='".$id."'");
$ali1 = $ali1[0]["ali"];
$ali1body = premhnet("SELECT COUNT(1) FROM towns2_uziv WHERE ali='".$ali1."'");
$ali1body = $ali1body[0]["COUNT(1)"];
echo($ali1);
echo("/");
echo($toali);
if((!$ali1 or $ali1body=="1") and $toali){
echo("-toali".$toali);
mysql_query("UPDATE towns2_uziv SET ali = ".$toali.", pravomoci='0,0,0,0,0,0', hodnost='' WHERE id='".$id."'");
dc("towns2_uziv");
}
//------------------------------------------
if($ali1){
$aa = premhnet("SELECT pravomoci FROM towns2_uziv WHERE id=".$id);
$aa = $aa[0];
$tmp = split("[,]",$aa["pravomoci"]);
if($tmp[3]=="1"){
$tmp = premhnet("SELECT hlbudovaxc,hlbudovayc FROM towns2_uziv WHERE id='".$id."'");
$tmp = $tmp[0];
$idn = premhnet("SELECT id FROM towns2_uziv WHERE body>2 AND id!=".$id." AND ali!='".$ali1."' ORDER BY sqrt(pow(".$tmp["hlbudovaxc"]."-hlbudovaxc,2)+pow(".$tmp["hlbudovayc"]."-hlbudovayc,2))");
$idn = $idn[0]["id"];
$idn("INSERT INTO `towns2_poz` ( `ali` , `hrac` ) 
VALUES (
 '".$ali1."','".$idn."'
);
", FALSE);
dc("towns2_poz");
echo("-newp:".$idn);	
}
}else{
$meno=premhnet("SELECT meno FROM towns2_uziv WHERE id=".$id);
$meno = $meno[0]["meno"];
if(!premhnet("SELECT id from towns2_ali WHERE meno='".$meno."'")){
if(rand(1,40)==1){
//---------------
$odpoved1 = mysql_query("SELECT MAX(poradie) maxId FROM towns2_ali");
$row1 = mysql_fetch_array($odpoved1);
$pocet1=$row1["maxId"];
mysql_free_result($odpoved1);
$poradie = $pocet1+1;
$odpoved1 = mysql_query("SELECT MAX(id) maxId FROM towns2_ali");
$row1 = mysql_fetch_array($odpoved1);
$pocet1=$row1["maxId"];
mysql_free_result($odpoved1);
$pocet = $pocet1+1;
//---------------
logx("bot_alizal ".$meno);
mysql_query("INSERT INTO `towns2_ali` ( `id` , `meno` , `body` , `poradie`,  `popis`) 
VALUES (
'$pocet', '".$meno."', '0', '$poradie' , ''
);");

mysql_query("UPDATE towns2_uziv SET ali=$pocet, hodnost='president', pravomoci='1,1,1,1,1,1' WHERE id='".$id."'");
dc("towns2_uziv");
dc("towns2_ali");
echo("-newali:".$meno);
//echo("");
}
}
}
//------------------------------------------
$kasarny=premhnet("SELECT 1 FROM towns2 WHERE vlastnik='".$id."' AND obrazok='kyasarny'");
$kasarny = $kasarny[0];
$schroma=premhnet("SELECT 1 FROM towns2 WHERE vlastnik='".$id."' AND obrazok='schromazdiste'");
$schroma = $schroma[0];
if(rand(1,5) == 1 and $kasarny and $schroma){
echo("-utok");
//if(budova("kyasarny") and budova("schromazdiste")){
echo("-a");
$tmp = premhnet("select hlbudovaxc,hlbudovayc,body from towns2_uziv WHERE id='".$id."'");
$row = $tmp[0];
$xc = premhnet("SELECT xc FROM towns2 WHERE vlastnik!='$id' AND vlastnik!='1' AND obrazok!='0' AND obrazok!='hlbudova' ORDER BY sqrt(pow(".$row["hlbudovaxc"]."-xc,2)+pow(".$row["hlbudovayc"]."-yc,2))");
$xc = $xc[0]["xc"];
$yc = premhnet("SELECT yc FROM towns2 WHERE vlastnik!='$id' AND vlastnik!='1' AND obrazok!='0' AND obrazok!='hlbudova' ORDER BY sqrt(pow(".$row["hlbudovaxc"]."-xc,2)+pow(".$row["hlbudovayc"]."-yc,2))");
$yc = $yc[0]["yc"];
$vzdalenost = sqrt(pow($xc-$row["hlbudovaxc"],2)+pow($yc-$row["hlbudovayc"],2));
$vojak = ".1(v".rand(1,$row["body"]).",s0,k0,r0,j0,t0,z0,b0,a0,e0,n0,d0,m0)";
//---------
$ali1 = premhnet("SELECT ali FROM towns2_uziv WHERE id='".$id."'");
$ali1 = $ali1[0]["ali"];
$ali2 = premhnet("SELECT vlastnik FROM towns2 WHERE xc='".$xc."' AND xc='".$yc."'");
$ali2 = $ali2[0]["vlastnik"];
$ali3 = premhnet("SELECT ali FROM towns2_uziv WHERE id='".$ali2."'");
$ali3 = $ali3[0]["ali"];
if($ali1 != $ali3 or $ali1){
/*echo*/mysql_query("INSERT INTO towns2_utok ( `id` , `cas` , `xc` , `yc`, `txc` , `tyc`, `tcas` , `od` , `vojak` , `vzdalenost` ) 
VALUES ('".maxid("towns2_utok")."', '".(time()+rand(3600,5000))."', $xc , $yc, '".$row["hlbudovaxc"]."', '".$row["hlbudovayc"]."', '".time()."' , '$id', '$vojak' , $vzdalenost)");
}
dc("towns2_utok");
//}	
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
//echo("(zac)--");

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
$id = premhnet("SELECT id FROM towns2_uziv WHERE typ = '9' ORDER BY RAND()");
smazatuziv($id[0]["id"]);
}
//==================================================================================================================================================
echo("b");
}
echo("a");
//echo("toto_1_ano");
foreach(premhnet("SELECT * from towns2_botdis WHERE cas<".time()." order by cas") as $row){
/*if(hnet("towns2_tem","SELECT tema FROM towns2_tem where tema='".$row["to"]."'")){
echo("exist-");
}{
echo("noexist-");*/
mysql_query("INSERT INTO towns2_tem ( `id` , `typ` , `sekce` , `tema` ) VALUES (".maxid("towns2_tem").",1,7,'".$row["to"]."')");	
dc("towns2_tem");
//}
$idtem = premhnet("SELECT id FROM towns2_tem WHERE tema = '".$row["to"]."'");
$idtem = $idtem[0]["id"];
mysql_query("INSERT INTO towns2_dis ( `id` , `tema` , `nadpis` , `meno` , `text` ) VALUES (".maxid("towns2_dis").",".$idtem.",'".$row["nadpis"]."',".$row["od"].",'".$row["text"]."')");	
mysql_query("DELETE FROM towns2_botdis WHERE nadpis = '".$row["nadpis"]."'");
mysql_query("DELETE FROM towns2_tem WHERE (SELECT count(id) from towns2_dis WHERE tema = towns2_tem.id)= 0");
dc("towns2_botdis");
dc("towns2_dis");
}
//----------------------------------------------
//echo("toto_2_ano");

$botlimiter = (file_get_contents("../2/cron/botlimiter.txt"));
file_put_contents("../2/cron/botlimiter.txt",$botlimiter+file_get_contents("../2/cron/botplus.txt"));
$botlimiter = intval($botlimiter);
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
if(rand(1,intval(file_get_contents("../2/cron/bot.txt")/a())/*100-288*/) == 1 or $_GET["bot"]==$row["id"]){
echo(" - 1");
onebot($row["id"]);
$plusn = $plusn + 1;
}
echo("<br />");
//onebot(186);
}

echo("toto_4_ano");

if($plusn != 0){
//prevest($plusn);
echo("<br /> -> WS:".$plusn);
}

echo("<br />All good.");
?>