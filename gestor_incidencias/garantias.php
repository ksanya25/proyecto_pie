<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<div class="container p-4">

    <div class="row">


        <div class="col-md-4">
            <div class="card card-body">

                <form action="guardar_garantia.php" method="POST">
                    <div class="form-group">

                        <input type="text" name="modelo" class="form-control" placeholder="Introduce modelo" autofocus>
                        <input type="text" name="descripcion" class="form-control" placeholder="Introduce modelo" autofocus>
                        <input type="text" name="fin_garantia" class="form-control" placeholder="Introduce fin garantia AAAA-MM-DD">

                        <input type="submit" name="guardar_garantia" class="btn btn-success btn-block" value="Guardar">

                    </div>

                </form>
            </div>
            <div class="col-md-8">
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Modelo</th>
                            <th>Descripción</th>
                            <th>Fin de garantía</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $query = "SELECT * FROM garantias";
                    $resultado_garantias = mysqli_query($conexion, $query);
                    while($row = mysqli_fetch_array($resultado_garantias)) { ?>
                        <tr>
                            <td><?php echo $row['modelo']?></td>
                            <td><?php echo $row['descripcion']?></td>
                            <td><?php echo $row['fin_garantia']?></td>
                            <td>
                                <a href="editar_garantia.php?modelo=<?php echo $row['modelo'] ?>">Editar </a>
                                <a href="borrar_garantia.php?modelo=<?php echo $row['modelo'] ?>">Eliminar </a>
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