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
        <a href='index.php?controller=ordenProduccion&action=existencia'>Nueva Orden de Produccion</a>
        <a href='index.php?controller=articulo&action=indexOrdenArticulo'> | Formulas</a>
        <table>
            <tr>
                <?php
                    $orden = array('Id', ' | Prioridad', ' | Operacion', '| Fecha Entrega', '| Materia', '| Color', '| Tipo', '| Marca', '| Tapa Color', '| Sector', '| Cant. Horas');
                    foreach($orden as $valor):
                ?>
                <td><h3><?php echo $valor; ?></h3></td>
                <?php endforeach; ?>
            </tr>
            <?php 
    require_once 'modelo/Sector.php';
    $orden = new OrdenProduccion();
    $ordenes = $orden->getAll();
    $sectorBus = new Sector();
    foreach($ordenes as $listOrdenes):
        $sector = $sectorBus->getById($listOrdenes->idSector);
?>
    <tr>                
        <td><?php echo $listOrdenes->id; ?></td>
        <td><?php echo $listOrdenes->prioridad; ?></td> 
        <td><?php echo $listOrdenes->operacion; ?></td>
        <td><?php echo $listOrdenes->fechaEntrega; ?></td>                     
        <td><?php echo $listOrdenes->material; ?></td>
        <td><input type="text" readonly style="background-color: <?php echo $listOrdenes->color; ?>"></td>
        <!--<td><?php //echo $listOrdenes->color; ?></td> -->
        <td><?php echo $listOrdenes->tipo; ?></td>
        <td><?php echo $listOrdenes->marca; ?></td>
        <td><input type="text" readonly style="background-color: <?php echo $listOrdenes->tapaColor; ?>"></td>
        <!--<td><?php //echo $listOrdenes->tapaColor; ?></td>-->
        <td><?php echo ($sector !== null) ? $sector->nombre : ''; ?></td>
        <?php //$orden = $orden->getById($listOrdenes->id)?>
        <td><?php echo $orden->calcularHorasOrden($listOrdenes->id); ?></td>
        <td><a href="index.php?controller=ordenProduccion&action=existencia&id=<?php echo $listOrdenes->id; ?>">Editar</a></td>
        <td><a onclick="javascript:return confirm('Seguro de eliminar este registro?');" href="index.php?controller=ordenProduccion&action=eliminar&id= <?php echo $listOrdenes->id; ?>">Eliminar</a></td>
        <td><a href="index.php?controller=renglonElaboracion&action=mostrar&idOrden=<?php echo $listOrdenes->id;?>">Ver-></td>
    </tr>
<?php endforeach; ?>
        </table>
    </body>
</html>
