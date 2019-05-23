function Buscar()
{
    var destinatario = document.getElementById("destinatario").value;
    var usuario = document.getElementById("usuario").value;
    var codigo = document.getElementById("codigo").value;

    alert(codigo);
   
    if(remitente == "")
    {
        document.getElementById("informacion").innerHTML = "";
    }
    else
    {
        if (window.XMLHttpRequest)
        {
            xmlhttp=new XMLHttpRequest();
        }
        else
        {
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 

        }
    
    xmlhttp.onreadystatechange = function(){

    if(this.readyState==4 && this.status == 200)
    {
        document.getElementById("informacion").innerHTML = this.responseText;

    }
    };

    xmlhttp.open("GET", "buscar2.php?usuario="+usuario+"&destinatario="+destinatario"&codigo="+codigo,true);
    xmlhttp.send();
    }

    
}

function Cancelar2
{
    var usuario = document.getElementById("usuario").value;
    var codigo = document.getElementById("codigo").value;      
    alert(usuario); 
    
        if (window.XMLHttpRequest)
        {
            xmlhttp=new XMLHttpRequest();
        }
        else
        {
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 

        }
    
    xmlhttp.onreadystatechange = function(){

    if(this.readyState==4 && this.status == 200)
    {
        document.getElementById("informacion").innerHTML = this.responseText;

    }
    };

    xmlhttp.open("GET", "cancelar2.php?usuario="+usuario+"&codigo="+codigo,true);
    xmlhttp.send();
    

    
}

