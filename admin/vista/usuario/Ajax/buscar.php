<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
    <?php
   include 'conexionBD.php'; 
   alert('entro');
   $usuario = $_GET['usuario'];
   $remitente = $_GET['remitente'];
    $sql = "SELECT men_codigo, men_fechaHora, men_remitente, men_asunto FROM mensaje WHERE  men_destina='$usuario' AND men_remitente like '%$remitente%' ";             
    $result = $conn->query($sql);
    $result = $conn->query($sql);                         
    if ($result->num_rows > 0) 
    {                                  
        while($row = $result->fetch_assoc()) 
        {                                         
            echo "   <td>" . $row['men_fechaHora'] . "</td>";                     
            echo "   <td>" . $row['men_remitente'] ."</td>";                     
            echo "   <td>" . $row['men_asunto'] . "</td>";                     
            echo "   <td><a href='leer1.php?remitente=".$row['men_remitente']."&usuario=".$usuario."&men_codigo=".$row['men_codigo']."'>Leer</a></td>";
        echo "</tr>";
        }
       
    }
        
    else {             
            echo "<p class='error'>No existe: " . mysqli_error($conn) . "</p>";             
        }
    
    $conn->close();  
?>
    </body>
</html>