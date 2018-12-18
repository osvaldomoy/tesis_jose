<!-- Minified Bootstrap CSS -->
<script src="../../js_eventos/vistas/VistaReporte.js"></script>
<form method="POST">
    
    <label for="fecha">Fecha</label><input id="fecha" type="date" name="fecha" step="1"  value="<?php echo date("Y-m-d");?>">
</form>
<script>
    function agregarUrl(id, url){
//        alert($("#fecha").val());
        $("#"+id).attr('href',url+"?fecha="+$("#fecha").val());
    }
</script>

<ul style="list-style: none;
    text-align: left;">
    
    
                

                    
                
    
        
        <hr>
</div

 
<li><a href="../admin/informes/Atendidos_hoy.php" target="_blank" onclick="agregarUrl('re', '../admin/informes/Atendidos_hoy.php');" id="re">Clientes Atendidos (Seleccionar fecha)</a></li>
    <li><a href="../admin/informes/Insumos.php" target="_blank">Listado de Insumos</a></li>
    <li><a href="../admin/informes/ServiciosCompleto.php" target="_blank" onclick="agregarUrl('ser', '../admin/informes/ServiciosCompleto.php');" id="ser">Servicios e Insumos (Seleccionar fecha) </a></li>
    <li><a href="../admin/informes/ServiciosCompleto.php" target="_blank" onclick="agregarUrl('serv', '../admin/informes/Servicios.php');" id="serv">Servicios (Seleccionar fecha) </a></li>
</ul>