<?php
if($nickname==$nicknameA)
{
	header('Location: miperfil.php');
}
$consulta ="SELECT * FROM persona WHERE Nickname='$nicknameA'";
$consulta=mysqli_query($conexion, $consulta);
$consulta=mysqli_fetch_array($consulta);


$nombreA      =$consulta['Nombre'];
$apellidosA   =$consulta['Apellido'];
$edadA        =$consulta['Edad'];
$descripcionA =$consulta['Descripcion'];
$fotoPerfilA  =$consulta['FotoPerfil'];

?>