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
            echo "  <li><a href='nuevo.php?codigo=".$codigo."&usuario=".$usuario."'>Nuevo Mensaje</a></li>";
            echo "  <li><a href='enviados.php?codigo=".$codigo."&usuario=".$usuario."'>Mensajes Enviados</a></li>";
            echo "  <li><a href='cuenta.php?codigo=".$codigo."&usuario=".$usuario."'>Cuenta</a></li>";
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
        <section>
            <h2>Mensajes Recibidos</h2>
            <form>    
                <input type="hidden" id="usuario" name="usuario" value="<?php echo $usuario ?>" />                 
                <input type="text" id="remitente" name="remitente" placeholder="Remitente" value="">
                <input type="button" id="buscar" name="buscar" value="Buscar" onclick="Buscar()">
                <input type="button" id="cancelar" name="cancelar" value="Cancelar" onclick="Cancelar()"/>
            </form>         
            <br> 
           
        </section>

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
         
        $sql = "SELECT men_codigo, men_fechaHora, men_remitente, men_asunto FROM mensaje WHERE  men_destina='$usuario' ORDER by men_fechaHora";
        $result = $conn->query($sql);                         
        if ($result->num_rows > 0) {                                  
            while($row = $result->fetch_assoc()) {                                        
                echo "   <td>" . $row['men_fechaHora'] . "</td>";                     
                echo "   <td>" . $row['men_remitente'] ."</td>";                     
                echo "   <td>" . $row['men_asunto'] . "</td>";                     
                echo "   <td><a href='leer1.php?remitente=".$row['men_remitente']."&usuario=".$usuario."&men_codigo=".$row['men_codigo']."&codigo=".$codigo."'>Leer</a></td>";
                
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