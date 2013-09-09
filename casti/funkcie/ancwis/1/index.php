<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_WARNING );
session_start();
$_SESSION["roota"] = $root;
//---------------------------------
/*if(time()+1 > 1230163200){
$no_c = 1;
}
if($_SESSION["hesloxcycttwt"]!="31415"){
if($_POST["hesloxcycttwt"]){ $_SESSION["hesloxcycttwt"] = $_POST["hesloxcycttwt"]; }
?>
<h3>Tato verze hry se připravuje.</h3>
<h4>Aktuální verze je na <a href=""></a>.</h4>	
	
<?php die("<form method=\"post\" action=\"\"><b>heslo: <b/> <input name=\"hesloxcycttwt\" type=\"password\" id=\"hesloxcycttwt\" />  <input type=\"submit\" name=\"Submit\" value=\"OK\"></form>"); }
*/
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
}
//---------------------------------
function contentzprac($buffer){
$kde=strpos($buffer,"<!--contentzprac-->");
$zac=(substr($buffer,0,$kde));
$buffer=(substr($buffer,$kde));
//-------------
$bufferx="";
foreach(str_split($buffer) as $char){
//strtr($char,"ěščřžýáíéúůĚŠČŘŽÝÁÍÉÚŮ","00000000000000000000000000000000000000000000")==$char
if(strtr($char,"ěščřžýáíéúůĚŠČŘŽÝÁÍÉÚŮ","00000000000000000000000000000000000000000000")==$char){
$char=dechex(ord($char));
if(strlen($char)==1){ $char=("0".$char); }
$char="%".$char;
}
$bufferx=$bufferx.$char;
}
$buffer='<script language="javascript">
document.write(unescape("'.$bufferx.'"));
</script>'; 
return($zac.$buffer);
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
//echo("$rowx is $row<br />");
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

if($cont>500){
//session_destroy();
die($GLOBALS["findex1"]);
}
if(!$neobnov){
file_put_contents($fajl,$cont+1);
}
}

//if($_SESSION["antihack"] == time()){
//die();
//}
//$_SESSION["antihack"] = time();

//echo($_SERVER["REMOTE_ADDR"]);
}

define(map_x,150);
define(map_y,150);

if(!mysql_pconnect("mysql","towns2.ancwis.com","longhorn86")){
//if(!mysql_pconnect("mysql5_host","towns_cz","heslo190077")){
die($GLOBALS["findex2"]);
}
//mysql_query("SET NAMES 'utf8'");
//mysql_set_charset("utf8");
mysql_query("SET NAMES 'utf8'");
/*mysql_query("SET NAMES 'utf8'")*/
if(!mysql_select_db("towns2_ancwis_com")){
//$ct = file_get_contents("/home/alcatraz/hosts/cz/towns2_/www/logpadu.txt");
//file_put_contents("/home/alcatraz/hosts/cz/towns2_/www/logpadu.txt",$ct."\n".time()." -".$_SESSION["id"]." -".$_SERVER["SCRIPT_FILENAME"]." - ".$_SERVER["REMOTE_ADDR"]." - ".$_SERVER["HTTP_USER_AGENT"]." ");
//die("Prekrocil jste maximalni pocet obnoveni(200) za hodinu.");
die($GLOBALS["findex3"]);
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
mysql_query("UPDATE towns2 SET tmp = (SELECT skupina FROM towns2_uni WHERE towns2_uni.obrazok = towns2.obrazok LIMIT 0,1) WHERE xc='".$xc."' AND yc='".$yc."'");
dc("towns2");	
$xc = ((intval(($xc-1)/10))*10)+1;
$yc = ((intval(($yc-1)/10))*10)+1;
//echo("index/mapa10zoom".$xc."xc".$yc."yc.txt");
if(file_exists($_SESSION["roota"]."index/mapa10zoom".$xc."xc".$yc."yc.txt")){
unlink($_SESSION["roota"]."index/mapa10zoom".$xc."xc".$yc."yc.txt");
}
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
echo("<br />");
echo(mysql_error());
echo(" - ");
echo(str_replace("ppp",$where,$this->dotaz)." LIMIT 0,1");
echo("<br />");
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
$object_nejhraci = new index("towns2_uziv","select meno from towns2_uziv WHERE ppp order by body desc,meno","\".\$row[\"meno\"].\"<br />");
$object_nejali = new index("towns2_ali","select meno from towns2_ali WHERE ppp order by body desc,meno","\".\$row[\"meno\"].\"<br />");
$object_nejmes = new index("towns2_mes","select meno from towns2_mes WHERE ppp order by body desc,meno","\".\$row[\"meno\"].\"<br />");

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
/*
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
}  */
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
//echo("UPDATE towns2_uziv SET ".$surovina." = ".$tmp." WHERE id = '".$hrac."'");
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

function convert($a,$id_convert="dífult"){
if($id_convert=="dífult"){ $id_convert = $_SESSION["id"]; }
$a=htmlspecialchars($a);
$a=nl2br($a);
//----------------------------------------------------------------------------------
/*
$z = array();
$do = array();
$i = 0;
foreach(hnet2("towns2_upload","SELECT meno,hrac,mime_type FROM towns2_upload WHERE hrac = '".$id_convert."'") as $row){
$z[$i] = "~".$row["meno"];
if(strpos("abc".$row["mime_type"],"image")){
$do[$i] = "<img src=\"casti/upload/soubor.php?meno=".$row["meno"]."&hrac=".$id_convert."\" />";
}else{
$do[$i] = "<a href=\"casti/upload/soubor.php?meno=".$row["meno"]."&hrac=".$id_convert."\" >".$row["meno"]."</a>";
}
$i = $i + 1;
}
$a = str_replace($z, $do, $a);
 */
//----------------------------------------------------------------------------------
/*$z   = array("diskuse((",")-(", "))");
$do  = array("<a href=\"".gv("?dir=casti/diskuse/prispevky.php&tema=")."", "\">" ,"</a>");
//$do  = array("$_SESSION['voj", "; $_SESSION['voj", ";");
$a = str_replace($z, $do, $a);*/
//----------------------------------------------------------------------------------
$z   = array("e^","s^","c^","r^","z^","y^","a^","i^","e?","u?","u^","E^","S^","C^","R^","Z^","Y^","A^","I^","E?","U?","U^");
$do  = array("ě","š","č","ř","ž","ý","á","í","é","ú","ů","Ě","Š","Č","Ř","Ž","Ý","Á","Í","É","Ú","Ů");
$a = str_replace($z, $do, $a);
//----------------------------------------------------------------------------------
/*$zzz = "<img src=\"casti/diskuse/obrazky/";
$kkk = ".gif\" width=\"15\" height=\"15\" />";
*///$z   = array(":-)",":)",";)",":-(","/*01*/","/*02*/");
/*$do  = array($zzz."1$kkk",$zzz."2$kkk",$zzz."3$kkk",$zzz."4$kkk",$zzz."5$kkk",$zzz."6$kkk");
//$do  = array("$_SESSION['voj", "; $_SESSION['voj", ";");
$a = str_replace($z, $do, $a); */
//----------------------------------------------------------------------------------
$replace = array();
$replace[':-D']='<img src="casti/desing/smileys/1.gif">';
$replace[':oD']='<img src="casti/desing/smileys/15.gif">';
$replace[':-))']='<img src="casti/desing/smileys/2.gif">';
$replace[':))']='<img src="casti/desing/smileys/2.gif">';
$replace[':)))']='<img src="casti/desing/smileys/2.gif">';
$replace[':-)))']='<img src="casti/desing/smileys/2.gif">';
$replace[':)']='<img src="casti/desing/smileys/3.gif">';
$replace[':-)']='<img src="casti/desing/smileys/3.gif">';
$replace[':o)']='<img src="casti/desing/smileys/3.gif">';
$replace[';-)']='<img src="casti/desing/smileys/4.gif">';
$replace[':-P']='<img src="casti/desing/smileys/5.gif">';
$replace[':oP']='<img src="casti/desing/smileys/16.gif">';
$replace[':-|']='<img src="casti/desing/smileys/6.gif">';
$replace[':-/']='<img src="casti/desing/smileys/7.gif">';
$replace[':-(']='<img src="casti/desing/smileys/8.gif">';
$replace[':´-(']='<img src="casti/desing/smileys/9.gif">';
$replace[':´o(']='<img src="casti/desing/smileys/19.gif">';
$replace[':-O']='<img src="casti/desing/smileys/10.gif">';
$replace['B-]']='<img src="casti/desing/smileys/11.gif">';
$replace['X[]']='<img src="casti/desing/smileys/12.gif">';
$replace[':_)']='<img src="casti/desing/smileys/13.gif">';
$replace['%-)']='<img src="casti/desing/smileys/17.gif">';
$replace[':-!']='<img src="casti/desing/smileys/18.gif">';
$replace[':~O']='<img src="casti/desing/smileys/20.gif">';
foreach($replace as $key => $val){
	//echo($key."/".$val."<br />");
    $a = str_replace($key,$val,$a);
}
//----------------------------------------------------------------------------------
return($a);
}
//---------------------------------------------------------------------------------------------------------------------------
function cenzura($a){
//$z   = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
//$do  = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
//$do  = array("$_SESSION['voj", "; $_SESSION['voj", ";");
//$a = str_replace($z, $do, $a);

$z   = array("hajzl","hovno","kurv","blbec","magor","shit","debil","hovado","píč","prdel","gej","gay","kokot","fuck","idiot");
//$do  = array("*****","*****","****","*****","*****","****","*****","******","***","*****","***","***","*****");
$do  = "/" . $GLOBALS["findex4"] . "/";
//$do  = array("$_SESSION['voj", "; $_SESSION['voj", ";");
$a = str_replace($z, $do, $a);
return($a);
}
//---------------------------------------------------------------------------------------------------------------------------


function profil($a,$b=0){
$odpoved = hnet2("towns2_uziv","select meno,farba from towns2_uziv WHERE id='".$a."'");
$odpoved = $odpoved[0];
$meno = $odpoved[0];
$farba = $odpoved[1];
//$odpoved =mysql_query("select meno,typ,farba from towns2_uziv WHERE id='".$a."'");
//while ($row = mysql_fetch_array($odpoved)) {	 	 	 
//}
if(!$b){
return(profilid($a,$meno,$farba));
}else{
return(profilid($a,$meno,$farba,1));
}
}
//---------------------------------------------------------------------------------------------------------------------------
function profilid($a,$meno,$farba,$b=0){
if(!$meno){ if($a = 31415){ return("Towns"); return("Neexistující uživatel"); } }
$farba = str_replace("user",htmlspecialchars($meno),$farba);
if(!$b){
return("<a href=\"".gv("?dir=casti/hraci/index.php&amp;submenu=3&amp;id=$a")."\">$farba</a>");
}else{
return($farba);
}
}

//---------------------------------------------------------------------------------------------------------------------------

function typuziv($a){
//eval(file_get_contents("casti/jazyk/cz.txt"));

 	if($a == "1"){ $typ = $GLOBALS["findex5"]; }
 	if($a == "2"){ $typ = $GLOBALS["findex6"]; }
 	if($a == "3"){ $typ = $GLOBALS["findex7"]; }
 	if($a == "4"){ $typ = $GLOBALS["findex8"]; }
 	if($a == "5"){ $typ = $GLOBALS["findex9"]; }
 	if($a == "6"){ $typ = $GLOBALS["findex10"]; }
 	if($a == "7"){ $typ = $GLOBALS["findex11"]; }
 	if($a == "8"){ $typ = $GLOBALS["findex12"]; }
	if($a == "9"){ $typ = $GLOBALS["findex13"]; }
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
function zcas_t($cas){
return zcas(date("Y-m-d H:i:s",$cas));
}
//---------------------------------------------------------------------------------------------------------------------------
function zcas($cas){
list($year, $month, $day, $hour, $minute, $second) = split('[-: ]', $cas);

if(date("d:m:Y",time()-86400*2) == "$day:$month:$year"){
return($GLOBALS["findex14"] . " $hour:$minute");
}
if(date("d:m:Y",time()-86400) == "$day:$month:$year"){
return($GLOBALS["findex15"] . " $hour:$minute");
}
if(date("d:m:Y") == "$day:$month:$year"){
return($GLOBALS["findex16"] . " $hour:$minute");
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
return("<a href=\"".gv("?dir=casti/mapa/uniindex.php&amp;glob_sc=1&amp;xc=".$xc."&amp;yc=".$yc)."\">($xc,$yc)</a>");
}
//---------------------------------------------------------------------------------------------------------------------------

function qpxyx($xc,$yc,$text){
return(qpxy($xc,$yc)." <b>$text </b>".profil(hnet("towns2","SELECT (SELECT id FROM towns2_uziv WHERE id=vlastnik) FROM towns2 WHERE xc=$xc AND yc=$yc"))."");
}
//---------------------------------------------------------------------------------------------------------------------------

function alog($a,$b){
/*
mysql_query("INSERT INTO `towns2_log` (cas,ip,user,co) VALUES ('".time()."','".$_SERVER["REMOTE_ADDR"]."','".$_SESSION["id"]."','$a')");
if($b){
mail($GLOBALS["langmail"],"log","$a");
}
echo("--");*/
logx($a);
}
//---------------------------------------------------------------------------------------------------------------------------
function logx($a){
mail($GLOBALS["langmail"],"id=".$_SESSION["id"],$a);
}
//---------------------------------------------------------------------------------------------------------------------------


function themes($where = "1",$limit="0,9999"){
//echo("SELECT meno,id WHERE ".$where." FROM towns2_tem");
foreach(hnet2("towns2_tem","SELECT (SELECT count(1) FROM towns2_dis WHERE towns2_dis.tema = towns2_tem.id),tema,id FROM towns2_tem WHERE ".$where." AND (sekce < 15 or sekce=".($_SESSION["ali"]+100).") ORDER BY id desc",$limit) as $row){
echo("<a href=\"".gv("?glob_sc=4&amp;dir=casti/diskuse/prispevky.php&amp;tema=".$row["id"])."\">".$row["tema"]."</a> (".$row[0].")<br />");
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
echo("</span></div></div><br />");

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
    if($a == "1"){ $b = $GLOBALS["findex17"] . ":"; }else{ $b = $GLOBALS["findex18"] . ":"; }
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
if($jaku == "prachy"){ $jakua = $GLOBALS["findex19"]; }
if($jaku == "jedlo"){ $jakua = $GLOBALS["findex20"]; }
if($jaku == "kamen"){ $jakua = $GLOBALS["findex21"]; }
if($jaku == "zelezo"){ $jakua = $GLOBALS["findex22"]; }
if($jaku == "drevo"){ $jakua = $GLOBALS["findex23"]; }
if($jaku != "jedlo"){
echo("<b>$jakua:</b> $doplnok<input type=\"text\" name=\"zadane$jaku\" value=\"$value\" /> (".(zformatovat($limit)).")");
}else{
echo("<input type=\"hidden\" name=\"zadane$jaku\" value=\"0\" />");
}
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
function vyberxc(){ return vyberxcyc(1); }
function vyberyc(){ return vyberxcyc(2); }
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
"./*<img src=\"casti/suroviny/desing/jedlo.png\" alt=\"jídlo\" width=\"17\" height=\"17\" border=\"1\"> &nbsp; ".zformatovat($jedlo)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*/"
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
if($surkyu["prachy"] < $prachy){ return($GLOBALS["findex24"]); }
if($surkyu["jedlo"] < $jedlo){ return($GLOBALS["findex25"]); }
if($surkyu["kamen"] < $kamen){ return($GLOBALS["findex26"]); }
if($surkyu["zelezo"] < $zelezo){ return($GLOBALS["findex27"]); }
if($surkyu["drevo"] < $drevo){ return($GLOBALS["findex28"]); }

if($komu){
//echo("SELECT 60*ceil(sqrt(pow(towns2_.xc-towns2_2.xc,2)+pow(towns2_.yc-towns2_2.yc,2))/towns2_.uroven) FROM towns2_, towns2_ towns2_2 WHERE towns2_.obrazok = 'trziste' AND towns2_.vlastnik = '$od' AND towns2_2.obrazok = 'hlbudova' AND towns2_2.vlastnik = '$komu' AND ppp ORDER BY sqrt(pow(towns2_.xc-towns2_2.xc,2)+pow(towns2_.yc-towns2_2.yc,2))");
$cas=new index("towns2","SELECT 60*ceil(sqrt(pow(towns2.xc-towns2_2.xc,2)+pow(towns2.yc-towns2_2.yc,2))/towns2.uroven) FROM towns2, towns2 towns2_2 WHERE towns2.obrazok = 'trziste' AND towns2.vlastnik = '$od' AND towns2_2.obrazok = 'hlbudova' AND towns2_2.vlastnik = '$komu' AND ppp ORDER BY sqrt(pow(towns2.xc-towns2_2.xc,2)+pow(towns2.yc-towns2_2.yc,2))");
$cas = $cas->get("1");
$cas = $cas[0]+time();
mysql_query("UPDATE towns2_uziv SET prachy=prachy-$prachy , jedlo=jedlo-$jedlo , kamen=kamen-$kamen , zelezo=zelezo-$zelezo , drevo=drevo-$drevo WHERE id = $od");
mysql_query("INSERT INTO `towns2_possur` ( `od` , `kam` , `cas` , `prachy` , `jedlo` , `kamen` , `zelezo` , `drevo`, `protect` ) VALUES ('$od', '$komu', '$cas', '$prachy', '$jedlo', '$kamen', '$zelezo', '$drevo','$protect')");
deletecash("towns2_possur");
deletecash("towns2_uziv");
return($GLOBALS["findex29"]);
}else{
return($GLOBALS["finex30"]);
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
$xccb = hnet("towns2_uziv","SELECT hlbudovaxc FROM towns2_uziv WHERE id=".$aky);
$yccb = hnet("towns2_uziv","SELECT hlbudovayc FROM towns2_uziv WHERE id=".$aky);
dcmapa($xccb,$yccb);
mysql_query("UPDATE towns2 SET obrazok='0', vlastnik='1', cas='1' WHERE vlastnik=".$aky);
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
mysql_query("DELETE FROM towns2_upload WHERE hrac=".$aky);
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
dc("towns2_upload");
unlink("casti/obrazky/".$aky);
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
//echo("SELECT vlastnik FROM towns2 WHERE xc = '".$xc."' AND yc = '".$yc."'<br />");
return(hnet("towns2","SELECT vlastnik FROM towns2 WHERE xc = '".$xc."' AND yc = '".$yc."'"));	
}
//---------------------------------------------------------------------------------------------------------------------------
function budova($obrazok,$hrac = "dífult"){
if($hrac == "dífult"){ $hrac = $_SESSION["id"]; }
return (hnet("towns2","SELECT COUNT(1) FROM towns2 WHERE obrazok = '".$obrazok."' AND vlastnik = '".$hrac."' AND cas = '1'"));	
}
//---------------------------------------------------------------------------------------------------------------------------
function budoval($obrazok,$hrac = "dífult"){
if($hrac == "dífult"){ $hrac = $_SESSION["id"]; }
return (hnet("towns2","SELECT MAX(uroven) FROM towns2 WHERE obrazok = '".$obrazok."' AND vlastnik = '".$hrac."' AND cas = '1'"));	
}
//---------------------------------------------------------------------------------------------------------------------------
function mysql_query2($text){
mysql_query($text);
$chyba = mysql_error();
if($chyba){
echo($chyba." - ".$text."<br />");
}
}
//---------------------------------------------------------------------------------------------------------------------------
function maxid($table){
return 1+hnet($table,"SELECT MAX(id) FROM ".$table);
}
//---------------------------------------------------------------------------------------------------------------------------
function zc($int){
$int=$int." ";
$istep=0;
foreach(str_split($int) as $char){
if($iste==$char){ $istep=$istep+1; }
$iste=$char;
}
if($istep*3>strlen($int)-2){ return "1"; }else{ return "0"; }
}
//---------------------------------------------------------------------------------------------------------------------------
function nextid(){
$max=maxid("towns2_uziv");
while(zc($max)){
$max=$max+1;
}
return $max;
}
//---------------------------------------------------------------------------------------------------------------------------
function isok($kolik){
$tmp = hnet("towns2_uziv","SELECT prachy FROM towns2_uziv WHERE id = ".$_SESSION["id"]);
$tmp = $tmp/10;
if($kolik > $tmp){
return(false);
}else{
return(true);
}
}
//---------------------------------------------------------------------------------------------------------------------------
function help($meno){
?>
<SCRIPT LANGUAGE="JavaScript">
<!--
function popUpHelp<?php echo(md5($meno)); ?>(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=600,height=400');");
}
-->
</script>
<?php
echo("<A HREF=\"javascript:popUpHelp".md5($meno)."('casti/help/index.php".gv("?meno=".$meno)."')\"><b>?</b></A>");
}
?>
