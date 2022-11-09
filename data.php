<?php
require 'Empleado.php';
class Data{
	  //atributos privados;
      private $con;
      private $host;
      private $user;
      private $pass;
      private $base;
	  private $port;
	//Constructor
public function __construct()
{
	$this->host ="localhost";
	$this->user ="root";
	$this->pass="";
	$this->base="prueba_tecnica_dev";
	$this->port=3306;	
}	
//funcion para conectar base de datos
public function connect(){
$this->con = new mysqli($this->host,$this->user,$this->pass,$this->base,$this->port);
if($this->con->connect_error){
die("No se logro la conexion : ".$this->con->connect_error);	
}else{
	return $this->con;
}
}


//Crear un Objeto (Funcion)
public function create(Empleado $objEmpleado){
$nombre_empleado=$this->connect()->real_escape_string($objEmpleado->getNombre_empleado()); 
$email=$this->connect()->real_escape_string($objEmpleado->getEmail()); 
$sexo=$this->connect()->real_escape_string($objEmpleado->getSexo()); 
$area_id=$this->connect()->real_escape_string($objEmpleado->getArea_id()); 
$descripcion=$this->connect()->real_escape_string($objEmpleado->getDescripcion()); 

//sql para insertar un empleado en la base de datos mysql con los atributos de la tabla empleado
$sql="INSERT INTO empleado Values(DEFAULT,'$nombre_empleado','$email','$sexo','$area_id','$descripcion');";
$res = $this->connect()->query($sql);

if($res){
return true;
}else{
	return false;
}
	
}
//listar empleados
public function list(){	
    //creo un arreglo
	$datos=array();

	//$sql = "Select * from empleado;";

    $sql = "select empleado.id,empleado.nombre_empleado,empleado.email,empleado.sexo, areas.nombre,empleado.descripcion 
    from empleado, areas
    where empleado.area_id=areas.id;;";

	$res = $this->connect()->query($sql);
	
    //$res = $this->connect()->query($sql);
	if($res->num_rows > 0){
    while($fila = $res->fetch_object()){

		$datos[]= $fila;

	}
	return $datos;
	}
}
//Eliminar
public function delete($id){	
	$id=$this->connect()->real_escape_string($id);
	$sql = "delete from empleado where id=$id;";

	$res = $this->connect()->query($sql);
	if($res){
       return true;
	}else{
		return false;
	}
}
//Find
public function find($id):Empleado
{
	$e=new Empleado();
    $id=$this->connect()->real_escape_string($id);
	//consulta extensa de todas las tablas
	$sql = "Select * from empleado where id=$id;";
	

	$res = $this->connect()->query($sql);
	if ($res->num_rows > 0){
       $datos = $res->fetch_object();
       //envio los atribtos
       $e->setId($datos->id);
	   $e->setNombre_empleado($datos->nombre_empleado);
	   $e->setEmail($datos->email);
	   $e->setSexo($datos->sexo);
       $e->setArea_id($datos->area_id);
	   $e->setDescripcion($datos->descripcion);



	}
	return $e;
}
//metodo update
public function update(Empleado $objEmpleado){
	  
	$id=$this->connect()->real_escape_string($objEmpleado->getId());
	$nombre_empleado=$this->connect()->real_escape_string($objEmpleado->getNombre_empleado()); 
	$email=$this->connect()->real_escape_string($objEmpleado->getEmail()); 
	$sexo=$this->connect()->real_escape_string($objEmpleado->getSexo()); 
	$area_id=$this->connect()->real_escape_string($objEmpleado->getArea_id()); 
	$descripcion=$this->connect()->real_escape_string($objEmpleado->getDescripcion()); 
	 
 
	//verificar si existe por id
    $sql = "select * from empleado where id='$id';";
    $res = $this->connect()->query($sql);
	if($res->num_rows == 0){
    return false;
	} else{
    //$sql="UPDATE empleado SET nombre_empleado='$nombre_empleado',email='$email',sexo='$sexo',area_id='$area_id',descripcion='$descripcion' where id=$id;";
    //$sql="UPDATE empleado SET nombre_empleado='$nombre_empleado',email='$email',sexo='$sexo',area_id='$area_id',descripcion='$descripcion' where id=$id;";
	//$sql="UPDATE empleado SET nombre_empleado='$nombre_empleado',email='$email',sexo='$sexo',area_id='$area_id' where id=$id;";
	$sql="UPDATE empleado SET nombre_empleado='$nombre_empleado',email='$email',sexo='$sexo',area_id='$area_id',descripcion='$descripcion' where id=$id;";
    $res = $this->connect()->query($sql);
	if($res){
		return true;
		}else{
			return false;
		}
			
		}
	}
}
?>