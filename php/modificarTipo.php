<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    require_once("consultas.php");
    $db=new restaurante();
    $var = $_GET['codigo']; //resive el valor de una variabl
    $r=$db->buscar($var);//pasa el valor de metodo

    ?>

    <form action="modificarTipo.php" method="POST">

        <label for="text">id</label>
        <input type="text" name="a0" placeholder="Ingrese el nombre" value="<?php echo $r['idtipoComida'] ?>" required><br>

        <label for="text">Nombre</label>
        <input type="text" name="a1" placeholder="Ingrese el nombre" value="<?php echo $r['nombre'] ?>" required><br>

        <label for=""> url de la fotografia </label>
        <input type="text" name="a2" id="" placeholder = "ingresa el url" value="<?php echo $r['fotografia'] ?>" required> <br>

        <button type="submit" >Guardar</button>
    </form>

    <?php

        require_once("consultas.php");
        $obj = new restaurante();

       if( $_POST ){
        $var=$_POST["a0"];
        $v1=$_POST["a1"];
        $v2=$_POST["a2"];
        $obj -> modificar( $var, $v1, $v2 );
       }else{

       }

       echo "<table><tr>
       <th>Nombre</th>
       <th>Modificar</th>
       <th>Eliminar</th>";
       $obj->seleccion();
       echo "</table>";
       
    ?>

</body>
</html>