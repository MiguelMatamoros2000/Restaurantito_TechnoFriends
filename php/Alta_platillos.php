<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div class = "cabecera">
        <nav>
        </nav>
    </div>

    <div class="cuerpo">  
        <form action="Alta_platillos.php" method="POST">

            <label for="text">Nombre</label>
            <input type="text" name="a1" placeholder="Ingrese el nombre"><br>

            <label for=""> url de la fotografia </label>
            <input type="text" name="a2" id="" placeholder = "ingresa el url"> <br>

            <button type="submit" >Guardar</button>
        </form>

        <a href="listaTipos.php">ver datos</a>
        
    <?php

        require_once("consultas.php");
        $obj = new restaurante();

       if( $_POST ){
        $v1=$_POST["a1"];
        $v2=$_POST["a2"];
        $obj -> GuardarTipo( $v1, $v2 );
       }else{

       }

       echo "<table><tr>
       <th>Nombre</th>
       <th>Modificar</th>
       <th>Eliminar</th>";
       $obj->seleccion();
       echo "</table>";
       
    ?>

    </div>
</body>

</html>