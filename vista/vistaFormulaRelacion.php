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
        <a href="index.php?controller=renglonAjuste&action=mostrar&idOrden=<?php echo $idOrden;?>"><-Volver</a>
        <h1>Formula: Registro Formula</h1>
        <form action="index.php?controller=formula&action=crearOeditar" method="post">
            <input type="hidden" name="idDetalle" value=<?php echo $_REQUEST['idDetalle']; ?>>
            <input type="hidden" name="idMaterial" value=<?php echo $_REQUEST['idMaterial']; ?>>
            <table>
                <tr>
                    <td>Solido: </td>
                    <td>
                        <input type="number" name="solido" min="0">
                    </td>
                </tr>
                <tr>
                    <td>Cantidad: </td>
                    <td>
                        <input type="number" name="cantidad" min="0">
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
