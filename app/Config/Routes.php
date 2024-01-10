<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//todos los recursos como get,post,put y demas del usuario
$routes->resource('/usuarios',['controller'=>'ApiUsuarioController']);

//Devuelve vistas Usuario
$routes->get("/","UsuarioController::VistaLogin");
$routes->get("/Registro","UsuarioController::VistaRegistro");
$routes->get("/Perfil","UsuarioController::VistaPerfil");
$routes->get("/Perfil/Cambiar_Email","UsuarioController::VistaCambiarEmail");
$routes->get("/Perfil/Cambiar_Contraseña","UsuarioController::VistaCambiarContraseña");
//Process
$routes->post("/Registro/Process","UsuarioController::RegistroUsuario");
$routes->post("/Login/Process","UsuarioController::Login");
$routes->get("/CerrarSesion/Process","UsuarioController::SignOut");
$routes->post("/Perfil/Cambiar_Email/Procesar","UsuarioController::UpdateEmail");
$routes->post("Perfil/Cambiar_Contraseña/Procesar","UsuarioController::UpdatePass");
//Devuelve vistas Notas
$routes->get("/MisNotas/CrearNota","NotasController::VistaCrearNota");
$routes->get("/MisNotas","NotasController::Notas");
$routes->get("/MisNotas/ModificarNota/(:num)","NotasController::VistaModificarNota/$1");
$routes->get("/MisNotas/VisualizarNota/(:num)","NotasController::VistaVisualizarNota/$1");
//Process
//crear ruta process y el metodo en notas controller
$routes->post("/MisNotas/CrearNota/Process","NotasController::CrearNota");
$routes->get("/MisNotas/EliminarNota/(:num)","NotasController::EliminarNota/$1");
$routes->post("/MisNotas/ModificarNota/Process/(:num)","NotasController::ActualizarNota/$1"); //





//Api usuarios           /*any=lo que sea que se le pase       /1/2 hace referencia a los parametros que parametro es cual dentro del uri*/
$routes->get("/ApiPerfil/(:num)","ApiUsuarioController::ApiPerfil/$1");
$routes->post("/ApiLogin","ApiUsuarioController::ApiLogin");               //Login                                                                        
$routes->post("/ApiRegistro","ApiUsuarioController::ApiRegistro");                            //Registro
$routes->put("/ApiActualizarEmail/(:num)","ApiUsuarioController::ApiupdateEmail/$1");         //Actualizar email
$routes->get("/ApiSelectEmail/(:any)","ApiUsuarioController::ApiSelectPorEmail/$1");          //Select para actualizar email y para registro
$routes->put("/ApiActualizarPass/(:num)","ApiUsuarioController::ApiupdatePass/$1");           //Actualizar contraseña
//Api notas NotasController
$routes->post("/MisNotas/CrearNota","ApiNotasController::ApiCrearNota");  //Crear nueva nota
$routes->get("/MisNotas/SeleccionarNotas/(:num)","ApiNotasController::ApiSeleccionarNotas/$1"); //Seleccionar notas depende el usuario
$routes->delete("/MisNotas/EliminarNota/(:num)","ApiNotasController::Apidelete/$1");//Eliminar nota
$routes->put("/MisNotas/ModificarNota/(:num)","ApiNotasController::ApiModificarNota/$1");  //Modificar notas                                                                      