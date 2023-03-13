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
        <h1>Orden de Produccion: Registro Especifiaciones</h1>
        <form>
            <table>
                <tr>
                    <td>Viscocidad (n°4): </td>
                    <td>
                        <input type="text" name="viscocidad">
                    </td>
                </tr>
                <tr>
                    <td>Viscocidad (st): </td>
                    <td>
                        <input type="text" name="viscocidad_2">
                    </td>
                </tr>
                <tr>
                    <td>Brillo: </td>
                    <td>
                        <input type="number" name="brillo">°
                    </td>
                </tr>
                <tr>
                    <td>Solidos: </td>
                    <td>
                        <input type="number" name="brillo" min="0" max="100">%
                    </td>
                </tr>
                <tr>
                    <td>Densidad: </td>
                    <td>
                        <input type="number" name="densidad">
                    </td>
                </tr>
                <tr>
                    <td>Ablandamiento: </td>
                    <td>
                        <input type="number" name="ablandamiento">
                    </td>
                </tr>
                <tr>
                    <td>Acidez: </td>
                    <td>
                        <input type="number" name="acidez">
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
