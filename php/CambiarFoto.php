
<?php
include("ValidarSesion.php");

$ubicacion="../img/$nickname/perfil.png";
$archivo= $_FILES['archivo']['tmp_name'];

if(move_uploaded_file($archivo, $ubicacion)){
	echo "El archivo ha sido subido";
	header('Location:../miperfil.php'); //Redireccionar a la pagina mi perfil
}
else{
	echo "Ha ocurrido un error trate de nuevo";
	echo "<br> <a href='../miperfil.php'> Volver. </a>";
}

?>