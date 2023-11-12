<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class UsuarioController extends BaseController
{
    //Retorna vistas Usuarios
    public function VistaLogin()
    {
        $this->session=session();   
        if($this->session->get('Is_Logged'))
        {
            return redirect()->to(base_url('/MisNotas'));
        }else
        {
            $mensaje=session('mensaje');
            return view("login",compact('mensaje'));
        }
    }

    public function VistaRegistro()
    {
        $this->session=session();
        
        if($this->session->get('Is_Logged'))
        {
            return redirect()->to(base_url('/MisNotas'));
        }else
        {
            $mensaje=session('mensaje');
            return view("registro",compact('mensaje'));
        }
    }

    public function VistaPerfil()
    {
        $this->session=session();
        
        if($this->session->get('Is_Logged'))
        {
            return view("perfil");
        }else
        {
            return redirect()->to(base_url('/Login'));
        }
        
    }

    public function VistaCambiarEmail()
    {
        $this->session=session();
        
        if($this->session->get('Is_Logged'))
        {
            return view("CambiarEmail");
        }else
        {
            return redirect()->to(base_url('/Login'));
        }
        
    }

    public function VistaCambiarContraseña()
    {
        $this->session=session();
        
        if($this->session->get('Is_Logged'))
        {
            return view("CambiarContraseña");
        }else
        {
            return redirect()->to(base_url('/Login'));
        }
        
    }

    //process
    public function RegistroUsuario()
    {
        $UsuarioModel=new UsuarioModel();
        $Email=$this->request->getVar('Email');
        $UsuarioEncontrado=$UsuarioModel->getWhere(['Email'=>$Email])->getResult();

        if(count($UsuarioEncontrado)>0)
        {
            //return $this->respond($UsuarioEncontrado);
            return redirect()->to(base_url('/Registro'))->with('mensaje','2');
        }
        else
        {
            try{
                $UsuarioModel->save([
                    'Email'=>$this->request->getVar('Email'),
                    'Pass'=>$this->request->getVar('Contraseña'),
                    'Nombres'=>$this->request->getVar('Nombres'),
                    'Apellidos'=>$this->request->getVar('Apellidos')
                ]);
                return redirect()->to(base_url('/Login'))->with('mensaje','1');
            }catch(\Exception $e){
                return $e->getMessage();
            }
        }
    }       
    public function Login()
    {
        $UsuarioModel= new UsuarioModel();
        $Email=$this->request->getVar('Email');
        $Pass=$this->request->getVar('Contraseña');
        $UsuarioEncontrado=$UsuarioModel->getWhere(['Email'=>$Email,'Pass'=>$Pass])->getResultArray();   
        if(count($UsuarioEncontrado)>0)
        {   
            $Datos=[
                "Id"=>$UsuarioEncontrado[0]['Id'],
                "Is_Logged"=>true
            ];
            $this->session=session();
            $this->session->set($Datos);
            return redirect()->to(base_url('/MisNotas'));
            /*
            $id=(int)$this->session->get('Id');
            echo($id);
            */
        }
        else
        {
            return redirect()->to(base_url('/Login'))->with('mensaje','3');
        }
    }
    
    public function SignOut()
    {
        $this->session=session();
        $this->session->destroy();
        return redirect()->to(base_url('/Login'));
    }

}
