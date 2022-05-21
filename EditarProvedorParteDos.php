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
    <link rel="stylesheet" type="text/css" href="CSS/EstiloProvedores.css">
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
      $id=$_POST['idProvedor'];
      $empresa=$_POST['empresa'];
      $direccion=$_POST['direccion'];
      $correo=$_POST['correo'];
      $productID=$_POST['idp'];
      $telefono=$_POST['telefono'];

      $consulta="UPDATE provedores SET empresa='".$empresa."', direccion='".$direccion."', correo='".$correo."', producto_id='".$productID."', telefono='".$telefono."' WHERE id_provedor='".$id."'  ";
      $query=mysqli_query($conn, $consulta) or die("".mysqli_error($conn) );
    ?>

    <h2 class="h">Se ha actualizado con exito!!</h2>
    <div class="tablaEdit">
    <div class="posicion">
    <div class="panel panel-primary" style="border: 1px solid black;">
    <div class="panel-heading" ></div>
        <table class="table table-hover" id="dev-table">
            <thead style="background-color: peru;">
            <tr>
                <th>ID_Provedor</th>
                <th>Empresa</th>
                <th>Direccion</th>
                <th>Correo</th>
                <th>Producto_ID</th>
                <th>Telefono</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?= $id?></td>
                <td><?= $empresa?></td>
                <td><?= $direccion?></td>
                <td><?= $correo?></td>
                <td><?= $productID ?> </td>
                <td><?= $telefono?></td>
            </tr>
            </tbody>
        </table>
    </div>
    </div>
        <form id="btnEdit" action="MenuProvedores.php">
            <input type="submit" value="Volver">
        </form>

    </div>
    </div>
</body>
</html>