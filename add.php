<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}

//conexion
include_once("connection.php");

$titulo_form = 'Adicionar';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';

if(($_POST['tarea']=="guardar")) {
//if(isset($_POST['Submit'])) {	
	$titulo = $_POST['titulo'];
	$sinopsis = $_POST['sinopsis'];
	$year = $_POST['year'];
	$hoy = date("Y/m/d");     

	
	$loginId = $_SESSION['id'];
		
	// campos
	if(empty($titulo) ) {
				
		echo "<font color='red'Titulo Esta Vacio.</font><br/>";
		
		//link a la pagina previa
		echo "<br/><a href='javascript:self.history.back();' lass='btn btn-lg btn-primary' role='button>Regresar</a>";

	} else { 
			
		//insertar
			$result = mysqli_query($mysqli, "INSERT INTO
		    peliculas(titulo,sinopsis,login_id,fecha_creacion,year) VALUES('$titulo','$sinopsis','$loginId','$hoy','$year')");
		
		//display mensaje

		?>

		
		<div class="row parte-gestor-entradas">
			<h4 style="color: green;">Peicula Agregada Correctamente!!!!</h4>
		<div class="col-md-12">
			<h2>Gestion de peliculas</h2>
			<br>
			<br>
			<a href="view.php" class="btn btn-lg btn-primary" role="button" id="boton_nueva_entrada">Ver Lista Peliculas</a>
			<br>
			<br>
		</div>
	</div>
	
	<?php }
}else{
	header("Location: adicionar.php");
}
include_once 'plantillas/documento-cierre.inc.php';
?>