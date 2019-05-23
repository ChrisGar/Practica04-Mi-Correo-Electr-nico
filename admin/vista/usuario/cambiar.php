<?php
    include '../../../config/conexionBD.php'; 
    $codigo = $_GET['codigo'];
    ?>  
        <head>     
            <link href="CSS/estilo1.css" rel="stylesheet" />
            <meta charset="UTF-8"> 
            <title>Modificar Contraseña</title>
            <h1>Modificar Contraseña</h1>
        </head> 
        <form id="formulario03" method="POST" action="cambiar2.php">
        <h2 id="logo"> <img src="CSS/sendfast.jpg" alt=""></h2>
        <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
            
        <input type='label' name='clave' value="Ingrese la nueva contraseña" disabled="disabled"/>
        <input type='password' name='clave' value="" />
        <input type="submit" id="crear" name="crear" value="Aceptar" />         
        <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />

        <?php        
        
    $conn->close();  
        
?>