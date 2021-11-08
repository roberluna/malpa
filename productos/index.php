<?php
require_once("../config.php");

    $query = "SELECT * FROM Productos inner join Categorias on Productos.Categorias_idCategorias = Categorias.idCategorias";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $productos = $stmt->fetchAll();
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
    <h1>Productos</h1>
    <a href="create.php">Crear</a>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Existencia</th>
                <th>Categoria</th>
            </tr>

            <?php foreach($productos as $producto) { ?>

                <tr>
                    <td><?php echo $producto['idProductos']?></td>
                    <td><?php echo $producto['Nombre']?></td>
                    <td><?php echo $producto['Precio']?></td>
                    <td><?php echo $producto['Existencia']?></td>
                    <td><?php echo $producto['Descripcion']?></td>
                    <td><a href="edit.php?id=<?php echo $producto['idProductos']?>">Editar</a></td>
                </tr>

            <?php } ?>

        </thead>
    </table>
</body>
</html>