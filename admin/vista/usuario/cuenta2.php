<?php
    session_start();
    if(!isset($_SESSION['isLogged'])|| $_SESSION['isLogged']  === FALSE){
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }
    $codigo= $_GET['codigo']; 
    $usuario = $_GET['usuario'];
?>

<!DOCTYPE html> 
<html> 
    <head>         
        <meta charset="UTF-8">   
        <link href="CSS/estilo3.css" rel="stylesheet" />  
    
    </head> 
    <body>   
    <header>

    </header>
        <section>
            <h1>Mi Cuenta</h1>
            <div id="izquierda"> 
                <ul>

                    <?php
                    echo "  <li><a href='index.php?codigo=".$codigo."&usuario=".$usuario."'>Inicio</a></li>";
                    
                    ?>
                
                </ul>
        
            </div>
            <table>     
                
            <tr>             
                <th>Cedula</th>             
                <th>Nombres</th>              
                <th>Apellidos</th>             
                <th>Dirección</th>             
                <th>Telefono</th>                         
                <th>Correo</th>             
                <th>Fecha Nacimiento</th>
                <th>Eliminar</th>
                <th>Modificar</th>
                <th>Cambiar contraseña</th>  
                               
            </tr> 
 
        <?php             
        include '../../../config/conexionBD.php';              
        $sql = "SELECT * FROM usuario WHERE usu_rol ='USUARIO'";             
        $result = $conn->query($sql);                         
        if ($result->num_rows > 0) {                                  
            while($row = $result->fetch_assoc()) {                                         
                echo "   <td>" . $row['usu_cedula'] . "</td>";                     
                echo "   <td>" . $row['usu_nombres'] ."</td>";                     
                echo "   <td>" . $row['usu_apellidos'] . "</td>";                     
                echo "   <td>" . $row['usu_direccion'] . "</td>";                     
                echo "   <td>" . $row['usu_telefono'] . "</td>"; 
                echo "   <td>" . $row['usu_correo'] . "</td>";                                                     
                echo "   <td>" . $row['usu_fecha_nacimiento'] . "</td>";
                echo "   <td><a href='eliminar.php?codigo=".$row['usu_codigo']."&usuario=".$usuario."'>Enlace Eliminar</a></td>";
                echo "   <td><a href='modificar.php?codigo=".$row['usu_codigo']."&usuario=".$usuario."'>Enlace Modificar</a></td>";
                echo "   <td><a href='cambiar.php?codigo=".$row['usu_codigo']."&usuario=".$usuario."'>Enlace Cambiar</a></td>";
            echo "</tr>";
        }
                  
        } else {                 
            echo "<tr>";                 
            echo "   <td colspan='7'> Usuario no existente </td>";                 
            echo "</tr>"; 
 
            }             
            $conn->close();                  
        ?>     
        </table>     

        </section>
        
    </body> 
 </html> 