<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UsuarioModel;
use CodeIgniter\HTTP\Message;

class UsuarioController extends ResourceController
{
        //Retorna vistas Usuarios
        public function InicioSesion()
        {
            return view("login");
        }

        public function VistaRegistro()
        {
            return view("registro");
        }
    
        public function perfil()
        {
            return view("perfil");
        }
    
        public function cambiar_email()
        {
            return view("CambiarEmail");
        }
    
        public function cambiar_contraseña()
        {
            return view("CambiarContraseña");
        }

        //process
        public function RegistroUsuario()
        {
            $UsuarioModel=new UsuarioModel();
            //SELECT PARA REGISTRAR USUARIOS
            try{
                $UsuarioModel->save([
                    'Email'=>$this->request->getVar('Email'),
                    'Pass'=>$this->request->getVar('Contraseña'),
                    'Nombres'=>$this->request->getVar('Nombres'),
                    'Apellidos'=>$this->request->getVar('Apellidos')
                ]);
                return redirect()->to(base_url('/Login'));
            }catch(\Exception $e){
                return $e->getMessage();
            }
        }        
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    //login
    public function index()
    {
        $UsuarioModel= new UsuarioModel();
        $Data['usuarios']=$UsuarioModel->findall();
        return $this->respond($Data['usuarios']);
    }
    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function Login($Email = null, $Pass=null)
    {
        $UsuarioModel=new UsuarioModel();
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

    public function SelectPorEmail($Email= null)
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
    public function Registro()
    {
        //REGISTRO
        $UsuarioModel= new UsuarioModel();
        $Datos=[
            'Email'=> $this->request->getVar('Email'),
            'Pass'=> $this->request->getVar('Pass'),
            'Nombres'=> $this->request->getVar('Nombres'),
            'Apellidos'=> $this->request->getVar('Apellidos')
        ];

        $UsuarioModel->insert($Datos);
        //try catch falta
        $response=[
            'status' => 201,
            'error' => null,
            'messages' =>[
                'success' => 'Recurso almacenado satisfactoriamente'
            ]
        ];

        return $this->respondCreated($Datos, 201);
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
    public function updateEmail($id = null)
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
    public function updatePass($id = null)
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
