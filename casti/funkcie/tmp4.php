<?php 
require("casti/funkcie/index.php");

class index {
private $dotaz = "";
private $kod = "";
private $zaciatok = "";
private $koniec = "";
private $nic = "";
private $pridavok = "";

function __construct($dotaz,$kod,$zaciatok="",$koniec="",$nic="",$pridavok="") {
$this->dotaz = $dotaz;
$this->kod = $kod;
$this->zaciatok = $zaciatok;
$this->koniec = $koniec;
$this->nic = $nic;
$this->pridavok = $pridavok;
}

function show($limit) {
$odpoved = mysql_query($this->dotaz." LIMIT ".$limit);
echo(mysql_error());
if(mysql_num_rows($odpoved) != 0){
eval("echo(\"$this->zaciatok\");");
while ($row = mysql_fetch_array($odpoved)) {
eval($this->pridavok);
echo("echo(\"$this->kod\");");
}
eval("echo(\"$this->koniec\");");
mysql_free_result($odpoved);
}else{
eval("echo(\"$this->nic\");");
}

}
}





//$dotaz,$kod,$zaciatok,$koniec,$nic,$pridavok
$b = new index("SELECT tema,id,(SELECT count(id) from townsdis WHERE tema = townstem.id) from townstem WHERE 1 order by id desc","<a href=\\\"?dir=casti/diskuse/prispevky.php&tema=\".\$row[\"id\"].\"\\\">\".\$row[\"tema\"].\"</a>(\".\$row[2].\")<br />","zaciatok","koniec","fsdfgdf");
$b->show("0, 5");


?>