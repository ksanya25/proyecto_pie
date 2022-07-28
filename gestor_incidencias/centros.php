<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<div class="container p-4">

    <div class="row">


        <div class="col-md-4">
            <div class="card card-body">

                <form action="guardar_centro.php" method="POST">
                    <div class="form-group">

                        <input type="text" name="codigo" class="form-control" placeholder="Introduce código de centro" autofocus>
                        <input type="text" name="nombrecentro" class="form-control" placeholder="Introduce nombre de centro">
                        <input type="text" name="direccion" class="form-control" placeholder="Introduce dirección">
                        <input type="text" name="poblacion" class="form-control" placeholder="Introduce población">
                        <input type="text" name="nombreresponsable" class="form-control" placeholder="Introduce nombre responsable">
                        <input type="text" name="telefono" class="form-control" placeholder="Introduce teléfono responsable">
                        <input type="text" name="email" class="form-control" placeholder="Introduce email responsable">

                        <input type="submit" name="guardar_centro" class="btn btn-success btn-block" value="Guardar">

                    </div>

                </form>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Población</th>
                            <th>Responsable</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $query = "SELECT * FROM centros";
                    $resultado_centros = mysqli_query($conexion, $query);
                    while($row = mysqli_fetch_array($resultado_centros)) { ?>
                        <tr>
                            <td><?php echo $row['codigo']?></td>
                            <td><?php echo $row['nombrecentro']?></td>
                            <td><?php echo $row['direccion']?></td>
                            <td><?php echo $row['poblacion']?></td>
                            <td><?php echo $row['nombreresponsable']?></td>
                            <td><?php echo $row['telefono']?></td>
                            <td><?php echo $row['email']?></td>
                            <td>
                                <a href="editar_centro.php?codigo=<?php echo $row['codigo'] ?>">Editar </a>
                                <a href="borrar_centro.php?codigo=<?php echo $row['codigo'] ?>">Eliminar </a>
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