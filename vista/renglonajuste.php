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
                    <a href="index.php?controller=renglonControl&action=mostrar&idOrden=<?php echo $idOrden; ?>"><-Volver</a>
                </td>
                 <td>
                    |
                </td>
                <td>
                    <a href="index.php?controller=renglonAjuste&action=existencia&idOrden=<?php echo $idOrden ?>">Nuevo Renglon</a>                    
                </td>                               
            </tr>
        </table>                
        <h2>Orden de produccion: <?php echo $idOrden ?></h2>
        <h3>Ajuste: </h3>
        <table>
            <tr>
                <?php
                    $renglon = array('Viscosidad', ' | Brillo',' | Cubritivo',  ' | Secado', '| Solidos', ' | Color', ' | Molienda', ' | Total', ' | Responsable');
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
    foreach($ordenBus->listRenglonesAjuste as $listRenglones):
        $empleadoBus = new Empleado();
        $empleadoBus = $empleadoBus->getById($listRenglones->id_empleado);
?>
    <tr>                
        <td><?php echo $listRenglones->viscocidad_c; ?></td>
        <td><?php echo $listRenglones->brillo_c; ?></td> 
        <td><?php echo $listRenglones->cubritivo_c; ?></td> 
        <td><?php echo $listRenglones->secado_c; ?></td>
        <td><?php echo $listRenglones->solidos_c; ?></td>
        <td><?php echo $listRenglones->color_c; ?></td>
        <td><?php echo $listRenglones->molienda_c;; ?></td>
        <td><?php echo $listRenglones->total_c; ?></td>
        <td><?php echo ($empleadoBus !== null) ? $empleadoBus->nombre : '' ?></td>                     
        <td><a href="index.php?controller=renglonAjuste&action=existencia&id=<?php echo $listRenglones->id; ?>&idOrden=<?php echo $idOrden; ?>">Editar</a></td>
        <td><a onclick="javascript:return confirm('Seguro de eliminar este registro?');" href="index.php?controller=renglonAjuste&action=eliminar&id= <?php echo $listRenglones->id; ?>&idOrden=<?php echo $idOrden; ?>">Eliminar</a></td>
    </tr>
<?php endforeach; ?>
        </table>
    </body>
</html>
