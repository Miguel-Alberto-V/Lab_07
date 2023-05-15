<?php
if (!isset($_GET['codigo'])) {
    header('Location: index.php?mensaje=error');
    exit();
}

include 'model/conexion.php';
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("SELECT ad.advertencia, ad.fecha_inicio , ad.id_local, lol.dueño , lol.celular ,lol.nom_local,lol.ubicacion, lol.precio , lol.tipo 
  FROM advertencias ad 
  INNER JOIN locales lol ON lol.id = ad.id_local 
  WHERE ad.id = ?;");
$sentencia->execute([$codigo]);
$persona = $sentencia->fetch(PDO::FETCH_OBJ);

$curl = curl_init();

$url = "https://api.green-api.com/waInstance1101818637/sendFileByUpload/aaa21126b1b34a91b6ecd631ff37bbd3e67cf010242e4b5c9b";

$chatId = "51".$persona->celular."@c.us";
$caption = "Video Tecsup";

$file_path = "D:\LARAGON\laragon\www\Lab06\mvdo.mp4";

$file = curl_file_create($file_path, 'mvdo/mp4', 'mvdo.mp4');
$fields = array(
  'chatId' => $chatId,
  'caption' => $caption,
  'file' => $file
);

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $fields,
  CURLOPT_HTTPHEADER => array(),
));

$response = curl_exec($curl);

curl_close($curl);
   // header('Location: agregarPromocion.php?codigo='.$persona->id_persona);
?> 
