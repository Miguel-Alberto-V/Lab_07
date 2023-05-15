<?php
//print_r($_POST);
if (empty($_POST["txtAdvertencia"]) || empty($_POST["txtPenal"])) {
    header('Location: index.php');
    exit();
}

include_once 'model/conexion.php';
$advertencia = $_POST["txtAdvertencia"];
$duracion = $_POST["txtPenal"];
$codigo = $_POST["codigo"];


$sentencia = $bd->prepare("INSERT INTO advertencias(advertencia,fecha_inicio,id_local) VALUES (?,?,?);");
$resultado = $sentencia->execute([$advertencia,$duracion, $codigo ]);

if ($resultado === TRUE) {
    header('Location: agregarAdvertencias.php?codigo='.$codigo);
} 