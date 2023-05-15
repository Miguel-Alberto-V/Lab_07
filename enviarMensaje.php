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


$url = "https://api.green-api.com/waInstance1101818637/SendMessage/aaa21126b1b34a91b6ecd631ff37bbd3e67cf010242e4b5c9b";


$data = [
    "chatId" => "51".$persona->celular."@c.us",	
    
    "message" =>  'Estimado(a) *' . strtoupper($persona->dueño) . '* dueño del local *' . strtoupper($persona->nom_local) . '* Tenga en cuanta la advertencia *' . strtoupper($persona->advertencia) . '*, inicio de penalizacion *' . $persona->fecha_inicio . '*'
];	
$options = array(
    'http' => array(
        'method'  => 'POST',
        'content' => json_encode($data),
        'header' =>  "Content-Type: application/json\r\n" .
            "Accept: application/json\r\n"
    )
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$response = json_decode($result);
   // header('Location: agregarPromocion.php?codigo='.$persona->id_persona);
?> 
