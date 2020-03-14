<?php

    require_once(".//php/ConexionesBD/consultas.php");
        $obj = new restaurante();

        echo json_encode($obj->seleccionTipo());
        


    if( $_POST ){
        $v1=$_POST['nombre'];
        $v2=$_POST['foto'];
        echo json_encode('Hola');
    }else{
        echo json_encode('mal');
    }

    $consulta = "Select * from tipocomida";
            $resultado = $this->conectar()->prepare($consulta);
            $resultado->execute();
            $listaTipos = $resultado->fetchAll(PDO::FETCH_ASSOC);

            return $listaTipos ;

?>

