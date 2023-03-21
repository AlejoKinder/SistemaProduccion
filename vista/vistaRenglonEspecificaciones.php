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
                $datosRenglon = array('id'=>$ren->id, 'viscocidad'=>$ren->viscocidad, 'viscocidad_2'=>$ren->viscocidad_2, 'brillo'=>$ren->brillo, 'solidos'=>$ren->solidos, 'densidad'=>$ren->densidad, 'ablandamiento'=>$ren->ablandamiento, 'acidez'=>$ren->acidez, 'idEmpleado'=>$ren->id_empleado);
            }else{
                $datosRenglon = array('id'=>"", 'viscocidad'=>"", 'viscocidad_2'=>"", 'brillo'=>"", 'solidos'=>"", 'densidad'=>"", 'ablandamiento'=>"", 'acidez'=>"", 'idEmpleado'=>"");
            }
        ?>
        <a href="index.php?controller=renglonEspecificaciones&action=mostrar&idOrden=<?php echo $idOrden;?>"><-Volver</a>
        <h1>Orden de Produccion: Registro Especifiaciones</h1>
        <form action="index.php?controller=renglonEspecificaciones&action=crearOeditar&idOrden=<?php echo $idOrden; ?>" method="post">
            <input type="hidden" name="id" value=<?php echo $datosRenglon['id']; ?>>
            <input type="hidden" name="idOrden" value=<?php echo $idOrden; ?>>
            <table>
                <tr>
                    <td>Viscocidad (n°4): </td>
                    <td>
                        <input type="text" name="viscocidad" value=<?php echo $datosRenglon['viscocidad']; ?>>
                    </td>
                </tr>
                <tr>
                    <td>Viscocidad (st): </td>
                    <td>
                        <input type="text" name="viscocidad_2" value=<?php echo $datosRenglon['viscocidad_2']; ?>>
                    </td>
                </tr>
                <tr>
                    <td>Brillo: </td>
                    <td>
                        <input type="number" name="brillo" value=<?php echo $datosRenglon['brillo']; ?>>°
                    </td>
                </tr>
                <tr>
                    <td>Solidos: </td>
                    <td>
                        <input type="number" name="solidos" min="0" max="100" value=<?php echo $datosRenglon['solidos']; ?>>%
                    </td>
                </tr>
                <tr>
                    <td>Densidad: </td>
                    <td>
                        <input type="number" name="densidad" value=<?php echo $datosRenglon['densidad']; ?>>
                    </td>
                </tr>
                <tr>
                    <td>Ablandamiento: </td>
                    <td>
                        <input type="number" name="ablandamiento" value=<?php echo $datosRenglon['ablandamiento']; ?>>
                    </td>
                </tr>
                <tr>
                    <td>Acidez: </td>
                    <td>
                        <input type="number" name="acidez" value=<?php echo $datosRenglon['acidez']; ?>>
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
