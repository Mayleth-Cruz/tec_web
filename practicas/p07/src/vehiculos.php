<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Vehículos</title>
</head>
<body>
    <h1>Consulta de Vehículos</h1>
    <form method="POST" action="consultave.php">
        <label for="matricula">Ingrese la matrícula del vehículo:</label>
        <input type="text" id="matricula" name="matricula">
        <br><br>
        <input type="submit" value="Consultar">
    </form>

    <h2>O consulta todos los vehículos:</h2>
    <form method="POST" action="consultave.php">
        <input type="hidden" name="todos" value="1">
        <input type="submit" value="Mostrar todos los vehículos">
    </form>
</body>
</html>
