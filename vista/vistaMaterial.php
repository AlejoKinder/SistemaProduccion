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
            if (isset($ren)) {
                $mat = array(
                    'id' => $ren->id,
                    'costo' => $ren->costo,
                    'descripcion' => $ren->descripcion,
                    'densidad' => $ren->densidad,
                    'indiceAcidez' => $ren->indiceAcidez,
                    'indiceIodo' => $ren->indiceIodo,
                    'absorcionAceite' => $ren->absorcionAceite,
                    'puntoAblandamiento' => $ren->puntoAblandamiento,
                    'puntoFusion' => $ren->puntoFusion,
                    'ligante' => $ren->ligante
                );
            } else {
                $mat = array(
                    'id' => "",
                    'costo' => "",
                    'descripcion' => "",
                    'densidad' => "",
                    'indiceAcidez' => "",
                    'indiceIodo' => "",
                    'absorcionAceite' => "",
                    'puntoAblandamiento' => "",
                    'puntoFusion' => "",
                    'ligante' => ""
                );
            }
        ?>

        <a href="index.php?controller=renglonElaboracion&action=mostrar&idOrden=<?php echo $idOrden;?>"><-Volver</a>
        <h1>Orden de Produccion: Registro Elaboracion</h1>
        <br>
        <form action="index.php?controller=materiales&action=crearMaterial" method="post">
            <input type="hidden" name="id" value=<?php echo $mat['id']; ?>>
            <input type="hidden" name="idsubfamilia" value=<?php echo $_REQUEST['idSubFamilia']; ?>>
            <input type="hidden" name="idDetalle" value=<?php echo $_REQUEST['idDetalle']; ?>>
            <table>
                <tr>
                    <td>Costo:</td>
                    <td>
                        <input type="number" name="costo" step="0.01" value="<?php echo $mat['costo']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Descripción:</td>
                    <td>
                        <input type="text" name="descripcion" maxlength="50" value="<?php echo $mat['descripcion']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Densidad:</td>
                    <td>
                        <input type="number" name="densidad" step="0.01" value="<?php echo $mat['densidad']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Índice de Acidez:</td>
                    <td>
                        <input type="number" name="indiceAcidez" value="<?php echo $mat['indiceAcidez']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Índice de Iodo:</td>
                    <td>
                        <input type="number" name="indiceIodo" value="<?php echo $mat['indiceIodo']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Absorción de Aceite:</td>
                    <td>
                        <input type="number" name="absorcionAceite" value="<?php echo $mat['absorcionAceite']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Punto de Ablandamiento:</td>
                    <td>
                        <input type="number" name="puntoAblandamiento" value="<?php echo $mat['puntoAblandamiento']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Punto de Fusión:</td>
                    <td>
                        <input type="number" name="puntoFusion" value="<?php echo $mat['puntoFusion']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Es Ligante?:</td>
                    <td>
                        <input type="checkbox" name="ligante" <?php echo $mat['ligante'] ? 'checked' : ''; ?>>
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
