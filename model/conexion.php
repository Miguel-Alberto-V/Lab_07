<?php 
$contrasena = "UKto3CYRwHorRdiI4dwm";
$usuario = "root";
$nombre_bd = "railway";
$host = "containers-us-west-13.railway.app";

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
