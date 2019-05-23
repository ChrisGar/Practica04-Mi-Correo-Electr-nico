<?php
    include '../../../config/conexionBD.php'; 
    $codigo = $_GET['codigo'];
    $usuario = $_GET['usuario'];
    $sql = "UPDATE usuario SET usu_eliminado='Y' WHERE usu_codigo='$codigo'";

    if ($conn->query($sql) === TRUE) { 

        header("Location: /SistemaDeGestion/public/vista/login.html");       
    } 
    else {             
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";             
        }                     
    
    $conn->close();   
    header("Location: ../usuario/index.php?codigo=$codigo&usuario=$usuario");
            
?>