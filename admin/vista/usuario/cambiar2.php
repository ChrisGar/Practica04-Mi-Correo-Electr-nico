<!DOCTYPE html> 
<html> 
    <head> 
    <meta charset="UTF-8">     
    <title>Crear Nuevo Usuario</title>     
    <style type="text/css" rel="stylesheet">         
    .error{             
        color: red;         
        }     
        </style> 
        </head> 
        <body> 
 
    <?php                
     //incluir conexión a la base de datos         
     include '../../../config/conexionBD.php';   
     $codigo= $_POST["codigo"];              
 
        $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;                         
        $sql = "UPDATE usuario SET usu_password=MD5('$contrasena') WHERE usu_codigo='$codigo'"; 
       
        if ($conn->query($sql) === TRUE) 
        {             
            echo "<p>Se ha actualizado la contrasena correctamemte!!!</p>";              
        } 
        else 
        {             
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";             
                              
        }                  
        //cerrar la base de datos         
        $conn->close();           
        header("Location: ../usuario/index2.php?codigo=$codigo");               
    ?> 
 
</body> 
</html> 