<?php
// clean
// index
foreach (glob(__DIR__ . "/../index/*") as $file) 
{
   if (file_exists($file)) 
   {
      unlink($file);
   }
}
echo "Index cleaned.<br />";
// sessions
foreach (glob(__DIR__ . "/../sessions/sess_*") as $file) 
{
   if (filemtime($file) + 604800 < time() && file_exists($file)) 
   {
      unlink($file);
   }
}
echo "Sessions one-week old cleaned.";
?>