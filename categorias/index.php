<?php
require_once("../config.php");

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
    <h1>Categorias</h1>
    <a href="create.php">Crear</a>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Descripcion</th>
                <th>Estatus</th>
            </tr>

            <?php foreach($categorias as $categoria) { ?>

                <tr>
                    <td><?php echo $categoria['idCategorias']?></td>
                    <td><?php echo $categoria['Descripcion']?></td>
                    <td><?php echo $categoria['Estatus']?></td>
                    <td><a href="edit.php?id=<?php echo $categoria['idCategorias']?>">Editar</a></td>
                </tr>

            <?php } ?>

        </thead>
    </table>
</body>
</html>