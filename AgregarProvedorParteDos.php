<?php
  $server="localhost";
  $user= "root";
  $pass="";
  $db="ferreteria";

  $conn=mysqli_connect($server,$user,$pass,$db) or die("No se pudo establecer una conexion con la base de datos");

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
<body background="Imagenes/fondo.jpg" style="overflow-x:hidden; overflow-y:hidden;" >
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
       $consulta="SELECT MAX(id_provedor) AS id from provedores ";
       $query= mysqli_query($conn, $consulta) or die("".mysqli_error($conn));
       $mostrarId= mysqli_fetch_array($query) ;
       $idProvedor= $mostrarId['id'] + 1;

       $consultaDos="SELECT MAX(id_producto) AS idp from productos";
       $queryDos= mysqli_query($conn,$consultaDos) or die("".mysqli_error($conn));
       $mostrarIDProduct= mysqli_fetch_array($queryDos);
       $idProducto= $mostrarIDProduct['idp'];

       $empresa=$_POST['empresa'];
       $direccion=$_POST['direccion'];
       $correo=$_POST['correo'];
       $telefono=$_POST['telefono'];

       $consultaTres="INSERT INTO provedores (id_provedor,empresa,direccion,correo,producto_id,telefono) VALUES ($idProvedor,'$empresa','$direccion','$correo',$idProducto,'$telefono')";
       $queryTres= mysqli_query($conn,$consultaTres) or die("".mysqli_error($conn));
    ?>

    <div class="u">
    <h2 align="center">Se a agregado el provedor!! !!</h2>
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
                <td><?= $idProvedor?></td>
                <td><?= $empresa?></td>
                <td><?= $direccion?></td>
                <td><?= $correo?></td>
                <td><?= $idProducto ?> </td>
                <td><?= $telefono?></td>
            </tr>
            </tbody>
        </table>
    </div>
    </div> 
    <form action="MenuProvedores.php">
    <input type="submit" value="Volver">
    </form>
    
</div>

</div>
</body>
</html>