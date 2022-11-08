<?php
//llamar al archiv data.php
if(isset($_GET['id'])){
    require 'data.php';
    $empleado = new Data();
    $id = intval($_GET['id']);
    $res = $empleado->delete($id);
    //preguntar por la variable $res
    session_start();
    if($res){
      $_SESSION['mensaje'] = "Empleado eliminado Correctamente";
    }else{
        $_SESSION['mensaje'] = "No se Pudo eliminar el Empleado";
    }
    //me devuelve a inde.php a mi pagina principal
    header("location:index.php");
}
?>
