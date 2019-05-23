<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
    <?php
   include 'conexionBD.php'; 
   
   $codigo = $_GET['codigo'];
   $destinatario = $_GET['destinatario'];
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
            $sql = "SELECT men_codigo, men_destina, men_asunto, men_mensaje FROM mensaje WHERE  usu_codigo='9' AND men_destina like'%christian%' ORDER by men_fechaHora";
            $result = $conn->query($sql);
        
        if ($result->num_rows > 0) 
        {                                  
            while($row = $result->fetch_assoc()) 
            {           
                 
                echo "   <td>" . $row['men_destina'] . "</td>";                     
                echo "   <td>" . $row['men_asunto'] ."</td>";                     
                echo "   <td>" . $row['men_mensaje'] . "</td>";                     
                echo "   <td><a href='leer2.php?men_codigo=".$row['men_codigo']."&codigo=".$codigo."&usuario=".$usuario."'>Leer</a></td>";
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