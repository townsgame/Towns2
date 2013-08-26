<br/>
<?php
if($_POST["pocet1"] < 0 or $_POST["pocet2"] < 0){ chyba3(); }

if($_POST["surovina1"]){
if(zsur($_POST["surovina1"],$_POST["pocet1"])){
alog("prevedeno ".$_POST["pocet1"]." ".$_POST["surovina1"]." na prachy",0);
surovinanew($_SESSION["id"],"prachy","+",intval($_POST["pocet1"]/2));
surovinanew($_SESSION["id"],$_POST["surovina1"],"-",$_POST["pocet1"]);
chyba2("Převedeno");
}else{
chyba1("Nedostatek surovin");
}
}
if($_POST["surovina2"]){
if(zsur("prachy",$_POST["pocet2"])){
alog("prevedeno ".$_POST["pocet2"]." penazi na ".$_POST["surovina2"],0);
surovinanew($_SESSION["id"],"prachy","-",$_POST["pocet2"]);
surovinanew($_SESSION["id"],$_POST["surovina2"],"+",$_POST["pocet2"]);
chyba2("Převedeno");
}else{
chyba1("Nedostatek peněz");
}
}
?>

<form id="form1" name="form1" method="post" action="">
  <b>vyměnit: </b><input name="pocet1" type="text" id="pocet1" value="100" size="5" maxlength="5" />
  <select name="surovina1" id="surovina1">
    <!--<option value="jedlo">jídla</option>-->
    <option value="kamen">kamene</option>
    <option value="zelezo">železa</option>
    <option value="drevo">dřeva</option>
  </select>
 za 2x méně peněz 
<input type="submit" name="Submit" value="změnit" />
</form>

<form id="form1" name="form1" method="post" action="">
    <b>vyměnit: </b> <input name="pocet2" type="text" id="pocet2" value="100" size="5" maxlength="5" /> 
 peněz za tolik 
  <select name="surovina2" id="surovina2">
    <!--<option value="jedlo">jídla</option>-->
    <option value="kamen">kamene</option>
    <option value="zelezo">železa</option>
    <option value="drevo">dřeva</option>
  </select>
  <input type="submit" name="Submit2" value="změnit" />
</form>