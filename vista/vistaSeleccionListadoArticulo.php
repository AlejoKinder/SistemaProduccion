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
        <h1>Seleccione Articulo Correspondiente</h1>
        <br>
        <br>
        <table>
            <tr>
                <?php
                    $encabezados = array("Id", " | Descripcion");
                    foreach($encabezados as $cabeza):                        
                 ?>
                 <td><h3><?php echo $cabeza; ?></h3></td>
                <?php endforeach; ?>
            </tr>           
            <?php
                foreach($busqueda as $valor):                                                    
            ?>
            <tr>
                <td><?php echo $valor->idArticulo; ?></td>
                <td><?php echo $valor->descripcion; ?></td>
                <td><a href="index.php?controller=detalleFormula&action=listadoDeUnArticulo&id=<?php echo $valor->idArticulo; ?>">Seleccionar</a></td>
            </tr>
            <?php endforeach; ?>
        </table>        
    </body>
</html>
