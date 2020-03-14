<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Tipo platillos</title>
</head>
<body>
    
    <div class = "container-fluid p-3 bg-primary text-white">
        <nav class = "navbar navbar-expand-sm bg-primary navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class = "nav-link" href="../TipoPlatillos/Alta_platillos.php"> Tipo de Comida </a>
                </li>
                <li class="nav-item">
                    <a class = "nav-link" href="../comida/AlaComidas.php"> Carta </a>
                </li>
            </ul>
        </nav> 
    </div>

    <div class="container my-4">  
        <div class="container">
            <h2>Tipo de comida</h2>
            <form id = "Formulario" method = "POST" action = "Alta_platillos.php" >
                <div class="form-group">
                    <label for="text" >Nombre</label>
                    <input type="text" class = "form-control" name="nombre" placeholder="Ingrese el nombre">
                </div>

                <div class="form-group">
                    <label for=""> Url de fotografia </label>
                    <input type="text" name="foto" class = "form-control" id="" placeholder = "ingresa el url"> 
                </div>

                <button type="submit" class="btn btn-primary btn-block">Guardar</button> <br>
                
            </form>
        </div>

        <div class="container ">
            <?php
                require_once("..//ConexionesBD/consultas.php");
                $obj = new restaurante();
    
                if( $_POST ){
                     $v1=$_POST["nombre"];
                    $v2=$_POST["foto"];
                    $obj -> GuardarTipo( $v1, $v2 );
                }else{
                    echo "<div class='alert alert-warning'>
                            <strong>Warning!</strong> This alert box could indicate a warning that might need attention.
                        </div>";
                }
    
                echo "<table class='table'>
                        <thead class='thead-dark'>
                            <tr>
                                <th>Nombre</th>
                                <th>Modificar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>";
                            $obj->seleccion();
                echo "</tbody>
                    </table>";

        ?>
        </div>

    </div>
    

</body>

</html>