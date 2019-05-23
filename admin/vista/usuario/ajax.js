    function Buscar()
    {
        var remitente = document.getElementById("remitente").value;
        var usuario = document.getElementById("usuario").value;

        alert(usuario);
       
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

    function Cancelar()
    {
        var usuario = document.getElementById("usuario").value;
        
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

        xmlhttp.open("GET", "cancelar.php?usuario="+usuario,true);
        xmlhttp.send();
        

        
    }

   

    