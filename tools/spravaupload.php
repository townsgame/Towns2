<?php
$root = "../";
$no_c = "1";
$no_ss = "1";
require("../casti/funkcie/index.php");
require("../casti/funkcie/vojak.php");
if($_SESSION["id"] != "1"){ die(); }
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

<?php
if($_MYGET["del"]){
mysql_query2("DELETE FROM towns2_upload WHERE meno = '".$_MYGET["del"]."' AND hrac = '231'");
dc("towns2_upload");

$file_del = "data/231/".md5($_MYGET["del"]).".dat";
if(file_exists($file_del)){
unlink($file_del);
}
}
//----
if($_MYGET["admin"]){
mysql_query2("UPDATE towns2_upload SET hrac = '1' WHERE meno = '".$_MYGET["admin"]."' AND hrac = '231'");
dc("towns2_upload");
$file_pov = "../casti/upload/data/231/".md5($_MYGET["admin"]).".dat";
$file_mov = "../casti/upload/data/1/".md5($_MYGET["admin"]).".dat";
if(file_exists($file_pov)){
copy($file_pov,$file_mov);
}
}


echo("<table width=\"500\" border=\"0\">
  <tr>
    <th>Jméno</th>
    <th>Popis</th>
    <th>Velikost</th>
   <td></td>
  </tr>
");
//====================================================
foreach(hnet2("towns2_upload","SELECT meno,b,popis FROM towns2_upload WHERE b>0 AND hrac = '231' ORDER BY meno") as $row){
echo("<tr>
    <td><A HREF=\"javascript:popUp('../casti/upload/soubor.php?meno=".$row["meno"]."&amp;hrac=231')\"><b>".$row["meno"]."</b></a></td>
    <td>".$row["popis"]."</td>
    <td> ".($row["b"]/1000)." KB</td>
    <td>");

echo("<a href=\"".gv("?del=".$row["meno"])."\"><img src=\"../casti/desing/no.bmp\" width=\"15\" height=\"15\" border=\"1\"></a>");
echo("<a href=\"".gv("?admin=".$row["meno"])."\"><img src=\"../casti/desing/yes.bmp\" width=\"15\" height=\"15\" border=\"1\"></a>");
//echo("<a href=\"".gv("?aadmin=".$row["meno"])."\"><img src=\"../casti/desing/yes.bmp\" width=\"15\" height=\"15\" border=\"1\"></a>");

echo("</td>
  </tr>");
}


?>
</table>
</body>
</html>