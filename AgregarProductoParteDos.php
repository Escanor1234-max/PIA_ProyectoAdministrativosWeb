<?php
   $server="localhost";
   $user="root";
   $pass="";
   $db="ferreteria";

   $conn= mysqli_connect($server,$user,$pass,$db) or die("Error en la conexion");
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
<body background="Imagenes/fondo.jpg" style="overflow-x: hidden; overflow-y:hidden;">
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
       $consulta="SELECT MAX(id_producto) AS id from productos";
       $query= mysqli_query($conn,$consulta) or die("".mysqli_error($conn));
       $mostrarID= mysqli_fetch_array($query);
       $idProducto = $mostrarID['id'] + 1;

       $consultaDos="SELECT MAX(id_provedor) AS idpr from provedores";
       $queryDos=mysqli_query($conn, $consultaDos) or die("".mysqli_error($conn) );
       $mostrarProvedor= mysqli_fetch_array($queryDos);
       $idProvedor= $mostrarProvedor['idpr'] + 1 ;

       $nombre=$_POST['nombre'];
       $precio=$_POST['precio'];
       $unidades=$_POST['unidades'];

       $consultaTres="INSERT INTO productos (id_producto,nombre,precio,id_provedor,unidades) VALUES ($idProducto,'$nombre',$precio,$idProvedor,$unidades)";
       $queryTres=mysqli_query($conn,$consultaTres) or die("".mysqli_error($conn) );
    ?>
    <h2 class="h">Se agrego el producto con exito!!</h2>
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
                <td><?= $unidades ?> </td>
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