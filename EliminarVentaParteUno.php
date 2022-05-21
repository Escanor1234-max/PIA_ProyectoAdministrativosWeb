<?php
  $server="localhost";
  $user="root";
  $pass="";
  $db="ferreteria";

  $conn= mysqli_connect($server,$user,$pass,$db) or die("No se pudo establecer una conexion a la base de datos");
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
    <!----CODIGO PARA BUSCADOR EN SELECT ----->
    <link rel="stylesheet" type="text/css" href="JS/Buscador/css/select2.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="JS/Buscador/js/select2.js"></script>
    <!---------------------------------------->
    <link rel="stylesheet" type="text/css" href="CSS/EstiloGeneral.css">
    <link rel="stylesheet" type="text/css" href="CSS/EstiloVenta.css">
    <link rel="icon" type="icon/png" href="Imagenes/icono.png">
    <title>Ferreteria Gutierrez</title>
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

    <form class="eliminar" method="POST" action="EliminarVentaParteDos.php">
        <p>ID_Venta:<select id="idV" name="idVenta">
            <?php
               $consulta="SELECT * from ventas ORDER BY id_venta";
               $query= mysqli_query($conn, $consulta);
               while($mostrarVenta= mysqli_fetch_array($query) ){
            ?>
            <option></option>
            <option value="<?=$mostrarVenta['id_venta'] ?>" ><?= $mostrarVenta['id_venta'] ?></option>
            <?php } ?>
        </select></p>
        <input type="submit" value="Eliminar">
    </form>
</div>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
           $('#idV').select2();
    });

</script>