<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<div class="container p-4">

    <div class="row">


        <div class="col-md-4">
            <div class="card card-body">

                <form action="guardar_incidencia.php" method="POST">
                    <div class="form-group">

                        <input type="text" name="sistema" class="form-control" placeholder="Introduce sistema afectado" autofocus>
                        <input type="text" name="modelo" class="form-control" placeholder="Introduce modelo">
                        <input type="text" name="centro" class="form-control" placeholder="Introduce centro">
                        <input type="text" name="prioridad" class="form-control" placeholder="Introduce priodidad">
                        <input type="submit" name="guardar" class="btn btn-success btn-block" value="Guardar">

                    </div>

                </form>
            </div>
            <div class="col-md-8">
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Sistema</th>
                            <th>Modelo</th>
                            <th>Estado</th>
                            <th>Subestado</th>
                            <th>Centro</th>
                            <th>Asignación</th>
                            <th>Prioridad</th>
                            <th>Garantía</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $query = "SELECT * FROM incidencias";
                    $resultado_incidencias = mysqli_query($conexion, $query);
                    while($row = mysqli_fetch_array($resultado_incidencias)) { ?>
                        <tr>
                            <td><?php echo $row['fecha']?></td>
                            <td><?php echo $row['sistema']?></td>
                            <td><?php echo $row['modelo']?></td>
                            <td><?php echo $row['estado']?></td>
                            <td><?php echo $row['subestado']?></td>
                            <td><?php echo $row['centro']?></td>
                            <td><?php echo $row['asignacion']?></td>
                            <td><?php echo $row['prioridad']?></td>
                            <td><?php echo $row['garantia']?></td>
                            <td>
                                <a href="editar_incidencia.php?id=<?php echo $row['id'] ?>">Editar </a>
                                <a href="borrar_incidencia.php?id=<?php echo $row['id'] ?>">Eliminar </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>


                </table>

            </div>
        </div>
    </div>

</div>

<?php include("includes/footer.php") ?>