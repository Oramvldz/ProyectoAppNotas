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
            return view("Login",compact('mensaje'));
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
        $UsuarioModel=new UsuarioModel();
        $this->session=session();
        $Id=$this->session->get('Id');

        $Usuario=$UsuarioModel->find($Id);
        //Es otra forma de obtener el resultado en matriz Usuario[0]['Nombres']
        // o con un foreach($usuario as $usuario)
        //getWhere(['Id'=>$Id])->getResultArray();
        
        if($this->session->get('Is_Logged'))
        {
            $mensaje=session('mensaje');
            return view("perfil", compact('Usuario','mensaje'));
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
                "Email"=>$UsuarioEncontrado[0]['Email'],
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

    public function UpdateEmail()
    {
        $UsuarioModel=new UsuarioModel();
        $this->session=session();
        
        $EmailAntiguo= $this->request->getVar('Email_Antiguo');
        $Contraseña= $this->request->getVar('Contraseña');
        //Email a actualizar
        $NuevoEmail= $this->request->getVar('Nuevo_Email');                                          //me retorna solo una fila
        $UsuarioEncontrado=$UsuarioModel->getWhere(['Email'=>$EmailAntiguo,'Pass'=>$Contraseña])->getRow();
        $UsuarioRepetido=$UsuarioModel->getWhere(['Email'=>$NuevoEmail])->getRow();
        if(isset($UsuarioEncontrado))
        {
            $EmailEncontrado=$UsuarioEncontrado->Email;
            $Id=$UsuarioEncontrado->Id;
        }
        
        //si ya metio la contraseña quiere decir que ya sabe la contraseña y si es su cuenta
        //Falta verificar que el email no sea igual a otro dentro del sistema
        if(isset($UsuarioEncontrado) && $EmailEncontrado==$this->session->get('Email') && !isset($UsuarioRepetido))
        {   
            $data=[
                'Email'=>$NuevoEmail
            ];
            $this->session->remove('Id','Email','Is_Logged');
            $Datossesion=[
                "Id"=>$UsuarioEncontrado->Id,
                "Email"=>$NuevoEmail,
                "Is_Logged"=>true
            ];
            $this->session->set($Datossesion);
            //el segundo parametro en este metodo recibe array por eso hago un array arriba
            $UsuarioModel->update($Id,$data);
            return redirect()->to(base_url('/Perfil'))->with('mensaje','4');;
        }else{
            return redirect()->to(base_url('/Perfil'))->with('mensaje','5');
        }
    }

    public function UpdatePass()
    {
        $UsuarioModel=new UsuarioModel();
        $this->session=session();
        $EmailAntiguo= $this->request->getVar('Email_Antiguo');
        $Contraseña= $this->request->getVar('Contraseña');
        //Email a actualizar
        $NuevaContraseña= $this->request->getVar('NuevaContraseña');                                          //me retorna solo una fila
        $UsuarioEncontrado=$UsuarioModel->getWhere(['Email'=>$EmailAntiguo,'Pass'=>$Contraseña])->getRow();
        if(isset($UsuarioEncontrado))
        {
            $EmailEncontrado=$UsuarioEncontrado->Email;
            $Id=$UsuarioEncontrado->Id;
        }
        
        //si ya metio la contraseña quiere decir que ya sabe la contraseña y si es su cuenta
        //checo si que usuario encontrado no este vacio y que la session sea igual al email que quiero actualizar
        if(isset($UsuarioEncontrado) && $EmailEncontrado==$this->session->get('Email'))
        {   
            $data=[
                'Pass'=>$NuevaContraseña
            ];
            //el segundo parametro en este metodo recibe array por eso hago un array arriba
            $UsuarioModel->update($Id,$data);
            return redirect()->to(base_url('/Perfil'))->with('mensaje','6');;
        }else{
            return redirect()->to(base_url('/Perfil'))->with('mensaje','7');
        }
    }
    
    public function SignOut()
    {
        $this->session=session();
        $this->session->destroy();
        return redirect()->to(base_url('/Login'));
    }

}
