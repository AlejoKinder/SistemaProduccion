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
        <?php $idOrden = $_REQUEST['idOrden']; ?>            
        <?php
            //echo $idOrden;
            if(isset($ren)){
                $datosRenglon = array('id'=>$ren->id, 'inicio'=>$ren->inicio, 'fin'=>$ren->fin, 'fecha'=>$ren->fecha, 'solidos'=>$ren->fecha, 'presentacion'=>$ren->presentacion, 'entregado'=>$ren->entregado, 'corregido'=>$ren->corregido,  'perdido'=>$ren->perdido,  'litrosOkg'=>$ren->litrosOkg, 'idEmpleado'=>$ren->id_empleado);
            }else{
                $datosRenglon = array('id'=>"", 'inicio'=>"", 'fin'=>"", 'fecha'=>"", 'solidos'=>"", 'presentacion'=>"", 'entregado'=>"", 'corregido'=>"",  'perdido'=>"",  'litrosOkg'=>"", 'idEmpleado'=>"");
            }
        ?>
        <a href="index.php?controller=renglonControlFinal&action=mostrar&idOrden=<?php echo $idOrden;?>"><-Volver</a>
        <h1>Orden de Produccion: Registro Control (Check Final)</h1>
        <br>
        <form action="index.php?controller=renglonControlFinal&action=crearOeditar" method="post">
            <input type="hidden" name="id" value=<?php echo $datosRenglon['id']; ?>>
            <input type="hidden" name="idOrden" value=<?php echo $idOrden; ?>>
            <table>
                <tr>
                    <td>Hora Inicio: </td>
                    <td>
                        <input type="time" name="inicio" value=<?php echo $datosRenglon['inicio'] ?>>
                    </td>
                </tr>
                <tr>
                    <td>Hora Fin: </td>
                    <td>
                        <input type="time" name="fin" value=<?php echo $datosRenglon['fin'] ?>>
                    </td>
                </tr>
                <tr>
                    <td>Fecha: </td>
                    <td><input type="date" name="fecha" value=<?php echo $datosRenglon['fecha'] ?>></td>
                </tr>
                <tr>
                    <td>Presentacion: </td>
                    <td>
                        <input type="text" name="presentacion" value=<?php echo $datosRenglon['presentacion'] ?>>
                    </td>
                </tr>
                <tr>
                    <td>Entregado: </td>
                    <td>
                        <input type="number" name="entregado" value=<?php echo $datosRenglon['entregado'] ?>>
                    </td>
                </tr>
                <tr>
                    <td>Corregido: </td>
                    <td>
                        <input type="number" name="corregido" value=<?php echo $datosRenglon['corregido'] ?>>
                    </td>
                </tr>
                <tr>
                    <td>Perdido: </td>
                    <td>
                        <input type="number" name="perdido" value=<?php echo $datosRenglon['perdido'] ?>>
                    </td>
                </tr>
                <tr>
                    <td>L / KG: </td>
                    <td>
                        <input type="text" name="litrosOkg" value=<?php echo $datosRenglon['litrosOkg'] ?>>
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
