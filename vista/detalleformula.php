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
        <a href='index.php?controller=detalleFormula&action=existencia'>Nueva Formula</a>
        <table>
            <tr>
                <?php
                    $encabezado = array('Detalle');
                    foreach($encabezado as $valor):
                ?>
                <td><h3><?php echo $valor; ?></h3></td>
                <?php endforeach; ?>
            </tr>
        <?php 
            foreach($detalles as $listdetalles):
        ?>
    <tr>                
        <td><?php echo $listdetalles->detalle; ?></td>
        <td><a href="index.php?controller=formula&action=indexFormula&idDetalle=<?php echo $listdetalles->id; ?>">Editar</a></td>        
    </tr>
<?php endforeach; ?>
        </table>
    </body>
</html>
