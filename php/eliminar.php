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
        $obj = new restaurante();
        $var=$_GET['codigo'];
        $obj->eliminar($var);
        header("Location:Alta_platillos.php");
    ?>

</body>
</html>