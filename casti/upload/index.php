<?php
$root = "../../";
$no_c = "1";
$no_ss = "1";
require("../../casti/funkcie/index.php");
require("../../casti/funkcie/vojak.php");
//----------------------------------------------------------------------------
function apr($x){
return(intval($x*10)/10);
}
function vel($b){
if(apr($b>999999)){ return(apr($b/1000000)." MB"); }
if(apr($b>999)){ return(apr($b/1000)." KB"); }
return(apr($b)." B");
}
//----------------------------------------------------------------------------
//if(!$_SESSION["id"]){ die("Musíte se přihlásit."); }
if($_SESSION["typ"] == "7"){ die("Musíte být ověřený uživatel."); }
//echo($_SESSION["typ"]);
if(!$_SESSION["id"]){
 $_SESSION["id"] = 231;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>towns - upload</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<SCRIPT LANGUAGE="JavaScript">
<!--
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=600,height=400');");
}
-->
</script>
<?php if($_SESSION["id"]){ ?>
<a href="http://2.towns.cz/"><img src="http://2.towns.cz/casti/upload/logo.jpg" width="760" height="70" border="0" /></a><br/>
<!--<h3><a href="http://2.towns.cz/">Towns</a> upload</h3>-->
<?php if($_SESSION["id"]!=231){ ?>
<b>přihlášený uživatel: <?php echo(profil($_SESSION["id"],1)); ?></b><br/>
<img src="http://2.towns.cz/casti/upload/hr.jpg" width="760" height="10" />
<?php } ?>

 <script type="text/javascript"><!--
google_ad_client = "pub-5059650173115860";
/* upload */
google_ad_slot = "9525124851";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>


<img src="http://2.towns.cz/casti/upload/hr.jpg" width="760" height="10" />
<form enctype="multipart/form-data" method="post" action="">
<b>Vyberte soubor:</b> <input id="filename" type="file" name="u_file" /><br>
<b> nebo URL: </b><input id="url" type="text" name="url" size="35" /> <br><i>Vyberte soubor nebo zadejte URL adresu.</i><br>
<?php if($_SESSION["typ"] < 6 and $_SESSION["typ"]){ ?>
<b> heslo: </b><input id="url" type="password" name="heslo" size="35" /> <br>
<? } ?>
<b>jméno: </b><input id="urlname" type="text" name="urlname" size="35" maxlength="30"  /><br><b>popis:</b><br>
<textarea name="popis">(bez popisu)</textarea><br>
<input type="submit" value="OK" />
</form>


<?php
$upvc=(hnet("towns2_upload","SELECT SUM(b) FROM towns2_upload WHERE hrac = '".$_SESSION["id"]."'"))/1000;
$upvm=hnet("towns2_uziv","SELECT limit_mb FROM towns2_uziv WHERE id = '".$_SESSION["id"]."'")*1000;

$upfile=$_FILES["u_file"];
if($_POST["url"]){
$upfile["name"]=$_POST["urlname"];	
$kde_soubor = "data/".$_SESSION["id"]."/".md5($upfile["name"]).".dat";

echo("<div style=\"display: none\">");
file_put_contents($kde_soubor,file_get_contents($_POST["url"]));

$upfile['size']=filesize($kde_soubor);
//----
//echo($kde_soubor);
eval("\$h = (get_headers(\"".$_POST["url"]."\"));");
foreach($h as $row){
if(strstr($row,"Content-Type:")){
$upfile['type']=(substr($row,13));	
}
}
echo("</div>");
//$upfile['type']=returnMIMEType($kde_soubor);
if(file_get_contents($kde_soubor) == ""){
chyba1("Neplatné URL");
$noupload=1;
}
}
if($upfile["name"]){
$upfile["name"] = strtr($upfile["name"], 
"áčďéěíľňóřšťúůýžÁČĎÉĚÍĽŇÓŘŠŤÚŮÝŽ ", 
"acdeeilnorstuuyzACDEEILNORSTUUYZ_"); 
$upfile["name"]=substr($_POST["urlname"],0,30);
}

$kde_soubor = "data/".$_SESSION["id"]."/".md5($upfile["name"]).".dat";
if(!file_exists("data/".$_SESSION["id"])){ mkdir("data/".$_SESSION["id"],0777); }
//echo(strpos("abc".($_FILES['u_file']['type']),"image"));

if($upfile and !$noupload){
if(false and !strpos("abc".($upfile['type']),"image")){
chyba1("Lze nahrávat pouze obrázky.");
}elseif(hnet("towns2_upload","SELECT 1 FROM towns2_upload WHERE meno = '".$upfile["name"]."' AND hrac = '".$_SESSION["id"]."'")){
chyba1("Soubor s tímto jménem je už nahraný."); 
}elseif( $upvc+($upfile['size']/1000) > $upvm ){
//echo($_FILES['u_file']['size']);
chyba1("Přesáhli jste limit."); 
}else{	

/*echo($upfile["name"]."<br/>");
echo($_FILES['u_file']['type']."<br/>");
echo($_FILES['u_file']['size']."<br/>");*/

if(!$_POST["url"]){ copy($upfile["tmp_name"],$kde_soubor); }

$heslo = $_POST["heslo"];
if($_SESSION["typ"] > 5 or !$_SESSION["typ"]){$heslo = ""; }
mysql_query2("INSERT INTO towns2_upload (`meno`, `popis`, `hrac`, `b`, `mime_type` ,`heslo`) VALUES ('".$upfile["name"]."', '".$_POST["popis"]."', '".$_SESSION["id"]."', '".($upfile['size'])."', '".$upfile['type']."', '".$heslo."')");
dc("towns2_upload");
logx("upload ".$upfile["name"]." from ".$_SESSION["id"]);
//move_uploaded_file($_FILES["u_file"]["name"],$_FILES["u_file"]["tmp_name"]);
}
}
//---------------------------------------------------
if($_SESSION["id"] != 231){
if($_MYGET["del"]){
mysql_query2("DELETE FROM towns2_upload WHERE meno = '".$_MYGET["del"]."' AND hrac = '".$_SESSION["id"]."'");
dc("towns2_upload");

$file_del = "data/".$_SESSION["id"]."/".md5($_MYGET["del"]).".dat";
if(file_exists($file_del)){
unlink($file_del);
}
}
}

if($upvc != 0 or true){
if(1){
echo("<table width=\"700\" border=\"0\">
  <tr bgcolor=\"#cccccc\">
    <th>Jméno</th>
    <th>Popis</th>
    <th>Typ</th>
    <th>Od</th>
    <th>Velikost</th>
   <td></td>
  </tr>
");
//====================================================
foreach(hnet2("towns2_upload","SELECT meno,b,popis,hrac,heslo,mime_type FROM towns2_upload WHERE b>0 "/*AND hrac = '".$_SESSION["id"]."'*/." ORDER BY meno") as $row){
if($bg == "#dddddd"){
$bg = "#eeeeee";	
}else{
$bg = "#dddddd";		
}
if($row["hrac"] != 231){
$hrac=profil($row["hrac"],1);
}else{
$hrac="--";	
}

$row["menoz"] = $row["meno"];
if($row["heslo"]){ $row["menoz"] = "****".$row["menoz"]; }
if(!$row["menoz"]){$row["menoz"]="(beze jména)"; }
//--------------------------------
$typ = $row["mime_type"];
if(strstr($typ,"image")){ $typ="obrázek"; }
if(strstr($typ,"video/3gpp")){ $typ="video na mobil"; }else{
if(strstr($typ,"video")){ $typ="video"; }}
if(strstr($typ,"application/msword")){ $typ="dokument Word"; }
if(strstr($typ,"application/rar")){ $typ="archiv RAR"; }
//--------------------------------
echo("<tr bgcolor=\"$bg\">
    <td><A HREF=\"javascript:popUp('soubor.php?meno=".$row["meno"]."&amp;hrac=".$row["hrac"]."')\"><b>".$row["menoz"]."</b></a></td>
    <td>".$row["popis"]."</td>
    <td>".$typ."</td>
    <td>".$hrac."</td>
    <td> ".vel(($row["b"]))."</td>
    <td>");
if($_SESSION["id"] != 231 and $_SESSION["id"]==$row["hrac"]){
echo("<a href=\"".gv("?del=".$row["meno"])."\"><img src=\"../desing/no.bmp\" width=\"15\" height=\"15\" border=\"1\"></a>");
}
echo("</td>
  </tr>");
}

echo("</table>");
}else{

}
?>

<b><?php echo(vel($upvc*1000)." / ".vel($upvm*1000)); ?> </b>
<?php
}else{
echo("<b/>Zatím jste nenahrál žádné obrázky.<b><br/>");
}
}
//*****************************************************************************************************************
/*echo("<table width=\"500\" border=\"0\">
  <tr>
    <th>Jméno</th>
    <th>Uživatel</th>
    <th>Popis</th>
    <th>Velikost</th>
  </tr>
");
//====================================================
foreach(hnet2("towns2_upload","SELECT meno,b,popis,hrac FROM towns2_upload WHERE hrac != '".$_SESSION["id"]."' ORDER BY meno") as $row){
echo("<tr>
    <td><A HREF=\"javascript:popUp('soubor.php?meno=".$row["meno"]."&amp;hrac=".$row["hrac"]."')\"><b>".$row["meno"]."</b></a></td>
    <td>".profil($row["hrac"])."</td>
    <td>".$row["popis"]."</td>
    <td> ".($row["b"]/1000)." KB</td>
  </tr>");
}


?>
</table>*/  if($_SESSION["id"] == 231){ unset($_SESSION["id"]); } ?>
</body>
</html><!--contentzprac-->