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
<body background="Imagenes/fondo.jpg" style="overflow-y:hidden; overflow-x:hidden;">
    <div class="e">
        <h1 align="center" style="color:black;">Ferreteria Gutierrez</h1>
        <h1 align="center" style="color:black;">Bienvenido Administrador</h1>
        <div class="header">
        <ul class="nav">
            <li><a href="Index.php">Inicio</a></li>
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
				<div class="panel panel-primary" style="border: 1px solid black; width:603px;">
					<div class="panel-heading" style="background-color:peru;">
						<h3 class="panel-title">Provedores</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
								<i class="glyphicon glyphicon-filter"></i>
							</span>
						</div>
					</div>
					<div class="panel-body">
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filtrar Provedor" />
					</div>
          <div class="provedores">
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
                  <th>ID_Provedor</th>
                  <th>Empresa</th>
                  <th>Direccion</th>
                  <th>Correo</th>
                  <th>Producto_id</th>
                  <th>Telefono</th>
							</tr>
						</thead>
						<tbody>
            <?php
                  $sql="SELECT * from provedores ORDER BY id_provedor";
                  $result= mysqli_query($conn,$sql);
    
                  while($mostrar=mysqli_fetch_array($result)){
                ?>
                      <tr>
                          <td><?php echo $mostrar['id_provedor'] ?></td>
                          <td><?php echo $mostrar['empresa'] ?></td>
                          <td><?php echo $mostrar['direccion'] ?></td>
                          <td><?php echo $mostrar['correo'] ?></td>
                          <td><?php echo $mostrar['producto_id']?></td>
                          <td><?php echo $mostrar['telefono'] ?></td>
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
            <li><a href="AgregarProvedorParteUno.php">Agregar</a></li>
            <li><a href="EditarProvedorParteUno.php">Editar</a></li>
            <li><a href="EliminarProvedorParteUno.php">Eliminar</a></li>
        </ul>
    </div>


</body>
</html>