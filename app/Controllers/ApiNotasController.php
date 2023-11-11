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
    public function SeleccionarNotas($Idusuario)
    {
        $NotasModel=new NotasModel();
        $Data['Notas']=$NotasModel->getwhere(['Id_usuario'=>$Idusuario])->getResult();
        return $this->respond($Data['Notas']);
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
    public function ModificarNota($Id = null)
    {
        $NotasModel=new NotasModel();
        
        $DatosSolicitud=$this->request->getJSON();
        $datos=[
            'Titulo'=>$DatosSolicitud->Titulo,
            'Contenido'=>$DatosSolicitud->Contenido
        ];

        $NotasModel->update($Id,$DatosSolicitud);
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
    public function delete($Id = null)
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
