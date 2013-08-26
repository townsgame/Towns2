<?php
$surky=new index("towns2_uziv","select prachy,jedlo,kamen,zelezo,drevo,body,ludia,ludiamax,surek,(SELECT COUNT( xc ) FROM towns2 WHERE vlastnik = towns2_uziv.id AND obrazok = 'trziste') from towns2_uziv where ppp");
$surkyu = $surky->get("id = '".$_SESSION["id"]."'");
$prachy = $surkyu["prachy"];
$jedlo = $surkyu["jedlo"];
$kamen = $surkyu["kamen"];
$zelezo = $surkyu["zelezo"];
$drevo = $surkyu["drevo"];
$body = $surkyu["body"];
$ludia = $surkyu["ludia"];
$ludiamax = $surkyu["ludiamax"];
$surek = $surkyu["surek"];
$surekmax = $surkyu[9]*1000;
?><br/>
<table width="316" border="0" cellpadding="0" cellspacing="0">
  <tr valign="middle">
    <th width="29" align="left" scope="col">&nbsp;</th>
    <th width="72" height="24" align="left" scope="col">peníze: </th>
    <th width="215" align="left" scope="col"><img src="casti/suroviny/desing/prachy.jpg" alt="prachy" width="20" height="20" border="1" /> &nbsp; <?php echo($prachy); ?></th>
  </tr>
  <!--<tr valign="middle">
    <th align="left" scope="col">&nbsp;</th>
    <th height="24" align="left" scope="col"><?php echo $xjidlo; ?></th>
    <th align="left" scope="col"><img src="casti/suroviny/desing/jedlo.jpg" alt="jídlo" width="20" height="20" border="1" /> &nbsp; <?php echo($jedlo); ?></th>
  </tr>-->
  <tr valign="middle">
    <th align="left" scope="col">&nbsp;</th>
    <th height="24" align="left" scope="col">kámen: </th>
    <th align="left" scope="col"><img src="casti/suroviny/desing/kamen.jpg" alt="kámen" width="20" height="20" border="1" /> &nbsp; <?php echo($kamen); ?></th>
  </tr>
  <tr valign="middle">
    <th align="left" scope="col">&nbsp;</th>
    <th height="24" align="left" scope="col">železo: </th>
    <th align="left" scope="col"><img src="casti/suroviny/desing/zelezo.jpg" alt="železo" width="20" height="20" border="1" /> &nbsp; <?php echo($zelezo); ?></th>
  </tr>
  <tr valign="middle">
    <th align="left" scope="col">&nbsp;</th>
    <th height="24" align="left" scope="col">dřevo: </th>
    <th align="left" scope="col"><img src="casti/suroviny/desing/drevo.jpg" alt="dřevo" width="20" height="20" border="1" /> &nbsp; <?php echo($drevo); ?></th>
  </tr>
  <tr valign="middle">
    <th align="left" scope="col">&nbsp;</th>
    <th height="24" align="left" scope="col">body: </th>
    <th align="left" scope="col"><img src="casti/suroviny/desing/vyspelost.jpg" alt="body" width="20" height="20" border="1" /> &nbsp; <?php echo($body); ?></th>
  </tr>
  <tr valign="middle">
    <th align="left" scope="col">&nbsp;</th>
    <th height="24" align="left" scope="col">populace: </th>
    <th align="left" scope="col"><img src="casti/suroviny/desing/ludia.jpg" alt="populace" width="20" height="20" border="1" /> &nbsp; <?php echo($ludia); ?> / <?php echo($ludiamax); ?></th>
</table><br/>
<?php /*help("meno");*/ ?>
<h1>poslanÉ suroviny</h1>
<?php surkyposlane(); ?>