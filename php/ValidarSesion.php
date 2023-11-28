<?php

session_start();//inicia una nueva sesión o reanuda la existente
$login=$_SESSION['login']; //$_SESSION es una variable super global

if(!$login)
{
	header('Location:../index.html');
}
else
{
	$nickname = $_SESSION['Nickname'];
}


?>