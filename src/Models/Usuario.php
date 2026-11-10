<?php

namespace Vendor\ProjectOne\Models;

use Vendor\ProjectOne\Databases\Conexion;

class Usuario {


    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }


    public function listar(){

        $sql = "SELECT * FROM usuarios ORDER BY id DESC";

        $stmt = $this->conexion->prepare($sql);

        if($stmt->execute()){
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }else{
            return $stmt->errorInfo();
        }

    }


    public function registrar($nombre, $email, $edad)
    {
        $sql = "INSERT INTO usuarios (nombre, email, edad)
                VALUES (:nombre, :email, :edad)";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ':nombre' => $nombre,
            ':email' => $email,
            ':edad' => $edad
        ]);
    }

    public function buscar($id)
    {
        $sql = "SELECT * FROM usuarios WHERE id = :id";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([':id' => $id]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $nombre, $email, $edad)
    {
        $sql = "UPDATE usuarios
                SET nombre = :nombre,
                    email = :email,
                    edad = :edad
                WHERE id = :id";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ':nombre' => $nombre,
            ':email' => $email,
            ':edad' => $edad,
            ':id' => $id
        ]);
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM usuarios WHERE id = :id";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([':id' => $id]);
    }

}