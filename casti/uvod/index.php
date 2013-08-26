<?php
if(!$no_ss){session_start();}
$_SESSION["roota"] = $root;
//---------------------------------
if(time()<1230073200){
if($_POST["hesloxcycttwt"]){ $_SESSION["hesloxcycttwt"] = $_POST["hesloxcycttwt"]; }
if($_SESSION["hesloxcycttwt"] != "idonotknowx" and !$no_c){

function pocitadlo_ine($a){
$b=$a;
$a=rand(111111,999999);
echo("<span id=\"pocitadlo$a\">$b</span>
<script type=\"text/javascript\">
theBigDayx1$a = new Date();
casx1$a = Math.ceil((theBigDayx1$a.getTime()/1000)-0.99999999999999999);
casx1$a = document.getElementById(\"pocitadlo$a\").innerHTML - casx1$a;
window.setInterval(\"casx1$a=casx1$a-1; if(casx1$a < 1){ casx1$a = '1'; } cas2x1$a = casx1$a; hodx1$a = Math.ceil((cas2x1$a/3600)-0.99999999999999999); cas2x1$a=cas2x1$a-(3600*hodx1$a); minx1$a = Math.ceil((cas2x1$a/60)-0.99999999999999999); cas2x1$a=cas2x1$a-(60*minx1$a); secx1$a = cas2x1$a; document.getElementById(\\\"pocitadlo$a\\\").innerHTML=hodx1$a.toString()+\\\":\\\"+(minx1$a).toString()+\\\":\\\"+(secx1$a-1).toString(); \", 1000);
</script>");
}

?>
<h2>do spuštění zbývá
<?php
pocitadlo_ine("1230073200");
die("</h2><form method=\"post\" action=\"\"><b>heslo: <b/> <input name=\"hesloxcycttwt\" type=\"password\" id=\"hesloxcycttwt\" />  <input type=\"submit\" name=\"Submit\" value=\"OK\"></form>"); }
//--------------------------------- 
if($_SESSION["id"]){
if($_GET["glob_sc"] == "1"){header('Location: '.gv("?dir=casti/mapa/uniindex.php&amp;glob_sc=1")); }
if($_GET["glob_sc"] == "2"){header('Location: '.gv("?dir=casti/aliance/index.php&amp;glob_sc=2")); }
if($_GET["glob_sc"] == "3"){header('Location: '.gv("?dir=casti/hraci/index.php&amp;glob_sc=3")); }
if($_GET["glob_sc"] == "4"){header('Location: '.gv("?dir=casti/diskuse/fora.php&amp;glob_sc=4")); }
if($_GET["glob_sc"] == "5"){header('Location: '.gv("?dir=casti/suroviny/index.php&amp;glob_sc=5")); }
if($_GET["glob_sc"] == "6"){header('Location: '.gv("?dir=casti/utoky/index.php&amp;glob_sc=6")); }
if($_GET["glob_sc"] == "7"){header('Location: '.gv("?dir=casti/zpravy/index.php&amp;glob_sc=7")); }
}else{
if($_GET["glob_sc"] == "1"){header('Location: '.gv("?dirn=1&amp;glob_sc=1")); }
if($_GET["glob_sc"] == "2"){header('Location: '.gv("?dirn=2&amp;glob_sc=2")); }
if($_GET["glob_sc"] == "3"){header('Location: '.gv("?dirn=3&amp;glob_sc=3")); }
}}
//---------------------------------
function contentzprac($buffer){
//$buffer = str_replace("towns2_","ttwns",$buffer);
$buffer = str_replace("\r\n"," ",$buffer);
  //$buffer = iconv('UTF-8', 'ASCII', $buffer);
  //$buffer = urlencode($buffer);
  /*foreach(str_split($buffer) as $char){
  if($return = strtr($char,"áčďéěíľňóřšťúůýžÁČĎÉĚÍĽŇÓŘŠŤÚŮÝŽ","acdeeilnorstuuyzACDEEILNORSTUUYZ")  == $char){
  $xbuffer = $xbuffer."%".strtoupper(dechex(ord($char)));
  }else{
  $xbuffer = $xbuffer.$char;
  }
  }
  $buffer = $xbuffer;
  //$buffer = asc_shift($buffer,4);
  $buffer='
<!doctype html public "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link href="encdec.css" rel="stylesheet" type="text/css">


<script language="javascript">

document.write(unescape("'.$buffer.'ččžýáí"));

</script>
</head>
</html>
';
	$buffer = str_replace("
"," ",$buffer);*/
//$buffer = strip_tags($buffer);
return($buffer);
}
//ob_start("contentzprac");
?>
<?php
//---------------------gets-------------------------------------
function gv($a = "?"){
$rndd = rand(1,9999);
$pa = $a;
$a = substr($a , 1);
$a = str_replace("&amp;","&",$a);
$b = 1;
foreach(split("[&=]",$a) as $row){
//----------------------------------------
if($b == 1){
$rowx = $row;
$b = 2;
}else{
$_SESSION["gets"][md5($a.$rndd)][$rowx] = $row;
//echo("$rowx is $row<br/>");
$b = 1;
}
//echo($row);
//----------------------------------------
}
return("?ww1bx8=".md5($a.$rndd));
}

function myget(){
$a = ($_SESSION["gets"][($_GET["ww1bx8"])]);
//$_SESSION["gets"] = array();
return($a);
}
//-------------------------
//echo("sss");
//print_r($_SESSION);
$_MYGET = myget();
//print_r($_MYGET);
//----------------------------------------------------------
//ini_set("display_errors","off");
//ini_set("register_globals","0");
if(!$nocontroling){
if(!$_SESSION["rand"]){
$_SESSION["rand"] = rand(111111111,999999999);
}
//if(!$noflile){
//$contents = $_SERVER["REMOTE_ADDR"].$_SESSION["rand"]."-".time();
//if(file_get_contents($root."lastip.txt") == $contents){  header('Refresh: 0;'); exit; }
//file_put_contents($root."lastip.txt",$contents);
//}


if($_SESSION["id"]){
$tajm = intval(time()/3600);
$fajl = $root."index/3x".$tajm."x".$_SESSION["id"].".txt";
$cont = 0;

if(file_exists($fajl)){
$cont = file_get_contents($fajl);
}

if($cont>200){
//session_destroy();
die("Prekrocil jste maximalni pocet obnoveni(200) za hodinu.");
}
file_put_contents($fajl,$cont+1);

}

//if($_SESSION["antihack"] == time()){
//die();
//}
//$_SESSION["antihack"] = time();

//echo($_SERVER["REMOTE_ADDR"]);
}

define(map_x,250);
define(map_y,250);

if(!mysql_pconnect("mysql5_host","towns_cz","heslo190077")){
die("Databáze je nefunkèní!");
}
//mysql_query("SET NAMES 'utf8'");
mysql_set_charset("utf8");
/*mysql_query("SET NAMES 'utf8'")*/
if(!mysql_select_db("towns_cz")){
$ct = file_get_contents("/home/alcatraz/hosts/cz/towns2_/www/logpadu.txt");
file_put_contents("/home/alcatraz/hosts/cz/towns2_/www/logpadu.txt",$ct."\n".time()." -".$_SESSION["id"]." -".$_SERVER["SCRIPT_FILENAME"]." - ".$_SERVER["REMOTE_ADDR"]." - ".$_SERVER["HTTP_USER_AGENT"]." ");
//die("Prekrocil jste maximalni pocet obnoveni(200) za hodinu.");
die("Omlouvam se, ale web je docasne pretizen, bude fungovat do hodiny.");
}

//if($_MYGET["lang"]){
//$_SESSION["lang"] = $_MYGET["lang"];
//}
//if(!$_SESSION["lang"]){
//$_SESSION["lang"] = "cz";
//}
//if($_MYGET["dsgx"]){
//$_SESSION["dsgx"] = $_MYGET["dsgx"];
//}
//if(!$_SESSION["dsgx"]){
//$_SESSION["dsgx"] = "standart";
//}
//echo($_SESSION["lang"]);
//if(!$noflile){
//echo($_SESSION["lang"]."-)");
//eval(file_get_contents($root."casti/jazyk/cz.txt"));
//}

if($_SESSION["id"]){
$_SESSION["ali"] = hnet("towns2_uziv","SELECT ali FROM towns2_uziv WHERE ppp AND id = ".$_SESSION["id"]);
}else{
$_SESSION["ali"]="0";
}


//$odpoved = mysql_query("SELECT * FROM towns2_possur WHERE cas<".time());

//-----------------------------------------------------------------------------------------------------



function dcmapa($xc,$yc){
//echo("-");
mysql_query("UPDATE towns2 SET tmp = (SELECT skupina FROM towns2_uni WHERE towns2_uni.obrazok = towns2.obrazok LIMIT 0,1) WHERE xc='".$xc."' AND yc='".$yc."'");
dc("towns2");	
$xc = ((intval(($xc-1)/10))*10)+1;
$yc = ((intval(($yc-1)/10))*10)+1;
//echo("index/mapa10zoom".$xc."xc".$yc."yc.txt");
if(file_exists($_SESSION["roota"]."index/mapa10zoom".$xc."xc".$yc."yc.txt")){
unlink($_SESSION["roota"]."index/mapa10zoom".$xc."xc".$yc."yc.txt");
}
//echo("index/mapa10zoom".$xc."xc".$yc."yc.txt");
}



function dc($tabulka){
deletecash($tabulka);
}
function deletecash($tabulka){
$files = glob($_SESSION["roota"]."index/$tabulka-*.txt");
if($files){
foreach ($files as $filename) {
unlink($filename);
}
}
$files = glob($_SESSION["roota"]."index/2$tabulka-*.txt");
if($files){
foreach ($files as $filename) {
unlink($filename);
}
}
$files = glob($_SESSION["roota"]."index/3$tabulka-*.txt");
if($files){
foreach ($files as $filename) {
unlink($filename);
}
}
}
class index {
private $tabulka = "";
private $dotaz = "";
private $kod = "";
private $zaciatok = "";
private $koniec = "";
private $nic = "";
private $pridavok = "";
private $zpridavok = "";

function __construct($tabulka,$dotaz,$kod="",$zaciatok="",$koniec="",$nic="",$pridavok="",$zpridavok="") {
$this->tabulka = $tabulka;
$this->dotaz = $dotaz;
$this->kod = $kod;
$this->zaciatok = $zaciatok;
$this->koniec = $koniec;
$this->nic = $nic;
$this->pridavok = $pridavok;
$this->zpridavok = $zpridavok;
}

function show($limit = "0,9999",$where = "1") {

if(!file_exists($_SESSION["roota"]."index/".$this->tabulka."-".md5($this->dotaz."$where LIMIT ".$limit.$this->pridavok).".txt")){
$odpoved = mysql_query(str_replace("ppp",$where,$this->dotaz." LIMIT ".$limit));
if(mysql_num_rows($odpoved) != 0){
eval("\$stream = \$stream.(\"$this->zaciatok\");");
eval($this->zpridavok);
while ($row = mysql_fetch_array($odpoved)) {
eval($this->pridavok);
eval("\$stream = \$stream.(\"$this->kod\");");
}
eval("\$stream = \$stream.(\"$this->koniec\");");
mysql_free_result($odpoved);
}else{
eval("\$stream = \$stream.(\"$this->nic\");");
}
file_put_contents($_SESSION["roota"]."index/".$this->tabulka."-".md5($this->dotaz."$where LIMIT ".$limit.$this->pridavok).".txt",$stream);
}
echo(file_get_contents($_SESSION["roota"]."index/".$this->tabulka."-".md5($this->dotaz."$where LIMIT ".$limit.$this->pridavok).".txt"));
}
//-------------------------------------------
function get($where = "1") {
$limit = "a";
if(!file_exists($_SESSION["roota"]."index/2".$this->tabulka."-".md5($this->dotaz."$where 2LIMIT ".$limit.$this->pridavok).".txt")){
/*echo*/$odpoved = mysql_query(str_replace("ppp",$where,$this->dotaz)." LIMIT 0,1");
//echo(str_replace("ppp",$where,$this->dotaz)." LIMIT 0,1");
if(mysql_error()){
echo("<br/>");
echo(mysql_error());
echo(" - ");
echo(str_replace("ppp",$where,$this->dotaz)." LIMIT 0,1");
echo("<br/>");
}
//while ($row = mysql_fetch_array($odpoved)) {
$stream = serialize(mysql_fetch_array($odpoved));
mysql_free_result($odpoved);
//}
file_put_contents($_SESSION["roota"]."index/2".$this->tabulka."-".md5($this->dotaz."$where 2LIMIT ".$limit.$this->pridavok).".txt",$stream);
}
return unserialize(file_get_contents($_SESSION["roota"]."index/2".$this->tabulka."-".md5($this->dotaz."$where 2LIMIT ".$limit.$this->pridavok).".txt"));
}
//-------------------------------------------
function get2($limit = "0,9999",$where = "1") {
if(!file_exists($_SESSION["roota"]."index/3".$this->tabulka."-$limit".md5($this->dotaz."$where 2LIMIT ".$limit.$this->pridavok).".txt")){
/*echo*/$odpoved = mysql_query(str_replace("ppp",$where,$this->dotaz)." LIMIT ".$limit);
//echo (str_replace("ppp",$where,$this->dotaz)." LIMIT ".$limit);
echo(mysql_error());
$i = -1;
$stream = array();
while ($row = mysql_fetch_array($odpoved)) {
$i = $i+1;
$stream[$i] = $row;
}
$stream = serialize($stream);
mysql_free_result($odpoved);
file_put_contents($_SESSION["roota"]."index/3".$this->tabulka."-$limit".md5($this->dotaz."$where 2LIMIT ".$limit.$this->pridavok).".txt",$stream);
}
return unserialize(file_get_contents($_SESSION["roota"]."index/3".$this->tabulka."-$limit".md5($this->dotaz."$where 2LIMIT ".$limit.$this->pridavok).".txt"));
}
}


//$tabulka,$dotaz,$kod,$zaciatok,$koniec,$nic,$pridavok
$_SESSION["object_diskuse"] = new index("towns2_tem","SELECT tema,id,(SELECT count(id) from towns2_dis WHERE tema = towns2_tem.id) from towns2_tem WHERE ppp AND (sekce<50 OR sekce=100+".$_SESSION["ali"].") order by id desc","<a href=\\\"\\\".gv('?dir=casti/diskuse/prispevky.php&tema=\'.\$row[\"id\"].\'').\\\"\\\">\".\$row[\"tema\"].\"</a>(\".\$row[2].\")<br />");
$_SESSION["object_u_id"] = new index("towns2_uziv","SELECT id FROM towns2_uziv WHERE ppp UNION select 0");
$_SESSION["object_m_id"] = new index("towns2_mes","SELECT (SELECT uzivatel FROM towns2_mesuziv where mesto=towns2_mes.id LIMIT 0,1) FROM towns2_mes WHERE ppp UNION select 0");
$_SESSION["object_prevod_u_na_m"] = new index("towns2_mesuziv","SELECT mesto FROM towns2_mesuziv where ppp");
$object_nejhraci = new index("towns2_uziv","select meno from towns2_uziv WHERE ppp order by body desc,meno","\".\$row[\"meno\"].\"<br/>");
$object_nejali = new index("towns2_ali","select meno from towns2_ali WHERE ppp order by body desc,meno","\".\$row[\"meno\"].\"<br/>");
$object_nejmes = new index("towns2_mes","select meno from towns2_mes WHERE ppp order by body desc,meno","\".\$row[\"meno\"].\"<br/>");

//$object_test = new index("towns2_","select * from towns2_ WHERE ppp");
//$vysledok = ($object_test -> get("1"));
//echo($vysledok[1]);
//$_SESSION["object_suroviny"] = new index("towns2_uziv"
//----------------------------------------------------------------------------------------------------------------------------------------


function zformatovat($a){ 
        $a = StrRev("".$a); 
        $zh=""; 
        for ($i=0; $i<StrLen($a); $i++) 
        { 
            $zh.=$a[$i]; 
            if (($i+1)%3==0) $zh.= ";psbn&"; 
        } 
        $a = StrRev("".$zh); 
        if ($a[0]=='&')  
                $a = SubStr ($a,6); 
        return $a; 
}
//---------------------------------------------------------------------------------------------------------------------------

function aktivita($a){
//eval(file_get_contents("casti/jazyk/".$_SESSION["lang"].".txt"));
$odpoved = hnet("towns2_uziv","select aktivita from towns2_uziv where id = ".$a);
//$odpoved =mysql_query("select aktivita from towns2_uziv where id = ".$a);
//while ($row = mysql_fetch_array($odpoved)) {
//----------------------------------------
if((time() - $odpoved) < 300){
return("<div class=\"online\">Online</div>");
}
if((time() - $odpoved) < 3600){
return("<div class=\"xchotina\">Hodina</div>");
}
if((time() - $odpoved) < 86400){
return("<div class=\"xten\">Den</div>");
}
if((time() - $odpoved) < 604800){
return("<div class=\"xdyten\">Týden</div>");
}
return("<div class=\"xoffline\">Neaktivní</div>");
//----------------------------------------
//}
//mysql_free_result($odpoved);
}
//---------------------------------------------------------------------------------------------------------------------------

function surovinanew($hrac,$surovina,$co,$kolko,$nod=""){
$tmp = hnet("towns2_uziv","SELECT ".$surovina." FROM towns2_uziv WHERE ppp AND id=".$hrac);
//echo($tmp);
if($co == "+"){
$tmp = $tmp+$kolko;
}
if($co == "-"){
$tmp = $tmp-$kolko;
}
mysql_query("UPDATE towns2_uziv SET ".$surovina." = ".$tmp." WHERE id = '".$hrac."'");
if(!$nod){ dc("towns2_uziv"); }
}
//---------------------------------------------------------------------------------------------------------------------------

function zsur($a,$b,$cc = "dífult"){
if($cc=="dífult"){ $cc = $_SESSION["id"]; }
if($b < 0){ chyba3(); }
$c = "";
if((hnet("towns2_uziv","select $a from towns2_uziv where id = '".$cc."'")-$b)+1>0){
$c = "1";
}
return($c);
}
//---------------------------------------------------------------------------------------------------------------------------

function convert($a){
$a=htmlspecialchars($a);
$a=nl2br($a);
$z   = array("diskuse((",")-(", "))");
$do  = array("<a href=\"".gv("?dir=casti/diskuse/prispevky.php&tema=")."", "\">" ,"</a>");
//$do  = array("$_SESSION['voj", "; $_SESSION['voj", ";");
$a = str_replace($z, $do, $a);
//----------------------------------------------------------------------------------
$zzz = "<img src=\"casti/diskuse/obrazky/";
$kkk = ".gif\" width=\"15\" height=\"15\" />";
$z   = array(":-)",":)",";)",":-(","/*01*/","/*02*/");
$do  = array($zzz."1$kkk",$zzz."2$kkk",$zzz."3$kkk",$zzz."4$kkk",$zzz."5$kkk",$zzz."6$kkk");
//$do  = array("$_SESSION['voj", "; $_SESSION['voj", ";");
$a = str_replace($z, $do, $a);
return($a);
}
//---------------------------------------------------------------------------------------------------------------------------
function cenzura($a){
//$z   = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
//$do  = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
//$do  = array("$_SESSION['voj", "; $_SESSION['voj", ";");
//$a = str_replace($z, $do, $a);

$z   = array("hajzl","hovno","kurv","blbec","magor","shit","debil","hovado","píč","prdel","gej","gay","kokot");
//$do  = array("*****","*****","****","*****","*****","****","*****","******","***","*****","***","***","*****");
$do  = "/cenzurováno/";
//$do  = array("$_SESSION['voj", "; $_SESSION['voj", ";");
$a = str_replace($z, $do, $a);
return($a);
}
//---------------------------------------------------------------------------------------------------------------------------


function profil($a){
$odpoved = hnet2("towns2_uziv","select meno,farba from towns2_uziv WHERE id='".$a."'");
$odpoved = $odpoved[0];
$meno = $odpoved[0];
$farba = $odpoved[1];
//$odpoved =mysql_query("select meno,typ,farba from towns2_uziv WHERE id='".$a."'");
//while ($row = mysql_fetch_array($odpoved)) {	 	 	 
//}
return(profilid($a,$meno,$farba));
}
//---------------------------------------------------------------------------------------------------------------------------
function profilid($a,$meno,$farba){
if(!$meno){ if($a = 31415){ return("Towns"); return("Neexistující uživatel"); } }
$farba = str_replace("user",htmlspecialchars($meno),$farba);
return("<a href=\"".gv("?dir=casti/hraci/index.php&amp;submenu=3&amp;id=$a")."\">$farba</a>");
}

//---------------------------------------------------------------------------------------------------------------------------

function typuziv($a){
//eval(file_get_contents("casti/jazyk/cz.txt"));

 	if($a == "1"){ $typ = "Hlavní Admin"; }
 	if($a == "2"){ $typ = "Admin1"; }
 	if($a == "3"){ $typ = "Admin2"; }
 	if($a == "4"){ $typ = "Admin3"; }
 	if($a == "5"){ $typ = "VIP uživatel"; }
 	if($a == "6"){ $typ = "normální"; }
 	if($a == "7"){ $typ = "neověřený"; }
 	if($a == "8"){ $typ = "blokovaný"; }
	if($a == "9"){ $typ = "normální "; }
return($typ);
}
//---------------------------------------------------------------------------------------------------------------------------
function profila($a){
$meno = hnet("towns2_ali","select meno from towns2_ali WHERE id='".$a."'");
//$odpoved =mysql_query("select meno from towns2_ali WHERE id='".$a."'");
//while ($row = mysql_fetch_array($odpoved)) {	 	 	 
// 	$meno = $row["meno"];
//}
return("<a href=\"".gv("?dir=casti/hraci/profila.php&amp;id=$a")."\">$meno</a>");
}
//---------------------------------------------------------------------------------------------------------------------------

function chyba1($a){ echo("<div style=\"background:#FF0000\">$a</div>"); }
function chyba2($a){ echo("<div style=\"background:#66CC00\">$a</div>"); }
function chyba3(){ die("<div style=\"position:absolute; left:0px; top:0px; width:10000px; height:10000px; font-size: 36px; background-color: #FFFFFF; z-index:100000;\"></div><script type=\"text/javascript\">history.back();</script></div>"); }
function ramcek($a,$farba){ echo("<div style=\"background:$farba\">$a</div>"); }
function ramcekh1($a){ echo("<h1>$a</h1>"); }
function refresh($a = "dífult"){ if($a == "dífult"){ echo("<script type=\"text/javascript\">location.reload(true);</script>"); }else{ echo("<script type=\"text/javascript\">location.assign(\"$a\");</script>"); }}
//---------------------------------------------------------------------------------------------------------------------------
function den(){
$h = date("G")+1;
if($h > 6 and $h < 19){
return("den");
}else{
return("noc");
}
}
//---------------------------------------------------------------------------------------------------------------------------

function zcas($cas){
list($year, $month, $day, $hour, $minute, $second) = split('[-: ]', $cas);

if(date("d:m:Y",time()-86400*2) == "$day:$month:$year"){
return("předevčírem v $hour:$minute");
}
if(date("d:m:Y",time()-86400) == "$day:$month:$year"){
return("včera v $hour:$minute");
}
if(date("d:m:Y") == "$day:$month:$year"){
return("dnes v $hour:$minute");
}
return("$day:$month:$year $hour:$minute");
}
//---------------------------------------------------------------------------------------------------------------------------

function zprava($id,$predmet,$text,$babbcdeg = "dífult"){
if($babbcdeg=="dífult"){ $babbcdeg = $_SESSION["id"]; }
$pocet = hnet("towns2_zpr","SELECT MAX(id) FROM towns2_zpr")+1;
mysql_query("INSERT INTO towns2_zpr VALUES($pocet ,'".$babbcdeg."', '".$id."', '0',CURRENT_TIMESTAMP , '".$predmet."', '".$text."')");
dc("towns2_zpr");
}
//---------------------------------------------------------------------------------------------------------------------------

function qpxy($xc,$yc){
return("($xc,$yc)");
}
//---------------------------------------------------------------------------------------------------------------------------

function qpxyx($xc,$yc,$text){
return("($xc,$yc) <b>$text </b>".hnet("towns2","SELECT (SELECT meno FROM towns2_uziv WHERE id=vlastnik) FROM towns2 WHERE xc=$xc AND yc=$yc")."");
}
//---------------------------------------------------------------------------------------------------------------------------

function alog($a,$b){
mysql_query("INSERT INTO `towns2_log` (cas,ip,user,co) VALUES ('".time()."','".$_SERVER["REMOTE_ADDR"]."','".$_SESSION["id"]."','$a')");
if($b){
mail("hejpal@post.cz","log","$a");
}
}

//---------------------------------------------------------------------------------------------------------------------------


function themes($where = "1",$limit="0,9999"){
//echo("SELECT meno,id WHERE ".$where." FROM towns2_tem");
foreach(hnet2("towns2_tem","SELECT tema,id FROM towns2_tem WHERE ".$where." AND (sekce < 15 or sekce=".($_SESSION["ali"]+100).") ORDER BY id desc",$limit) as $row){
echo("<a href=\"".gv("?dir=casti/diskuse/prispevky.php&tema=".$row["id"])."\">".$row["tema"]."</a><br/>");
}
//$_SESSION["object_diskuse"]->show($limit,$where);
//$odpoved =mysql_query("SELECT tema,id,(SELECT count(id) from towns2_dis WHERE tema = towns2_tem.id) from towns2_tem WHERE $where order by id desc LIMIT 0,$limit");
//while ($row = mysql_fetch_array($odpoved)) {
//echo("
//<a href=\"?dir=casti/diskuse/prispevky.php&tema=".$row["id"]."\">".$row["tema"]."</a>(".$row[2].")<br />");
//}
//mysql_free_result($odpoved);
}

//---------------------------------------------------------------------------------------------------------------------------

function submenu($napisy,$odkazy,$typy = array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),$chyby = array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","")){
$_MYGET = myget();
$i = 0;
echo("<div align=\"center\"><div id=\"menu3\"> <span class=\"submenu\">");
foreach($napisy as $napis){
$icko = "";
$noa = "<a href=\"".gv("?submenu=".($i+1)."")."\">";
$nob = "</a>";
if($napisy[$i+1]){ $icko = " | "; }
if($typy[$i] == 2){ $dopl = ""; if($chyby[$i]){ $dopl = "onClick=\"alert('".$chyby[$i]."')\""; } $noa = "<strike $dopl>"; $nob = "</strike>"; }
if($i+1 == $_MYGET["submenu"] or (!$_MYGET["submenu"] and $i == 0)){ $noa = "<b>"; $nob = "</b>"; }
if($typy[$i] != 3){ echo("$noa$napis$nob$icko"); }
$i = $i+1;
}
echo("</span></div></div>");

$req = 1;
if($_MYGET["submenu"]){ $req = $_MYGET["submenu"]; }
if($typy[$req-1] == 2 OR $typy[$req-1] == 3){ chyba3(); }

//eval(file_get_contents($root."casti/jazyk/".$_SESSION["lang"].".txt"));
require($odkazy[$req-1]);
}

//---------------------------------------------------------------------------------------------------------------------------

function zadajali($value = "dífult",$doplnok=""){
    if($value == "dífult"){ $value = hnet("towns2_ali","SELECT meno FROM towns2_ali WHERE ppp AND id = ".$_SESSION["ali"]); }
    echo("<b>aliance:</b> $doplnok<input type=\"text\" name=\"zadanyali\" value=\"".$value."\" />");
}

//---------------------------------------------------------------------------------------------------------------------------

function vyberali(){
return hnet("towns2_ali","SELECT id FROM towns2_ali WHERE ppp AND meno = '".$_POST["zadanyali"]."'");
}

//---------------------------------------------------------------------------------------------------------------------------

function zadajhraca($a = "1",$doplnok="",$hovno="0",$value=""){
	 $a = 1;
    if($a == "1"){ $b = "uživatel:"; }else{ $b = "město:"; }
    if($hovno){ $b = ""; }
    echo("<b>$b</b> $doplnok<input type=\"text\" name=\"zadanyhrac\" value=\"".$value."\" /><input type=\"hidden\" name=\"zadanytyp\" value=\"$a\" />");
}

//---------------------------------------------------------------------------------------------------------------------------

function vyberhraca(){
//if($_POST["zadanytyp"] == "1"){ $tmp=$_SESSION["object_u_id"]->get("meno = '".$_POST["zadanyhrac"]."'"); }else{ $tmp=$_SESSION["object_m_id"]->get("meno = '".$_POST["zadanyhrac"]."'"); }
//$tmp = $tmp[0];
if(is_numeric($_POST["zadanyhrac"])){
//	echo("ano");
$tmp = $_POST["zadanyhrac"]+0;
}else{
//		echo("ne");
$tmp = hnet("towns2_uziv","SELECT id FROM towns2_uziv WHERE meno='".$_POST["zadanyhrac"]."'");
}
return $tmp;
}

//---------------------------------------------------------------------------------------------------------------------------

function zadajsurku($jaku,$limit = "dífult",$doplnok="",$value = "0"){
if($limit == "dífult"){
$surky=new index("towns2_uziv","select prachy,jedlo,kamen,zelezo,drevo,body from towns2_uziv where ppp");
$surkyu = $surky->get("id = '".$_SESSION["id"]."'");
$limit = $surkyu[$jaku];
}
if($jaku == "prachy"){ $jakua = "peníze"; }
if($jaku == "jedlo"){ $jakua = "jídlo"; }
if($jaku == "kamen"){ $jakua = "kámen"; }
if($jaku == "zelezo"){ $jakua = "železo"; }
if($jaku == "drevo"){ $jakua = "dřevo"; }
echo("<b>$jakua:</b> $doplnok<input type=\"text\" name=\"zadane$jaku\" value=\"$value\" /> (".(zformatovat($limit)).")");
}

//---------------------------------------------------------------------------------------------------------------------------

function vybersurku($jaku,$limit = "dífult"){
if($limit == "dífult"){
$surky=new index("towns2_uziv","select prachy,jedlo,kamen,zelezo,drevo,body from towns2_uziv where ppp");
$surkyu = $surky->get("id = '".$_SESSION["id"]."'");
$limit = $surkyu[$jaku];
}
$tmp = $_POST["zadane".$jaku];
if($tmp < 0){ $tmp = 0; }
if($tmp > $limit){ $tmp = $limit; }
return($tmp);
}

//---------------------------------------------------------------------------------------------------------------------------

function zadajxcyc($xc="dífult", $yc="dífult"){
if($xc == "dífult"){ $xc=$_POST["zadajxc"]; }
if($yc == "dífult"){ $yc=$_POST["zadajyc"]; }
echo("(<input type=\"zadajxc\" name=\"zadajxc\" size=\"3\" value=\"$xc\" />,<input type=\"text\" name=\"zadajyc\" size=\"3\" value=\"$yc\" />)");
}

//---------------------------------------------------------------------------------------------------------------------------
function vyberxcyc($co="1"){
if($co == "1"){
return $_POST["zadajxc"];
}else{
return $_POST["zadajyc"];
}
}

//---------------------------------------------------------------------------------------------------------------------------

function pocitadlo($a){
$b=$a;
$a=rand(111111,999999);
return("<span id=\"pocitadlo$a\">$b</span>
<script type=\"text/javascript\">
theBigDayx1$a = new Date();
casx1$a = Math.ceil((theBigDayx1$a.getTime()/1000)-0.99999999999999999);
casx1$a = document.getElementById(\"pocitadlo$a\").innerHTML - casx1$a;
window.setInterval(\"casx1$a=casx1$a-1; if(casx1$a < 1){ casx1$a = '1'; } cas2x1$a = casx1$a; hodx1$a = Math.ceil((cas2x1$a/3600)-0.99999999999999999); cas2x1$a=cas2x1$a-(3600*hodx1$a); minx1$a = Math.ceil((cas2x1$a/60)-0.99999999999999999); cas2x1$a=cas2x1$a-(60*minx1$a); secx1$a = cas2x1$a; document.getElementById(\\\"pocitadlo$a\\\").innerHTML=hodx1$a.toString()+\\\":\\\"+(minx1$a).toString()+\\\":\\\"+(secx1$a-1).toString(); \", 1000);
</script>");
}
function pocitadlodo(){
echo(pocitadlo(intval((time()+3600)/3600)*3600));
}

//---------------------------------------------------------------------------------------------------------------------------

function zobrazsur($prachy,$jedlo,$kamen,$zelezo,$drevo){
return("<table border=\"0\" cellpadding=\"1\">
  <tr><td align=\"center\">		
<img src=\"casti/suroviny/desing/prachy.png\" alt=\"prachy\" width=\"17\" height=\"17\" border=\"1\" /> &nbsp; ".zformatovat($prachy)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src=\"casti/suroviny/desing/jedlo.png\" alt=\"jídlo\" width=\"17\" height=\"17\" border=\"1\"> &nbsp; ".zformatovat($jedlo)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src=\"casti/suroviny/desing/kamen.png\" alt=\"kámen\" width=\"17\" height=\"17\" border=\"1\"> &nbsp; ".zformatovat($kamen)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src=\"casti/suroviny/desing/zelezo.png\" alt=\"železo\" width=\"17\" height=\"17\" border=\"1\"> &nbsp; ".zformatovat($zelezo)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src=\"casti/suroviny/desing/drevo.png\" alt=\"drevo\" width=\"17\" height=\"17\" border=\"1\" /> &nbsp; ".zformatovat($drevo)."&nbsp;&nbsp;&nbsp;&nbsp;
</th>
</td>
</tr>
</table>");
}

//---------------------------------------------------------------------------------------------------------------------------

function poslatsurzc($komu,$prachy,$jedlo,$kamen,$zelezo,$drevo,$protect = "",$od = "dífult"){
if($prachy < 0){ chyba3(); }
if($jedlo < 0){ chyba3(); }
if($kamen < 0){ chyba3(); }
if($zelezo < 0){ chyba3(); }
if($drevo < 0){ chyba3(); }
if($od == "dífult"){ $od = $_SESSION["id"]; }

$surky=new index("towns2_uziv","select prachy,jedlo,kamen,zelezo,drevo from towns2_uziv where ppp");
$surkyu = $surky->get("id = '".$od."'");
if($surkyu["prachy"] < $prachy){ return("Nedostatek peněz"); }
if($surkyu["jedlo"] < $jedlo){ return("Nedostatek jídla"); }
if($surkyu["kamen"] < $kamen){ return("Nedostatek kamene"); }
if($surkyu["zelezo"] < $zelezo){ return("Nedostatek železa"); }
if($surkyu["drevo"] < $drevo){ return("Nedostatek dřeva"); }

if($komu){
//echo("SELECT 60*ceil(sqrt(pow(towns2_.xc-towns2_2.xc,2)+pow(towns2_.yc-towns2_2.yc,2))/towns2_.uroven) FROM towns2_, towns2_ towns2_2 WHERE towns2_.obrazok = 'trziste' AND towns2_.vlastnik = '$od' AND towns2_2.obrazok = 'hlbudova' AND towns2_2.vlastnik = '$komu' AND ppp ORDER BY sqrt(pow(towns2_.xc-towns2_2.xc,2)+pow(towns2_.yc-towns2_2.yc,2))");
$cas=new index("towns2","SELECT 60*ceil(sqrt(pow(towns2.xc-towns2_2.xc,2)+pow(towns2.yc-towns2_2.yc,2))/towns2.uroven) FROM towns2, towns2 towns2_2 WHERE towns2.obrazok = 'trziste' AND towns2.vlastnik = '$od' AND towns2_2.obrazok = 'hlbudova' AND towns2_2.vlastnik = '$komu' AND ppp ORDER BY sqrt(pow(towns2.xc-towns2_2.xc,2)+pow(towns2.yc-towns2_2.yc,2))");
$cas = $cas->get("1");
$cas = $cas[0]+time();
mysql_query("UPDATE towns2_uziv SET prachy=prachy-$prachy , jedlo=jedlo-$jedlo , kamen=kamen-$kamen , zelezo=zelezo-$zelezo , drevo=drevo-$drevo WHERE id = $od");
mysql_query("INSERT INTO `towns2_possur` ( `od` , `kam` , `cas` , `prachy` , `jedlo` , `kamen` , `zelezo` , `drevo`, `protect` ) VALUES ('$od', '$komu', '$cas', '$prachy', '$jedlo', '$kamen', '$zelezo', '$drevo','$protect')");
deletecash("towns2_possur");
deletecash("towns2_uziv");
return("Posláno");
}else{
return("Neexistující uživatel");
}
}

//---------------------------------------------------------------------------------------------------------------------------

function hnet($tabulka,$selekt){
$tmp=new index($tabulka,$selekt);
$tmp = $tmp->get("1");
return($tmp[0]);
}

//---------------------------------------------------------------------------------------------------------------------------

function hnet2($tabulka,$selekt,$limit = "0,9999",$nein = ""){
$tmp=new index($tabulka,$selekt);
$tmp = $tmp->get2($limit,"1");
if(!$tmp){
echo($nein);
}
return($tmp);
}

//---------------------------------------------------------------------------------------------------------------------------

function smazatuziv($aky){
mysql_query("UPDATE towns2 SET obrazok='0', vlastnik='1' WHERE vlastnik=".$aky);
mysql_query("UPDATE towns2_ank SET autor='0' WHERE autor=".$aky);
mysql_query("UPDATE towns2_dis SET meno='0' WHERE meno=".$aky);
mysql_query("DELETE FROM towns2_ld WHERE hrac=".$aky);
mysql_query("UPDATE towns2_lista SET autor='0' WHERE autor=".$aky);
mysql_query("UPDATE towns2_log SET user='0' WHERE user=".$aky);
mysql_query("DELETE FROM towns2_possur WHERE od=".$aky." OR kam=".$aky);
mysql_query("DELETE FROM towns2_poz WHERE hrac=".$aky);
mysql_query("UPDATE towns2_sta SET autor='0' WHERE autor=".$aky);
mysql_query("DELETE FROM towns2_uziv WHERE id=".$aky);
mysql_query("DELETE FROM towns2_vym WHERE od=".$aky);
mysql_query("DELETE FROM towns2_zpr WHERE od=".$aky." OR komu=".$aky);
dc("towns2");
dc("towns2_ank");
dc("towns2_dis");
dc("towns2_ld");
dc("towns2_lista");
dc("towns2_log");
dc("towns2_possur");
dc("towns2_poz");
dc("towns2_sta");
dc("towns2_uziv");
dc("towns2_vym");
dc("towns2_zpr");
}

//---------------------------------------------------------------------------------------------------------------------------

function surkyposlane($hrac = "dífult"){
if($hrac == "dífult"){ $hrac = $_SESSION["id"]; }
foreach(hnet2("towns2_possur","SELECT * FROM towns2_possur WHERE od='".$hrac."' OR kam='".$hrac."' ORDER BY cas") as $row){
echo("<b>od:</b> ");
echo(profil($row["od"]));
echo("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
echo("<b>kam:</b> ");
echo(profil($row["kam"]));
echo("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
echo(pocitadlo($row["cas"]));
echo(zobrazsur($row["prachy"],$row["jedlo"],$row["kamen"],$row["zelezo"],$row["drevo"]));
}
}

//---------------------------------------------------------------------------------------------------------------------------
function vlastnikxcyc($xc,$yc){
//echo("SELECT vlastnik FROM towns2 WHERE xc = '".$xc."' AND yc = '".$yc."'<br/>");
return(hnet("towns2","SELECT vlastnik FROM towns2 WHERE xc = '".$xc."' AND yc = '".$yc."'"));	
}
//---------------------------------------------------------------------------------------------------------------------------
function budova($obrazok,$hrac = "dífult"){
if($hrac == "dífult"){ $hrac = $_SESSION["id"]; }
return (hnet("towns2","SELECT COUNT(1) FROM towns2 WHERE obrazok = '".$obrazok."' AND vlastnik = '".$hrac."' AND cas = '1'"));;	
}
?>