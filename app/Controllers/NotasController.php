<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NotasModel;

class NotasController extends BaseController
{
    //vistas
    public function Notas()
    {
        $this->session=session();

        if($this->session->get('Is_Logged'))
        {
            return view("Notas");
        }else
        {
            return redirect()->to(base_url('/Login'));
        }
        
    }

    public function CrearNota()
    {
        $this->session=session();
        
        if($this->session->get('Is_Logged'))
        {
            return view("CrearNotas");
        }else
        {
            return redirect()->to(base_url('/Login'));
        }
        
    }
    //process

}
