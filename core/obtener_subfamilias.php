<?php

function obtenerSubfamilias($familiaId) {
    // Asegúrate de que $familiaId sea un entero
    $familiaId = intval($familiaId);

    require_once '../controlador/MaterialesControlador.php';
    $busqueda = new MaterialesControlador();
    
    // Asegúrate de manejar excepciones en caso de errores
    try {
        return $busqueda->obtenerSubFamilias($familiaId);
    } catch (Exception $e) {
        // Log o lanza la excepción según tus necesidades
        echo 'Error en obtenerSubfamilias: ' . $e->getMessage();
        return array(); // Devuelve un array vacío en caso de error
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Valida y sanitiza el valor de familiaId
    $familiaId = filter_input(INPUT_POST, 'familiaId', FILTER_VALIDATE_INT);

    // Verifica si la familiaId está presente y es un entero válido
    if ($familiaId !== false && $familiaId !== null) {
        // Obtén las subfamilias según la familia seleccionada
        $subfamilias = obtenerSubfamilias($familiaId);

        // Crea opciones para el segundo select
        $options = '';
        foreach ($subfamilias as $subfamilia) {
            $options .= '<option value="' . $subfamilia->id . '">' . $subfamilia->nombre . '</option>';
        }

        // Devuelve las opciones como respuesta a la solicitud AJAX
        echo $options;
        
        // Verifica la respuesta que estás enviando al navegador
        // Esto se imprimirá en la consola del navegador
        error_log("Respuesta enviada al navegador:", $options);
    } else {
        // Si no se proporciona familiaId válido, devuelve algún mensaje de error o manejo adecuado
        echo 'Error: FamiliaId no válido.';
    }
} else {
    // Si no es una solicitud GET, devuelve algún mensaje de error o manejo adecuado
    echo 'Error: Solicitud no válida.';
}
?>


