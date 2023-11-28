
<?php
session_start();   //inicia una nueva sesión o reanuda la existente
$_SESSION=array(); //limpia las variables super globales de sesión

session_destroy(); //destruir todas las variables de sesión
header('Location: ../index.html');
?>