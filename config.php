<?php

$servername = "127.0.0.1";
$database = "teste";
$username = "root";
$password = "root";
// Cria Conexão
$connect = mysqli_connect($servername, $username, $password, $database);
// Checa a conexão
if (!$connect) {
	  die("Falha: " . mysqli_connect_error());
}
 
//echo "Conectado".  "<br>";
?>