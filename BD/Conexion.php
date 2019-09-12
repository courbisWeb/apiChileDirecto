<?php

$dbhost		=	'127.0.0.1';
$dbuser		=	'courbis';
$dbpass		=	'root';
$database	=	'chiledirecto';
$conn		=	mysqli_connect($dbhost, $dbuser, $dbpass, $database);
if (! $conn) 
	{
		die('No se puede conectar a la base de datos: '.mysqli_error());
	}
  ?>