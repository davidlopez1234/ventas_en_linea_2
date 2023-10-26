
<?php 
include("../../../models/bd.php");

if(isset($_GET['txtID'])){
    //Recuperar los datos del ID correspondiente 
    $txtID=(isset($_GET['txtID']) )?$_GET['txtID']:"";

    $sentencia=$conexion->prepare(" SELECT * FROM gestion_usuarios where ID=:ID");
    $sentencia->bindParam(":ID",$txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY); 

    $icono=$registro['ID'];
    $Titulo=$registro['Titulo'];
    $Descripcion=$registro['descripcion'];
}

if($_POST){
  print_r($_POST);
    //Recepcionamos los valores del formulario 
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $Titulo=(isset($_POST['Titulo']))?$_POST['Titulo']:"";
    $Descripcion=(isset($_POST['Descripcion']))?$_POST['Descripcion']:"";
    
       
    $sentencia=$conexion->prepare("UPDATE `gestion_usuarios` 
    SET `ID`=:ID,
    `Titulo`=:Titulo,:descripcion 
    WHERE `ID`=:ID ");
    
    $sentencia->bindParam(":Titulo",$Titulo);
    $sentencia->bindParam(":descripcion",$Descripcion);
    $sentencia->bindParam(":ID",$txtID);
    $mensaje="Registro modoficado con exito.";
    header("Location:index.php?mensaje=".$mensaje);


}
include("../../Administrador/xd/header.php");
 

?>
<div class="card">
    
    <div class="card-header">
      Editando la informacion de servicios
    </div>
    
    <div class="card-body">
       
    <form action="" enctype="multipart/form-data" method="post">

    <div class="mb-3">
      <label for="txtID" class="form-label">ID:</label>
      <input value="<?php echo $txtID;?>" type="text"
        class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
    </div>
    <div class="mb-3">
      <label for="Titulo" class="form-label">Titulo:</label>
      <input value="<?php echo $Titulo;?>" type="text"
        class="form-control" name="Titulo" id="Titulo" aria-describedby="helpId" placeholder="Titulo">
    </div>

    <div class="mb-3">
      <label for="Descripcion" class="form-label">descripcion:</label>
      <input value="<?php echo $Descripcion;?>" type="text"
        class="form-control" name="Descripcion" id="Descripcion" aria-describedby="helpId" placeholder="Descripcion">
    </div>

    <button type="submit" class="btn btn-success">Agregar</button>

    <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

    </form>


    </div>
    
    <div class="card-footer text-muted"></div>

</div>
