<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->get("/","Home::index");
//todos los recursos como get,post,put y demas del usuario
$routes->resource('/usuarios',['controller'=>'UsuarioController']);

//Devuelve vistas Usuario
$routes->get("/Login","UsuarioController::VistaLogin");
$routes->get("/Registro","UsuarioController::VistaRegistro");
$routes->get("/Perfil","UsuarioController::VistaPerfil");
$routes->get("/Perfil/Cambiar_Email","UsuarioController::VistaCambiarEmail");
$routes->get("/Perfil/Cambiar_Contraseña","UsuarioController::VistaCambiarContraseña");
//Process
$routes->post("/Registro/Process","UsuarioController::RegistroUsuario");
$routes->post("/Login/Process","UsuarioController::Login");
$routes->get("/CerrarSesion/Process","UsuarioController::SignOut");
//Devuelve vistas Notas
$routes->get("/MisNotas/CrearNota","NotasController::CrearNota");
$routes->get("/MisNotas","NotasController::Notas");
//Process




















//Api usuarios           /*any=lo que sea que se le pase       /1/2 hace referencia a los parametros que parametro es cual dentro del uri*/
$routes->get("/ApiLogin/(:any)/(:any)","UsuarioController::Login/$1/$2");               //Login                                                                        
$routes->post("/ApiRegistro","UsuarioController::Registro");                            //Registro
$routes->put("/ApiActualizarEmail/(:num)","UsuarioController::updateEmail/$1");         //Actualizar email
$routes->get("/ApiSelectEmail/(:any)","UsuarioController::SelectPorEmail/$1");          //Select para actualizar email y para registro
$routes->put("/ApiActualizarPass/(:num)","UsuarioController::updatePass/$1");           //Actualizar contraseña
//Api notas NotasController

$routes->post("/MisNotas/CrearNota","NotasController::ApiCrearNota");  //Crear nueva nota
$routes->get("/MisNotas/SeleccionarNotas/(:num)","NotasController::SeleccionarNotas/$1"); //Seleccionar notas
$routes->delete("/MisNotas/EliminarNota/(:num)","NotasController::delete/$1");//Eliminar nota

//No elimina todas las notas
$routes->delete("/MisNotas/EliminarTodasNotas/(:num)","NotasController::EliminarMisNotas/$1"); //Eliminar todas las notas                                                                     
$routes->put("/MisNotas/ModificarNota/(:num)","NotasController::ModificarNota/$1");  //Modificar notas                                                                      
                                                                            

