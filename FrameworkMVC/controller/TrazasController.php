<?php

class TrazasController extends ControladorBase{

	public function __construct() {
		parent::__construct();
	}

	public function index(){
		
		//creamos el array de busqueda
		$resulMenu=array(0=>'--Seleccione--',1=>'Usuario', 2=>'Controladores', 3=>'Accion', 4=>'Parametros', 5=>'Fecha');
	
		//Creamos el objeto usuario
		$trazas = new TrazasModel();
		$usuarios=new UsuariosModel();
		//Conseguimos todos los usuarios
		$resultSet=$trazas->getAll("id_trazas");
	
		$columnas = "trazas.id_trazas, usuarios.usuario_usuarios, trazas.nombre_controlador, trazas.accion_trazas, trazas.parametros_trazas, trazas.creado";
		$tablas="public.trazas, public.usuarios";
		$where="usuarios.id_usuarios = trazas.id_usuarios";
		$id="creado";
		$resultActi=$trazas->getCondiciones($columnas ,$tablas , $where, $id);
		$resultActi=null;
		
		
		//$resultEdit = "";
	
		$resultEdit = "";
		session_start();
	
	
	
		if (isset(  $_SESSION['usuario_usuarios']) )
		{
	
			$nombre_controladores = "Trazas";
			$id_rol= $_SESSION['id_rol'];
			$resultPer = $trazas->getPermisosVer("   controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
				
			if (!empty($resultPer))
			{
	
	
				if (isset ($_GET["id_trazas"])   )
				{
						
					$nombre_controladores = "Trazas";
					$id_rol= $_SESSION['id_rol'];
					$resultPer = $trazas->getPermisosEditar("   controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
	
					if (!empty($resultPer))
					{
							
						$_id_trazas = $_GET["id_trazas"];
						$columnas = " trazas.id_trazas, usuarios.usuario_usuarios, trazas.nombre_controlador, trazas.accion_trazas, trazas.parametros_trazas, trazas.creado";
						$tablas   = "public.trazas, public.usuarios";
						$where    = " usuarios.id_usuarios = trazas.id_usuarios AND id_trazas = '$_id_trazas' ";
						$id       = "nombre_etapas";
							
	
						$resultset = $trazas->getCondiciones($columnas ,$tablas ,$where, $id);
	
	
							
					}
					else
					{
						$this->view("Error",array(
								"resultado"=>"No tiene Permisos de Editar Trazas"
			
						));
							
							
					}
						
				}
				
				
				
				if(isset($_POST["contenido"])&&isset($_POST["ddl_criterio"]))
				{
					$columnas = "trazas.id_trazas, usuarios.usuario_usuarios, trazas.nombre_controlador, trazas.accion_trazas, trazas.parametros_trazas, trazas.creado";
					$tablas="public.trazas, public.usuarios";
					$where="usuarios.id_usuarios = trazas.id_usuarios";
					$id="creado";
					
					$accion="Editar";	
					
					$id_accion = $_POST["ddl_accion"];
					
					switch ($id_accion){
						case 0: $accion = "";
						break;
						case 1: $accion = "Guardar";
						break; 
						case 2: $accion = "Editar";
						break; 
						case 3: $accion = "Borrar";
						break;
					}
					
					$criterio = $_POST["ddl_criterio"];
					$contenido = $_POST["contenido"];
			
					
					if ($contenido !="")
					{
							
						$where_0 = "";
						$where_1 = "";
						$where_2 = "";
						$where_3 = "";
						$where_4 = "";
						$where_5 = "";
							
						switch ($criterio) {
							case 0:
								$where_0 = " OR usuarios.usuario_usuarios LIKE '$contenido'  OR  trazas.nombre_controlador LIKE '$contenido' ";
								break;
							case 1:
								//USUARIO
								$where_1 = " AND  usuarios.usuario_usuarios LIKE '$contenido'  ";
								break;
							case 2:
								//Controladores
								$where_2 = " AND trazas.nombre_controlador LIKE '$contenido'  ";
								break;
							case 3:
								//Accion
								$where_3 = " AND trazas.accion_trazas LIKE 'Editar' ";
								break;
							case 4:
								//Parametros
								$where_4 = " ";
								break;
							case 5:
								//Fecha
								$where_5 = " ";
								break;
						}
							
							
							
						$where_to  = $where .  $where_0 . $where_1 . $where_2 . $where_3 . $where_4 . $where_5;
							
							
						$resul = $where_to;
					
						//Conseguimos todos los usuarios con filtros
						$resultActi=$trazas->getCondiciones($columnas ,$tablas , $where_to, $id);
					}
				
				}else{
					
					
					
				}
				
	
	
				$this->view("Trazas",array(
						"resultSet"=>$resultSet, "resultEdit" =>$resultEdit, "resultActi" =>$resultActi,"resulMenu"=>$resulMenu
							
				));
	
	
	
			}
			else
			{
				$this->view("Error",array(
						"resultado"=>"No tiene Permisos de Acceso a Trazas"
	
				));
	
				exit();
			}
	
		}
		else
		{
			$this->view("ErrorSesion",array(
					"resultSet"=>""
		
			));
	
		}
	
	}
	
}
?>