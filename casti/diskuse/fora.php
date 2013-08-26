<strong>Sekce fóra:</strong><br />
<h1><a href="<?php echo gv("?dir=casti/diskuse/index.php&amp;forum=1"); ?>">Novinky & oznámení</a></h1>
Novinky a Oznámení týkající se této hry. 
<h1><a href="<?php echo gv("?dir=casti/diskuse/index.php&amp;forum=2"); ?>">Otázky</a></h1>
Máte nejaké otázky ohledně této hry?
<h1><a href="<?php echo gv("?dir=casti/diskuse/index.php&amp;forum=3"); ?>">Bugy</a></h1>
Našli jste ve hře nějakou chybu? Napište o ní a jako odměnu dostanete 20 000 peněz. 
<h1><a href="<?php echo gv("?dir=casti/diskuse/index.php&amp;forum=4"); ?>">Nápady</a></h1>
Máte nějaký nápad ke hře? Napište o něm a jako odměnu můžete dostat až 10 000 peněz. 
<h1><a href="<?php echo gv("?dir=casti/diskuse/index.php&amp;forum=5"); ?>">Hra</a></h1>
Pokec hráčů. 
<h1><a href="<?php echo gv("?dir=casti/diskuse/index.php&amp;forum=6"); ?>">Soutěže</a></h1>
Soutěže za které se dají vyhrát peníze do hry.
<?php if($_SESSION["ali"]){ ?>
<h1><a href="<?php echo gv("?dir=casti/diskuse/index.php&amp;forum=".($_SESSION["ali"]+100)); ?>">aliance</a></h1>
Alianční fórum.
<?php } ?>
<h1><a href="<?php echo gv("?dir=casti/diskuse/index.php&amp;forum=7"); ?>">Pokec</a></h1>
Jen tak něco mimo hry.
<h1><a href="<?php echo gv("?dir=casti/diskuse/index.php&amp;forum=8"); ?>">Ostatní</a></h1>
Jen tak něco mimo hry.