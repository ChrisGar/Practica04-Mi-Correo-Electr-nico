<?php
    include '../../../config/conexionBD.php'; 
    $codigo = $_GET['codigo'];
    $sql = "UPDATE mensaje SET men_eliminado='Y' WHERE men_codigo='$codigo'";

    if ($conn->query($sql) === TRUE) { 

        header("Location: cuenta2.php");       
    } 
    else {             
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";             
        }                     
    
    $conn->close();   
    header("Location: index2.php?codigo=$codigo&usuario=$usuario"); 
                 
?>