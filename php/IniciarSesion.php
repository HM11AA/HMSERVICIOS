<?php

include("conexion.php");//llama el archivo conexion

session_start();//inicia una nueva session o reanuda la existente

$_SESSION['login']=false;//$_SESSION ea una variable super global

//recibir y guardar datos enviados desde el formulario

$nickname =$_POST["nickname"];
$password =$_POST["Contraseña"];

//evaluando nickname ingresado

$sql="SELECT * FROM persona WHERE Nickname = '$nickname'";
$consulta=mysqli_query($conexion, $sql);
$consulta=mysqli_fetch_array($consulta);

if($consulta)
{
    /*if(password_verify($password, $consulta['Password']))
    {
        */
        $_SESSION['login']          =true;
        $_SESSION['Nickname']       =$consulta['Nickname'];
        $_SESSION['nombre']         =$consulta['Nombre'];
        $_SESSION['apellidos']      =$consulta['Apellidos'];
        $_SESSION['edad']           =$consulta['Edad'];
        $_SESSION['descripcion']    =$consulta['Descripcion'];
        $_SESSION['fotoPerfil']     =$consulta['FotoPerfil'];
        header('Location:../miperfil.php');

    /*}
    else{
        echo "Contraseña Incorrecta";
        echo "<br> <a href='../index.html'> Intentelo de nuevo. </a>";
    }*/
}
else{
    echo "El usuario no existe!!";
    echo "<br> <a href='../index.html'> Intentelo de nuevo. </a>";
}

//cerrando la conexion
mysqli_close($conexion);


?>