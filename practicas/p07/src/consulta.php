<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificación de Edad y Sexo</title>
</head>
<body>
    <h1>Verificación de Edad y Sexo</h1>
    <form method="POST" action="edadsexo.php">
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required>
        <br>
        <label for="sexo">Sexo:</label>
        <select id="sexo" name="sexo" required>
            <option value="femenino">Femenino</option>
            <option value="masculino">Masculino</option>
        </select>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
