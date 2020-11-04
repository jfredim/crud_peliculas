<?php
$titulo_form = 'Adicionar';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>

    <div class="row parte-gestor-entradas">
        <div class="col-md-12">
            <h2>Gestion de Peliculas</h2>
            <br>
            <br>
            <a href="view.php" class="btn btn-lg btn-primary" role="button" id="boton_nueva_entrada">Ver Lista Peliculas</a>
            <br>
            <br>
        </div>
    </div>

    <div class="row parte-gestor-entradas">
        <div class="panel-body">


            <form name="form1" method="post" action="add.php">
                <label>Titulo Pelicula</label>
                <input type="text" name="titulo" id="titulo" require>
                <br>
                <label>Sinopsis</label>
                <input type="text" name="sinopsis" size="200" id="sinopsis">
                <br>
                <label>Año</label>
                <input type="number" name="year" size="4" id="year">
                <br>
                <br>
                <button type="submit" class="btn btn-default btn-xs" name="Submit" value="Add" onclick="valadicionar('guardar')">Adicionar </button>
                <input name="tarea" type="hidden" id="tarea" /></td>

            </form>
        </div>
    <div 
        
        <?php include_once 'plantillas/documento-cierre.inc.php'; ?>


