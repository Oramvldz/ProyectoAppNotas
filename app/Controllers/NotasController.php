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
            $mensaje=session('mensaje');
            return view("Notas", compact('mensaje'));
        }else
        {
            return redirect()->to(base_url('/Login'));
        }
        
    }

    public function VistaModificarNota()
    {
        $this->session=session();

        if($this->session->get('Is_Logged'))
        {
            return view("ModificarNota");
        }else
        {
            return redirect()->to(base_url('/Login'));
        }
        
    }


    public function VistaVerNota()
    {
        $this->session=session();

        if($this->session->get('Is_Logged'))
        {
            return view("VerNota");
        }else
        {
            return redirect()->to(base_url('/Login'));
        }
        
    }

    public function VistaCrearNota()
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

    public function CrearNota()
    {
        //proceso de crear la nota
        $Nota=new NotasModel();
        $this->session=session();
        $Id_usuario=$this->session->get('Id');

        try{
            $Nota->save([
                'Id_usuario'=>$Id_usuario,
                'Titulo'=>$this->request->getVar('Titulo'),
                'Contenido'=>$this->request->getVar('Contenido')
            ]);
            return redirect()->to(base_url('/MisNotas'))->with('mensaje','6');
        }catch(\Exception $e){
            return $e->getMessage();
        }

    }

}
