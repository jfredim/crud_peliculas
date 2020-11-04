<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//conexion
include_once("connection.php");

//lista  peliculas del usuario
$result = mysqli_query($mysqli, "SELECT * FROM peliculas WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");

$titulo_form = 'Ver';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>

<div class="row parte-gestor-entradas">
    <div class="col-md-12">
        <h2>Gestion de Peliculas</h2>
        <br>
        <br>
        <a href="adicionar.php" class="btn btn-lg btn-primary" role="button" id="boton_nueva_entrada">Adicionar Nuevas Peliculas</a>
        <br>
        <br>
    </div>
</div>
<div class="row parte-gestor-entradas">
    <div class="col-md-12">
<?php if (count($result) > 0) { ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Sinopsis</th>
                        <th>Año</th>
                        <th>Fecha Creacion</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
	<?php
	while($entrada_actual = mysqli_fetch_array($result)) {		
        ?>
                        <tr>
                            <td><?php echo $entrada_actual['titulo']; ?></td>
                            <td><?php echo $entrada_actual['sinopsis']; ?></td>
                            <td><?php echo $entrada_actual['year']; ?></td>
                            <td><?php echo $entrada_actual['fecha_creacion']; ?></td>
                            <td>
                                <form method="post" action="edit.php">
                                    <input type="hidden" name="id" value="<?php echo $entrada_actual['id']; ?>">
                                    <input type="hidden" name="titulo" value="<?php echo $entrada_actual['titulo']; ?>">
                                    <input type="hidden" name="sinopsis" value="<?php echo $entrada_actual['sinopsis']; ?>">
                                    <input type="hidden" name="year" value="<?php echo $entrada_actual['year']; ?>">
                                    <input type="hidden" name="fecha_creacion" value="<?php echo $entrada_actual['fecha_creacion']; ?>">
                                    <button type="submit" class="btn btn-default btn-xs" name="editar_entrada">Editar</button>                                    
                                </form>

                            </td>
                            <td>
                                <form method="post" action="delete.php">
									<input type="hidden" name="id_borrar" value="<?php echo $entrada_actual['id']; ?>" >
                                    <button type="submit" class="btn btn-default btn-xs" name="borrar_entrada" onClick="return confirm('Esta Seguro que desea Borrar la Pelicula?')">Borrar</button>                                    
                                </form>
                            </td>
                        </tr>

        <?php
    }
    ?>
                </tbody>
            </table>

<?php } else {
    ?>
            <h3 class="text-center">Todavia No has escrito ninguna entrada</h3>
            <br>
            <br>

<?php } ?>
    </div>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>


