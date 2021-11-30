<?php 
     require_once 'miLocalHost.php';
     require_once '../cursoPHP/buscaValor.php';
if (isset($_POST['enviar'])) {
    $nombre=$_POST['nom'];
    $documento=$_POST['doc'];
    $conex=mysqli_connect (HOST,USER,PASS,BD,PORT);
    $error=mysqli_connect_errno();

    if($conex){
        echo "<p>😊👍</p>";
        //necesitamos averiguar totos los usuarios que se encuentran en la tabla prueba
        $select="SELECT * FROM prueba";
        $dato=mysqli_query($conex,$select);
        //creo un array para migrar a todos los de la tabla dentro del array
        $miArray=array();
        //con el siclo while puedo recorrer las filas de la tabla prueba
        while($fila=mysqli_fetch_assoc($dato)){
             $fila['DOCUMENTO']. "<br>";
            array_push($miArray,$fila['DOCUMENTO']);//aqui almaceno todos los valores iterados
        }
        //mando a llamar la funcion buscaValor que se encuentra en buscaValor.php
        if(buscaValor($miArray,$documento)){
            //si el usuario ya se  encuentra en la BD no podra volverse a registrar
            echo "<center> <h2>La insersion no fue exitosa</h2>😢 </center>";
            echo "<p style='text-align:center'> Losiento, no se pude registrar dos veces porque
            sus datos ya se encuentran segistrados en la Base de Datos</p>";
            echo "<a href='index.php'>👈ir atras</a>";
        }else{
            $insert="INSERT INTO prueba (NOMBRE,DOCUMENTO) VALUE('$nombre','$documento')";
            $exito=mysqli_query($conex,$insert);
            
            if($exito){
            echo "<center><h2>Operacion realizada con exito</h2>😎</center>";
            echo "<p style='text-align:center'>Muy bien Sr(a) <b>$nombre</b> sus datos
            fueron procesados.</p>";
            echo "<a href='index.php'>👈ir atras</a>";
            }else{
            echo "<center><h2>Lo siento, la operacion no fue exitosa</h2>🙁</center>";
            echo "<p style='text-align:center'>Por favor verifica tu conexion e intenta
            nuevamente.</p>";
            echo "<a href='index.php'>👈ir atras</a>";
            }
        
        }
        
        mysqli_close($conex);
    }else{
        echo "<center>
        <h2>No se a podico acceder correctamente a la base de datos.</h2>
        <h3>Tipo de error: $error</h3>
        </center>";
    }
}
?>