<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form action="portada.php" method="POST">
                    <div class="form-group">
                        <select id="tipoUsuario" name="tipoUsuario>
                            <option value="">Selecciona una opción</option>
                            <option value="admin">Administrador</option>
                            <option value="tecnico">Técnico</option>
                            <option value="colegio">Colegio</option>
                        </select>
                        <script>
                            var eleccion = document.getElementById("tipoUsuario");
                            eleccion.addEventListener("change", function() {
                               
                                console.log(eleccion.value)
                                const input = document.createElement("input");
                                input.type = "text"
                                input.class = "form-control"
                                input.autofocus
                                if (eleccion.value == "admin") {
                                    input.placeholder = "Introduce tu usuario"
                                    console.log("Entramos en el if admin")
                                } else if (eleccion.value == "tecnico") {
                                    console.log("Entramos en el if tecnico")
                                    input.placeholder = "Introduce tu dni"
                                } else if (eleccion.value == "colegio") {
                                    input.placeholder = "Introduce tu código de centro"
                                    console.log("Entramos en el if colegio")
                                }
                                input.name=eleccion.value;
                                document.body.appendChild(input);
                            });
                        </script>
                        <div>
                        <input type="submit" name="entrar" class="btn btn-success btn-block" value="Log In">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php
    include("db.php"); ?>