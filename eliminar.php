<?php 
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $codigo = $_GET['codigo'];
    

    $sentencia1 = $bd->prepare("DELETE FROM advertencias where id_local IN (SELECT id FROM locales WHERE id = ?);");
    $resultado1 = $sentencia1->execute([$codigo]);

    $sentencia2 = $bd->prepare("DELETE FROM locales WHERE id = ?;");
    $resultado2 = $sentencia2->execute([$codigo]);

    if ($resultado1 === TRUE && $resultado2 == TRUE){
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
?>