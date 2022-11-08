<?php
//clase Empleado Clase Padre
class Empleado{
private $id;
private $nombre_empleado;
private $email;	
private $sexo;
private $area_id;
private $descripcion;
//Constructor
public function __construct(){
 $this->id=0;
 $this->nombre_empleado="";
 $this->email="";
 $this->sexo="";
 $this->area_id=0;
 $this->descripcion="";
}
//aplico propiedades
//set id
public function setId($id){
	$this->id =$id;
}
//get id (RECIBE)
public function getId(){
	return $this->id;
}
//set nombre (RETORNA)
public function setNombre_empleado($nombre_empleado){
	$this->nombre_empleado=$nombre_empleado;
}
//get nombre
public function getNombre_empleado(){
	return $this->nombre_empleado;
}
//set Email
public function setEmail($email){
	$this->email=$email;
}
//get Email
public function getEmail(){
	return $this->email;
}
//setSexo
public function setSexo($sexo){
   $this->sexo=$sexo;
}
//getSexo
public function getSexo(){
	return $this->sexo;
}
//set Area
public function setArea_id($area_id){
	$this->area_id=$area_id;
}
//get Area
public function getArea_id(){
	return $this->area_id;
}
//setDescripcion
public function setDescripcion($descripcion){
	$this->descripcion=$descripcion;
}
//getDesripcion
public function getDescripcion(){
     return $this->descripcion;
}
}
?>