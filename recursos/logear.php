<?php
  session_start();

  require('conexion.php');

  $username = $_POST['usuario'];
  $pass     = $_POST['clave'];


  $sql1 = mysqli_query($conexion, "SELECT * FROM login_admin WHERE usuario = '$username'");
  if($f1 = mysqli_fetch_array($sql1)) {
    if ($pass == $f1['clave']) {                                                //se verifica que la contraseña coincida

      $_SESSION['user'] = $f1['nombre'];
      echo "<script>location.href='../Admin/Admin.php'</script>";       //redireccion a la pagina que decea 

    }else{

      echo "<script>alert('CONTRASEÑA INCORRECTA')</script> ";                  //por si la contraseña es incorrecta
      echo "<script>location.href='login.php'</script>";
    }

  }else {
    $sql2 = mysqli_query($conexion, "SELECT * FROM login_tendero WHERE usuario = '$username'");
    if($f2 = mysqli_fetch_array($sql2)){
      if ($pass == $f2['clave']) {                                               //se verifica que la contraseña coincida

        $_SESSION['user'] = $f2['nombre'];
        echo "<script>location.href='../Tendero/tendero.php'</script>";       //redireccion a la pagina 

      }else{

        echo "<script>alert('CONTRASEÑA INCORRECTA')</script> ";                //por si la contraseña es incorrecta
        echo "<script>location.href='login.php'</script>";
      }

    }
    echo "<script>alert('Este Usuario no se encuentra registrado')</script>";
    echo "<script>location.href='login.php'</script>";
  }
?>