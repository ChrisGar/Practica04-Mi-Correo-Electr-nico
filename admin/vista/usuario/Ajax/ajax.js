function Buscar(usuario)
{

    alert("Entro");
    var remitente = document.getElementById("remitente").value;
    
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

    xmlhttp.open("GET", "buscar.php?usuario="+usuario+"&remitente="+remitente,true);
    xmlhttp.send();
    }

    
}

