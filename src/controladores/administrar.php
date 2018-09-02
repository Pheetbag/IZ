<?php

global $consultar;

class administrar{

    public $permisos = [
        'administrar' => 1
    ];
    public $vista = 'vistas/administrar/';

    public function index()
    {
        global $consultar;
        $usuarios = $consultar->usuarios();

        require $this->vista . 'index.php';
    }

    public function eliminar($id)
    {
        global $consultar;
        $usuarios = $consultar->eliminar($id);

        header('location:' . HTTP. '/administrar');
    }
}
