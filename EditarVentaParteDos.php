<?php
  $server= "localhost";
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
    <link rel="stylesheet" type="text/CSS" href="CSS/EstiloGeneral.css">
    <link rel="stylesheet" type="text/css" href="CSS/EstiloVenta.css">

    <link rel="icon" type="icon/png" href="Imagenes/icono.png">
</head>
<body background="Imagenes/fondo.jpg" style="overflow-x:hidden; overflow-y:hidden;">
    <div class="e">
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
         $venta=$_POST['idVenta'];
         $producto=$_POST['idProducto'];
         $cantidad =$_POST['cantidad'];

         $consulta="SELECT precio from productos where id_producto='".$producto."'  ";
         $query= mysqli_query($conn, $consulta) or die("Error al obtener el precio".mysqli_error($conn)) ;
         $mostrarPrecio= mysqli_fetch_array($query)or die("Error");
         $precio = $mostrarPrecio['precio'];

         $total = $cantidad * $precio;

         $segundaConsulta ="SELECT nombre from productos where id_producto ='".$producto."' ";
         $queryDos = mysqli_query($conn, $segundaConsulta);
         $mostrarNombre= mysqli_fetch_array($queryDos);
         $nombre = $mostrarNombre['nombre'];

         $terceraConsulta ="UPDATE ventas SET producto='".$nombre."', producto_id='".$producto."', cantidad='".$cantidad."', precio='".$precio."', Compra_total='".$total."'
         WHERE id_venta='".$venta."'   ";
         $queryTres= mysqli_query($conn, $terceraConsulta) or die("".mysqli_error($conn));
      ?> 
      <div class="u">
      <h2 style="text-align:center; color:black;">Se ha actualizado con exito!!</h2>
      <div class="posicion">
    <div class="panel panel-primary" style="border: 1px solid black;">
    <div class="panel-heading" ></div>
             <table class="table table-hover" id="dev-table">
             <thead style="background-color: peru;">
             <tr>
             <th>ID_Venta</th>
             <th>Producto</th>
             <th>ID_Producto</th>
             <th>Cantidad</th>
             <th>Precio</th>
             <th>Compra_Total</th>
         </tr>
             </thead>
        <tbody>
         <tr>
             <td><?= $venta?></td>
             <td><?= $nombre?></td>
             <td><?= $producto?></td>
             <td><?= $cantidad?></td>
             <td><?= "$".$precio ?> </td>
             <td><?= "$".$total ?></td>
         </tr>
        </tbody>
             </table>
      </div>
      </div>
      <form id="btnEdit" action="MenuVentas.php">
          <input type="submit" value="Volver">
      </form>
      </div>
    </div>
</body>
</html>