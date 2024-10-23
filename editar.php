<?php

include 'Conexion_BD.php';
$conexion = connection();

$id=$_POST["id"];
$nombre = $_POST['name'];
$email = $_POST['lastname'];
$telefono = $_POST['username'];
$mensaje = $_POST['password'];

$sql="UPDATE usuario SET nombre='$nombre', email='$email', telefono='$telefono', mensaje='$mensaje', WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: Crud.php ");
}else{

}

?>