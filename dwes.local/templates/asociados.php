<?php

require_once __DIR__ . '/../src/utils/file.class.php';
require_once __DIR__ . '/../src/entity/asociado.class.php';
require_once __DIR__ . '/../src/database/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {

        $config = require_once __DIR__ . '/../app/config.php';
        $conexion = Connection::make($config['database']);
        
        $nombre = trim(htmlspecialchars($_POST['nombre']));
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
        $logo = new File('logo', $tiposAceptados); 
        $logo->saveUploadFile(Asociado::RUTA_LOGOS_ASOCIADOS);

        $asociado = new Asociado($nombre, $logo->getFileName(), $descripcion);

        $sql = "INSERT INTO asociados (nombre, logo, descripcion) VALUES (:nombre, :logo, :descripcion)";
        $pdoStatement = $conexion->prepare($sql);
        $parametros = [
            ':nombre' => $asociado->getNombre(),
            ':logo' => $asociado->getLogo(),
            ':descripcion' => $asociado->getDescripcion()
        ];

        if ($pdoStatement->execute($parametros) === false) {
            $errores[] = "No se ha podido guardar la información del asociado en la base de datos";
        } else {
            $nombre = "";
            $descripcion = "";
            $mensaje = "Se ha guardado el asociado correctamente";
        }
    } catch (FileException $fileException) {
        $errores[] = $fileException->getMessage();
    }
} else {
    $errores = [];
    $nombre = "";
    $descripcion = "";
    $mensaje = "";
}

require_once __DIR__ . "/views/asociados.view.php";
