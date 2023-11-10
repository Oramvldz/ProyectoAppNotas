<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class VistasController extends BaseController
{
    //retorna vistas Notas
    public function CrearNota()
    {
       return view("CrearNotas");
    }
    //retorna procesar
    public function procesar_CrearNota()
    {
       return view("/Process/CrearNotas");
    }
    
    public function Notas()
    {
        return view("Notas");
    }
    
}
