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
        <a href='index.php?controller=ordenProduccion&action=existencia'>Nueva Formula</a>
        <table>
            <tr>
                <?php
                    $orden = array('Detalle');
                    foreach($orden as $valor):
                ?>
                <td><h3><?php echo $valor; ?></h3></td>
                <?php endforeach; ?>
            </tr>
        <?php 
            foreach($detalles as $listdetalles):
        ?>
    <tr>                
        <td><?php echo $listdetalles->detalle; ?></td>
        <td><a href="index.php?controller=ordenProduccion&action=existencia&id=<?php echo $listOrdenes->id; ?>">Editar</a></td>
        <td><a onclick="javascript:return confirm('Seguro de eliminar este registro?');" href="index.php?controller=ordenProduccion&action=eliminar&id= <?php echo $listOrdenes->id; ?>">Eliminar</a></td>
        <td><a href="index.php?controller=renglonElaboracion&action=mostrar&idOrden=<?php echo $listOrdenes->id;?>">Ver-></td>
    </tr>
<?php endforeach; ?>
        </table>
    </body>
</html>
