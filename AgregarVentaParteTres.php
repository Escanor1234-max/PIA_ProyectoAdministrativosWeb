<?php
   $server="localhost";
   $user="root";
   $pass="";
   $db="ferreteria";

   $conn= mysqli_connect($server,$user,$pass,$db) ;

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
    <link rel="stylesheet" type="text/css" href="CSS/EstiloVenta.css">
    <link rel="icon" type="icon/png" href="Imagenes/icono.png">
    <title>Ferreteria Gutierrez</title>
</head>
<body background="Imagenes/fondo.jpg" style="overflow-y:hidden; overflow-x:hidden;">
    <div class= "e">
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
 
    <div class="a"> </div>
    <?php
       $precio=$_POST['precio'];
       $producto = $_POST['nombre'];
       $consulta = "SELECT id_producto from productos WHERE nombre ='".$producto."' ";
       $query=mysqli_query($conn, $consulta) or die("No se puede".mysqli_error($conn));
       $result= mysqli_fetch_array($query);
       $id = $result['id_producto'];


       $cantidad=$_POST['cantidad'];
       $total = $_POST['total'];

       $consultaDos= "SELECT MAX(id_venta) AS id from ventas";
       $queryDos= mysqli_query($conn, $consultaDos) or die("".mysqli_error($conn));
       $idVenta = mysqli_fetch_array($queryDos);
       $numVenta = $idVenta['id'] + 1;
   
       $consultaTres = "INSERT INTO ventas (id_venta,producto,producto_id,cantidad,precio,Compra_total) VALUES ($numVenta,'$producto',$id,$cantidad,$precio,$total) ";
       $queryTres = mysqli_query($conn, $consultaTres) or die ("Error". mysqli_error($conn));

    ?>

    <div class="u">

    <h2 align="center">Se a realizado la compra con exito !!</h2>
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
                <td><?= $numVenta?></td>
                <td><?= $producto?></td>
                <td><?= $id?></td>
                <td><?= $cantidad?></td>
                <td><?="$".$precio ?> </td>
                <td><?= "$".$total ?></td>
            </tr>
            </tbody>
        </table>
    </div>
        <form class="u" action="MenuVentas.php">
            <input type="submit" value="Volver">
        </form>
    </div>   
</div>
    </div>
</body>
</html>