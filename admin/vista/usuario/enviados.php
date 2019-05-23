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
        <script type="text/javascript" src="ajax2"></script> 
    
    </head> 
    <body>   
    <header>

    </header>
        <section>
            <h1>Elementos Enviados</h1>
            <div id="izquierda"> 
                <ul>

                    <?php
                    echo "  <li><a href='index.php?codigo=".$codigo."&usuario=".$usuario."'>Inicio</a></li>";
                    
                    ?>
                
                </ul>
        
            </div>
            
            <form>    
                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                <input type="hidden" id="usuario" name="usuario" value="<?php echo $usuario ?>" />                 
                <input type="text" id="destinatario" name="destinatario" placeholder="Destinatario" value="">
                <input type="button" id="buscar" name="buscar" value="Buscar" onclick="Buscar()">
                <input type="button" id="cancelar" name="cancelar" value="Cancelar" onclick="Cancelar()"/>
            </form>         
            <br> 

        <div id="informacion">
        <table style="width:100%">     
            
            <tr>             
                <th>Destinatario</th>             
                <th>Asunto</th>              
                <th>Mensaje</th>             
                <th></th>             
    
            </tr> 
        <?php
        include '../../../config/conexionBD.php'; 
        $codigo = $_GET['codigo'];
        $sql = "SELECT men_codigo, men_destina, men_asunto, men_mensaje FROM mensaje WHERE  usu_codigo='$codigo' ORDER by men_fechaHora";
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
        
        
        } 
        else {             
                echo "<p class='error'> " . mysqli_error($conn) . "</p>";             
            }
        
        
    
        $conn->close();  
        ?>
        </table>
        </div>
        
    </body> 
 </html> 