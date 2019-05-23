<?php     

 
    include '../../config/conexionBD.php'; 
 
    $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;     
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null; 
 
    $user = "SELECT * FROM usuario WHERE usu_rol='USUARIO' AND usu_correo = '$usuario' and usu_password = MD5('$contrasena')"; 
    $admin = "SELECT * FROM usuario WHERE usu_rol='ADMINISTRADOR' AND usu_correo = '$usuario' and usu_password = MD5('$contrasena')"; 

    $result1 = $conn->query($user);            
    if ($result1->num_rows > 0) 
    {
        while($row = $result1->fetch_assoc()) 
        {                   
            session_start(); 
            $_SESSION['isLogged']  = TRUE;         
            header("Location: ../../admin/vista/usuario/index.php?codigo=". $row['usu_codigo'] . '&usuario='.$row['usu_correo'].""); 
            
            exit();    
        }
    } else 
    {             
        header("Location: ../vista/login.html"); 
       
    }              
   
    $result2 = $conn->query($admin);            
    if ($result2->num_rows > 0) 
    {
        while($row = $result2->fetch_assoc()) 
        {                   
            session_start(); 
            $_SESSION['isLogged']  = TRUE;         
            header("Location: ../../admin/vista/usuario/index2.php?codigo=". $row['usu_codigo'] . '&usuario='.$row['usu_correo'].""); 
            
            exit();    
        }
    } else 
    {             
        header("Location: ../vista/login.html"); 
       
    }              
    $conn->close(); 
 
?> 
 
 

