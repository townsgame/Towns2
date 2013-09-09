<br />
<?php
if($_POST["pocet1"] < 0 or $_POST["pocet2"] < 0){ chyba3(); }

if($_POST["surovina1"]){
if(zsur($_POST["surovina1"],$_POST["pocet1"])){
alog($GLOBALS["sbanka1"]." ".$_POST["pocet1"]." ".$_POST["surovina1"]." ".$GLOBALS["sbanka2"],0);
surovinanew($_SESSION["id"],"prachy","+",intval($_POST["pocet1"]/2));
surovinanew($_SESSION["id"],$_POST["surovina1"],"-",$_POST["pocet1"]);
chyba2($GLOBALS["sbanka3"]);
}else{
chyba1($GLOBALS["sbanka4"]);
}
}
if($_POST["surovina2"]){
if(zsur("prachy",$_POST["pocet2"])){
alog($GLOBALS["sbanka1"]." ".$_POST["pocet2"]." ".$GLOBALS["sbanka5"]." ".$_POST["surovina2"],0);
surovinanew($_SESSION["id"],"prachy","-",$_POST["pocet2"]);
surovinanew($_SESSION["id"],$_POST["surovina2"],"+",$_POST["pocet2"]);
chyba2($GLOBALS["sbanka3"]);
}else{
chyba1($GLOBALS["sbanka6"]);
}
}
?>

<form id="form1" name="form1" method="post" action="">
  <b><?php echo $GLOBALS["svymenad2"]; ?>: </b><input name="pocet1" type="text" id="pocet1" value="100" size="5" maxlength="5" />
  <select name="surovina1" id="surovina1">
    <!--<option value="jedlo"><?php echo $GLOBALS["sbanka6a"]; ?></option>-->
    <option value="kamen"><?php echo $GLOBALS["sbanka7"]; ?></option>
    <option value="zelezo"><?php echo $GLOBALS["sbanka8"]; ?></option>
    <option value="drevo"><?php echo $GLOBALS["sbanka9"]; ?></option>
  </select>
 <?php echo $GLOBALS["sbanka10"]; ?>
<input type="submit" name="Submit" value="<?php echo $GLOBALS["sbanka11"]; ?>" />
</form>

<form id="form1" name="form1" method="post" action="">
    <b><?php echo $GLOBALS["svymenad2"]; ?>: </b> <input name="pocet2" type="text" id="pocet2" value="100" size="5" maxlength="5" /> 
 <?php echo $GLOBALS["sbanka12"]; ?> 
  <select name="surovina2" id="surovina2">
    <!--<option value="jedlo"><?php echo $GLOBALS["sbanka6a"]; ?></option>-->
    <option value="kamen"><?php echo $GLOBALS["sbanka7"]; ?></option>
    <option value="zelezo"><?php echo $GLOBALS["sbanka8"]; ?></option>
    <option value="drevo"><?php echo $GLOBALS["sbanka9"]; ?></option>
  </select>
  <input type="submit" name="Submit2" value="<?php echo $GLOBALS["sbanka11"]; ?>" />
</form>