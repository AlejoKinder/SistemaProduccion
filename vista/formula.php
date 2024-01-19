<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Añada el material deseado</h1>
        <table>
            <tr>
                <?php
                    $encabezado = array('Id Material |', 'Descripción |', 'Cantidad |', '%KG |', 'Costo |', 'Costo/KG |', 'Desidad |', 'Volumen |');

                    foreach($encabezado as $valor):
                ?>
                <td><h3><?php echo $valor; ?></h3></td>
                <?php endforeach; ?>
            </tr>
            <?php 
                // Suponiendo que $detalles contiene objetos Material
                foreach($resultados as $fila):
                    $porKG = $fila['cantidad'] * 100 / $cantidad;
            ?>
                <tr>
                    <td><?php echo $fila['id']; ?></td>
                    <td><?php echo $fila['descripcion'] ?></td>
                    <td><?php echo $fila['cantidad'] ?></td>
                    <td><?php echo $porKG; // %kg ?></td>
                    <td><?php echo $fila['costo'] ?></td>
                    <td><?php echo $fila['costo'] * $porKG; // Costo/KG ?></td>
                    <td><?php echo $fila['densidad']; ?></td>
                    <td><?php echo $porKG / $fila['densidad']; // Volumen ?></td>
                    <td><a>Eliminar</a></td>
                    
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>

