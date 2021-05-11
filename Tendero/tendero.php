<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <!---------barra de navegacion------------>

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
                <h3>Tus productos</h3>
            </span>
        </div>
    </nav>

    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-3">
                        <?php
              require('../recursos/conexion.php');
              $sql = "SELECT * from carrito";
              $result = mysqli_query($conexion, $sql);
              while ($mostrar = mysqli_fetch_array($result)) {
              ?>


                        <div class="card border-success mb-3" style="max-width: 18rem;">
                            <div class="card-header bg-transparent border-success">
                                <p class="card-title"><?php echo $mostrar['id'] ?>
                                <p>precio</p>
                                </p>
                            </div>
                            <div class="card-body text-success">
                                <p class="card-text"><?php echo $mostrar['Nombre_Prod']?></p>
                            </div>
                        </div>

                        <?php } ?>
                    </div>
                </div>

            </div>
            <!-----SECCION  finalizar pedido------>
            <div class="col-6 col-md-4">
                <div class="card finalizar">
                    <div class="card-header" style="background:#861CCB;
          color: white;">
                        Eliminar Pedidos
                    </div>
                    <div class="card-body" style=" text-align: center;">

                        <form action="tendero.php" method="POST">
                            <br>
                            <label class="exampleInputEmail1">Eliminar Pedidos</label>
                            <br>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="ID"
                                    placeholder="Inserta ID">
                            </div>
                            <input type="submit" name="eliminar" class="btn btn-light" value="eliminar"
                                style="background:#861CCB;color: white;">

                        </form>
                        <?php if (!empty($message)) : ?>
                        <p> <?= $message ?></p>
                        <?php endif; ?>

                        <?php

            require('../recursos/conexion.php');

            if (isset($_POST['eliminar'])) {
              if (strlen($_POST['ID']) >= 1) {
                $id = trim($_POST['ID']);

                $consulta = "DELETE FROM productos WHERE ID = '{$_POST["ID"]}'";
                $resultado = mysqli_query($conexion, $consulta);
                if ($resultado) {
            ?>

                        <?php
                  echo "<script> window.location='tendero.php'; </script>";
                  ?>
                        <center>
                            <p class="ok">¡Finalizado correctamente!</p>
                        </center>

                        <?php
                } else {
                ?>
                        <center>
                            <p class="bad">¡Ups ha ocurrido un error!</p>
                        </center>
                        <?php
                }
              } else {
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
                <!---------------->
            </div>
        </div>
    </div>




</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>

</html>