<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="icon" href="../img/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>login</title>
</head>

<body class="cuerpo" style=" background-size: cover; /* Resize the background image to cover the entire container */">
    <svg id="visual" viewBox="0 0 1920 1080" width="100%" height="100%" max-width="1920" max-height="1260"
        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1">
        <g transform="translate(979.3627618508222 480.3514603689876)">
            <path
                d="M270 -262.3C322.7 -217.3 319.3 -108.7 305.1 -14.3C290.8 80.1 265.6 160.3 212.9 234.4C160.3 308.6 80.1 376.8 -23.6 400.4C-127.3 423.9 -254.6 402.9 -312.1 328.7C-369.6 254.6 -357.3 127.3 -329.8 27.5C-302.4 -72.4 -259.7 -144.7 -202.2 -189.7C-144.7 -234.7 -72.4 -252.4 18.1 -270.5C108.7 -288.7 217.3 -307.3 270 -262.3"
                fill="#FFFFFF"></path>
        </g>
    </svg>
    <center><br><br>
        <div class="card">
            <div class="card-header" style="  background-color:transparent;  color: black;">
                Login
            </div>
            <div class="card-body">

                <form class="login" action="logear.php" method="POST">
                    <!--los datos de este formulario se validan-->
                    <div class="form-group row">
                        <!--en logear.php y se envian a esa pagina por el metodo POST-->
                        <label for="staticEmail" class="col col-form-label">Email</label>
                        <input type="text" name="usuario" class="form-control" placeholder="name@example.com">
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col col-form-label">Password</label>
                        <input type="password" name="clave" class="form-control" id="inputPassword">
                    </div>
                    <button type="submit" class="btn btn"
                        style="background-color: #8C05C0; color:white;">Entrar</button>
                </form>

            </div>
            <div class="card-footer" style="  background-color:#8C05C0; color:white">
                <a class="btn btn" style="color:white" href="../index.php" role="button">Inicio</a>
            </div>
        </div>
    </center>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>

</html>