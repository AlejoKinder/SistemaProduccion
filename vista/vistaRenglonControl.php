<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php 
            $idOrden = $_REQUEST['idOrden'];
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            $horaIni = date("H:i:s");
            $fechaIni = date('Y-m-d');
        ?>                 
        <?php
            //echo $idOrden;
            if(isset($ren)){
                $datosRenglon = array('id'=>$ren->id, 'inicio'=>$ren->inicio, 'fin'=>$ren->fin, 'fechaIni'=>$ren->fecha_inicio, 'fechaFin'=>$ren->fecha_fin, 'idEmpleado'=>$ren->id_empleado);
                $horaIni = $ren->inicio;
                $fechaIni = $ren->fecha_inicio;
            }else{
                $datosRenglon = array('id'=>"", 'inicio'=>"", 'fin'=>"", 'fechaIni'=>"", 'fechaFin'=>"",'idEmpleado'=>"");
            }
        ?>
        <a href="index.php?controller=renglonControl&action=mostrar&idOrden=<?php echo $idOrden;?>"><-Volver</a>
        <h1>Orden de Produccion: Registro Control</h1>
        <br>
        <form action="index.php?controller=renglonControl&action=crearOeditar&idOrden=<?php echo $idOrden; ?>" method="post">
            <input type="hidden" name="id" value=<?php echo $datosRenglon['id']; ?>>
            <input type="hidden" name="idOrden" value=<?php echo $idOrden; ?>>
            <table>
                <tr>
                    <td>Hora Inicio: </td>
                    <td>
                        <input type="time" readonly name="horaInicio" value=<?php echo $horaIni; ?>>
                    </td>
                    <td>Fecha Inicio: </td>
                    <td>
                        <input type="date" readonly name="fechaInicio" value=<?php echo $fechaIni; ?>>
                    </td>
                </tr>
                <tr>
                    <td>Hora Fin: </td>
                    <td>
                        <input type="time" readonly name="horaFin" value=<?php echo $datosRenglon['fin']; ?>>
                    </td>
                    <td>Fecha Fin: </td>
                    <td>
                        <input type="date" readonly name="fechaFin" value=<?php echo $datosRenglon['fechaFin']; ?>>
                    </td>
                </tr>
                <tr>
                    <td>Id Empleado: </td>
                    <td>
                        <input type="number" name="idEmpleado" min="1" value=<?php echo $datosRenglon['idEmpleado']; ?>>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Guardar">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
