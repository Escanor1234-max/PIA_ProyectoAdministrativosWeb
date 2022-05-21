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
    <link rel="stylesheet" type="text/css" href="CSS/EstiloVenta.css">
    <link rel="icon" type="icon/png" href="Imagenes/icono.png">
    <title>Ferreteria Gutierrez</title>
</head>
<body background="Imagenes/fondo.jpg" style="overflow-x: hidden; overflow-y:hidden;" >
    <div class="e">
        <h1 style="color:black; text-align:center;">Ferreteria Gutierrez</h1>
        <h1 style="color:black; text-align:center;">Bienvenido Administrador</h1>
        <div class="header">
        <ul class="nav">
            <li id="menu"><a href="Index.php">Inicio</a></li>
            <li><a href="MenuVentas.php">Ventas</a></li>
            <li><a href="MenuProvedores.php">Provedores</a></li>
            <li><a href="MenuProductos.php">Productos</a></li>
        </ul>
        </div>
        <div class="a"></div>
        <div class="container">
<div class="posicionTabla"> 
    	<div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary" style="border: 1px solid black;">
					<div class="panel-heading" style="background-color:peru;">
						<h3 class="panel-title">Ventas</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
								<i class="glyphicon glyphicon-filter"></i>
							</span>
						</div>
					</div>
					<div class="panel-body">
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filtrar Producto" />
					</div>
          <div class="ventas">
					<table class="table table-hover" id="dev-table" style="height:200px;">
						<thead>
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
            <?php
                  $sql="SELECT * from ventas ORDER BY id_venta";
                  $result= mysqli_query($conn,$sql);
    
                  while($mostrar=mysqli_fetch_array($result)){
                ?>
                      <tr>
                          <td><?php echo $mostrar['id_venta'] ?></td>
                          <td><?php echo $mostrar['producto'] ?></td>
                          <td><?php echo $mostrar['producto_id'] ?></td>
                          <td><?php echo $mostrar['cantidad'] ?></td>
                          <td><?php echo "$".$mostrar['precio']?></td>
                          <td><?php echo "$".$mostrar['Compra_total'] ?></td>
                      </tr>
                <?php
                  }
                ?>
							
						</tbody>
					</table>
          </div>
          </div>
				</div>
			</div>
			<div class="col-md-6">
			</div>
		</div>
	</div>


        <ul class="submenu">
            <li><a href="AgregarVentaParteUno.php">Agregar</a></li>
            <li><a href="EditarVentaParteUno.php">Editar</a></li>
            <li><a href="EliminarVentaParteUno.php">Eliminar</a></li>
        </ul>
    </div>


</body>
</html>