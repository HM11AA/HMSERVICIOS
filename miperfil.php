
<?php
include("php/conexion.php");
include("php/ValidarSesion.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>HM</title>
    <link href="css/estilo.css" rel='stylesheet' type='text/css' /> 
</head>
<body>
  <header>
     <div id ="logo">  <!-- id para trabajar con css-->
	    <img src="img/hm.jpg" alt="logo" height="90" width="120">
	 </div>
	 <nav class="menu">
		<ul> <!--lista desordenada-->
			<li> <a href="index.html">Inicio</a></li>
			<li> <a href="miperfil.php">Mi perfil</a></li>
			<li> <a href="amigos.php">Mis amigos</a></li>
			<li> <a href="fotos.php">Mis fotos</a></li>
			<li> <a href="agregar.php">Buscar amigos</a></li>
			<li> <a href="php/CerrarSesion.php">Cerrar Sesión</a></li>
		</ul>
	 </nav>
  </header>
  
  <section id="perfil">
  <img src="<?php echo "$_SESSION[fotoPerfil]" ?>" width="200">
  <h1><?php echo "$_SESSION[nombre] $_SESSION[apellidos]"?></h1>
  
  <h3><form action="php/CambiarFoto.php" method="POST" enctype="multipart/form-data"/>
	Añadir Imagen: <input name="archivo" id="archivo" type="file" accept=".jpg, .jpeg, .png" required />
	<input type="submit" name="subir" value="Subir" />
	</form> </h3>
	
  <p class="parrafo"> <?php echo "$_SESSION[descripcion]"?> </p>
  </section>
  
  <section id="recuadros">
	<h2> Mis amigos</h2>
	<?php
	$consulta="Select * From persona P Where P.Nickname in (Select A.Nickname2 From amistad A Where A.Nickname1='$nickname') LIMIT 3";
	$datos=mysqli_query($conexion, $consulta);
	while($fila=mysqli_fetch_array($datos)){
	?>
	
	<section class="recuadro">
		<img src="<?php echo $fila['FotoPerfil']?>"  height="150">
		<h2> <?php echo $fila['Nombre']. "" . $fila['Apellido']?></h2>
		<p class="parrafo"> <?php echo $fila['Descripcion']?> </p>
		<a href="<?php echo "perfilAmigo.php?nickname=". $fila['Nickname']?>" class="boton"> Ver perfil</a><br><br>
  </section>
  <?php
	}
  ?>
  
 </section>
  
 <section id="recuadros">
	<h2> Mis Fotos</h2>
	
	<?php
	$consulta="Select * From fotos F Where F.Nickname='$nickname' Limit 3";
	$datos=mysqli_query($conexion, $consulta);
	while($fila=mysqli_fetch_array($datos)){
	?>
	
	<section class="recuadro">
		<img src="<?php echo $fila['NombreFotos']?>"  height="200" width="296">
  </section>
  	 
	 <?php
	}
    ?>
 </section> 
  <footer>
     <p>Copyright &copy;  Gpzo Pikante</p>
  </footer>
  
</body>
</html>
