<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//conexion
include("connection.php");

//id 
$id = $_POST['id_borrar'];

//borrado
$result=mysqli_query($mysqli, "DELETE FROM peliculas WHERE id=$id");

//redirigir
header("Location:view.php");
?>

