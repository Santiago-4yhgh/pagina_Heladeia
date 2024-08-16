<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="Style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Inicio de secion</title>
</head>
<body>
  <form action="IniciarSesion.php" method="POST">
    <h1>Iniciar Sesion</h1>
    <hr>
    <?php
    if (isset($_GET['error'])){
      ?>
      <p class="error"></p>
      <?php
      echo $_GET['error']
    ?>

    </p>
    <?php
    }
    ?>
    <hr>
    <i class="fa-solid fa-user"></i>
    <label>Usuario</label>
    <input type="text" name="Usuario" placeholder="Nombre de usuario">

    <i class="fa-solid fa-unlock"></i>
    <label>Contraseña</label>
    <input type="text" name="Contraseña" placeholder="Contraseña">
    <hr>
     <button type="submit">Iniciar Sesion</button>
     <a href="Crearcuenta.php">Crear Cuenta</a>
  </body>
</html>