<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including conexion
include_once("connection.php");

if(($_POST['tarea']=="guardar")) {
//	if(isset($_POST['update']))

	$id = $_POST['id'];
	
	$titulo = $_POST['titulo'];
	$sinopsis = $_POST['sinopsis'];
	$year = $_POST['year'];
	
	// campos vacios
	if(empty($titulo)) {
				
			echo "<font color='red'>Titulo esta Vacio.</font><br/>";
	} else {	
		//update
		$result = mysqli_query($mysqli, "UPDATE peliculas SET titulo='$titulo', sinopsis='$sinopsis', year='$year' WHERE id=$id");
		
		//redirgir
		header("Location: view.php");
	}
}
?>
<?php
$id = $_POST['id'];

$result = mysqli_query($mysqli, "SELECT * FROM peliculas WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$titulo = $res['titulo'];
	$sinopsis = $res['sinopsis'];
	$year = $res['year'];
}

$titulo_form = 'Editar';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>
	
	<div class="row parte-gestor-entradas">
    <div class="col-md-12">
        <h2>Gestion de Peliculas</h2>
        <br>
        <br>
        <a href="view.php" class="btn btn-lg btn-primary" role="button" id="boton_nueva_entrada">Ver LIsta Peliculas</a>
        <br>
        <br>
    </div>
</div>

<div class="row parte-gestor-entradas">
                <div class="panel-body">


	<form name="form1" method="post" action="">
				<label>Titulo Pelicula</label>
				<input type="text" name="titulo" id="titulo" value="<?php echo $titulo;?>">
				<br>
				<label>Sinopsis</label>
				<input type="text" name="sinopsis" value="<?php echo $sinopsis;?>" size="200" >
				<br>
				<label>Año</label>
				<input type="number" name="year" id="year" value="<?php echo $year;?>" size="4" >
				<input type="hidden" name="id" value=<?php echo $_POST['id'];?>>
				<input type="hidden" name="tarea" >
				<br>
				<br>
				<button type="submit" class="btn btn-default btn-xs" name="update"  onclick="valadicionar('guardar')">Actualizar </button>
	</form>
</div>
<div
<?php
include_once 'plantillas/documento-cierre.inc.php';
?>
