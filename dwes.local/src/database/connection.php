<?php

class Connection
{
    public static function make()
    {
        try {
            $opciones = [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // Para utilizar utf8
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Para capturar excepciones
                PDO::ATTR_PERSISTENT => true // Guarda la conexión para reutilizarla en peticiones futuras
            ];

            $connection = new PDO(
                'mysql:host=dwes.local;dbname=cursophp;charset=utf8', // Dirección del servidor y base de datos
                'usercurso', // Usuario de la base de datos
                'php', // Contraseña del usuario
                $opciones // Opciones de configuración de la conexión
            );

            return $connection;
        } catch (PDOException $PDOException) {
            die($PDOException->getMessage()); // Muestra el mensaje de error y detiene la ejecución
        }
    }
}
