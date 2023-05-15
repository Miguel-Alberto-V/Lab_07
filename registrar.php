<?php
//print_r($_POST);
if (empty($_POST["oculto"]) || empty($_POST["txtDueño"]) || empty($_POST["txtCelular"]) || empty($_POST["txtLocal"]) || empty($_POST["txtUbicacion"]) || empty($_POST["txtPrecio"]) || empty($_POST["txtTipo"])) {
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once 'model/conexion.php';
$dueño = $_POST["txtDueño"];
$celular = $_POST["txtCelular"];
$local = $_POST["txtLocal"];
$ubicacion = $_POST["txtUbicacion"];
$precio = $_POST["txtPrecio"];
$tipo = $_POST["txtTipo"];

$sentencia = $bd->prepare("INSERT INTO locales (dueño, celular,nom_local,ubicacion,precio,tipo) VALUES (?,?,?,?,?,?);");
$resultado = $sentencia->execute([$dueño,$celular, $local, $ubicacion, $precio, $tipo]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=registrado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}
?>



