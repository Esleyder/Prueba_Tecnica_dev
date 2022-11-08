<?php
//formulario Actualizar empleado
$mensaje="";
if(isset($_POST['actualizar'])){
require 'data.php';

$empleado =new Empleado();
$empleado->setId($_POST['id']);
$empleado->setNombre_empleado($_POST['nombre_empleado']);
$empleado->setEmail($_POST['email']);
$empleado->setSexo($_POST['sexo']);
$empleado->setArea_id($_POST['area_id']);
$empleado->setDescripcion($_POST['descripcion']);
print_r($_POST);

//CREAMOS UN OBJETO DE LA CASE DATA

$db = new Data();
$respuesta = $db->create($empleado);
if($respuesta){
$mensaje="Empleado resgistrado correctamente";
$class="alert alert-success";
}else{
$mensaje="Empleado ya existe";
$class="alert alert-danger";	
}
//verificar
}elseif(isset($_GET['id'])){
require 'data.php';
//creo un objeto
$empleado = new Data();
$empleado = $empleado->find($_GET['id']);


}
?>

<?php
// Realizamos la conexión con el servidor 
  $mysqli = new mysqli("localhost", "root", "", "prueba_tecnica_dev");
?>
<html>
	 <head>
		  <meta charset="UTF-8">
		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <meta name="viewport" content="width=device-width, initial-scale=1.0">
		  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
          <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		  <title>Nuevo Empleado</title>
     </head>
	 
	 <body>  
		  <div class="container">
		    <div class="table-wrapper">
			   <div class="table-title">
				  <div class="col-sm-8"><h2>Actualizar <strong>Empleado</strong></h2></div>
				     <div class="col-sm-4">
				         <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i>Regresar</a>
				    </div>
				</div>
			</div>
			
			<div class="row">
				<form action="" method="POST">
					<div class="col-md-6">
						<label for="name">Nombre Completo * </label>
						<input type="text" name="nombre_empleado" id="nombre_empleado" class="form-control" required value="<?php echo $empleado->getNombre_empleado(); ?>" />
						<input type="hiiden" name="id" value="<?php echo $empleado->getId(); ?>" />
					</div>
					
				    <div class="col-md-12">
						<label for="name">Correo Elecronico * </label>
						<input type="email" name="email" id="email" class="form-control" required value="<?php echo $empleado->getEmail(); ?>" />
					</div>

					<div class="col-md-12">
						<label for="name">Sexo * </label>
						<input type="text" name="text" id="text" class="form-control" required value="<?php echo $empleado->getSexo(); ?>" />
					</div>


					
					<?php
					/*
					<div class="col-md-12">
					   <label for="name">Sexo * </label>
						<br>
					   <label for="louie">Mujer</label>
                       <input type="radio" id="sexo" name="sexo" value="M"   required value="<?php echo $empleado->getSexo(); ?>" />
					   <br>
                       <label for="louie">Hombre</label>
				       <input type="radio" id="sexo" name="sexo" value="F"  required value="<?php echo $empleado->getSexo(); ?>" /> 
					</div>
					*/
                    ?>					
					
					<div class="col-md-12">
					       <h6>Areas *</h6>
						<select name="area_id" id="area_id" >
                              <option value="area_id"  ><?php echo $empleado->getArea_id(); ?></option>
                             <?php
                                $query = $mysqli -> query ("SELECT * FROM areas");
                                    while ($valores = mysqli_fetch_array($query)) {
                                        echo '<option  value="'.$valores[id].'" >'.$valores[nombre].'</option>';
                                              }
											 
                               ?>
                    </select>
					</div>
					
					
					<div class="col-md-12">
						<h6>Descripcion *</h6>
						<textarea name="descripcion" rows="7" cols="20"><?php echo $empleado->getDescripcion(); ?></textarea>
					</div>
					
					 
				     <div class="col-md-12">
					     <h6>Roles *</h6>
						  <?php	       
                                 $query = $mysqli -> query ("SELECT * FROM roles");
                                   while($row = mysqli_fetch_array($query)){
                                     $c = array($row["id"]);
                                     $x = $row["nombre"];
                                     if (in_array($x,$c))
                                         {
                                             echo "<input name='checkbox[]' type='checkbox' value='$row[id]' checked='checked' />".$row["nombre"]."<br />";
                                         } else { echo "<input name='checkbox[]' type='checkbox' value='$row[id]' />".$row["nombre"]."<br />"; }
                                         }
								   //implode(array $rol_codigo): string	
                                ?>
					</div>	
                    
					 <div class="col-md-12">
						<button id="actualizar" name="actualizar" type="submit" class="btn btn-primary">Actualizar</button>
					</div>
				</form>
			</div>

		    <div class="row">
	           <div class="<?php echo $class;?>">
	           <?php echo $mensaje;?>
		    </div>
			</div>
		</div>
</body>
</html>