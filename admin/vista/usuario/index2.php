<?php
    session_start();
    if(!isset($_SESSION['isLogged'])|| $_SESSION['isLogged']  === FALSE){
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }
    $codigo = $_GET['codigo'];
    $usuario = $_GET['usuario'];
   
?>

<!DOCTYPE html> 
<html> 
    <head>         
        <meta charset="UTF-8">   
        <link href="CSS/estilo3.css" rel="stylesheet" />  
        <title>SendFast</title>
        <script type="text/javascript" src="ajax.js"></script> 
        
    </head> 
    <body>   
    <header>
        <div id="izquierda"> 
            <ul>

            <?php
            echo "  <li><a href='index.php?codigo=".$codigo."&usuario=".$usuario."'>Inicio</a></li>";
            echo "  <li><a href='cuenta2.php?codigo=".$codigo."&usuario=".$usuario."'>Usuarios</a></li>";
            ?>
                
            </ul>
        
        </div>

        <div  id="derecha"> 
        <img id="perfil" src="CSS/perfil.jpg" alt="">
        <?php
            include '../../../config/conexionBD.php';   

            $sql = "SELECT usu_nombres, usu_apellidos FROM usuario WHERE  usu_codigo='$codigo'";             
            $result = $conn->query($sql);                         
            if ($result->num_rows > 0) 
            {                                  
                while($row = $result->fetch_assoc())
                {
                    echo "   <h3>" . $row['usu_nombres']."</h3>";
                   
                }
            }                   

        ?>
        </div> 
 
    </header>
        
        <div id="informacion">
        <table style="width:100%">     
                
            <tr>             
                <th>Fecha</th>             
                <th>Remitente</th>              
                <th>Asunto</th>             
                <th></th>             
    
            </tr>
            
        <?php             
        include '../../../config/conexionBD.php';   
         
        $sql = "SELECT men_codigo, men_fechaHora, men_remitente, men_asunto FROM mensaje WHERE men_eliminado='N' ORDER by men_fechaHora";
        $result = $conn->query($sql);                         
        if ($result->num_rows > 0) {                                  
            while($row = $result->fetch_assoc()) {                                        
                echo "   <td>" . $row['men_fechaHora'] . "</td>";                     
                echo "   <td>" . $row['men_remitente'] ."</td>";                     
                echo "   <td>" . $row['men_asunto'] . "</td>";                     
                echo "   <td><a href='eliminarCorreo.php?codigo=".$row['men_codigo']."'>Eliminar</a></td>";
                
            echo "</tr>";
        }
                  
        } else {                 
            echo "<tr>";                 
            echo "   <td colspan='7'> No tiene Correos </td>";                 
            echo "</tr>"; 
 
            }             
            $conn->close();               
        ?>     
        </table>  
        </div>
    </body> 
 </html> 