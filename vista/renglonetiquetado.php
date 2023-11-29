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
        <table>
            <tr>
                <td>
                    <a href="index.php?controller=renglonEspecificaciones&action=mostrar&idOrden=<?php echo $idOrden; ?>"><-Volver</a>
                </td>
                 <td>
                    |
                </td>
                <td>
                    <a href="index.php?controller=renglonEtiquetado&action=existencia&idOrden=<?php echo $idOrden ?>">Nuevo Renglon</a>                    
                </td>                               
            </tr>
        </table>                
        <h2>Orden de produccion: <?php echo $idOrden ?></h2>
        <h3>Etiquetado: </h3>
        <table>
            <tr>
                <?php
                    $renglon = array('Inicio', ' | Fin', ' | Fecha Inicio', ' | Fecha Fin', '| Responsable');
                    foreach($renglon as $valor):
                ?>
                <td><h3><?php echo $valor; ?></h3></td>
                <?php endforeach; ?>
            </tr>
            <?php 
    require_once 'modelo/Empleado.php';
    require_once 'modelo/OrdenProduccion.php';
    //$renglonBus = new RenglonElaboracion();
    //$renglones = $renglonBus->getAll();
    $orden = new OrdenProduccion();
    $ordenBus = $orden->getById($idOrden);
    foreach($ordenBus->listRenglonesEtiquetado as $listRenglones):
        $empleadoBus = new Empleado();
        $empleadoBus = $empleadoBus->getById($listRenglones->id_empleado);
?>
    <tr>                
        <td><?php echo $listRenglones->inicio; ?></td>
        <td><?php echo $listRenglones->fin; ?></td> 
        <td><?php echo $listRenglones->fecha_inicio; ?></td>
        <td><?php echo $listRenglones->fecha_fin; ?></td>
        <td><?php echo ($empleadoBus !== null) ? $empleadoBus->nombre : '' ?></td>                     
        <td><a href="index.php?controller=renglonEtiquetado&action=existencia&id=<?php echo $listRenglones->id; ?>&idOrden=<?php echo $_REQUEST['idOrden']?>">Editar</a></td>
        <td><a onclick="javascript:return confirm('Seguro de eliminar este registro?');" href="index.php?controller=renglonEtiquetado&action=eliminar&id= <?php echo $listRenglones->id; ?>&idOrden=<?php echo $_REQUEST['idOrden']?>">Eliminar</a></td>
        <?php if($listRenglones->fin == '00:00:00'): ?>
            <td><a onclick="javascript:return confirm('Seguro que quiere finalizar el Renglon?');" href="index.php?controller=renglonEtiquetado&action=finalizarRenglon&id= <?php echo $listRenglones->id; ?>&idOrden=<?php echo $_REQUEST['idOrden']?>">Finalizar</a></td>
        <?php endif; ?>
    </tr>
<?php endforeach; ?>
        </table>
        <br>
        <td><a href="index.php?controller=renglonEnvasado&action=mostrar&idOrden=<?php echo $idOrden; ?>">Siguiente-></td>
    </body>
</html>
