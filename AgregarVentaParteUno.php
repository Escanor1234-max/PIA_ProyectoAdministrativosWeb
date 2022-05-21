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
<meta charset = "utf-8">
 <!---------Estilos tabla -------->
 <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
 <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 <script src="JS/tabla.js"></script>
<!------------------------------->
<!----CODIGO PARA BUSCADOR SELECT2 ----->
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
    <h1 style="color:black; text-align:center">Ferreteria Gutierrez</h1>
        <h1 style="color:black; text-align:center">Bienvenido Administrador</h1>
        <div class="header">
        <ul class="nav">
            <li><a href="Index.php">Inicio</a></li>
            <li><a href="MenuVentas.php">Ventas</a></li>
            <li><a href="MenuProvedores.php">Provedores</a></li>
            <li><a href="MenuProductos.php">Productos</a></li>
        </ul>
        </div>
    <div class="a"> </div><!--- El nombre de la clase hace referencia a "agregar"---->

    <form method="POST" class=parteUno action="AgregarVentaParteDos.php">
        <p>Producto:<select id="buscador" name="producto">
            <?php 
               #La consulta selecciona toda la tabla ordenada de menor a mayor por Id_producto;
            #Despues inicie un ciclo while para mostrar dentro de la etiqueta option todos los id_producto, en donde tambien seran almacenados
            #como el valor de la etiqueta select para los demas campos a llenar, es decir que el usuario al momento de seleccionar un id en el select
            #guardara ese valor en su respectiva variable y de ahi desencadenara los demas procesos en los campos a llenar.
            $consulta="SELECT * from productos ORDER BY id_producto";
            $result=mysqli_query($conn,$consulta) or die("No se ha podido realizar la consulta");

            while($mostrar=mysqli_fetch_array($result)){
          ?> 
          <option></option>
          <option value="<?php echo $mostrar['id_producto'];?>"> <?php echo $mostrar['nombre'] ?> </option> 
          <?php } ?> 
        </select></p>
        <p>Cantidad:</p><input type="text" name="cantidad" style="font-size: 25px;">
        <input type="submit" value="Siguiente">
    </form>
</div>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
           $('#buscador').select2();
    });

</script>