<?php 
  $server="localhost";
  $user="root";
  $pass="";
  $db="ferreteria";

  $conn= mysqli_connect($server,$user,$pass,$db);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <!---------Estilos tabla -------->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="JS/tabla.js"></script>
    <!------------------------------->
    <link rel="stylesheet" type="text/css" href="CSS/EstiloGeneral.css">
    <link rel="stylesheet" type="text/css" href="CSS/EstiloProductos.css">
    <link rel="icon" type="icon/png" href="Imagenes/icono.png">
</head>
<body background="Imagenes/fondo.jpg" style="overflow-x:hidden; overflow-y:hidden;">
<div class= "e">
        <h1 style="text-align:center; color:black;">Ferreteria Gutierrez</h1>
        <h1 style="text-align:center; color:black;">Bienvenido Administrador</h1>
        <div class="header">
            <ul class="nav">
                <li><a href="Index.php">Inicio</a></li>
                <li><a href="MenuVentas.php">Ventas</a></li>
                <li><a href="MenuProvedores.php">Provedores</a></li>
                <li><a href="MenuProductos.php">Productos</a></li>
            </ul>
        </div>
    <div class="a"></div>
    <?php
        $producto=$_POST['idProducto'];
        $consulta = "DELETE FROM productos WHERE id_producto='".$producto."'  ";
        $query= mysqli_query($conn, $consulta)or die("".mysqli_error($conn) );
    ?>  
    
    <h2 id="h">Se ha realizado la eliminacion con exito!!</h2>
    <form id="btnEliminar" action="MenuProductos.php">
        <input type="submit" value="Volver">
    </form>
</div>
</body>
</html>