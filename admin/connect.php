<?php
$toannhat = new mysqli("localhost","root","","doanchuyennganh");

// Check connection
if ($toannhat -> connect_errno) {
  echo "Ket noi voi SQL bi loi: " . $toannhat-> connect_error;
  exit();
}


  $toannhat -> set_charset("utf8");

  $toannhat -> character_set_name();


?>