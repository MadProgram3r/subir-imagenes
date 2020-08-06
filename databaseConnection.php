<?php
$server = 'emdpublicidad.com';
$user = 'emdpublicidad_admin';
$password = 'emdpublicidadk123';
$dbName = 'emdpublicidad_tienda_talamas';

$conn = mysqli_connect($server, $user, $password, $dbName);
mysqli_set_charset($conn,"utf8");

if(!$conn)
{
	die("Connection failed: " . mysqli_connect_error());
}


?>