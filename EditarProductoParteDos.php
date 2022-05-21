<?php
   $server="localhost";
   $user="root";
   $pass="";
   $db="ferreteria";

   $conn= mysqli_connect($server,$user,$pass,$db);
?>

<!DOCTYPE html>
<html>
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
    <title>Ferreteria Gutierrez</title>
</head>
<body background="Imagenes/fondo.jpg" style="overflow-x:hidden; overflow-y:hidden;">
    <div class= "e">
        <h1 align="center">Ferreteria Gutierrez</h1>
        <h1 align="center">Bienvenido Administrador</h1>
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
      $idProducto=$_POST['idProducto'];
      $nombre=$_POST['nombre'];
      $precio=$_POST['precio'];
      $idProvedor=$_POST['idProvedor'];
      $unidad=$_POST['unidades'];
     
      $consulta="UPDATE productos SET nombre='".$nombre."', precio='".$precio."', id_provedor='".$idProvedor."', unidades='".$unidad."' WHERE id_producto='".$idProducto."'  ";
      $query=mysqli_query($conn, $consulta) or die("".mysqli_error($conn) );
    ?>

    <h2 class="h">Se ha actualizado con exito!!</h2>
    <div class="u">
    <div class="posicion">
    <div class="panel panel-primary" style="border: 1px solid black;">
    <div class="panel-heading" ></div>
        <table class="table table-hover" id="dev-table">
            <thead style="background-color: peru;">
            <tr>
                <th>ID_Producto</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>ID_Provedor</th>
                <th>Unidades</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?= $idProducto?></td>
                <td><?= $nombre?></td>
                <td><?= "$".$precio?></td>
                <td><?= $idProvedor?></td>
                <td><?= $unidad?> </td>
            </tr>
            </tbody>
        </table>
    </div>
        
    </div>
    <form class="u" action="MenuProductos.php">
            <input type="submit" value="Volver">
        </form>
</div>

</div>
</body>
</html>
