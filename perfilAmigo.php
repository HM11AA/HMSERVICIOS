<?php
include("php/conexion.php");
include("php/ValidarSesion.php");

$nicknameA= $_GET['nickname'];
include("php/datosAmigo.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title> HM</title>
	<link href="css/estilo.css" rel='stylesheet' type='text/css'>
</head>
<body>
 <header>
    <div id="logo">    <!-- id para trabajar con css -->
	    <link href="css/estilo.css" rel='stylesheet' type='text/css' /> 
    </div>
	<nav class="menu">
	    <ul>
		     <li><a href="index.html">Inicio</a></li>
			 <li><a href="miperfil.php">Mi perfil</a></li>
		     <li><a href="amigos.php">Mis amigos</a></li>
		     <li><a href="fotos.php">Mis fotos</a></li>
		     <li><a href="agregar.php">Agregar amigos</a></li>
			 <li><a href="php/CerrarSesion.php">Cerrar Sesion</a></li>
		</ul>
	</nav>
 </header>
 
<section  id="perfil">
    <img src="<?php echo "$fotoPerfilA" ?>"/>
	<h1><?php echo "$nombreA $apellidosA" ?></h1>
	<p> <?php echo "$descripcionA"?></p>
</section>

<section id="recuadros">
   <h2>Mis amigos</h2>
   <?php
   $consulta="Select * From persona P Where P.Nickname in (Select A.Nickname2 From amistad A Where A.Nickname1='$nicknameA') LIMIT 3";
   $datos=mysqli_query($conexion, $consulta);
   while($fila=mysqli_fetch_array($datos)){
   ?>
   <section class="recuadro">
       <img src="<?php echo $fila['FotoPerfil']?>" height="150" width="150">
	   <h2><?php echo $fila['Nombre']."".$fila['Apellido']?></h2>
	   <p class="parrafo"> <?php echo $fila['Descripcion']?> </p>
	   <a href="<?php echo "perfilAmigo.php?nickname=".$fila['Nickname']?>" class="boton">Ver perfil</a><br><br>
   </section>	   
   
   <?php
     }
   ?>
   
</section>

<section id="recuadros">
   <h2>Mis fotos</h2>
   
   <?php
   $consulta="Select * From fotos F Where F.Nickname='$nicknameA' LIMIT 3";
   $datos=mysqli_query($conexion, $consulta);
   while($fila=mysqli_fetch_array($datos)){
   ?>
   <section class="recuadro">
      <img src="<?php echo $fila['NombreFotos']?>" height="200" width="200">
   </section>
   
   <?php
     }
   ?>
</section>
<footer>
     <p> Copyright &copy; Moda Femenina </p>
</footer>

</body>
</html>