<?php
    include_once './/php/ConexionesBD/config.php';
    include_once './/php/ConexionesBD/conexionDB.php';
    $obj = new conexionDB();

    session_start();
    //evaluamos el boto

    $Mensaje ="";// esta variable nos servira para regresar un mensaje
    $ind = 0;
    //Evalumos el voton que esta actuando
    if(isset($_POST['btnAccion'])){

        //Psamos evaluamos el valor del boton
        switch($_POST['btnAccion']){

            case'Agregar':
                //Evaluamos los datos
                if( is_numeric(openssl_decrypt($_POST['id'],COD,KEY)) ){
                    $id = openssl_decrypt($_POST['id'],COD,KEY);
                    $Mensaje = 'OK ID correcto'.$id;
                    
                }else{
                    $Mensaje = 'OK ID correcto'.$id;
                }

                if( is_string(openssl_decrypt($_POST['nombre'],COD,KEY)) ){
                    $nombre = openssl_decrypt($_POST['nombre'],COD,KEY);
                }else{

                }

                if( is_numeric(openssl_decrypt($_POST['precio'],COD,KEY)) ){
                    $precio = openssl_decrypt($_POST['precio'],COD,KEY);
                    $cantidad = $_POST['can'];
                    $Mensaje = 'OK ID correcto'.$id;
                }else{
                    $Mensaje = 'OK ID correcto'.$id;
                }

                if (!isset($_SESSION['CARRITO'])) {
                    
                    $ind = $ind + 1;

                    $producto = array(
                        'IN' => $ind,
                        'ID' => $id,
                        'NOMBRE' => $nombre,
                        'PRE' => $precio,
                        'CAN' => $cantidad,
                    );

                    $_SESSION['CARRITO'][0] = $producto;
                } else {

                    $numProductos = count($_SESSION['CARRITO']);
                    $ind = $numProductos + 1;
                    $producto = array(
                        'IN' => $ind,
                        'ID' => $id,
                        'NOMBRE' => $nombre,
                        'PRE' => $precio,
                        'CAN' => $cantidad,
                    );

                    $_SESSION['CARRITO'][$numProductos] = $producto;
                }
                
                $Mensaje = print_r( $ind,true);
            break;

            case 'Eliminar':

                if( is_numeric($_POST['id']) ){
                    $idel = $_POST['id'];

                    foreach($_SESSION['CARRITO'] as $indice=>$producto){
                        if($producto['IN'] == $idel){
                            unset($_SESSION['CARRITO'][$indice]);
                        }
                    }
                }else{
                    $Mensaje = 'OK ID correcto'.$id;
                }

            break;

            case 'Guardar':

                $fechaActual = date('Y-m-d');
                $statement = $obj->conectar()->prepare("insert into venta value(null,'".$fechaActual."')");
                $statement->execute();

                //selecionamos el id de la fecha
                $stm = $obj->conectar()->prepare("SELECT * FROM `venta` WHERE 1");
                $stm->execute();

                $resultado = $stm->fetchAll();

                foreach($resultado as $fila){
                    $id = $fila['id'];
                }
                echo $id;
                foreach($_SESSION['CARRITO'] as $ind=>$prod){
                    $st = $obj->conectar()->prepare("insert into tiket value(null,'".$id."','".$prod['ID']."','".$prod['CAN']."')");
                    $st->execute();
                }

                session_unset();
            break;


            case 'Cancelar':
                session_unset();
            break;
        };

    }
?>