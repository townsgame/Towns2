<?php
if($_POST["surovina1"]){
if(zsur($_POST["surovina1"],$_POST["pocet1"])){
alog("prevedeno ".$_POST["pocet1"]." ".$_POST["surovina1"]." na prachy",0);
surovina("prachy","+",($_POST["pocet1"]/2));
surovina($_POST["surovina1"],"-",$_POST["pocet1"]);
chyba2("převedeno");
}else{
chyba1($xnedostatek1);
}
}
if($_POST["surovina2"]){
if(zsur("prachy",$_POST["pocet2"])){
alog("prevedeno ".$_POST["pocet2"]." penazi na ".$_POST["surovina2"],0);
surovina("prachy","-",$_POST["pocet2"]);
surovina($_POST["surovina2"],"+",$_POST["pocet2"]);
chyba2("převedeno");
}else{
chyba1($xnedostatek2);
}
}
?>
<form id="form1" name="form1" method="post" action="">
  <?php echo $xzmenit; ?> 
  <label>
  <input name="pocet1" type="text" id="pocet1" value="100" size="5" maxlength="5" />
  </label>
  <label>
  <select name="surovina1" id="surovina1">
    <option value="jedlo"><?php echo $xjidla; ?></option>
    <option value="kamen"><?php echo $xkamene; ?></option>
    <option value="zelezo"><?php echo $xzeleza; ?></option>
    <option value="drevo"><?php echo $xdreva; ?></option>
  </select>
  </label>
<?php echo $xza2x; ?> 
<label>
<input type="submit" name="Submit" value="změnit" />
</label> 
</form>
<form id="form1" name="form1" method="post" action="">
  <?php echo $xzmenit; ?> 
  <label>
    <input name="pocet2" type="text" id="pocet2" value="100" size="5" maxlength="5" /> 
    <?php echo $xpenezza; ?>  
  <label>
  <select name="surovina2" id="surovina2">
    <option value="jedlo"><?php echo $xjidla; ?></option>
    <option value="kamen"><?php echo $xkamene; ?></option>
    <option value="zelezo"><?php echo $xzeleza; ?></option>
    <option value="drevo"><?php echo $xdreva; ?></option>
  </select>
  <input type="submit" name="Submit2" value="změnit" />
  </label>
</form>
