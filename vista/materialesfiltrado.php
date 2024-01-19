<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="index.php?controller=materiales&action=indexForm&idSubFamilia=<?php echo $idSubFamilia; ?>&idDetalle=<?php echo $_REQUEST['idDetalle']; ?>">Crear Material</a>
        <h1>Añada el material deseado</h1>
        <table>
            <tr>
                <?php
                    $encabezado = array('Id Material |', 'Descripción |', 'Costo |', 'Densidad |', 'Índice de Acidez |', 'Índice de Iodo |', 'Absorción de Aceite |', 'Punto de Ablandamiento |', 'Punto de Fusión |', 'Ligante');

                    foreach($encabezado as $valor):
                ?>
                <td><h3><?php echo $valor; ?></h3></td>
                <?php endforeach; ?>
            </tr>
            <?php 
                foreach($materiales as $material):
            ?>
                <tr>
                    <td><?php echo $material->id; ?></td>
                    <td><?php echo $material->descripcion; ?></td>
                    <td><?php echo $material->costo; ?></td>
                    <td><?php echo $material->densidad; ?></td>
                    <td><?php echo $material->indiceAcidez; ?></td>
                    <td><?php echo $material->indiceIodo; ?></td>
                    <td><?php echo $material->absorcionAceite; ?></td>
                    <td><?php echo $material->puntoAblandamiento; ?></td>
                    <td><?php echo $material->puntoFusion; ?></td>
                    <td><?php echo ($material->ligante == true) ? 'SI' : 'NO'; ?></td>
                    <td><a href="index.php?controller=formula&action=formulario&idDetalle=<?php echo $_REQUEST['idDetalle']; ?>&idMaterial=<?php echo $material->id; ?>">Agregar</a></td>                    
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>

