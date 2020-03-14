<?php
    
    include_once 'conexionDB.php';

    class restaurante extends conexionDB{

        public function GuardarTipo( $nom, $ur){

            $consulta="insert into tipocomida value(null,'".$nom."','".$ur."')";
            if( $this->conectar()->query($consulta) )
            echo "<div class='alert alert-success'>
                    <strong>Correcto!</strong> Los Datos se guardaron Corectamente.
                </div>";
            else
                echo "<div class='alert alert-danger'>
                        <strong>Error!</strong> Fallo al guardar los datos.
                    </div>";
        }

        public function  buscar( $x ){
            $consulta="select * from tipocomida where idtipoComida ='".$x."'";
            $result = $this->conectar()->query($consulta);
            foreach(  $result as $fila){
                $row = $fila;
            } 
            return $row;
        }

        public function modificar( $var, $nom, $ur){

            $consulta="update tipocomida set nombre = '".$nom."', fotografia = '".$ur."' where idtipoComida = '".$var."'";
            echo $consulta;
            if( $this->conectar()->query($consulta) )
            echo "modificacon exitosa";
            else
            echo "Fallo la modificacon";
        }

        public function eliminar( $id ){

            $consulta = "delete from tipocomida where idtipoComida = '".$id."'";
            if($result = $this->conectar()->query($consulta))
            echo "Eliminacion exitosa";

        }

        public function seleccion(){

            $consulta = "Select * from tipocomida";
            $resultado = $this->conectar()->query($consulta);

            foreach($resultado as $fila){
                echo "<tr>";
                    echo "<td>" .$fila['nombre']. "</td>
                       <td><a href='modificarTipo.php?codigo=".$fila['idtipoComida']."'><span class='fa-edit fa'></span ></a></td>
                       <td><a href='eliminar.php?codigo=".$fila['idtipoComida']. "'><span class='fa-trash-o fa'></span></a></td>
                    </tr>";
            }
        }

        public function seleccionTipo(){

            $consulta = "Select * from tipocomida";
            $resultado = $this->conectar()->query($consulta);

            foreach($resultado as $fila){
                echo "
                    <div class='card'>
				        <div class='imgBX'>
					        <img src=".$fila['fotografia'].">
				        </div>
				    <div class='contentBx'>
					    <div class='content'>
						    <h2>".$fila['nombre']."</h2>
						    <a href='VerComida.php?codigo=".$fila['idtipoComida']."'>Ver platillos</a>
					    </div>
				    </div>
			    </div>
                ";
            }
        }

        public function seleccionTipoComida(){

            $consulta = "Select * from tipocomida";
            $resultado = $this->conectar()->query($consulta);

            foreach($resultado as $fila){
                echo "
                    <li class='nav-item'>
                        <a class='nav-link' href='menu.php?codigo=".$fila['idtipoComida']."'>".$fila['nombre']."</a>
                    </li>
                ";
            }
        }

        public function seleccionComida( $codigo){

            $consulta = "Select * from comida where tipoComida = :id";
            $statement = $this->conectar()->prepare($consulta);
            $statement->execute(array(':id' => $codigo));

            $resultado = $statement->fetchAll();
            
           foreach($resultado as $fila){
                echo "
                <div class='col-md-6 all breakfast' style='width:300px'>
                    <center><img class='card-img-top' src=".$fila['fotografia']." style='width:300px; height: 300px ;'  alt='Card image'></center>
                    <div class='single-menu'>
                        <h4 class='card-title'>".$fila['nombre']."</h4>
                        <p class='card-text'>Precio: $".$fila['precio']."</p>
                        <form id = 'Formulario' method = 'POST' action = '' >
                            <div class='title-wrap d-flex justify-content-between'>
                                <input type='hidden' class = 'form-control' name='id' placeholder='Id' value = ".openssl_encrypt($fila['idComida'],COD,KEY).">
                                <input type='hidden' class = 'form-control' name='nombre' placeholder='nombre' value =".openssl_encrypt($fila['nombre'],COD,KEY).">
                                <input type='hidden' class = 'form-control' name='precio' placeholder='nombre'value =".openssl_encrypt($fila['precio'],COD,KEY).">
                                <label for=''>Cantidad:</label>
                                <p></p>
                                <input type='number' value = '0' name='can' class='form-control my-2' id='' placeholder='ingresa la cantidad'>
                                <button type='submit' name = 'btnAccion' value = 'Agregar' class='btn btn-outline-warning btn-block'>Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
                ";
            }
        }
    }

?>

