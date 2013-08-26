<?php
if(!$_SESSION["uzivatel"]){
chyba1("špatné heslo nebo uživatelské jméno <a href=\"?dir=casti/admin/index.php\">zpět</a>");
}else{
require("casti/uvod/index.php");
}
?>