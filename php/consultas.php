<?php
    //traemos la conexion
    require_once ('conexio.php');

    class restaurante{
        
        public $conn;

        public function __construct(){

            $this->conn = new mysqli(HOST,USER,PASS,DBNAME);//pasamos los parametros de la conexion
        }

        public function conectar(){
            //comparamos la variable conexion para detectar errores
            if($this->conn->connect_error){

                die("Connection failed".$conn->connect_error);
            }else{
                
                echo"conexion exitosa";
            }
        }

        public function GuardarTipo( $nom, $ur){

            $consulta="insert into tipocomida value(null,'".$nom."','".$ur."')";
            if( $this->conn->query($consulta) )
            echo "Datos Guardados <br>";
            else
            echo "Fallo el guardado";
        }

        public function  buscar( $x ){
            $consulta="select * from tipocomida where idtipoComida ='".$x."'";
            $result = $this->conn->query($consulta);
            $row = $result->fetch_assoc();
            return $row;
        }

        public function modificar( $var, $nom, $ur){

            $consulta="update tipocomida set nombre = '".$nom."', fotografia = '".$ur."' where idtipoComida = '".$var."'";
            echo $consulta;
            if( $this->conn->query($consulta) )
            echo "modificacon exitosa";
            else
            echo "Fallo la modificacon";
        }

        public function eliminar( $id ){

            $consulta = "delete from tipocomida where idtipoComida = '".$id."'";
            if($result = $this->conn->query($consulta))
            echo "Eliminacion exitosa";

        }

        public function seleccion(){

            $consulta = "Select * from tipocomida";
            $resultado = $this->conn->query($consulta);
            $color = 0;

            while($renglon = $resultado->fetch_assoc()){

                if( $color%2 == 0){
                    echo "<tr class='azul'>";
                }else{
                    echo "<tr>";
                    echo "<td>" .$renglon['nombre']. "</td>
                       <td><a href='modificarTipo.php?codigo=".$renglon['idtipoComida']."'><span class='fa-edit fa'>0</span ></a></td>
                       <td><a href='eliminar.php?codigo=".$renglon['idtipoComida']. "'><span class='fa-trash-o fa'>1</span></a></td>
                    </tr>";
                }

                $color++;
            }
        }
    }
    //creamos una clase objetos

?>

