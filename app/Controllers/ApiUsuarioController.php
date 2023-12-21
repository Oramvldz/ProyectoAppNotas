<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UsuarioModel;
use CodeIgniter\HTTP\Message;

class ApiUsuarioController extends ResourceController
{
    //API
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function ApiPerfil()
    {
        $errors=[
            'Error'=>"404",
            'Mensaje'=>"Usuario no existente"
        ];
        $UsuarioModel= new UsuarioModel();
         $id=$this->request->getVar('Id');
        $Data=$UsuarioModel->find($id);
        if($Data!=NULL)
        {
            return $this->respond($Data);
        }
        else
        {
            return $this->respond($errors, 404); 
            //return $this->failNotFound("Usuario no Existente");
        }
        
    }
    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function ApiLogin()
    {
        
        $UsuarioModel=new UsuarioModel();

            $Email=$this->request->getVar('Email');
            $Pass=$this->request->getVar('Pass');

        $UsuarioEncontrado=$UsuarioModel->getWhere(['Email'=>$Email,'Pass'=>$Pass])->getResult();    
        if($UsuarioEncontrado)
        {
            return $this->respond($UsuarioEncontrado);
        }
        else
        {
            return $this->failNotFound("Usuario no encontrado");
        }
        
    }

    public function ApiSelectPorEmail($Email= null)
    {
        
        $UsuarioModel=new UsuarioModel();
        $UsuarioEncontrado=$UsuarioModel->getWhere(['Email'=>$Email])->getResult();
        if($UsuarioEncontrado)
        {
            return $this->respond($UsuarioEncontrado);
        }
        else
        {
            return $this->failNotFound("Usuario no encontrado");
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
    public function ApiRegistro()
    {
        //REGISTRO
        $UsuarioModel= new UsuarioModel();

        $Email=$this->request->getVar('Email');
        $Datos=[
            'Email'=>$Email,
            'Pass'=> $this->request->getVar('Pass'),
            'Nombres'=> $this->request->getVar('Nombres'),
            'Apellidos'=> $this->request->getVar('Apellidos')
        ];
        
        $UsuarioEncontrado=$UsuarioModel->getWhere(['Email'=>$Email])->getResult();    

        $response;
        if(count($UsuarioEncontrado)==0)
        {
            $UsuarioModel->insert($Datos);

            $response=[
                'status' => 201
            ];

            return $this->respondCreated($response);
        }
        else{
            $response=[
                'status' => 409
            ];

           return $this->respond($response,'200');
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function ApiupdateEmail($id = null)
    {
        $UsuarioModel=new UsuarioModel();
        
        $DatosSolicitud=$this->request->getJSON();
        $datos=[
            'Email'=>$DatosSolicitud->Email,
        ];

        $UsuarioModel->update($id,$DatosSolicitud);
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
    public function ApiupdatePass($id = null)
    {
        $UsuarioModel=new UsuarioModel();
        
        $DatosSolicitud=$this->request->getJSON();
        $datos=[
            'Pass'=>$DatosSolicitud->Pass,
        ];

        $UsuarioModel->update($id,$DatosSolicitud);
        //try catch falta
        $respuesta=[
            'estatus'=>200,
            'error'=>null,
            'mensaje'=>['Satisfactorio'=>'Recurso actualizado correctamente']
        ];
        return $this->respond($respuesta);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
