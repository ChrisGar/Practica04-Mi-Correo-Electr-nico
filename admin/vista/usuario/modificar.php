<?php
   include '../../../config/conexionBD.php'; 
    $codigo = $_GET['codigo'];
    $usuario = $_GET['usuario'];
    $sql = "SELECT usu_codigo, usu_cedula, usu_nombres, usu_apellidos, usu_direccion, usu_telefono, usu_fecha_nacimiento, usu_correo FROM usuario WHERE usu_codigo='$codigo'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {                                  
        while($row = $result->fetch_assoc()) 
        {           
          ?>  
            <head>     
                <link href="CSS/estilo1.css" rel="stylesheet" />
                <meta charset="UTF-8"> 
                <title>Modificar Datos</title>
                <h1>Modificar Datos</h1>
            </head> 
            <form id="formulario02" method="POST" action="modificar2.php">
            <h2 id="logo"> <img src="CSS/sendfast.jpg" alt=""></h2>
            
            <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
            <input type="hidden" id="usuario" name="usuario" value="<?php echo $usuario ?>" />
            <br>
           
            <input type='text' name='cedula' value="<?php echo $row['usu_cedula']?>" />
            <br>
           
            <input type='text' name='nombres' value="<?php echo $row['usu_nombres'] ?>" />
            <br>
            
            <input type='text' name='apellidos' value="<?php echo $row['usu_apellidos']?>" />
            <br>
           
            <input type='text' name='direccion' value="<?php echo $row['usu_direccion']?>" />
            <br>
           
            <input type='text' name='telefono' value="<?php echo $row['usu_telefono']?>" />
            <br>
           
            <input type='date' name='fechaNacimiento' value="<?php echo $row['usu_fecha_nacimiento']?>" />
            <br>
           
            <input type='email' name='correo' value="<?=$row['usu_correo']?>" />

            <input type="submit" id="crear" name="crear" value="Aceptar" />         
            <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />

            <?php        
            
        }
        
        
    } 
    else {             
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";             
        }
        
        
    
    $conn->close();  
?>