<?php
require("casti/funkcie/index.php"); 
require("casti/funkcie/vojak.php");
?>
<?php
if (is_uploaded_file($_FILES["jmeno_souboru"]["tmp_name"])):
//echo($_FILES["jmeno_souboru"]["size"]);
if($_FILES["jmeno_souboru"]["size"] < 300000){
  $name = $_FILES["jmeno_souboru"]["name"];
  copy($_FILES["jmeno_souboru"]["tmp_name"], "plus/avatar/".$_SESSION["id"].".jpg");
chyba2("nahráno");
}else{
chyba1("avatar může mít maximálně 300kb");
}
endif;
?>
<? avatar($_SESSION["id"]); ?>
<form method="post" enctype="multipart/form-data">
Avatar: <input type="file" name="jmeno_souboru">
<input type="submit" value="OK">
</form>