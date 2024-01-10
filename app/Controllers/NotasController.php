<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NotasModel;

class NotasController extends BaseController
{
    //vistas
    public function Notas()
    {
        $NotasModel=new NotasModel();
        $this->session=session();
        //Obtener todas las notas de cada usuario ordenadas por id de forma descendente
        $Id_usuario=$this->session->get('Id');
        $Notas=$NotasModel->orderBy('id','desc')->getWhere(['Id_usuario'=>$Id_usuario])->getResultArray();

        if($this->session->get('Is_Logged'))
        {
            $mensaje=session('mensaje');
            return view("Notas", compact('mensaje','Notas'));
        }else
        {
            return redirect()->to(base_url('/'));
        }
        
    }

    public function VistaModificarNota($Id=null)
    {
        $NotasModel=new NotasModel();

        $Nota=$NotasModel->find($Id);
        $this->session=session();

        if($this->session->get('Is_Logged'))
        {
            //poner esto en el de eliminar  
            if(isset($Nota))
            {
                return view("ModificarNota", compact('Nota'));
            }
            else
            {
                return redirect()->to(base_url('/MisNotas'));
            }
        }else
        {
            return redirect()->to(base_url('/'));
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
            return redirect()->to(base_url('/'));
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
            return redirect()->to(base_url('/'));
        }
        
    }

    public function VistaVisualizarNota($Id=null)
    {
        $this->session=session();
        $NotasModel=new NotasModel();

        $Nota=$NotasModel->find($Id);

        if($this->session->get('Is_Logged'))
        {
            if(isset($Nota))
            {
                return view("VerNota",compact('Nota'));
            }
            else
            {
                return redirect()->to(base_url('/MisNotas'));
            }
        }else
        {
            return redirect()->to(base_url('/'));
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

    public function EliminarNota($Id=null)
    {
        $Nota=new NotasModel();
        $Nota->delete($Id);
        return redirect()->to(base_url('/MisNotas'));
    }

    public function ActualizarNota($Id=null)
    {
        $NotasModel=new NotasModel();

        $Data=[
            'Titulo'=>$this->request->getVar('Titulo'),
            'Contenido'=>$this->request->getVar('Contenido')
        ];
            $NotasModel->Update($Id,$Data);
        
        return redirect()->to(base_url('/MisNotas'));

    }

}
