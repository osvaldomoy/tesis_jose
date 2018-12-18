<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Informe - Insumos</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../style.css" media="print">
        <script src="../../js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="estilo.css" media="print">
        <script src="../../js/jquery-3.2.1.min.js"></script>
        <script src="../../js_eventos/vistas/VistaReporte.js"></script>
        
    </head>
    <body style="margin: 20px;
          padding-left: 100px;" id="impresions" onload="printDiv('impresions');">
        <style>
            @media print{
                
                 body {
                     background: #ffcc66 !important;
                }
            }
        </style>
            
        
        <h1 style="background: #000000; color: #fff;">SMART MECHANIC</h1>
        <h4>Insumos</h4>
        
        <table class="table" id="tabla-informe">
                <script>
                    mostrarInsumos();
                </script>        
                       
        </table>
    </body>
    
    <script>
        function printDiv() {
            
             window.print();
        }
        
        
    
    </script>
</html>