<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<div class="container p-4">

    <div class="row">


        <div class="col-md-4">
            <div class="card card-body">

                <form action="guardar_tecnico.php" method="POST">
                    <div class="form-group">

                        <input type="text" name="dni" class="form-control" placeholder="Introduce dni" autofocus>
                        <input type="text" name="nombre" class="form-control" placeholder="Introduce nombre">
                        <input type="text" name="direccion" class="form-control" placeholder="Introduce dirección">
                        <input type="text" name="poblacion" class="form-control" placeholder="Introduce poblacion">
                        <input type="text" name="carga" class="form-control" placeholder="Introduce carga">
                        <input type="text" name="email" class="form-control" placeholder="Introduce email">
                        <input type="submit" name="guardar_tecnico" class="btn btn-success btn-block" value="Guardar">

                    </div>

                </form>
            </div>
            <div class="col-md-8">
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Dni</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Población</th>
                            <th>Carga</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $query = "SELECT * FROM tecnicos";
                    $resultado_tecnicos = mysqli_query($conexion, $query);
                    while($row = mysqli_fetch_array($resultado_tecnicos)) { ?>
                        <tr>
                            <td><?php echo $row['dni']?></td>
                            <td><?php echo $row['nombre']?></td>
                            <td><?php echo $row['direccion']?></td>
                            <td><?php echo $row['poblacion']?></td>
                            <td><?php echo $row['carga']?></td>
                            <td><?php echo $row['email']?></td>
                            <td>
                                <a href="editar_tecnico.php?dni=<?php echo $row['dni'] ?>">Editar </a>
                                <a href="borrar_tecnico.php?dni=<?php echo $row['dni'] ?>">Eliminar </a>
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