<?php
echo("<b>" . $GLOBALS["iinfo"] . ": </b>");
echo(hnet("towns2_uziv","SELECT count(1) FROM towns2_uziv WHERE aktivita+3600 > ".(intval(time()/86400)*86400)));
/*echo("<br>Aktivních: </br>");
echo(hnet("towns2_uziv","SELECT count(1) FROM towns2_uziv WHERE aktivita+3600 > ".(intval(time()/86400)*86400)));*/
?>