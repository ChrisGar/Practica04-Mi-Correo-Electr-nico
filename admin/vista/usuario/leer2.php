<?php
    session_start();
    if(!isset($_SESSION['isLogged'])|| $_SESSION['isLogged']  === FALSE){
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }
    $codigo= $_GET['codigo']; 
    $usuario= $_GET['usuario']; 
    $men_codigo= $_GET['men_codigo']; 
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
            <h1>Elementos Enviados</h1>
            <div id="izquierda"> 
                <ul>

                    <?php
                    echo "  <li><a href='enviados.php?codigo=".$codigo."'>Enviados</a></li>";
                    ?>
                
                </ul>
        
            </div> 
        <?php
        include '../../../config/conexionBD.php'; 
        $codigo = $_GET['codigo'];
        $sql = "SELECT men_destina, men_asunto, men_mensaje FROM mensaje WHERE  men_codigo='$men_codigo' AND usu_codigo='$codigo' ORDER by men_fechaHora";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) 
        {                                  
            while($row = $result->fetch_assoc()) 
            {           
            ?>  
                <br>
                <br> 
                <br>
                <br><br><br><br><br><br>
                <label form="Para">Para:</label>
                <input type="text" id="destinatario3" name="destinatario3" value="<?php echo $row['men_destina']?>" readonly="readonly"> 
                <br> 
                <label form="asunto">Asunto:</label> 
                <input type="text" id="asunto2" name="asunto" value="<?php echo $row['men_asunto']?>" readonly="readonly"> 
                <br> 
                <textarea type="txtarea" id="mensaje3" name="textarea" rows="10" cols="50" readonly="readonly"><?php echo $row['men_mensaje']?></textarea>
                <div id="informacion"></div>
            <?php
            
        }
        
       
        } 
        else {             
                echo "<p class='error'> " . mysqli_error($conn) . "</p>";             
            }
        
        
    
        $conn->close();  
        ?>
        
    </body> 
 </html> 