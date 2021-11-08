<?php
require_once("../config.php");

if(!empty($_POST)){
     $nombre = $_POST['nombre'];
     $precio = $_POST['precio'];
     $idcategorias = $_POST['idcategorias'];
     $existencia = $_POST['existencia'];
     
     $query = "insert into Productos(Nombre,Precio,Existencia,Categorias_idCategorias ) 
                values('$nombre','$precio','$existencia','$idcategorias');";
     $stmt = $conn->prepare($query);
     $stmt->execute();
     header("Location: index.php");
     exit;
} else {
    
    $query = "SELECT * FROM categorias";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $categorias = $stmt->fetchAll();
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
    <h1>Crear producto</h1>
     <a href="index.php">Regresar</a>

    <form method="POST">
        <p>
            Nombre
            <input type="text" name="nombre" required>
        </p>
        <p>
            Precio
            <input type="text" name="precio" required>
        </p>
        <p>
            Categoría
            <select name="idcategorias" id="">
                  <option value="">Seleccionar</option>
                   <?php foreach($categorias as $categoria) { ?>

                    <option value="<?php echo $categoria['idCategorias']; ?>"><?php echo $categoria['Descripcion']; ?></option>

                    <?php } ?>

            </select>
        </p>

         <p>
            Estatus
            <select name="existencia" required>
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