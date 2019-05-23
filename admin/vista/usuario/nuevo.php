<?php
    session_start();
    if(!isset($_SESSION['isLogged'])|| $_SESSION['isLogged']  === FALSE){
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }

    $codigo = $_GET['codigo'];
    $usuario = $_GET['usuario'];
    $fechaHora = date('Y/m/d h:i:s', time());

   
?>

<!DOCTYPE html> 
<html> 
    <head>         
        <meta charset="UTF-8">   
        <link href="CSS/estilo3.css" rel="stylesheet" />  
        <title>Nuevo Mensaje</title> 
    </head> 
    <body>   
    <header>
        <div id="izquierda"> 
            <ul>

            <?php
            echo "  <li><a href='index.php?codigo=".$codigo."&usuario=".$usuario."'>Inicio</a></li>";
            
            ?>
                
            </ul>
        
        </div>

        <div  id="derecha"> 
        <img id="perfil" src="CSS/perfil.jpg" alt="">
        <?php
            include '../../../config/conexionBD.php';   
         
            $sql = "SELECT usu_nombres, usu_correo, usu_apellidos FROM usuario WHERE  usu_codigo='$codigo'";             
            $result = $conn->query($sql);                         
            if ($result->num_rows > 0) 
            {                                  
                while($row = $result->fetch_assoc())
                {
                    echo "<h3>".$row['usu_nombres']."</h3>";
                    $remitente=$row['usu_correo'];                 
                }
            }   
          
          
        ?>
        
        </div>   
    </header>
        <section>
        <form id="formulario01" method="POST" action="nuevoMensaje.php">
                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                <input type="hidden" id="fechaHora" name="fechaHora" value="<?php echo $fechaHora ?>" />
                <input type="hidden" id="remitente" name="remitente" value="<?php echo $remitente ?>" />    
                <input type="text" id="destinatario" name="destinatario" value="" placeholder="Para" >      
                <input type="text" id="asunto" name="asunto" value="" placeholder="Agregar asunto" >
                <textarea type="textarea" rows="15" cols="76" id="mensaje" name="mensaje"></textarea>
                <input type="submit" id="enviar" name="enviar" value="Enviar" />         
                <div id="informacion"></div>
            </form>         
        </section>
        
    </body> 
 </html> 