<?php
    session_start();
    if(!isset($_SESSION['isLogged'])|| $_SESSION['isLogged']  === FALSE){
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }
    $usuario= $_GET['usuario']; 
    $remitente=$_GET['remitente'];
    $men_codigo=$_GET['men_codigo'];
    $codigo=$_GET['codigo'];
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
            <h1>Recibidos</h1>
            <div id="izquierda"> 
                <ul>

                    <?php
                    echo "  <li><a href='index.php?codigo=".$codigo."&usuario=".$usuario."'>Inicio</a></li>";
                    ?>
                
                </ul>
        
            </div> 
        <?php
        include '../../../config/conexionBD.php'; 
        $sql = "SELECT men_fechaHora, men_remitente, men_asunto, men_mensaje FROM mensaje WHERE  men_codigo='$men_codigo' AND men_remitente='$remitente' AND men_destina='$usuario'";
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
                <label form="Fecha" id="Fecha"><?php echo $row['men_fechaHora']?></label>
                <br> 
                <label form="para">De:</label> 
                <input type="text" id="remitente33" name="asunto" value="<?php echo $row['men_remitente']?>" readonly="readonly"> 
                <br>
                <label form="para">Asunto:</label> 
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