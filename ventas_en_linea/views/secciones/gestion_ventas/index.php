<?php 
include("../../../models/bd.php");

if(isset($_GET[ 'txtID'])){
    //borrar dicho registro con el ID correspondiente
    $txtID=(isset($_GET['txtID']) )?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("DELETE FROM gestion_ventas where ID=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    }
// seleccionar registros
$sentencia=$conexion->prepare("SELECT * FROM `gestion_ventas`");
$sentencia->execute();
$lista_usuarios=$sentencia->fetchALL(PDO::FETCH_ASSOC);

include("../../Administrador/xd/header.php");
?>
<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registros</a>
    </div>
    <div class="card-body">
    
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php  foreach($lista_usuarios as $registro){ ?>
                <tr class="">
                    <td><?php echo $registro['ID'];?></td>
                    <td><?php echo $registro['Titulo'];?></td> 
                    <td><?php echo $registro['descripcion'];?></td>
                    <td>
                        <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registro['ID']?>" role="button">Editar</a>
                        |
                        <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['ID']?>" role="button">Eliminar</a>
                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              c     c 
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    </div>
    
    </div>
</div>



