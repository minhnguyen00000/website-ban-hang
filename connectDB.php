<?php
$pdo = new PDO('mysql:host=localhost; dbname=doanchuyennganh' , "root" , "");
$pdo ->query ("  set names utf8 " );
if(!isset($_SESSION)){
    session_start();
}
?>