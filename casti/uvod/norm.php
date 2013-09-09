<style type="text/css">
<!--
.style10 {
	color: #006600;
	font-size: 18px;
}
.style11 {font-family: "Comic Sans MS"}
-->
</style>
<table width="589" height="500" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th height="20" colspan="2" align="left" valign="top" scope="col"><h2 align="center" class="style11"> <?php echo $GLOBALS["unnorm1"]; ?> </h2></th>
  </tr>
  <tr>
    <td height="105" colspan="2">
	<form id="form1" name="form1" method="post" action="?dir=casti/admin/login.php">
	<table width="565" border="0">
        <tr>
          <th width="372" rowspan="4" scope="col"><img src="casti/desing/logo2.jpg" width="372" height="208" border="0" /></th>
          <td colspan="2" align="left" valign="top" class="style10" scope="col">login:</td>
        </tr>
        <tr>
          <th width="96" align="left" valign="top" scope="col"><?php echo $GLOBALS["afourth5"]; ?>:</th>
          <th width="83" align="left" valign="top" scope="col">
            <input name="meno" type="text" id="meno" /></th>
        </tr>
        <tr>
          <th align="left" valign="top" scope="col"><?php echo $GLOBALS["index3"]; ?>:</th>
          <th align="left" valign="top" scope="col"><input name="heslo" type="text" id="heslo" /></th>
        </tr>
        <tr>
          <th height="66" colspan="2" align="left" valign="top" scope="col">
            <label>
            <input type="submit" name="Submit" value="OK" />
            </label>
            <br />
            <a href="?dir=casti/admin/registrace.php"><?php echo $GLOBALS["htmlindex10"]; ?></a></th>
        </tr>
      </table>
      </form>    </td>
  </tr>
  
  <tr>
    <td width="283" height="19" class="style10"><?php echo $GLOBALS["unnorm2"]; ?>: </td>
    <td width="306" height="0" class="style10"><?php echo $GLOBALS["unnorm3"]; ?>: </td>
  </tr>
  <tr>
    <td height="218" rowspan="3" align="left" valign="top">
	<?php
echo "<table width=\"100\" border=\"0\">";

$odpoved = mysql_query("select * from townstem order by tema LIMIT 0,7");


while ($row = mysql_fetch_array($odpoved)) {

   echo "<tr>";
   
echo "<th align=\"left\" scope=\"col\"><a href=\"?dir=casti/diskuse/prispevky.php&amp;tema=".$row["id"]."\">".$row["tema"]."</a> </th>";
   
   echo "</tr>";

}
echo "</table>";


mysql_free_result($odpoved);
?>
	</td>
    <td width="306" height="57" align="left" valign="top"><?php echo $GLOBALS["unnorm4"]; ?></td>
  </tr>
  <tr>
    <td height="20" align="left" valign="top" class="style10"><?php echo $GLOBALS["unreg13"]; ?>:</td>
  </tr>
  <tr>
    <td height="100" align="left" valign="top">
    -<?php echo $GLOBALS["unnorm5"]; ?><br />
    -<?php echo $GLOBALS["unnorm6"]; ?><br />
    -<?php echo $GLOBALS["unnorm7"]; ?></td>
  </tr>
</table>
