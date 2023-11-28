<?php

include("conexion.php");
include("ValidarSesion.php");

//Para el nombre de la imagen, veremos el utimo id en nuestra BD

$consulta="SELECT idFotos FROM fotos ORDER BY idFotos DESC LIMIT 1";
$consulta= mysqli_query($conexion, $consulta);
$consulta= mysqli_fetch_array($consulta);
$idFoto =$consulta['idFotos']; //guardamos el dato obtenido en la variable idFoto

++$idFoto; //Generamos un nuevo id sumandole 1 al ultimo id de nuestra BD

//Guardamos la imagen en nuestra carpeta de imagenes

$ubicacion= "img/$nickname/$idFoto.jpg";
$archivo= $_FILES['archivo']['tmp_name'];

if(move_uploaded_file($archivo, "../$ubicacion")){
	
	echo "El archivo ha sido subido";
	$consulta= "INSERT INTO fotos VALUES ('$idFoto', '$nickname', '$ubicacion')";
	
	if(mysqli_query($conexion, $consulta)){
		echo "Tu imagen ha sido guardada";
		header('Location: ../fotos.php'); //Redireccionamos a la pagina fotos
	}
	else{
		echo "Error:" . $consulta . "<br>" . mysqli_error($conexion);
		echo "<br> <a href='../foto.php'> Volver. </a>";
	}
}
else {
	echo "Ha ocurrido un error trate de nuevo";
	echo "<br> <a href='../miperfil.php'> Volver. </a>";
}

?>