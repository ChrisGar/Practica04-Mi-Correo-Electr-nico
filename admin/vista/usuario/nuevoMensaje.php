<!DOCTYPE html> <html> <head> 
    <meta charset="UTF-8">     
    <title>Nuevo Mensaje</title>     
    <link href="CSS/estilo3.css" rel="stylesheet" />          

    <?php                
                 
     
        $codigo=$_POST["codigo"];
        $remitente=$_POST["remitente"];
        $fechaHora=$_POST["fechaHora"];
        $asunto = $_POST["asunto"]; 
        $destinatario = $_POST["destinatario"]; 
        $mensaje = $_POST["mensaje"]; 

        include '../../../config/conexionBD.php';

        $sql = "INSERT INTO mensaje VALUES (0, '$codigo', '$fechaHora', '$asunto', '$remitente','$destinatario', '$mensaje')";         
 
        if ($conn->query($sql) === TRUE) {             
            echo "<p>Se ha creado los datos personales correctamemte!!!</p>";              
        } else {             
            if($conn->errno == 1062){                 
                echo "<p class='error'>Error </p>";                  
            }else{                 echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";             
            }                     
        }                  
        //cerrar la base de datos         
        $conn->close();         
        header("Location: ../usuario/nuevo.php?codigo=$codigo");                      
    ?> 
 
</body> 
</html> 
 