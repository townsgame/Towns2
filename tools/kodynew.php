<?php
$root = "../";
require("../casti/funkcie/index.php"); 
if($_SESSION["typ"]!="1"){
die();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style5 {font-size: 14px}
.style6 {color: #999999}
.style8 {color: #999999; font-size: 12px; border:thin; background-color:#dddddd}
.style11 {color: #000000; font-weight: bold; }
-->
</style>
</head>

<body>
<?php
function kod($prachy,$kamen,$zelezo,$drevo,$vojaci,$typ){
$a = rand(111111111,999999999);
echo($a);
mysql_query2("INSERT INTO `towns2_kod` ( `kod` , `hrac` , `prachy`, `jedlo`, `kamen`, `zelezo`, `drevo`, `vojaci`, `typ`) 
VALUES ($a,'0',$prachy,0,$kamen,$zelezo,$drevo,'$vojaci',$typ)");
}
?>
<table width="630" height="893" border="1" cellpadding="0" cellspacing="0" bordercolor="#3366FF" bgcolor="#eeeeee">
  <tr>
    <th width="315" height="99" align="left" valign="top"><div class="style8">&nbsp; http://www.towns.cz <span class="style11">&gt;&gt;</span> Suroviny <span class="style11">&gt;&gt;</span> Zadat k&oacute;d</div>
      <br />
    &nbsp;&nbsp;<img src="http://2.towns.cz/casti/suroviny/desing/prachy.png" width="20" height="20" /> 1000<br />
    <br />
      <span class="style5"><br />
      <div style="background-color:#dddddd;">&nbsp;<?php kod(1000,0,0,0,0,0); ?></div>
    <em>    </em></span></th>
    <th width="315" height="99" align="left" valign="top"><div class="style8">&nbsp; http://www.towns.cz <span class="style11">&gt;&gt;</span> Suroviny <span class="style11">&gt;&gt;</span> Zadat k&oacute;d</div>
      <br />
      &nbsp;&nbsp;<img src="http://2.towns.cz/casti/suroviny/desing/kamen.png" width="20" height="20" /> 1000<br />
      <br />
      <span class="style5"><br />
      <div style="background-color:#dddddd;">&nbsp;<?php kod(0,1000,0,0,0,0); ?></div>
    </span></th>
  </tr>
  <tr>
    <th height="99" align="left" valign="top"><div class="style8">&nbsp; http://www.towns.cz <span class="style11">&gt;&gt;</span> Suroviny <span class="style11">&gt;&gt;</span> Zadat k&oacute;d</div>
        <br />
      &nbsp;&nbsp;<img src="http://2.towns.cz/casti/suroviny/desing/drevo.png" width="20" height="20" /> 1000<br />
      <br />
      <span class="style5"><br />
        <div style="background-color:#dddddd;">&nbsp;<?php kod(0,0,0,1000,0,0); ?></div>
        <em> </em></span></th>
    <th height="99" align="left" valign="top"><div class="style8">&nbsp; http://www.towns.cz <span class="style11">&gt;&gt;</span> Suroviny <span class="style11">&gt;&gt;</span> Zadat k&oacute;d</div>
        <br />
      &nbsp;&nbsp;<img src="http://2.towns.cz/casti/suroviny/desing/zelezo.png" width="20" height="20" /> 1000<br />
      <br />
      <span class="style5"><br />
        <div style="background-color:#dddddd;">&nbsp;<?php kod(0,0,1000,0,0,0); ?></div>
      </span></th>
  </tr>
  <tr>
    <th height="99" align="left" valign="top"><div class="style8">&nbsp; http://www.towns.cz <span class="style11">&gt;&gt;</span> Suroviny <span class="style11">&gt;&gt;</span> Zadat k&oacute;d</div>
        <br />
      &nbsp;&nbsp;<img src="http://2.towns.cz/casti/suroviny/desing/prachy.png" width="20" height="20" /> 100<br />
      <br />
      <span class="style5"><br />
        <div style="background-color:#dddddd;">&nbsp;<?php kod(100,0,0,0,0,0); ?></div>
        <em> </em></span></th>
    <th height="99" align="left" valign="top"><div class="style8">&nbsp; http://www.towns.cz <span class="style11">&gt;&gt;</span> Suroviny <span class="style11">&gt;&gt;</span> Zadat k&oacute;d</div>
        <br />
      &nbsp;&nbsp;<img src="http://2.towns.cz/casti/suroviny/desing/kamen.png" width="20" height="20" /> 100<br />
      <br />
      <span class="style5"><br />
        <div style="background-color:#dddddd;">&nbsp;<?php kod(0,100,0,0,0,0); ?></div>
      </span></th>
  </tr>
  <tr>
    <th height="99" align="left" valign="top"><div class="style8">&nbsp; http://www.towns.cz <span class="style11">&gt;&gt;</span> Suroviny <span class="style11">&gt;&gt;</span> Zadat k&oacute;d</div>
        <br />
      &nbsp;&nbsp;<img src="http://2.towns.cz/casti/suroviny/desing/drevo.png" width="20" height="20" /> 100<br />
      <br />
      <span class="style5"><br />
        <div style="background-color:#dddddd;">&nbsp;<?php kod(0,0,0,100,0,0); ?></div>
        <em> </em></span></th>
    <th height="99" align="left" valign="top"><div class="style8">&nbsp; http://www.towns.cz <span class="style11">&gt;&gt;</span> Suroviny <span class="style11">&gt;&gt;</span> Zadat k&oacute;d</div>
        <br />
      &nbsp;&nbsp;<img src="http://2.towns.cz/casti/suroviny/desing/zelezo.png" width="20" height="20" /> 100<br />
      <br />
      <span class="style5"><br />
        <div style="background-color:#dddddd;">&nbsp;<?php kod(0,0,100,0,0,0); ?></div>
      </span></th>
  </tr>
  
  
  <tr>
    <th width="315" height="99" align="left" valign="top"><div class="style8">&nbsp; http://www.towns.cz <span class="style11">&gt;&gt;</span> Suroviny <span class="style11">&gt;&gt;</span> Zadat k&oacute;d</div>
      <br />
&nbsp;&nbsp;<img src="http://2.towns.cz/casti/jednotky/jednotobr/1/v.jpg" width="17" height="17" border="1" /> 10<br />
<br />
<span class="style5"><br />
<div style="background-color:#dddddd;">&nbsp;<?php kod(0,0,0,0,".1(v10,s0,k0,r0,j0,t0,z0,b0,a0,e0,n0,d0,m0)",0); ?></div>
</span></th>
    <th width="315" height="99" align="left" valign="top"><div class="style8">&nbsp; http://www.towns.cz <span class="style11">&gt;&gt;</span> Suroviny <span class="style11">&gt;&gt;</span> Zadat k&oacute;d</div>
      <br />
&nbsp;&nbsp;<img src="http://2.towns.cz/casti/suroviny/desing/vyspelost.jpg" width="17" height="17" border="1" /> 1<br />
<br />
<span class="style5"><br />
<div style="background-color:#dddddd;">&nbsp;<?php kod(0,0,0,0,".1(v1,s1,k1,r1,j1,t1,z1,b1,a1,e1,n1,d1,m1)",0); ?></div>
</span></th>
  </tr>
  <tr>
    <th width="315" height="99" align="left" valign="top"><div class="style8">&nbsp; http://www.towns.cz <span class="style11">&gt;&gt;</span> Suroviny <span class="style11">&gt;&gt;</span> Zadat k&oacute;d</div>
      <br />
&nbsp;&nbsp;<img src="http://2.towns.cz/casti/suroviny/desing/vyspelost.jpg" width="17" height="17" border="1" /> 10<br />
<br />
<span class="style5"><br />
<div style="background-color:#dddddd;">&nbsp;<?php kod(0,0,0,0,".1(v10,s10,k10,r10,j10,t10,z10,b10,a10,e10,n10,d10,m10)",0); ?></div>
</span></th>
    <th width="315" height="99" align="left" valign="top"><div class="style8">&nbsp; http://www.towns.cz <span class="style11">&gt;&gt;</span> Suroviny <span class="style11">&gt;&gt;</span> Zadat k&oacute;d</div>
      <br />
&nbsp;&nbsp;SU<br />
<br />
<span class="style5"><br />
<div style="background-color:#dddddd;">&nbsp;<?php kod(0,0,0,0,0,4); ?></div>
</span></th>
  </tr>
  <tr>
    <th width="315" height="99" align="left" valign="top"><div class="style8">&nbsp; http://www.towns.cz <span class="style11">&gt;&gt;</span> Suroviny <span class="style11">&gt;&gt;</span> Zadat k&oacute;d</div>
      <br />
&nbsp;&nbsp;VIP u&#382;ivatel<br />
<br />
<span class="style5"><br />
<div style="background-color:#dddddd;">&nbsp;<?php kod(0,0,0,0,0,5); ?></div>
</span></th>
    <th width="315" height="99" align="left" valign="top"><div class="style8">&nbsp; http://www.towns.cz <span class="style11">&gt;&gt;</span> Suroviny <span class="style11">&gt;&gt;</span> Zadat k&oacute;d</div>
      <br />
&nbsp;&nbsp;NU<br />
<br />
<span class="style5"><br />
<div style="background-color:#dddddd;">&nbsp;<?php kod(0,0,0,0,0,6); ?></div>
</span></th>
  </tr>
  <tr>
    <th width="315" height="99" align="left" valign="top"><div class="style8">&nbsp; http://www.towns.cz <span class="style11">&gt;&gt;</span> Suroviny <span class="style11">&gt;&gt;</span> Zadat k&oacute;d</div>
      <br />
&nbsp;&nbsp;<img src="http://2.towns.cz/casti/suroviny/desing/prachy.png" width="20" height="20" /> <img src="http://2.towns.cz/casti/suroviny/desing/kamen.png" width="20" height="20" /> <img src="http://2.towns.cz/casti/suroviny/desing/drevo.png" width="20" height="20" /> <img src="http://2.towns.cz/casti/suroviny/desing/zelezo.png" width="20" height="20" /> 1000<br />
<br />
<span class="style5"><br />
<div style="background-color:#dddddd;">&nbsp;<?php kod(1000,1000,1000,1000,0,0); ?></div>
</span></th>
    <th width="315" height="99" align="left" valign="top"><div class="style8">&nbsp; http://www.towns.cz <span class="style11">&gt;&gt;</span> Suroviny <span class="style11">&gt;&gt;</span> Zadat k&oacute;d</div>
      <br />
&nbsp;&nbsp;<img src="http://2.towns.cz/casti/suroviny/desing/prachy.png" width="20" height="20" /> <img src="http://2.towns.cz/casti/suroviny/desing/kamen.png" width="20" height="20" /> <img src="http://2.towns.cz/casti/suroviny/desing/drevo.png" width="20" height="20" /> <img src="http://2.towns.cz/casti/suroviny/desing/zelezo.png" width="20" height="20" /> 100<br />
<br />
<span class="style5"><br />
<div style="background-color:#dddddd;">&nbsp;<?php kod(100,100,100,100,0,0); ?></div>
</span></th>
  </tr>
  <tr>
    <th height="99" align="left" valign="top"><div class="style8">&nbsp; http://www.towns.cz <span class="style11">&gt;&gt;</span> Suroviny <span class="style11">&gt;&gt;</span> Zadat k&oacute;d</div>
        <br />
      &nbsp;&nbsp;VIP u&#382;ivatel + <img src="http://2.towns.cz/casti/suroviny/desing/prachy.png" width="20" height="20" /> <img src="http://2.towns.cz/casti/suroviny/desing/kamen.png" width="20" height="20" /> <img src="http://2.towns.cz/casti/suroviny/desing/drevo.png" width="20" height="20" /> <img src="http://2.towns.cz/casti/suroviny/desing/zelezo.png" width="20" height="20" /> 1000<br />
      <br />
      <span class="style5"><br />
        <div style="background-color:#dddddd;">&nbsp;
          <?php kod(1000,1000,1000,1000,0,5); ?>
        </div>
      </span></th>
    <th height="99" align="left" valign="top"><div class="style8">&nbsp; http://www.towns.cz <span class="style11">&gt;&gt;</span> Suroviny <span class="style11">&gt;&gt;</span> Zadat k&oacute;d</div>
        <br />
      &nbsp;&nbsp;VIP u&#382;ivatel + <img src="http://2.towns.cz/casti/suroviny/desing/prachy.png" width="20" height="20" /> <img src="http://2.towns.cz/casti/suroviny/desing/kamen.png" width="20" height="20" /> <img src="http://2.towns.cz/casti/suroviny/desing/drevo.png" width="20" height="20" /> <img src="http://2.towns.cz/casti/suroviny/desing/zelezo.png" width="20" height="20" /> 100<br />
      <br />
      <span class="style5"><br />
        <div style="background-color:#dddddd;">&nbsp;
          <?php kod(100,100,100,100,0,5); ?>
        </div>
      </span></th>
  </tr>
</table>
</body>
</html>
