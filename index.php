<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            if(!isset($_REQUEST['controller'])){
                require_once 'controlador\OrdenProduccionControlador.php';
                $controlador = new OrdenProduccionControlador();
                $controlador->indexOrdenProduccion();
            }else{
                $controlador = $_REQUEST['controller'];
                $action = $_REQUEST['action'];
                require_once 'controlador/'.$controlador.'Controlador.php';
                $controlador = ucwords($controlador).'Controlador';
                $controlador = new $controlador;
                call_user_func(array($controlador, $action));
            }
        ?>
    </body>
</html>
