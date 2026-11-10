<?php

namespace Vendor\ProjectOne\Controllers;

use Vendor\ProjectOne\Models\Usuario;

class UsuarioController {

    private $usuario;

    public function __construct()
    {
        $this->usuario = new Usuario();;
    }

    public function listar(){
        return $this->usuario->listar();
    }

    public function registrar($datos){
        return $this->usuario->registrar($datos["nombre"], $datos["email"], $datos["edad"]);
    }

}