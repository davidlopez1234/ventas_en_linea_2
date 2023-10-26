<?php                              
include("../../../models/bd.php");
if($_POST){
    //Recepcionamos los valores del formulario
    $Titulo=(isset($_POST['Titulo']))?$_POST['Titulo']:"";
    $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";
   
    $sentencia=$conexion->prepare("INSERT INTO `gestion_usuarios`(`ID`, `Titulo`, `descripcion`) 
    VALUES (NULL,:Titulo,:descripcion);");

    $sentencia->bindParam(":Titulo",$Titulo);
    $sentencia->bindParam(":descripcion",$descripcion);
    $sentencia->execute();
    $mensaje="Registro agregado con exito";
    header("Location:index.php?mensaje=".$mensaje);
}

include("../../Administrador/xd/header.php");
?>

<div class="card">
    
    <div class="card-header">
        Crear Gestion_Usuarios
    </div>
    
    <div class="card-body">
       
    <form action="" enctype="multipart/form-data" method="post">

                                                          

    <div class="mb-3">
      <label for="Titulo" class="form-label">Titulo</label>
      <input type="text"
        class="form-control" name="Titulo" id="Titulo" aria-describedby="helpId" placeholder="Titulo">
    </div>

    <div class="mb-3">
      <label for="descripcion" class="form-label">descripcion</label>
      <input type="text"
        class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="descripcion">
    </div>

    <button type="submit" class="btn btn-success">Agregar</button>

    <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

    </form>


    </div>
    
    <div class="card-footer text-muted"></div>

</div>

