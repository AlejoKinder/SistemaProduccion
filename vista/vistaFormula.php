<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
<head>
    <title>Selección dinámica</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#selectFamilia').change(function(){
                var familiaId = $(this).val();
                
                // Realizar una solicitud AJAX al servidor para obtener las subfamilias basadas en la familia seleccionada
                $.ajax({
                    type: 'POST',
                    url: 'core/obtener_subfamilias.php', // Archivo PHP que procesará la solicitud
                    data: { familiaId: familiaId },
                    success: function(subfamilias){
                        // Llenar el segundo select con las subfamilias obtenidas
                        $('#selectSubfamilia').html(subfamilias);
                        
                        // Verificar la respuesta del servidor
                        console.log("Respuesta del servidor:", subfamilias);
                    }
                });
            });
        });
    </script>
</head>
<body>

    <h1>Seleccionar Familia y Subfamilia</h1>

    <?php
        require_once 'controlador/MaterialesControlador.php';
        $busqueda = new MaterialesControlador();
        $familias = $busqueda->obtenerFamilias(); // Obtener familias desde la base de datos
        if(isset($_REQUEST['idDetalle'])){
            $idDet = $_REQUEST['idDetalle'];            
        }else{
            $idDet = 0;
        }
    ?>
    <form method="post" action="index.php?controller=materiales&action=filtrarMaterialesPorSubFamilia">
        <input type="hidden" name="idDetalle" value=<?php echo $idDet; ?>>
        <!-- Primer select para la selección de la familia -->
        <select id="selectFamilia" name="Familia">
            <?php foreach ($familias as $familia): ?>
                <option value="<?php echo $familia->id ?>"><?php echo $familia->nombre ?></option>
            <?php endforeach; ?>
        </select>

        <!-- Segundo select para la selección de la subfamilia -->
        <select id="selectSubfamilia" name="idSubFamilia">
            <!-- Las opciones se llenarán dinámicamente usando JavaScript -->
        </select>
        <input type="submit" value="Buscar">
    </form>
</body>
</html>

