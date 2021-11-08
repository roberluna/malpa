<?php
require_once("../config.php");

if(!empty($_POST)){
     $descripcion = $_POST['descripcion'];
     $estatus = $_POST['estatus'];
     $query = "insert into categorias(Descripcion,Estatus) values('$descripcion','$estatus');";
     $stmt = $conn->prepare($query);
     $stmt->execute();
     header("Location: index.php");
     exit;
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Crear categoría</h1>
     <a href="index.php">Regresar</a>

    <form method="POST">
        <p>
            Descripción
            <input type="text" name="descripcion" required>
        </p>
         <p>
            Estatus
            <select name="estatus" required>
                <option value="">Seleccionar</option>
                <option value="En existencia">En existencia</option>
                <option value="Agotado">Agotado</option>
            </select>
        </p>
        <p>
            <input type="submit" value="Aceptar">
        </p>
    </form>
</body>
</html>

<?php } ?>