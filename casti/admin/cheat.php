<?php
if($_POST["cheat"]){
$aq=1;
//prachy
if($_POST["cheat"]=="money++"){
if(zsur("prachy",100)){
surovina("prachy","-",100);
surovina("drevo","+",100);
chyba2("převedeno 100 peněz na 100 dřeva");
}else{
chyba1("nedostatek peněz");
}
$aq=0;
}
//prachy
if($_POST["cheat"]=="chcemprachy"){
chyba2("přidáno 1000 peňez");
surovina("prachy","+",1000);
$aq=0;
}
//jedlo
if($_POST["cheat"]=="chcemjedlo"){
chyba2("přidáno 1000 jídla");
surovina("jedlo","+",1000);
$aq=0;
}
//kamen
if($_POST["cheat"]=="chcemkamen"){
chyba2("přidáno 1000 kamene");
surovina("kamen","+",1000);
$aq=0;
}
//zelezo
if($_POST["cheat"]=="chcemzelezo"){
chyba2("přidáno 1000 železa");
surovina("zelezo","+",1000);
$aq=0;
}
//drevo
if($_POST["cheat"]=="chcemdrevo"){
chyba2("přidáno 1000 dřeva");
surovina("drevo","+",1000);
$aq=0;
}
//prachy vela
if($_POST["cheat"]=="prosimsiprachy"){
chyba2("přidáno 1000000 peňez");
surovina("prachy","+",1000000);
$aq=0;
}
//jedlo vela
if($_POST["cheat"]=="prosimsijedlo"){
chyba2("přidáno 1000000 jídla");
surovina("jedlo","+",1000000);
$aq=0;
}
//kamen vela
if($_POST["cheat"]=="prosimsikamen"){
chyba2("přidáno 1000000 kamene");
surovina("kamen","+",1000000);
$aq=0;
}
//zelezo vela
if($_POST["cheat"]=="prosimsizelezo"){
chyba2("přidáno 1000000 železa");
surovina("zelezo","+",1000000);
$aq=0;
}
//drevo vela
if($_POST["cheat"]=="prosimsidrevo"){
chyba2("přidáno 1000000 dřeva");
surovina("drevo","+",1000000);
$aq=0;
}
//mestozal
if($_POST["cheat"]=="nullcity"){
chyba2("nyní můžete založit nové město");
mysql_query("UPDATE townsuziv SET mestozal='30' WHERE id=".$_SESSION['id']);
$aq=0;
}
//mestozal
if($_POST["cheat"]=="nullcity1000000"){
chyba2("nyní můžete založit nové město");
mysql_query("UPDATE townsuziv SET mestozal='1000000' WHERE id=".$_SESSION['id']);
$aq=0;
}
//logof
if($_POST["cheat"]=="logof"){
chyba2("nyní jste odhlášeni");
session_destroy();
$aq=0;
}

}
if($aq==1){
chyba1("tento příkaz je neplatný");
}
?>
<form id="form1" name="form1" method="post" action="">
  <input name="cheat" type="password" id="cheat" />
  <label>
  <input type="submit" name="Submit" value="OK" />
  </label>
</form>
