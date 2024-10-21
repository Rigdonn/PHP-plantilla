<?php
require_once __DIR__ . '/../../core/App.php';

class Connection
{
    /**
     * @return PDO
     * @throws AppException
     */
    public static function make()
    {
        try {
            $config = App::get('config')['database'];

            $connection = new PDO(
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $PDOException) {
            die($PDOException->getMessage()); // Se muestra la excepció como si fuera un echo y detiene la ejecucuin del srcipt
        }
        return $connection;
    }
}
