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
                $datosRenglon = array('id'=>$ren->id, 'viscocidad'=>$ren->viscocidad_c, 'brillo'=>$ren->brillo_c, 'cubritivo'=>$ren->cubritivo_c, 'secado'=>$ren->secado_c, 'solidos'=>$ren->solidos_c, 'color'=>$ren->color_c, 'molienda'=>$ren->molienda_c, 'total'=>$ren->total_c,'idEmpleado'=>$ren->id_empleado);
            }else{
                $datosRenglon = array('id'=>"", 'viscocidad'=>"", 'brillo'=>"", 'cubritivo'=>"", 'secado'=>"", 'solidos'=>"", 'color'=>"", 'molienda'=>"", 'total'=>"",'idEmpleado'=>"");
            }
        ?>
        <a href="index.php?controller=renglonAjuste&action=mostrar&idOrden=<?php echo $idOrden;?>"><-Volver</a>
        <h1>Orden de Produccion: Registro Ajuste</h1>
        <form action="index.php?controller=renglonAjuste&action=crearOeditar&idOrden=<?php echo $idOrden; ?>" method="post">
            <input type="hidden" name="id" value=<?php echo $datosRenglon['id']; ?>>
            <input type="hidden" name="idOrden" value=<?php echo $idOrden; ?>>
            <table>
                <tr>
                    <td>Viscocidad: </td>
                    <td>
                        <input type="text" name="viscocidad" value=<?php echo $datosRenglon['viscocidad']; ?>>
                    </td>
                </tr>
                <tr>
                    <td>Brillo: </td>
                    <td>
                        <input type="text" name="brillo" value=<?php echo $datosRenglon['brillo']; ?>>
                    </td>
                </tr>
                <tr>
                    <td>Cubritivo: </td>
                    <td>
                        <input type="text" name="cubritivo" value=<?php echo $datosRenglon['cubritivo']; ?>>
                    </td>
                </tr>
                <tr>
                    <td>Secado: </td>
                    <td>
                        <input type="text" name="secado" value=<?php echo $datosRenglon['secado']; ?>>
                    </td>
                </tr>
                <tr>
                    <td>Solidos: </td>
                    <td>
                        <input type="text" name="solidos" value=<?php echo $datosRenglon['solidos']; ?>>
                    </td>
                </tr>
                <tr>
                    <td>Color: </td>
                    <td>
                        <input type="text" name="color" value=<?php echo $datosRenglon['color']; ?>>
                    </td>
                </tr>
                <tr>
                    <td>Molienda: </td>
                    <td>
                        <input type="text" name="molienda" value=<?php echo $datosRenglon['molienda']; ?>>
                    </td>
                </tr>
                <tr>
                    <td>Total: </td>
                    <td>
                        <input type="text" name="total" value=<?php echo $datosRenglon['total']; ?>>
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
