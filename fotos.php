<?php
include("php/conexion.php");
include("php/ValidarSesion.php");
?>

<!DOCTYPE html>
<html>
<head>
     <meta charsedt='utf-8'>
	 <title> HM</title>
	 <link href="css/estilo.css" rel='stylesheet' type='text/css'>
</head>
<body>
<header>
    <div id="logo"> <!-- id para trabajar con css -->
	    <img src="img/hm.jpg" alt="logo" height="90" width="120">
	</div>
	<nav class="menu">
	  <ul>
	       <li><a href="index.html">Inicio</a></li>
		   <li><a href="miperfil.php">Mi Perfil</a></li>
		   <li><a href="amigos.php">Mis amigos</a></li>
		   <li><a href="fotos.php">Mis fotos</a></li>
		   <li><a href="agregar.php">Agregar Amigos</a></li>
		   <li><a href="php/CerrarSesion.php">Cerrar Sesion</a></li>
	  </ul>
	</nav>
</header>

<section id="recuadros">
    <h2>Mis fotos</h2>
	
	<h3>
	<form action="php/SubirFoto.php" method="POST" enctype="multipart/form-data"/>
	añadir imagen:<input name="archivo" id="archivo" type="file" accept=".jpg, .jpeg, .png" required />
	<input type="submit" name="subir" value="Subir">
	</form>
	</h3>
	
	<?php
	 $consulta="Select * From fotos P Where P.Nickname in (Select A.Nickname2 From amistad A Where A.Nickname1='$nickname')";
	 $datos=mysqli_query($conexion, $consulta);
	 while($fila=mysqli_fetch_array($datos)){
	?>
	<section class="recuadro">
	 <img src="<?php echo $fila['NombreFotos']?>" height="150" width="150"> 
	</section>
	<?php
	 }
	?>
</section>

<footer>
    <p>Copyright &copy; Gpzo Pikante</p> 
</footer>

</body>
</html>