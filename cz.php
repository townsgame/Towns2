<?php
function contentzprac($buffer){
$kde=strpos($buffer,"<!--contentzprac-->");
$zac=(substr($buffer,0,$kde));
$buffer=(substr($buffer,$kde));
//-------------
$bufferx="";
foreach(str_split($buffer) as $char){
if(strtr($char,"ěščřžýáíéúůĚŠČŘŽÝÁÍÉÚŮ","00000000000000000000000000000000000000000000")==$char){
$char=dechex(ord($char));
if(strlen($char)==1){ $char=("0".$char); }
$char="%".$char;
}
$bufferx=$bufferx.$char;
}
$buffer='<script language="javascript">
document.write/*alert*/(unescape("'.$bufferx.'"));
</script>';
return($zac.$buffer);
}
ob_start("contentzprac");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>towns - m&#283;sta</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <!-- **** layout stylesheet **** -->
  <link rel="stylesheet" type="text/css" href="style/style.css" />
   <link rel="shortcut icon" href="favicon.ico">
  <!-- **** colour scheme stylesheet **** -->
  <link rel="stylesheet" type="text/css" href="style/green.css" />
<style type="text/css"> 
<!--
.submenu {font-size: 15px; color:#283D82;}
a.bzp:link  { text-decoration: none; color:#283D82;}
a.bzp:visited  { text-decoration: none; color:#283D82;}
a.bzp:hover  { text-decoration: underline; color:#283D82;}
a.bzp:active  { text-decoration: none; color:#283D82;}
--> 
</style>
</head>

<body>
<!--contentzprac-->
  <div id="main">
<div id="logo" >
<img src="style/logo.jpg" width="760" height="70" usemap="#MapL" />
<map name="MapL" id="MapL"><area shape="rect" coords="736,3,755,22" href="?ww1bx8=d1faefd40992e33c92316fee1eaba163" /></map>	
</div>
     <div id="menu">
      <ul>
                <li><a  href="?ww1bx8=f41a213e1977ac231a0c2e78435f098e">pĹihlĂˇĹˇenĂ­</a></li>
        <li><a  href="?ww1bx8=5066615f2a65515f47ac12066a40ee8c">statistika</a></li>
        <li><a  href="?ww1bx8=125b40353a1bd635765182c13f1bda48">registrace</a></li>
        <li><a  href="?ww1bx8=a87f94e1baaefba07172e93ce58f4c68">obrĂzky</a></li>
              </ul>    </div>  
<div align="center">
	    </div>
        <div id="content">
          <div id="column1">
            <div class="sidebaritem"><div class="sbihead"><h1>info</h1></div><div class="sbicontent"><b>Dnes: </b>23</div></div><div class="sidebaritem"><div class="sbihead"><h1>dalĹ ĂŤ</h1></div><div class="sbicontent"><a href="http://2.towns.cz/casti/upload/" target="_blank">Towns upload<a>
</div></div>          </div>
	          <div id="column2">
<img src="http://2.towns.cz/casti/reklama/tutorial.jpg" alt="registrace" width="575" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="395,15,539,51" href="?ww1bx8=07b5a993708397a44f31abfe098fd4ae" target="_top" />
</map>
<br />
<h1>pĹihlĂˇĹˇenĂ­</h1>
<form id="form3" name="form3" method="post" action="">
<table width="484" border="0">
         <tr>
           <th width="68" height="31" align="left" valign="bottom">JmĂ©no: </th>
           <td width="242" align="left" valign="bottom"><b></b> <input type="text" name="zadanyhrac" value="" /><input type="hidden" name="zadanytyp" value="1" /></td>
         </tr>
         <tr>
           <th align="left">Heslo: </th>
           <td align="left"><input name="heslo" type="password" id="heslo" style="width:150px;"/></td>
         </tr>
         <tr>
           <td height="26" colspan="2" align="left"><input type="submit" name="Submit" value="PĹ™ihlĂˇsit se" /></td>
         </tr>
         <tr><td height="26" colspan="2" align="left"><a href="?ww1bx8=6eb6a6d33e896991945019cea9f15739">Zaregistrovat se</a></td></tr>
         <tr><td height="26" colspan="2" align="left"> </td></tr>
  </table>
</form>          </div>
        </div>
        <div id="footer">copyright &copy; 2008 towns.cz verze 2 | <a href="mailto: hejpal@post.cz">hejpal@post.cz</a> | <a href="?ww1bx8=0343076bdccec2e8933a7ef55820c016">admin</a></div>
  </div>
<script type="text/javascript">
<!-- 
            /*function poslatx(){
                var ajax = (window.XMLHttpRequest ? new XMLHttpRequest() : (window.ActiveXObject ? new ActiveXObject("Microsoft.XMLHTTP") : false));
                if(!ajax){
                    //alert("Tak tady to nepobÄ›ĹľĂ­!");
                    return true;
                }
                ajax.onreadystatechange= function () {zpracujx(ajax); } ;
                ajax.open("GET", "http://cron.towns.cz/index.php?a=a", true);
                ajax.send(null);
                return false
            }
            function zpracujx(ajax){
                var txt;
                if (ajax.readyState == 4){
                    if(ajax.status == 200 || ajax.status==0){
                        txt=ajax.responseText;
            }}}
            zpracujx();*/
-->
</script>
<!-- <img src="http://cron.towns.cz/index.php" width="" height="" id="cron_l">  
<script type="text/javascript">
document.getElementById("cron_l").src = "";	
</script>-->
</body>
</html>

