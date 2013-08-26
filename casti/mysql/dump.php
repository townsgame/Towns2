<?
// NASTAVENI SQL //
Define("db_name","towns_cz");
Define("db_host","mysql5_host");
Define("db_user","towns_cz");
Define("db_pass","heslo190077"); 

// DALSI NASTAVENI
$file_name="backup.sql"; // jmeno souboru pro DUMP
$show_echo=0; // Zobrzit DUMP (0=ne / 1=ano);
$crlf="\n"; // nastaveni konce radku

// FUNKCE
function GetTableDef($table, $crlf)
{
	// MySQL >= 3.23.20
	$schema_create = "";
	$schema_create .= "DROP TABLE IF EXISTS $table;$crlf";
	$result = mysql_query("SHOW CREATE TABLE $table");
	$data=mysql_fetch_array($result);
	$schema_create .= $data[1] . ";$crlf$crlf";
	mysql_free_result($result);
	return $schema_create;
} // end of the 'GetTableDef()' function


function GetTableContent($table,$crlf)
{
	global $use_backquotes;
	global $rows_cnt;
	global $current_row;
	
	$schema_insert="";
	$local_query = "SELECT * FROM $table";
	$result = mysql_query($local_query);
	if ($result != FALSE) {
		$fields_cnt = mysql_num_fields($result);
		$rows_cnt   = mysql_num_rows($result);
		// Checks whether the field is an integer or not
		for ($j = 0; $j < $fields_cnt; $j++) {
			$field_set[$j] = mysql_field_name($result, $j);
			$type          = mysql_field_type($result, $j);
			if ($type == 'tinyint' || $type == 'smallint' || $type == 'mediumint' || $type == 'int' ||
			$type == 'bigint'  ||$type == 'timestamp') {
				$field_num[$j] = TRUE;
			} else {
				$field_num[$j] = FALSE;
			}
		} // end for
		// Sets the scheme
		//$schema_insert .= "INSERT INTO $table VALUES (";
		$search       = array("\x00", "\x0a", "\x0d", "\x1a"); //\x08\\x09, not required
		$replace      = array('\0', '\n', '\r', '\Z');
		$current_row  = 0;
		while ($row = mysql_fetch_row($result)) {
			$schema_insert .= "INSERT INTO $table VALUES (";
			$current_row++;
			for ($j = 0; $j < $fields_cnt; $j++) {
				if (!isset($row[$j])) {
					$values[]     = 'NULL';
				} else if ($row[$j] == '0' || $row[$j] != '') {
					// a number
					if ($field_num[$j]) {
						$values[] = $row[$j];
					}
					// a string
					else {
						$values[] = "'" . str_replace($search, $replace, $row[$j]) . "'";
					}
				} else {
					$values[]     = "''";
				} // end if
			} // end for
			$max=SizeOf($values);
			for ($i=0;$i<$max;$i++){
				if ($i!=0) $schema_insert .= ", ";
				$schema_insert .= $values[$i] ;
			}
			$schema_insert .= ");$crlf";
			unset($values);
		} // end while
	} // end if ($result != FALSE)
	mysql_free_result($result);
	return $schema_insert;
} // end of the 'GetTableContent()' function
// MAIN

$dump_buffer="";
@$dbspojeni=mysql_connect(db_host,db_user,db_pass);
if (!$dbspojeni){
	echo "Error: Can't connect to MySQL server.";
	Die();
}
mysql_query("SET NAMES 'utf8'");
mysql_select_db(db_name);

$tables=mysql_list_tables(db_name);
$num_tables=mysql_numrows($tables);
$dump_buffer="#MySQL DUMP$crlf";


for ($i=0;$i<$num_tables;$i++){
	$table=mysql_tablename($tables,$i);
	$dump_buffer.="$crlf#Table name: $table$crlf$crlf";
	$dump_buffer.=GetTableDef($table,"$crlf");
	$dump_buffer.="$crlf#DATA$crlf";
	$dump_buffer.=GetTableContent($table,"$crlf");
	$dump_buffer.="$crlf$crlf";
}

mysql_close();
//$f=Fopen($file_name,"w");
//FPutS($f,$dump_buffer);
//FClose($f);
if ($show_echo==1){
  echo $dump_buffer;
}
file_put_contents("zaloha-".time().".txt",$dump_buffer);
?>