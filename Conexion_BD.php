<?php

    $conexion = mysqli_connect('localhost','root' ,'1063616908' ,'formularioco' );

        if($conexion){
            echo'conexion a la base de datos exitosa';
        }else{
            echo'no se pudo conectar a la base de datos';
        }
        
?>