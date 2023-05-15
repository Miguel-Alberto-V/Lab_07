<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $dueño = $_POST["txtDueño"];
    $celular = $_POST["txtCelular"];
    $local = $_POST["txtLocal"];
    $ubicacion = $_POST["txtUbicacion"];
    $precio = $_POST["txtPrecio"];
    $tipo = $_POST["txtTipo"];

    $sentencia = $bd->prepare("UPDATE locales SET dueño = ?, celular = ?, nom_local = ?, ubicacion = ?, precio = ?,tipo = ? where id = ?;");
    $resultado = $sentencia->execute([$dueño, $celular, $local, $ubicacion, $precio, $tipo, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
