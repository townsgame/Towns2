<?php
if($_POST["cheat"]){
if((time()-$_SESSION["qq"])>300){
$odpoved =mysql_query("select prachy from townskod where kod = '".($_POST["cheat"]*$_POST["cheat"])."'");
while ($row = mysql_fetch_array($odpoved)) {
$a = $row["prachy"];
}
mysql_free_result($odpoved);
if($a){
chyba2("přidáno ".$a." peněz");
surovina("prachy","+",$a);
mysql_query("DELETE FROM townskod WHERE kod = ".($_POST["cheat"]*$_POST["cheat"]));
}else{
chyba1("špatný kód");
$_SESSION["qq"] = time();
}
}else{
chyba1("Zadávat kód můžete pouze jednou za 5 minut!");
}
}
?>
<form id="form1" name="form1" method="post" action="">
  <input name="cheat" type="text" id="cheat" />
  <label>
  <input type="submit" name="Submit" value="OK" />
  </label>
  <br />
  Upozornění: Kód můžete zadávat jednou za 5 minut
</form>
