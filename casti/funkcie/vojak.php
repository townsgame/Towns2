<?php          
function vojakrozloz($a){
if(!$a){
$a = ".1(v0,s0,k0,r0,j0,t0,z0,b0,a0,e0,n0,d0,m0)";
}
//----------
$z   = array(".", "(", ",", ")");
$do  = array("\$xxx = ", " ; $", "; $", ";");
//$do  = array("$_SESSION['voj", "; $_SESSION['voj", ";");
$a = str_replace($z, $do, $a);
//----------
$z   = array("v","s","k","r","j","t","z","b","a","e","n","d","m");
$do  = array("v = ","s = ","k = ","r = ","j = ","t = ","z = ","b = ","a = ","e = ","n = ","d = ","m = ");
$a = str_replace($z, $do, $a);

return($a);
/*
v - vojak - $voj
s - sermir - $ser
k - kopijnik - $kop
r - strelec - $str
j - jezdec - $jez
t - tezky jezdec - $tez
z - jezdec s lukem - $jsl
b - beranidlo - $ber
a - katapult - $kat
e - vez - $vez
n - tank - $tan
d - letadlo - $let
m - vesmirna lod - $ves
*/
}
//echo vojakrozloz(".1(v1,s0,k0,r0,j0,t0,z0,b0,a0,e0,n0,d0,m1).2(v2,s0,k0,r0,j0,t0,z0,b0,a0,e0,n0,d0,m2)");
function vojakinfo($sada,$sloupec){    
$odpoved =mysql_query("select $sloupec,id from towns2_voj where sada = '$sada'");
while ($row = mysql_fetch_array($odpoved)) {
    
// lang
if ($sloupec == "name")
    $retrn = $retrn." \$meno".$row[1]." = ".$row[0].";";
else
    $retrn = $retrn." \$$sloupec".$row[1]." = ".$row[0].";";
}
mysql_free_result($odpoved);

return($retrn);
}

function vojakzobraz($a){
/*echo*/eval(vojakrozloz($a));
eval(vojakinfo($xxx,$GLOBALS["name"]));
echo("
<table width=\"427\" height=\"49\" border=\"0\">
  <tr>
    <td width=\"26\" height=\"22\"><img src=\"casti/jednotky/jednotobr/$xxx/v.jpg\" width=\"20\" height=\"20\" alt=\"$menov\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/s.jpg\" width=\"20\" height=\"20\" alt=\"$menos\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/k.jpg\" width=\"20\" height=\"20\" alt=\"$menok\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/r.jpg\" width=\"20\" height=\"20\" alt=\"$menor\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/j.jpg\" width=\"20\" height=\"20\" alt=\"$menoj\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/t.jpg\" width=\"20\" height=\"20\" alt=\"$menot\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/z.jpg\" width=\"20\" height=\"20\" alt=\"$menoz\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/b.jpg\" width=\"20\" height=\"20\" alt=\"$menob\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/a.jpg\" width=\"20\" height=\"20\" alt=\"$menoa\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/e.jpg\" width=\"20\" height=\"20\" alt=\"$menoe\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/n.jpg\" width=\"20\" height=\"20\" alt=\"$menon\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/d.jpg\" width=\"20\" height=\"20\" alt=\"$menod\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/m.jpg\" width=\"20\" height=\"20\" alt=\"$menom\" /></td>
    <td width=\"31\">" . $GLOBALS["vojakA1"] . ":</td>
  </tr>
  <tr  bgcolor=\"#eeeeee\">
    <td height=\"21\">$v</td>
    <td>$s</td>
    <td>$k</td>
    <td>$r</td>
    <td>$j</td>
    <td>$t</td>
    <td>$z</td>
    <td>$b</td>
    <td>$a</td>
    <td>$e</td>
    <td>$n</td>
    <td>$d</td>
    <td>$m</td>
    <td>".($v + $s + $k + $r + $j + $t + $z + $b + $a + $e + $n + $d + $m)."</td>
  </tr>
</table>
");
}
function vojakvloz($a,$tlacidlo){
eval(vojakrozloz($a));
eval(vojakinfo($xxx,$GLOBALS["name"]));
echo("
<form id=\"vlz\" name=\"vlz\" method=\"post\" action=\"\">
<table width=\"427\" height=\"49\" border=\"0\">
  <tr>
    <td width=\"26\" height=\"22\"><img src=\"casti/jednotky/jednotobr/$xxx/v.jpg\" width=\"20\" height=\"20\" alt=\"$menov\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/s.jpg\" width=\"20\" height=\"20\" alt=\"$menos\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/k.jpg\" width=\"20\" height=\"20\" alt=\"$menok\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/r.jpg\" width=\"20\" height=\"20\" alt=\"$menor\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/j.jpg\" width=\"20\" height=\"20\" alt=\"$menoj\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/t.jpg\" width=\"20\" height=\"20\" alt=\"$menot\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/z.jpg\" width=\"20\" height=\"20\" alt=\"$menoz\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/b.jpg\" width=\"20\" height=\"20\" alt=\"$menob\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/a.jpg\" width=\"20\" height=\"20\" alt=\"$menoa\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/e.jpg\" width=\"20\" height=\"20\" alt=\"$menoe\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/n.jpg\" width=\"20\" height=\"20\" alt=\"$menon\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/d.jpg\" width=\"20\" height=\"20\" alt=\"$menod\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/m.jpg\" width=\"20\" height=\"20\" alt=\"$menom\" /></td>
    <td width=\"31\"><input name=\"anov\" type=\"radio\" value=\"a\" checked=\"checked\" /></td>
  </tr>
  <tr  bgcolor=\"#eeeeee\">
    <td height=\"21\"><input name=\"v\" type=\"text\" value=\"$v\" style=\"width: 20px;\" /></td>
    <td><input name=\"s\" type=\"text\" value=\"$s\" style=\"width: 20px;\" /></td>
    <td><input name=\"k\" type=\"text\" value=\"$k\" style=\"width: 20px;\" /></td>
    <td><input name=\"r\" type=\"text\" value=\"$r\" style=\"width: 20px;\" /></td>
    <td><input name=\"j\" type=\"text\" value=\"$j\" style=\"width: 20px;\" /></td>
    <td><input name=\"t\" type=\"text\" value=\"$t\" style=\"width: 20px;\" /></td>
    <td><input name=\"z\" type=\"text\" value=\"$z\" style=\"width: 20px;\" /></td>
    <td><input name=\"b\" type=\"text\" value=\"$b\" style=\"width: 20px;\" /></td>
    <td><input name=\"a\" type=\"text\" value=\"$a\" style=\"width: 20px;\" /></td>
    <td><input name=\"e\" type=\"text\" value=\"$e\" style=\"width: 20px;\" /></td>
    <td><input name=\"n\" type=\"text\" value=\"$n\" style=\"width: 20px;\" /></td>
    <td><input name=\"d\" type=\"text\" value=\"$d\" style=\"width: 20px;\" /></td>
    <td><input name=\"m\" type=\"text\" value=\"$m\" style=\"width: 20px;\" /></td>
    <td  bgcolor=\"#ffffff\"><input type=\"submit\" name=\"Submit\" value=\"$tlacidlo\" /></td>
  </tr>
</table>
</form>
");
}

function vojakvloz2($a){
eval(vojakrozloz($a));
eval(vojakinfo($xxx,$GLOBALS["name"]));
echo("
<table width=\"427\" height=\"49\" border=\"0\">
  <tr>
    <td width=\"26\" height=\"22\"><img src=\"casti/jednotky/jednotobr/$xxx/v.jpg\" width=\"20\" height=\"20\" alt=\"$menov\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/s.jpg\" width=\"20\" height=\"20\" alt=\"$menos\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/k.jpg\" width=\"20\" height=\"20\" alt=\"$menok\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/r.jpg\" width=\"20\" height=\"20\" alt=\"$menor\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/j.jpg\" width=\"20\" height=\"20\" alt=\"$menoj\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/t.jpg\" width=\"20\" height=\"20\" alt=\"$menot\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/z.jpg\" width=\"20\" height=\"20\" alt=\"$menoz\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/b.jpg\" width=\"20\" height=\"20\" alt=\"$menob\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/a.jpg\" width=\"20\" height=\"20\" alt=\"$menoa\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/e.jpg\" width=\"20\" height=\"20\" alt=\"$menoe\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/n.jpg\" width=\"20\" height=\"20\" alt=\"$menon\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/d.jpg\" width=\"20\" height=\"20\" alt=\"$menod\" /></td>
    <td width=\"26\"><img src=\"casti/jednotky/jednotobr/$xxx/m.jpg\" width=\"20\" height=\"20\" alt=\"$menom\" /></td>
  </tr>
  <tr  bgcolor=\"#eeeeee\">
    <td height=\"21\"><input name=\"v\" type=\"text\" value=\"$v\" style=\"width: 20px;\" /></td>
    <td><input name=\"s\" type=\"text\" value=\"$s\" style=\"width: 20px;\" /></td>
    <td><input name=\"k\" type=\"text\" value=\"$k\" style=\"width: 20px;\" /></td>
    <td><input name=\"r\" type=\"text\" value=\"$r\" style=\"width: 20px;\" /></td>
    <td><input name=\"j\" type=\"text\" value=\"$j\" style=\"width: 20px;\" /></td>
    <td><input name=\"t\" type=\"text\" value=\"$t\" style=\"width: 20px;\" /></td>
    <td><input name=\"z\" type=\"text\" value=\"$z\" style=\"width: 20px;\" /></td>
    <td><input name=\"b\" type=\"text\" value=\"$b\" style=\"width: 20px;\" /></td>
    <td><input name=\"a\" type=\"text\" value=\"$a\" style=\"width: 20px;\" /></td>
    <td><input name=\"e\" type=\"text\" value=\"$e\" style=\"width: 20px;\" /></td>
    <td><input name=\"n\" type=\"text\" value=\"$n\" style=\"width: 20px;\" /></td>
    <td><input name=\"d\" type=\"text\" value=\"$d\" style=\"width: 20px;\" /></td>
    <td><input name=\"m\" type=\"text\" value=\"$m\" style=\"width: 20px;\" /></td>
  </tr>
</table>
");
}

function vojakv($a,$b){
eval(vojakrozloz(vojakminus($b,$a)));
if($v < 0){ $q = "1"; }
if($s < 0){ $q = "1"; }
if($k < 0){ $q = "1"; }
if($r < 0){ $q = "1"; }
if($j < 0){ $q = "1"; }
if($t < 0){ $q = "1"; }
if($z < 0){ $q = "1"; }
if($b < 0){ $q = "1"; }
if($a < 0){ $q = "1"; }
if($e < 0){ $q = "1"; }
if($n < 0){ $q = "1"; }
if($d < 0){ $q = "1"; }
if($m < 0){ $q = "1"; }
if(!$q){ return("1"); }else{ return(""); }
}

function vojakplus($a,$c){
eval(vojakrozloz($a));
$v2 = $v;
$s2 = $s;
$k2 = $k;
$r2 = $r;
$j2 = $j;
$t2 = $t;
$z2 = $z;
$b2 = $b;
$a2 = $a;
$e2 = $e;
$n2 = $n;
$d2 = $d;
$m2 = $m;
eval(vojakrozloz($c));
return(".$xxx(v".($v2 + $v).",s".($s2 + $s).",k".($k2 + $k).",r".($r2 + $r).",j".($j2 + $j).",t".($t2 + $t).",z".($z2 + $z).",b".($b2 + $b).",a".($a2 + $a).",e".($e2 + $e).",n".($n2 + $n).",d".($d2 + $d).",m".($m2 + $m).")");
}
function vojakminus($a,$c){
eval(vojakrozloz($a));
$v2 = $v;
$s2 = $s;
$k2 = $k;
$r2 = $r;
$j2 = $j;
$t2 = $t;
$z2 = $z;
$b2 = $b;
$a2 = $a;
$e2 = $e;
$n2 = $n;
$d2 = $d;
$m2 = $m;
eval(vojakrozloz($c));
return(".$xxx(v".($v2 - $v).",s".($s2 - $s).",k".($k2 - $k).",r".($r2 - $r).",j".($j2 - $j).",t".($t2 - $t).",z".($z2 - $z).",b".($b2 - $b).",a".($a2 - $a).",e".($e2 - $e).",n".($n2 - $n).",d".($d2 - $d).",m".($m2 - $m).")");
}
function vojakvlozx(){
if($_POST["anov"]){
return(".1(v".($_POST["v"]+0).",s".($_POST["s"]+0).",k".($_POST["k"]+0).",r".($_POST["r"]+0).",j".($_POST["j"]+0).",t".($_POST["t"]+0).",z".($_POST["z"]+0).",b".($_POST["b"]+0).",a".($_POST["a"]+0).",e".($_POST["e"]+0).",n".($_POST["n"]+0).",d".($_POST["d"]+0).",m".($_POST["m"]+0).")");
}else{
return(".1(v0,s0,k0,r0,j0,t0,z0,b0,a0,e0,n0,d0,m0)");
}
}

function vojakcena($a){
eval(vojakrozloz($a));
eval(vojakinfo($xxx,$GLOBALS["vojak1"]));
$cena = ($v*$cenav)+$cena;
$cena = ($s*$cenas)+$cena;
$cena = ($k*$cenak)+$cena;
$cena = ($r*$cenar)+$cena;
$cena = ($j*$cenaj)+$cena;
$cena = ($t*$cenat)+$cena;
$cena = ($z*$cenaz)+$cena;
$cena = ($b*$cenab)+$cena;
$cena = ($a*$cenaa)+$cena;
$cena = ($e*$cenae)+$cena;
$cena = ($n*$cenan)+$cena;
$cena = ($d*$cenad)+$cena;
$cena = ($m*$cenam)+$cena;
return($cena);
}

function vojaktext($a){
eval(vojakrozloz($a));
/*echo*/eval(vojakinfo($xxx,$GLOBALS["vojak2"]));
return("<a onclick=\"alert(\\'$v $meno2pv, $s $meno2ps, $k $meno2pk, $r $meno2pr, $j $meno2pj, $t $meno2pt, $z $meno2pz, $b $meno2pb, $a $meno2pa, $e $meno2pe, $n $meno2pn, $d $meno2pd, $m $meno2pm\\');\">(+)</a>");
}

function vojakutok($a,$vzdalenost){
//echo($a);
eval(vojakrozloz($a));
eval(vojakinfo($xxx,$GLOBALS["vojak3"]));
eval(vojakinfo($xxx,$GLOBALS["vojak4"]));
return(
($v*$utokv/100*(100-((100-$vydrzv)*($vzdalenost/10)) ))
+($s*$utoks/100*(100-((100-$vydrzs)*($vzdalenost/10)) ))
+($k*$utokk/100*(100-((100-$vydrzk)*($vzdalenost/10)) ))
+($r*$utokr/100*(100-((100-$vydrzr)*($vzdalenost/10)) ))
+($j*$utokj/100*(100-((100-$vydrzj)*($vzdalenost/10)) ))
+($t*$utokt/100*(100-((100-$vydrzt)*($vzdalenost/10)) ))
+($z*$utokz/100*(100-((100-$vydrzz)*($vzdalenost/10)) ))
+($b*$utokb/100*(100-((100-$vydrzb)*($vzdalenost/10)) ))
+($a*$utoka/100*(100-((100-$vydrza)*($vzdalenost/10)) ))
+($e*$utoke/100*(100-((100-$vydrze)*($vzdalenost/10)) ))
+($n*$utokn/100*(100-((100-$vydrzn)*($vzdalenost/10)) ))
+($d*$utokd/100*(100-((100-$vydrzd)*($vzdalenost/10)) ))
+($m*$utokm/100*(100-((100-$vydrzm)*($vzdalenost/10)) ))
);
}

function vojakrychlost($a,$vzdalenost){
eval(vojakrozloz($a));
eval(vojakinfo($xxx,$GLOBALS["vojak5"]));
if($v){ $v = 1; }
if($s){ $s = 1; }
if($k){ $k = 1; }
if($r){ $r = 1; }
if($j){ $j = 1; }
if($t){ $t = 1; }
if($z){ $z = 1; }
if($b){ $b = 1; }
if($a){ $a = 1; }
if($e){ $e = 1; }
if($n){ $n = 1; }
if($d){ $d = 1; }
if($m){ $m = 1; }
return intval(60*max(array(($v*$rychlostv*$vzdalenost),($s*$rychlosts*$vzdalenost),($k*$rychlostk*$vzdalenost),($r*$rychlostr*$vzdalenost),($j*$rychlostj*$vzdalenost),($t*$rychlostt*$vzdalenost),($z*$rychlostz*$vzdalenost),($b*$rychlostb*$vzdalenost),($a*$rychlosta*$vzdalenost),($e*$rychloste*$vzdalenost),($n*$rychlostn*$vzdalenost),($d*$rychlostd*$vzdalenost),($m*$rychlostm*$vzdalenost)))+0.9);
}



function vojakboj($vojakind,$zivot,$utok,$vzdalenost){
//echo("($vojakind,$zivot,$utok,$vzdalenost)");
$round = 1;
while(!$stop){
if($round == 1){
$utok2 = vojakutok($vojakind,$vzdalenost);  
$zivot = ($zivot - $utok2); 
$round = 2;
}else{
eval(vojakrozloz($vojakind));
//eval(vojakinfo($xxx,$GLOBALS["vojak6"]));
//eval(vojakinfo($xxx,$GLOBALS["vojak7"]));

if($v > 0){ $v = ((($v*$zivotv)-$utok)/$zivotv); }
if($s > 0){ $s = ((($s*$zivots)-$utok)/$zivots); }
if($k > 0){ $k = ((($k*$zivotk)-$utok)/$zivotk); }
if($r > 0){ $r = ((($r*$zivotr)-$utok)/$zivotr); }
if($j > 0){ $j = ((($j*$zivotj)-$utok)/$zivotj); }
if($t > 0){ $t = ((($t*$zivott)-$utok)/$zivott); }
if($z > 0){ $z = ((($z*$zivotz)-$utok)/$zivotz); }
if($b > 0){ $b = ((($b*$zivotb)-$utok)/$zivotb); }
if($a > 0){ $a = ((($a*$zivota)-$utok)/$zivota); }
if($e > 0){ $e = ((($e*$zivote)-$utok)/$zivote); }
if($n > 0){ $n = ((($n*$zivotn)-$utok)/$zivotn); }
if($d > 0){ $d = ((($d*$zivotd)-$utok)/$zivotd); }
if($m > 0){ $m = ((($m*$zivotm)-$utok)/$zivotm); }

$vojakind = ".1(v".intval($v+($regeneracev/100)).",s".intval($s+($regeneraces/100)).",k".intval($k+($regeneracek/100)).",r".intval($r+($regeneracer/100)).",j".intval($j+($regeneracej/100)).",t".intval($t+($regeneracet/100)).",z".intval($z+($regeneracez/100)).",b".intval($b+($regeneraceb/100)).",a".intval($a+($regeneracea/100)).",e".intval($e+($regeneracee/100)).",n".intval($n+($regeneracen/100)).",d".intval($d+($regeneraced/100)).",m".intval($m+($regeneracem/100)).")";
//echo($vojakind);
$round = 1;
}
eval(vojakrozloz($vojakind));
if($zivot < 1 or ($v+$s+$k+$r+$j+$t+$z+$b+$a+$e+$n+$d+$m) < 1){ $stop = 1; }
}
if($zivot < 1){
return($vojakind);
}else{
return($zivot);
}
}

function polickoplat($xc,$yc){
$odpoved = mysql_query("SELECT xc FROM towns2_ WHERE xc = '$xc' AND yc = '$yc' AND vlastnik != '1' AND obrazok != 'hlbudova'");
return(mysql_num_rows($odpoved));
}

function zobraztbl($xxx){
eval(vojakinfo($xxx,$GLOBALS["vojak6"]));
eval(vojakinfo($xxx,$GLOBALS["vojak7"]));
eval(vojakinfo($xxx,$GLOBALS["vojak3"]));
eval(vojakinfo($xxx,$GLOBALS["vojak4"]));
eval(vojakinfo($xxx,$GLOBALS["vojak5"]));
eval(vojakinfo($xxx,$GLOBALS["vojak1"]));
eval(vojakinfo($xxx,$GLOBALS["name"]));

echo("<table width=\"570\" border=\"0\">
  <tr>
    <td colspan=\"3\"><strong>" . $GLOBALS["vojak9"] . ": </strong></td>
    <th width=\"57\" bgcolor=\"#dddddd\">" . $GLOBALS["vojak10"] . ":</th>
    <th width=\"80\" bgcolor=\"#dddddd\">" . $GLOBALS["vojak11"] . ":</th>
    <th width=\"75\" bgcolor=\"#dddddd\">" . $GLOBALS["vojak12"]. ":</th>
    <th width=\"78\" bgcolor=\"#dddddd\">" . $GLOBALS["vojak13"] . ":</th>
    <th width=\"114\" bgcolor=\"#dddddd\">*" . $GLOBALS["vojak14"] . ":</th>
    <th width=\"106\" bgcolor=\"#dddddd\">" . $GLOBALS["vojak15"] . ":</th>
  </tr>
  <tr>
    <td width=\"14\">&nbsp;</td>
    <td width=\"99\">$menov</td>
    <td width=\"23\"><img src=\"casti/jednotky/jednotobr/$xxx/v.jpg\" width=\"20\" height=\"20\" alt=\"$menov\" /></td>
    <td width=\"57\" bgcolor=\"#dddddd\">$zivotv</td>
    <td width=\"80\" bgcolor=\"#dddddd\">$regeneracev%</td>
    <td width=\"75\" bgcolor=\"#dddddd\">$utokv</td>
    <td width=\"78\" bgcolor=\"#dddddd\">$vydrzv%</td>
    <td width=\"114\" bgcolor=\"#dddddd\">$rychlostv (".(60/$rychlostv).")</td>
    <td width=\"106\" bgcolor=\"#dddddd\">$cenav " . $GLOBALS["vojak16"] . "</td>
  </tr>
  <tr>
    <td width=\"14\">&nbsp;</td>
    <td width=\"99\">$menos</td>
    <td width=\"23\"><img src=\"casti/jednotky/jednotobr/$xxx/s.jpg\" width=\"20\" height=\"20\" alt=\"$menos\" /></td>
    <td width=\"57\" bgcolor=\"#dddddd\">$zivots</td>
    <td width=\"80\" bgcolor=\"#dddddd\">$regeneraces%</td>
    <td width=\"75\" bgcolor=\"#dddddd\">$utoks</td>
    <td width=\"78\" bgcolor=\"#dddddd\">$vydrzs%</td>
    <td width=\"114\" bgcolor=\"#dddddd\">$rychlosts (".(60/$rychlosts).")</td>
    <td width=\"106\" bgcolor=\"#dddddd\">$cenas " . $GLOBALS["vojak16"] . "</td>
  </tr>
  <tr>
    <td width=\"14\">&nbsp;</td>
    <td width=\"99\">$menok</td>
    <td width=\"23\"><img src=\"casti/jednotky/jednotobr/$xxx/k.jpg\" width=\"20\" height=\"20\" alt=\"$menok\" /></td>
    <td width=\"57\" bgcolor=\"#dddddd\">$zivotk</td>
    <td width=\"80\" bgcolor=\"#dddddd\">$regeneracek%</td>
    <td width=\"75\" bgcolor=\"#dddddd\">$utokk</td>
    <td width=\"78\" bgcolor=\"#dddddd\">$vydrzk%</td>
    <td width=\"114\" bgcolor=\"#dddddd\">$rychlostk (".(60/$rychlostk).")</td>
    <td width=\"106\" bgcolor=\"#dddddd\">$cenak " . $GLOBALS["vojak16"] . "</td>
  </tr>
  <tr>
    <td width=\"14\">&nbsp;</td>
    <td width=\"99\">$menor</td>
    <td width=\"23\"><img src=\"casti/jednotky/jednotobr/$xxx/r.jpg\" width=\"20\" height=\"20\" alt=\"$menor\" /></td>
    <td width=\"57\" bgcolor=\"#dddddd\">$zivotr</td>
    <td width=\"80\" bgcolor=\"#dddddd\">$regeneracer%</td>
    <td width=\"75\" bgcolor=\"#dddddd\">$utokr</td>
    <td width=\"78\" bgcolor=\"#dddddd\">$vydrzr%</td>
    <td width=\"114\" bgcolor=\"#dddddd\">$rychlostr (".(60/$rychlostr).")</td>
    <td width=\"106\" bgcolor=\"#dddddd\">$cenar " . $GLOBALS["vojak16"] . "</td>
  </tr>
  <tr>
    <td width=\"14\">&nbsp;</td>
    <td width=\"99\">$menoj</td>
    <td width=\"23\"><img src=\"casti/jednotky/jednotobr/$xxx/j.jpg\" width=\"20\" height=\"20\" alt=\"$menoj\" /></td>
    <td width=\"57\" bgcolor=\"#dddddd\">$zivotj</td>
    <td width=\"80\" bgcolor=\"#dddddd\">$regeneracej%</td>
    <td width=\"75\" bgcolor=\"#dddddd\">$utokj</td>
    <td width=\"78\" bgcolor=\"#dddddd\">$vydrzj%</td>
    <td width=\"114\" bgcolor=\"#dddddd\">$rychlostj (".(60/$rychlostj).")</td>
    <td width=\"106\" bgcolor=\"#dddddd\">$cenaj " . $GLOBALS["vojak16"] . "</td>
  </tr>
  <tr>
    <td width=\"14\">&nbsp;</td>
    <td width=\"99\">$menot</td>
    <td width=\"23\"><img src=\"casti/jednotky/jednotobr/$xxx/t.jpg\" width=\"20\" height=\"20\" alt=\"$menot\" /></td>
    <td width=\"57\" bgcolor=\"#dddddd\">$zivott</td>
    <td width=\"80\" bgcolor=\"#dddddd\">$regeneracet%</td>
    <td width=\"75\" bgcolor=\"#dddddd\">$utokt</td>
    <td width=\"78\" bgcolor=\"#dddddd\">$vydrzt%</td>
    <td width=\"114\" bgcolor=\"#dddddd\">$rychlostt (".(60/$rychlostt).")</td>
    <td width=\"106\" bgcolor=\"#dddddd\">$cenat " . $GLOBALS["vojak16"] . "</td>
  </tr>
  <tr>
    <td width=\"14\">&nbsp;</td>
    <td width=\"99\">$menoz</td>
    <td width=\"23\"><img src=\"casti/jednotky/jednotobr/$xxx/z.jpg\" width=\"20\" height=\"20\" alt=\"$menoz\" /></td>
    <td width=\"57\" bgcolor=\"#dddddd\">$zivotz</td>
    <td width=\"80\" bgcolor=\"#dddddd\">$regeneracez%</td>
    <td width=\"75\" bgcolor=\"#dddddd\">$utokz</td>
    <td width=\"78\" bgcolor=\"#dddddd\">$vydrzz%</td>
    <td width=\"114\" bgcolor=\"#dddddd\">$rychlostz (".(60/$rychlostz).")</td>
    <td width=\"106\" bgcolor=\"#dddddd\">$cenaz " . $GLOBALS["vojak16"] . "</td>
  </tr>
  <tr>
    <td width=\"14\">&nbsp;</td>
    <td width=\"99\">$menob</td>
    <td width=\"23\"><img src=\"casti/jednotky/jednotobr/$xxx/b.jpg\" width=\"20\" height=\"20\" alt=\"$menob\" /></td>
    <td width=\"57\" bgcolor=\"#dddddd\">$zivotb</td>
    <td width=\"80\" bgcolor=\"#dddddd\">$regeneraceb%</td>
    <td width=\"75\" bgcolor=\"#dddddd\">$utokb</td>
    <td width=\"78\" bgcolor=\"#dddddd\">$vydrzb%</td>
    <td width=\"114\" bgcolor=\"#dddddd\">$rychlostb (".(60/$rychlostb).")</td>
    <td width=\"106\" bgcolor=\"#dddddd\">$cenab " . $GLOBALS["vojak16"] . "</td>
  </tr>
  <tr>
    <td width=\"14\">&nbsp;</td>
    <td width=\"99\">$menoa</td>
    <td width=\"23\"><img src=\"casti/jednotky/jednotobr/$xxx/a.jpg\" width=\"20\" height=\"20\" alt=\"$menoa\" /></td>
    <td width=\"57\" bgcolor=\"#dddddd\">$zivota</td>
    <td width=\"80\" bgcolor=\"#dddddd\">$regeneracea%</td>
    <td width=\"75\" bgcolor=\"#dddddd\">$utoka</td>
    <td width=\"78\" bgcolor=\"#dddddd\">$vydrza%</td>
    <td width=\"114\" bgcolor=\"#dddddd\">$rychlosta (".(60/$rychlosta).")</td>
    <td width=\"106\" bgcolor=\"#dddddd\">$cenaa " . $GLOBALS["vojak16"] . "</td>
  </tr>
  <tr>
    <td width=\"14\">&nbsp;</td>
    <td width=\"99\">$menoe</td>
    <td width=\"23\"><img src=\"casti/jednotky/jednotobr/$xxx/e.jpg\" width=\"20\" height=\"20\" alt=\"$menoe\" /></td>
    <td width=\"57\" bgcolor=\"#dddddd\">$zivote</td>
    <td width=\"80\" bgcolor=\"#dddddd\">$regeneracee%</td>
    <td width=\"75\" bgcolor=\"#dddddd\">$utoke</td>
    <td width=\"78\" bgcolor=\"#dddddd\">$vydrze%</td>
    <td width=\"114\" bgcolor=\"#dddddd\">$rychloste (".(60/$rychloste).")</td>
    <td width=\"106\" bgcolor=\"#dddddd\">$cenae " . $GLOBALS["vojak16"] . "</td>
  </tr>
  <tr>
    <td width=\"14\">&nbsp;</td>
    <td width=\"99\">$menon</td>
    <td width=\"23\"><img src=\"casti/jednotky/jednotobr/$xxx/n.jpg\" width=\"20\" height=\"20\" alt=\"$menon\" /></td>
    <td width=\"57\" bgcolor=\"#dddddd\">$zivotn</td>
    <td width=\"80\" bgcolor=\"#dddddd\">$regeneracen%</td>
    <td width=\"75\" bgcolor=\"#dddddd\">$utokn</td>
    <td width=\"78\" bgcolor=\"#dddddd\">$vydrzn%</td>
    <td width=\"114\" bgcolor=\"#dddddd\">$rychlostn (".(60/$rychlostn).")</td>
    <td width=\"106\" bgcolor=\"#dddddd\">$cenan " . $GLOBALS["vojak16"] . "</td>
  </tr>
  <tr>
    <td width=\"14\">&nbsp;</td>
    <td width=\"99\">$menod</td>
    <td width=\"23\"><img src=\"casti/jednotky/jednotobr/$xxx/d.jpg\" width=\"20\" height=\"20\" alt=\"$menod\" /></td>
    <td width=\"57\" bgcolor=\"#dddddd\">$zivotd</td>
    <td width=\"80\" bgcolor=\"#dddddd\">$regeneraced%</td>
    <td width=\"75\" bgcolor=\"#dddddd\">$utokd</td>
    <td width=\"78\" bgcolor=\"#dddddd\">$vydrzd%</td>
    <td width=\"114\" bgcolor=\"#dddddd\">$rychlostd (".(60/$rychlostd).")</td>
    <td width=\"106\" bgcolor=\"#dddddd\">$cenad " . $GLOBALS["vojak16"] . "</td>
  </tr>
  <tr>
    <td width=\"14\">&nbsp;</td>
    <td width=\"99\">$menom</td>
    <td width=\"23\"><img src=\"casti/jednotky/jednotobr/$xxx/m.jpg\" width=\"20\" height=\"20\" alt=\"$menom\" /></td>
    <td width=\"57\" bgcolor=\"#dddddd\">$zivotm</td>
    <td width=\"80\" bgcolor=\"#dddddd\">$regeneracem%</td>
    <td width=\"75\" bgcolor=\"#dddddd\">$utokm</td>
    <td width=\"78\" bgcolor=\"#dddddd\">$vydrzm%</td>
    <td width=\"114\" bgcolor=\"#dddddd\">$rychlostm (".(60/$rychlostm).")</td>
    <td width=\"106\" bgcolor=\"#dddddd\">$cenam " . $GLOBALS["vojak16"] . "</td>
  </tr>
</table></br>
<i>
*" . $GLOBALS["vojak17"] . "</br>
</i>");
}
?>