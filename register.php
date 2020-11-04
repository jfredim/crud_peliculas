<?php
$titulo_form = 'Registrar Usuario';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>
	
<?php
include("connection.php");

if(($_POST['tarea']=="guardar")) {
//	if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];

	if($user == "" || $pass == "" || $name == "" || $email == "") {
		echo "Todos los campos deben Ingresarse. Existe algun campo Vacio!!!.";
		echo "<br/>";
		echo "<a href='register.php'>Registrar</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO login(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
			or die("Could not execute the insert query.");
			
		echo "<h4 style='color: green;'>Usuario Agregado Correctamente!!!!</h4>";

		echo "<br/>";
		echo "<a href='login.php' class='btn btn-lg btn-primary' role='button' id='boton_nueva_entrada'>Login</a>";

	}
} else {
?>

<div class="row parte-gestor-entradas">

    <div class="col-md-12">
        <h2>Gestion de Usuarios</h2>
    </div>
</div>

<div class="row parte-gestor-entradas">
                <div class="panel-body">


	<form name="form1" method="post" action="">
				<label>Nombre Completo</label>
				<input type="text" name="name" id="name"  minlength="5" placeholder="Nombre del Usuario"  >
				<label>Email</label>
				<input type="mail" name="email" id="email" placeholder="correo electronico">
				<label>Usuario</label>
				<input type="text" name="username" id="username" pattern="[A-Za-z0-9_-]{1,15}" placeholder="usuario">
				<label>Password</label>
				<input type="password" name="password" id="password" onblur="validar_clave()"  placeholder="password" >
				<button type="submit" class="btn btn-default btn-xs" name="submit" onclick="valregistro('guardar')"   value="submit">Crear Usuario  </button>
				<input name="tarea" type="hidden" id="tarea" /></td>

	</form>
</div>
<div
<?php
include_once 'plantillas/documento-cierre.inc.php';
?>

<?php
}
?>
