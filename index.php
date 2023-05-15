<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from locales");
    $locales = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<style>
    body{
        background-image: url("fondo3.jpg");
        background-size:contain;
        
    }

    .p-4{
        background-color: white;
        opacity: none;
    }
    .card-header{
        background-color: #F2F4F4;
    }
</style>

    <div class="container mt-5">
        <div class="row justify-content-center">
        
            <!-- inicio alerta -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Rellena todos los campos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Registrado!</strong> Se agregaron los datos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Vuelve a intentar.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Cambiado!</strong> Los datos fueron actualizados.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Eliminado!</strong> Los datos fueron borrados.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 
        </div>
    </div>

        <div class="container mt-5">
                <div class="card-header">
                    Lista de locales
                </div>
                <div class="p-4">
                    <table class="table table-info table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Dueño</th>
                                <th scope="col">Celular</th>
                                <th scope="col">Nombre Local</th>                              
                                <th scope="col">Ubicacion</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Tipo de local</th>
                                <th scope="col" colspan="3">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($locales as $dato){ 
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->id; ?></td>
                                <td><?php echo $dato->dueño; ?></td>
                                <td><?php echo $dato->celular; ?></td>
                                <td><?php echo $dato->nom_local; ?></td>                                
                                <td><?php echo $dato->ubicacion; ?></td>
                                <td><?php echo $dato->precio; ?></td>
                                <td><?php echo $dato->tipo; ?></td>
                                <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a class="text-warning" href="agregarAdvertencias.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-exclamation-triangle"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
        </div>

   

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Registrar datos del local:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Dueño: </label>
                        <input type="text" class="form-control" name="txtDueño" autofocus required>                   
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Celular: </label>
                        <input type="text" class="form-control" name="txtCelular" autofocus required>
                      
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre_Local: </label>
                        <input type="text" class="form-control" name="txtLocal" autofocus required>
                      
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ubicacion: </label>
                        <input type="text" class="form-control" name="txtUbicacion" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio: </label>
                        <input type="txt" class="form-control" name="txtPrecio" autofocus required>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo: </label>
                        <input type="txt" class="form-control" name="txtTipo" autofocus required>
                        
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-info" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

   




