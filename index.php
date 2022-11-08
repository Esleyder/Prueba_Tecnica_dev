<?php
$mensaje="";
if(isset($_POST['guardar'])){
require 'data.php';

$empleado =new Empleado();
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
		  <title>Empleados</title>
     </head>
	 
	 <body>  
		  <div class="container">
		    <div class="table-wrapper">
			   <div class="table-title">
				  <div class="col-sm-8"><h2>Lista de <strong>Empleados</strong></h2></div>
				     <div class="col-sm-4">
				         <a href="create.php" class="btn btn-info add-new"><i class="fa fa-plus"></i>Crear</a>
				    </div>
				</div>
			</div>

	        <hr/>
			<br/>

			<div class="row">
	        <?php
			session_start();
			if(isset($_SESSION['mensaje'])){
			?>
	        <div class="alert alert-warning">
				<?php echo $_SESSION['mensaje'];?>
            </div>
			<?php
			unset($_SESSION['mensaje']);
			}
			?>
			</div>
			<div class="row">
			  	<table class="table table-bordered">
	               <thead>
					    <tr>
							<th>Nombre</th>
							<th>Email</th>
							<th>Sexo</th>
							<th>Areas</th>
							<th>Descripcion</th>
							<th>Modificar</th>
							<th>Eliminar</th>
                        </tr>
                   </thead>
				   <tbody>
	                <?php
					  require 'data.php';
                      $datos =new Data();
                      $lista = $datos->list();
                      foreach($lista as $fila){
                    ?>
	                  <tr>
						 <td><?php echo $fila->nombre_empleado;?></td>
						 <td><?php echo $fila->email;?></td>
						 <td><?php echo $fila->sexo;?></td>
						 <td><?php echo $fila->nombre;?></td>
						 <td><?php echo $fila->descripcion;?></td>
						 <td>
						    <a href="update.php?id=<?php echo $fila->id;?>" class="edit"><i class="fa fa-edit"></i></a>
						 </td>
						 <td>
						 <a href="delete.php?id=<?php echo $fila->id;?>" class="remove"><i class="fa fa-trash"></i></a>
						 </td>
					  </tr>

					<?php
					  }
					?>
                   </tbody>
			    </table> 
			</div>
		</div>
</body>
</html>