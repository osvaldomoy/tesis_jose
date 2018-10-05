window.onload = function(){
	//ActualizaBoleta();
	actualizarListadeEspera();
}

function actualizarListadeEspera(){
	
	var contenido = "<thead class='thead-dark'>"+
					"<tr>"+
					  "<th scope='col'>Posición</th>"+
					  "<th scope='col'>Boleta</th>"+
					  "<th scope='col'>Cliente</th>"+
					  "<th scope='col'>Servicio</th>"+
					  "<th scope='col'>Tiempo</th>"+
					"</tr>"+
				  "</thead>";
	$.ajax({
		type: "POST",
		async: false,
		cache: false,
		url: "../controladores/ControladorServicio.php",
		data: "lista=123",
		
		success: function(datos) {
			
			contenido += datos;
		}
	});
	
	
	
	$("#tabla-espera").html(contenido);
	
	
	timer = setTimeout(actualizarListadeEspera, 1000);
}



function ActualizaBoleta(){
	
	
	
    
    var m = document.getElementById("time").innerHTML;
	
	var minuto = m.split(":");
	//alert(minuto[2]);
	var hora = parseInt(minuto[0]);
	var minutos = parseInt(minuto[1]);
	var segundo = minuto[2];
	//alert(segundo);
	/*$.ajax({
        type: "POST",
        async:false, 
        cache:false,
        url: "controladores/ControladorServicio.php",
        data: "nombre="+n,
        success: function(data) {
             n	 = data;
        }
    });*/
	CambiarMinuto(hora,minutos,segundo);
	//setTimeout(ActualizaBoleta, 1000);
	
}


function CambiarMinuto(hora,minuto,segundo){
		var _second = 1000;
		var _minute = _second * 60;
		var _hour = _minute * 60;
		var _day = _hour * 24;

		var timer;
        clearInterval(timer);
        var fin = new Date();
		
		fin.setHours(fin.getHours() + hora);
		fin.setMinutes(fin.getMinutes() + minuto);
        fin.setSeconds(fin.getSeconds() + segundo/1);
	
		//alert(fin);
        
        Temporizador();
        
        function Temporizador(){
            
            var ahora = new Date();
            
           //alert(fin.getMinutes()+':'+fin.getSeconds()+' y '+ahora.getMinutes()+':'+ahora.getSeconds());
            var distancia = fin - ahora;
            
            if (distancia < 0) {

                clearInterval(timer);
                document.getElementById('countdown').innerHTML = 'EXPIRED!';

                return;
            }
            
            var days = Math.floor(distancia / _day);
            var hours = Math.floor((distancia % _day) / _hour);
            var minutes = Math.floor((distancia % _hour) / _minute);
            var seconds = Math.floor((distancia % _minute) / _second);

            document.getElementById('countdown').innerHTML = hours + ':';
            document.getElementById('countdown').innerHTML += minutes + ':';
            document.getElementById('countdown').innerHTML += seconds;
            
//            console.log(minutes+':'+seconds);
//			timer = setTimeout(Temporizador, 1000);
            
        }
        
        

    }
