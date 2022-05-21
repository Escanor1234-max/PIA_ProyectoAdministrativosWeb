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
    <!----CODIGO PARA BUSCADOR SELECT2 ----->
    <link rel="stylesheet" type="text/css" href="JS/Buscador/css/select2.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="JS/Buscador/js/select2.js"></script>
    <!---------------------------------------->
    <link rel="stylesheet" type="text/css" href="CSS/EstiloGeneral.css">
    <link rel="stylesheet" type="text/css" href="CSS/EstiloVenta.css">
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

    <form method="POST" class="editUno"   action="EditarVentaParteDos.php">
        <p>Venta:<select id="venta" name="idVenta">
            <?php
               $consulta="SELECT * FROM ventas ORDER BY id_venta";
               $query=mysqli_query($conn,$consulta);
               while($mostrar =mysqli_fetch_array($query) ){
            ?>
            <option></option>
            <option value=<?= $mostrar['id_venta'] ?> ><?= $mostrar['id_venta'] ?></option>
         <?php } ?>
        </select></p>

        <p>Producto:<select id="producto" name="idProducto">
            <?php
             $consultaDos="SELECT * from productos ORDER BY id_producto";
             $result=mysqli_query($conn,$consultaDos) or die("No se ha podido realizar la consulta");

            while($muestraDos=mysqli_fetch_array($result)){
          ?> 
          <option></option>
          <option value="<?php echo $muestraDos['id_producto'];?>"> <?php echo $muestraDos['nombre']; ?> </option> 
          <?php } ?> 
        </select></p>

        <p>Cantidas:</p> <input type="text" name="cantidad">
        <input type="submit" value="Editar">
    </form>
</div>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
           $('#venta').select2();
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
           $('#producto').select2();
    });
</script>