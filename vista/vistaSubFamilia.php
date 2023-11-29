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
            if(isset($subfamilia)){
                $subfamilia = array('id'=>$ren->id, 'nombre'=>$ren->nombre, 'prefijo'=>$ren->prefijo);
            }else{
                $subfamilia = array('id'=>"", 'nombre'=>"", 'prefijo'=>"");
            }
        ?>
        <a href="index.php?controller=renglonAjuste&action=mostrar&idOrden=<?php echo $idOrden;?>"><-Volver</a>
        <h1>Orden de Produccion: Registro SubFamilia</h1>
        <form action="index.php?controller=renglonAjuste&action=crearOeditar&idOrden=<?php echo $idOrden; ?>" method="post">
            <input type="hidden" name="id" value=<?php echo $subfamilia['id']; ?>>
            <input type="hidden" name="idfamilia" value="">
            <table>
                <tr>
                    <td>Nombre: </td>
                    <td>
                        <input type="text" name="nombre" value=<?php echo $subfamilia['nombre']; ?>>
                    </td>
                </tr>
                <tr>
                    <td>Prefijo: </td>
                    <td>
                        <input type="text" name="prefijo" maxlength="1" value=<?php echo $subfamilia['prefijo']; ?>>
                    </td>
                </tr>
                <tr>
                    <td> <input type="submit" value="Guardar"> </td>
                </tr>
            </table>
        </form>
    </body>
</html>
