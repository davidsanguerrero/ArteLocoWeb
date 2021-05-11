<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo.png">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Inicio admin</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar navbar-light ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="../recursos/salir.php">
                        <h5>cerrar sesion</h5>
                    </a>
                </li>
            </ul>
            <span class="navbar-text">
                <h3>Bienvenido Admin </h3>
            </span>
        </div>
    </nav>

    <br><br>


    <div class="container">
        <div class="row row-cols-2">
            <div class="col-12 col-sm-10 col-md-6 col-lg-6">


                <div class="card">
                    <div class="card-header" style="background:#861CCB;
                                  color: white;">
                        Productos
                    </div>
                    <div class="card-body">


                        <table class="table ">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID </th>
                                    <th scope="col">Nombre Producto</th>
                                    <th scope="col">Precio </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
require('../recursos/conexion.php');

$sql="SELECT * from productos";
$result=mysqli_query($conexion,$sql);

while($mostrar=mysqli_fetch_array($result)){
 ?>

                                <tr>
                                    <td><?php echo $mostrar['ID'] ?></td>
                                    <td><?php echo $mostrar['Nombre_Prod'] ?></td>
                                    <td><?php echo $mostrar['Precio'] ?></td>
                                </tr>
                                <?php 
}
?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-----SECCION REGISTRAR PRODUCTOS------>

            <div class="col">

                <div class="card">
                    <div class="card-header" style="background:#861CCB; 
                                  color: white;">
                        Registrar Productos
                    </div>
                    <div class="card-body" style=" text-align:center;">

                        <form action="Admin.php" method="POST">

                            <div class="form-floating mb-3">
                                <input type="text" name="nombre" class="form-control" id="floatingInput"
                                    placeholder="Nombre producto">
                            </div>

                            <select class="form-select" name="tipo" aria-label="Default select example">
                                <option selected>Tipo de producto</option>
                                <option value="Linea_Oficina     ">Linea_Oficina </option>
                                <option value="Línea_de_escritura">Línea_de_escritura</option>
                                <option value="Linea_Escolar     ">Linea_Escolar </option>
                            </select>
                            <BR>

                            <br>
                            <div class="mb-3">
                                <input class="form-control" name="foto" type="file" id="formFile">
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="precio" id="floatingInput"
                                    placeholder="Precio producto">
                            </div>

                            <div class="form-floating">
                                <textarea class="form-control" name="descripcion" placeholder="Descripcion del producto"
                                    id="floatingTextarea2" style="height: 100px"></textarea>
                            </div>
                            <br>

                            <input type="submit" name="registrar" class="btn btn-light" value="registrar" style="background:#861CCB;
                                                         color: white;">

                        </form>
                        <?php if(!empty($message)): ?>
                        <p> <?= $message ?></p>
                        <?php endif; ?>
                    </div>
                    <?php // añadir productos a la base de datos

    require('../recursos/conexion.php');   

    if (isset($_POST['registrar'])) {
        if (strlen($_POST['nombre']) >= 1 && strlen($_POST['tipo']) >= 1 && strlen($_POST['foto']) >= 1 && strlen($_POST['precio']) >= 1
        && strlen($_POST['descripcion']) >= 1){
            $name = trim($_POST['nombre']);
            $tipo = trim($_POST['tipo']);
            $foto = trim($_POST['foto']);
            $precio = trim($_POST['precio']);
            $descripcion = trim($_POST['descripcion']);

          $consulta = "INSERT INTO productos(Nombre_Prod, Tipo,Imagen,Precio,Descripcion) 
          VALUES ('$name','$tipo','$foto','$precio','$descripcion')";
          $resultado = mysqli_query($conexion,$consulta);
          if ($resultado) { 
            ?>
                    <?php
             echo "<script> window.location=' Admin.php'; </script>";
             ?>
                    <center>
                        <p class="ok">¡Te has inscripto correctamente!</p>
                    </center>
                    <?php
          } else {
            ?>
                    <center>
                        <p class="bad">¡Ups ha ocurrido un error!</p>
                    </center>
                    <?php
          }
        }   else {
            ?>
                    <center>
                        <p class="bad">¡Por favor complete los campos!</p>
                    </center>
                    <?php
        }
    }

    ?>

                </div>


                <div class="col"> <br><br>

                    <!-----SECCION ACTUALIZAR PRODUCTOS---->

                    <div class="card">
                        <div class="card-header" style="background:#861CCB;
                                  color: white;">
                            Actualizar productos
                        </div>
                        <div class="card-body" style=" text-align:center;">

                            <form action="Admin.php" method="POST">

                                <div class="form-floating mb-3">
                                    <input type="text" name="ID" class="form-control" id="floatingInput"
                                        placeholder="ID producto">
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="nombre" class="form-control" id="floatingInput"
                                        placeholder="Nombre producto">
                                </div>

                                <select class="form-select" name="tipo" aria-label="Default select example">
                                    <option selected>Tipo de producto</option>
                                    <option value="Linea_Oficina     ">Linea_Oficina </option>
                                    <option value="Línea_de_escritura">Línea_de_escritura</option>
                                    <option value="Linea_Escolar     ">Linea_Escolar </option>
                                </select>
                                <BR>

                                <br>
                                <div class="mb-3">
                                    <input class="form-control" name="foto" type="file" id="formFile">
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="precio" id="floatingInput"
                                        placeholder="Precio producto">
                                </div>

                                <div class="form-floating">
                                    <textarea class="form-control" name="descripcion"
                                        placeholder="Descripcion del producto" id="floatingTextarea2"
                                        style="height: 100px"></textarea>
                                </div>
                                <br>

                                <input type="submit" name="actualizar" class="btn btn-light" value="registrar" style="background:#861CCB;
                                        color: white;">

                            </form>
                            <?php if(!empty($message)): ?>
                            <p> <?= $message ?></p>
                            <?php endif; ?>
                        </div>
                        <?php // ACTUALIZAR productos a la base de datos

    require('../recursos/conexion.php');   

    if (isset($_POST['actualizar'])) {
      if (strlen($_POST['ID']) >= 1 && strlen($_POST['nombre']) >= 1 && strlen($_POST['tipo']) >= 1 && strlen($_POST['foto']) >= 1 && strlen($_POST['precio']) >= 1
      && strlen($_POST['descripcion']) >= 1){

            $ID = trim($_POST['ID']);
            $name = trim($_POST['nombre']);
            $tipo = trim($_POST['tipo']);
            $foto = trim($_POST['foto']);
            $precio = trim($_POST['precio']);
            $descripcion = trim($_POST['descripcion']);

          $consulta = "UPDATE productos
          SET Nombre_Prod='$name', Tipo='$tipo',Imagen='$foto',Precio='$precio',Descripcion='$descripcion' 
          WHERE ID='$ID'";
          
          $resultado = mysqli_query($conexion,$consulta);
          if ($resultado) { 
            ?>
                        <?php
             echo "<script> window.location=' Admin.php'; </script>";
             ?>
                        <center>
                            <p class="ok">¡Te has inscripto correctamente!</p>
                        </center>
                        <?php
          } else {
            ?>
                        <center>
                            <p class="bad">¡Ups ha ocurrido un error!</p>
                        </center>
                        <?php
          }
        }
           else {
         ?>
                        <center>
                            <p class="bad">¡Por favor complete los campos!</p>
                        </center>
                        <?php 
      }
    }

    ?>

                    </div>


                    <div class="col"> <br><br>

                        <!-----SECCION ELIMINAR PRODUCTOS------>
                        <div class="card">
                            <div class="card-header" style="background:#861CCB;
                                  color: white;">
                                Eliminar productos
                            </div>
                            <div class="card-body" style=" text-align: center;">

                                <form action="Admin.php" method="POST">
                                    <br>
                                    <label class="exampleInputEmail1">Eliminar productos</label>
                                    <br>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="ID" value=""
                                            placeholder="Inserta ID">
                                    </div>
                                    <input type="submit" name="eliminar" class="btn btn-light" value="eliminar" style="background:#861CCB;
                                   color: white;">

                                </form>
                                <?php if(!empty($message)): ?>
                                <p> <?= $message ?></p>
                                <?php endif; ?>

                                <?php 

      require('../recursos/conexion.php');   

      if (isset($_POST['eliminar'])) {
          if (strlen($_POST['ID']) >= 1) {
              $email = trim($_POST['ID']);

            $consulta = "DELETE FROM productos WHERE ID = '{$_POST["ID"]}'";
            $resultado = mysqli_query($conexion,$consulta);
            if ($resultado) { 
	    	?>

                                <?php
             echo "<script> window.location=' Admin.php'; </script>";
             ?>
                                <center>
                                    <p class="ok">¡Te has eliminado correctamente!</p>
                                </center>

                                <?php
	    } else {
	    	?>
                                <center>
                                    <p class="bad">¡Ups ha ocurrido un error!</p>
                                </center>
                                <?php
	    }
    }   else {
	    	?>
                                <center>
                                    <p class="bad">¡Por favor complete los campos!</p>
                                </center>
                                <?php
    }
}

?>
                            </div>
                        </div>
                    </div>

                    <br>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>

</html>