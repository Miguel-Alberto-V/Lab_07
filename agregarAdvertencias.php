<?php include 'template/header.php' ?>

<?php
include_once "model/conexion.php";
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("select * from locales where id = ?;");
$sentencia->execute([$codigo]);
$persona = $sentencia->fetch(PDO::FETCH_OBJ);

$sentencia_promocion = $bd->prepare("select * from advertencias where id_local = ?;");
$sentencia_promocion->execute([$codigo]);
$promocion = $sentencia_promocion->fetchAll(PDO::FETCH_OBJ); 
//print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos para la Advertencia: <br><?php echo $persona->dueño.' '.$persona->nom_local; ?>
                </div>
                <form class="p-4" method="POST" action="registrarAdvertencia.php">
                    <div class="mb-3">
                        <label class="form-label">Advertencia: </label>
                        <input type="text" class="form-control" name="txtAdvertencia" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Inicio de Penalizacion: </label>
                        <input type="text" class="form-control" name="txtPenal" autofocus required>
                    </div>
                    <div class="d-grid">
                    <input type="hidden" name="codigo" value="<?php echo $persona->id; ?>"><P></P>
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    Lista de Advertencias
                </div>
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Advertencia</th>
                                <th scope="col">Inicio de penalizacion</th>
                                <th scope="col" colspan="3">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($promocion as $dato) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->id; ?></td>
                                    <td><?php echo $dato->advertencia; ?></td>
                                    <td><?php echo $dato->fecha_inicio; ?></td>
                                    <td><a class="text-primary" href="enviarMensaje.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-cursor"></i></a></td>
                                    <td><a class="text-secondary" href="enviar_imagen.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-card-image"></i></a></td>
                                    <td><a class="text-secondary" href="enviar_video.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-camera-video"></i></a></td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>