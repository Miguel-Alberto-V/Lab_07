<?php 
$contrasena = "AVNS_koSn5tw88NQbySRImkJ";
$usuario = "doadmin";
$nombre_bd = "railway";
$host = "db-mysql-nyc1-60133-do-user-14116195-0.b.db.ondigitalocean.com:25060";

try {
	$bd = new PDO (
		"mysql:host={$host};dbname={$nombre_bd}",
        $usuario,
        $contrasena,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
	);
} catch (Exception $e) {
	echo "Problema con la conexion: ".$e->getMessage();
}
?>