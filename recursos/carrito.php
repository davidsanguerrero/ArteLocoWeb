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
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../productos.php">
                        <img src="../img/Home.png" style="width: 40px;" alt="">
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
        <table class="table " action="../productos.php" method="POST">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"># </th>
                    <th scope="col">Foto</th>
                    <th scope="col">Descripcion </th>
                    <th scope="col">Precio </th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
              require('../recursos/conexion.php'); //realiza la conexion con la bd
              $sql = "SELECT * from productos"; //selecciona la tabla productos
              $result = mysqli_query($conexion, $sql);
              while ($mostrar = mysqli_fetch_array($result)) {
              ?>
                <tr>
                    <td><?php echo $mostrar['ID'] //muestra los datos de la columna ID?></td>
                    <?php echo '<td>' .
                                    '<img src="data:image/png;base64,' . base64_encode($mostrar['Imagen']) . '"
                                        width="120px" height="120px" />'
                                    . '</td>'; //muestra los datos de la columna FOTO?>

                    <td><?php echo $mostrar['Descripcion'] //muestra los datos de la columna Descripcion?></td>
                    <td><?php echo $mostrar['Precio'] //muestra los datos de la columna PRECIO?></td>


                <?php } ?>
            </tbody>
        </table>
    </div>




</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>

</html>