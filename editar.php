<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from locales where id = ?;");
    $sentencia->execute([$codigo]);
    $lol = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos del Local:
                </div>
                <form class="p-4" method="POST" action="editarPoceso.php">
                    <div class="mb-3">
                        <label class="form-label">Dueño: </label>
                        <input type="text" class="form-control" name="txtDueño" required 
                        value="<?php echo $lol->dueño; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Celular: </label>
                        <input type="text" class="form-control" name="txtCelular" required 
                        value="<?php echo $lol->celular; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre_Local: </label>
                        <input type="text" class="form-control" name="txtLocal" autofocus required
                        value="<?php echo $lol->nom_local; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ubicacion: </label>
                        <input type="text" class="form-control" name="txtUbicacion" autofocus required
                        value="<?php echo $lol->ubicacion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio: </label>
                        <input type="text" class="form-control" name="txtPrecio" autofocus required
                        value="<?php echo $lol->precio; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo: </label>
                        <input type="text" class="form-control" name="txtTipo" autofocus required
                        value="<?php echo $lol->tipo; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $lol->id; ?>">
                        <input type="submit" class="btn btn-info" value="Editar" >
                       
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

