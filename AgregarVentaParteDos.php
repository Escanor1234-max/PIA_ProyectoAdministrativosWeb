<?php
  $server="localhost";
  $user="root";
  $pass="";
  $db="ferreteria";

  $conn=mysqli_connect($server,$user,$pass,$db) or die("No se pudo establecer la conexion");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset ="utf-8">
<!---------Estilos tabla -------->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="JS/tabla.js"></script>
<!------------------------------->
<link rel="stylesheet" type="text/css" href="CSS/EstiloGeneral.css">
<link rel="stylesheet" type="text/css" href="CSS/EstiloVenta.css">
<link rel="icon" type="icon/png" href="Imagenes/icono.png">
<title>Ferreteria Gutierrez</title>
</head>
<body background="Imagenes/fondo.jpg" style="overflow-x:hidden; overflow-y:hidden;">
<div class="e">
    <h1 style="color:black; text-align:center;">Ferreteria Gutierrez</h1>
    <h1 style="color:black; text-align:center;">Bienvenido Administrador</h1>
        <div class="header">
        <ul class="nav">
            <li><a href="Index.php">Inicio</a></li>
            <li><a href="MenuVentas.php">Ventas</a></li>
            <li><a href="MenuProvedores.php">Provedores</a></li>
            <li><a href="MenuProductos.php">Productos</a></li>
        </ul>
        </div>
    
    <div class="a">  </div>
        <form method="POST" class="parteDos" action="AgregarVentaParteTres.php">
            <?php 
              $producto=$_POST['producto'];
              $cantidad=$_POST['cantidad'];

              $consulta="SELECT precio from productos WHERE id_producto='".$producto."' ";
              $query = mysqli_query($conn,$consulta) or die("Error en la consulta" .mysqli_error($conn));
              $mostrarPrecio = mysqli_fetch_array($query);

              $consultaDos = "SELECT nombre from productos WHERE id_producto='".$producto."' ";
              $queryDos = mysqli_query($conn,$consultaDos);
              $mostrarNombre = mysqli_fetch_array($queryDos) ;
              
              $total= $mostrarPrecio['precio'] * $cantidad;
            ?>
            <p>Producto:</p><input type="text" name="nombre" value="<?= htmlentities($mostrarNombre['nombre'])?>" style="font-size:25px;">
            <p>Precio:</p><input type="text" name="precio" value= <?=$mostrarPrecio['precio']?> style="font-size:25px;">
            <p>Cantidad:</p><input type="text" name="cantidad" value=<?= $cantidad ?> style="font-size:25px;">
            <p>Compra Total:</p><input type="text" name="total" value= <?=$total ?> style="font-size:25px;">
            <input type="submit" value="Siguiente">
        </form>
</div>
</body>
</html>