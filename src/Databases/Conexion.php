<?php

namespace Vendor\ProjectOne\Databases;

use PDO;
use PDOException;


class Conexion {


    public static function conectar(){

        try {

            $conexion = new PDO(
                "mysql:host=" . $_ENV["DB_HOST"] .
                ";dbname=" . $_ENV["DB_NAME"] .
                ";charset=utf8mb4",
                $_ENV["DB_USER"],
                $_ENV["DB_PASSWORD"]
            );

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conexion;

        } catch (PDOException $e) {

            throw new PDOException(
                "Error de conexion " . $e->getMessage()
            );

        }

    }

}