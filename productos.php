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
                    <a class="nav-link" href="../index.php">
                        <h5>cerrar sesion</h5>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="carrito.php">
                        <img src="../img/CARRITO.png" style="width: 40px;" alt="">
                    </a>
                </li>
            </ul>
            <span class="navbar-text">
                <h3>Selecciona tus productos </h3>
            </span>
        </div>
    </nav>

    <br><br>

    <div class="container">
        <div class="row row-cols-1">
            <!-----------pedidos----------->
            <div class="card">
                <div class="card-header" style="background:#861CCB;
                                  color: white;">
                    Productos
                </div>
                <div class="card-body">
                    <table class="table " action="tendero.php" method="POST">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"># </th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nombre Producto</th>
                                <th scope="col">Descripcion </th>
                                <th scope="col">Precio </th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
              require('../recursos/conexion.php');
              $sql = "SELECT * from productos";
              $result = mysqli_query($conexion, $sql);
              while ($mostrar = mysqli_fetch_array($result)) {
              ?>
                            <tr>
                                <td><?php echo $mostrar['ID'] ?></td>
                                <?php echo '<td>' .
                                    '<img src="data:image/png;base64,' . base64_encode($mostrar['Imagen']) . '"
                                        width="100px" height="100px" />'
                                    . '</td>';
                                    ?>
                                <td><?php echo $mostrar['Nombre_Prod'] ?></td>
                                <td><?php echo $mostrar['Descripcion'] ?></td>
                                <td><?php echo $mostrar['Precio'] ?></td>

                                <form action="tendero.php" method="POST">
                                    <td>
                                        <button class="botones_tendero" onclick="agregar()" name="btnAgregar"
                                            value="Agregar" type="submit">
                                            <img src="../img/comprar.png" style="width: 40px;" alt="">
                                        </button>
                                    </td>
                                    <td>
                                        <button class="botones_tendero" onclick="eliminar()" name="btnEliminar"
                                            value="Delete" type="submit">
                                            <img src="../img/borrar.png" style="width: 40px;" alt="">
                                        </button>
                                    </td>
                            </tr>
                            <?php
                    require('../recursos/conexion.php');
                    if(isset($_POST['btnAgregar'])){
                      $id = trim($mostrar['ID']);
                      $nombre_producto = trim($mostrar['Nombre_Prod']);
                      $consulta = "INSERT INTO carrito(id, Nombre_Prod) 
                      VALUES ('$id','$nombre_producto')";
                      $resultado = mysqli_query($conexion,$consulta);
                    }
                    ?>
                            </form>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col">

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