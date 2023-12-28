<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

use App\Models\NotasModel;
use CodeIgniter\HTTP\Message;



class ApiNotasController extends ResourceController
{
    /**
     * 
     *
     * @return mixed
     */
     //Api
    public function  ApiCrearNota()
    {
        $NotasModel= new NotasModel();
        $ContenidoNota=[
            'Id_usuario'=> $this->request->getVar('Id_usuario'),
            'Titulo'=> $this->request->getVar('Titulo'),
            'Contenido'=> $this->request->getVar('Contenido')
        ];

        $NotasModel->insert($ContenidoNota);
        //try catch falta
        $response=[
            'status' => 201,
            'error' => null,
            'messages' =>[
                'success' => 'Nota Guardada Correctamente'
            ]
        ];

        return $this->respond($response);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function ApiSeleccionarNotas($Idusuario=null)
    {
        $NotasModel=new NotasModel();
        $Data=$NotasModel->orderby('Id','desc')->getwhere(['Id_usuario'=>$Idusuario])->getResult();
        if(count($Data)>0)
        {
            return $this->respond($Data);
        }
        else
        {
            return $this->failNotFound();

        }
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function ApiModificarNota($Id = null)
    {
        $NotasModel=new NotasModel();
        
        $Datos=[
            'Titulo'=>$this->request->getVar('Titulo'),
            'Contenido'=>$this->request->getVar('Contenido')
        ];

        $NotasModel->update($Id,$Datos);
        //try catch falta
        $respuesta=[
            'estatus'=>200,
            'error'=>null,
            'mensaje'=>['Satisfactorio'=>'Recurso actualizado correctamente']
        ];
        return $this->respond($respuesta);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function EliminarMisNotas($Id_Usuario = null)
    {
        //No elimina el conjunto de notas del usuario

        $NotasModel= new NotasModel();
        $NotasModel->delete(['Id_usuario','like',$Id_Usuario]);

        $respuesta=[
            'estatus'=>200,
            'error'=>null,
            'mensaje'=>['Satisfactorio'=>'Recurso eliminado correctamente']
        ];

        return $this->respond($respuesta);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function Apidelete($Id = null)
    {
        $NotasModel= new NotasModel();
        $NotasModel->delete(['Id'=>$Id]);

        $respuesta=[
            'estatus'=>200,
            'error'=>null,
            'mensaje'=>['Satisfactorio'=>'Recurso eliminado correctamente']
        ];

        return $this->respond($respuesta);
    }

    //prueba de sincronizacion
}
