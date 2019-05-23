<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
    <?php
   include 'conexionBD.php'; 
   
   $usuario = $_GET['usuario'];
    ?>
<table style="width:100%">     
                
                <tr>             
                    <th>Fecha</th>             
                    <th>Remitente</th>              
                    <th>Asunto</th>             
                    <th></th>             
        
                </tr>
                
            <?php             
            include '../../../config/conexionBD.php';   
            $sql = "SELECT men_codigo, men_fechaHora, men_remitente, men_asunto FROM mensaje WHERE  men_destina='$usuario' ORDER by men_fechaHora";
                    
            $result = $conn->query($sql);                         
            if ($result->num_rows > 0) {                                  
                while($row = $result->fetch_assoc()) {                                        
                    echo "   <td>" . $row['men_fechaHora'] . "</td>";                     
                    echo "   <td>" . $row['men_remitente'] ."</td>";                     
                    echo "   <td>" . $row['men_asunto'] . "</td>";                     
                    echo "   <td><a href='leer1.php?remitente=".$row['men_remitente']."&usuario=".$usuario."&men_codigo=".$row['men_codigo']."'>Leer</a></td>";
                    
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
    </body>
</html>