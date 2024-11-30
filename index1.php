<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio de archivos</title>
</head>
<body>
    <form action="./datos.php" method="POST" enctype="multipart/form-data">
        <div>
            <label>Nombre</label>
                <input type="text" name="Nombre" placeholder="Ingrese Nombre">
        </div>
        <div>
            <label>Apellido</label>
                <input type="text" name="Apellido" placeholder="Ingrese Apellido">
        </div>
        <div>
            <label>Fecha de nacimiento</label>
                <input type="date" name="Fecha_de_nacimiento" placeholder="">
        </div>
        <div>
            <label>Documento de identidad</label>
                <input type="double" name="DNI" placeholder="Ingrese DNI">
        </div>
        <div>
            <label>Correo Electronico</label>
                <input type="text" name="Email" placeholder="Ingrese Email">
        </div>
        <div>
            <label>Celular</label>
                <input type="double" name="Celular" placeholder="Ingrese Numero de Celular">
        </div>
        <div>
            <label>Pais</label>
                <input type="text" name="Pais" placeholder="Ingrese Pais">
        </div>
    <!-- </form>
    <form action="./datos.php" method= "POST" enctype="multipart/form-data"> -->
    <label>Archivo</label>
    <input type="file" name="archivo">
    <br>
    <input type="submit" value="Enviar">
    </form>
</body>
</html>