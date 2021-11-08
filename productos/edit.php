<?php
require_once("../config.php");

if(!empty($_POST)){
      $idcategorias = $_POST['idcategorias'];
      $descripcion = $_POST['descripcion'];
      $estatus = $_POST['estatus'];
      $query = "update Categorias set Descripcion = '$descripcion', Estatus='$estatus' where idCategorias = $idcategorias;";
      $stmt = $conn->prepare($query);
      $stmt->execute();
      header("Location: index.php");
        exit;
} else {

    $id =  $_GET['id'];
    $query = "select * from categorias where idCategorias = $id;";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $category = $stmt->fetch();
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
    <h1>Editar categoría</h1>
     <a href="index.php">Regresar</a>

    <form method="POST">

        <input type="hidden" name="idcategorias" value="<?php echo $category['idCategorias']?>">
        <p>
            Descripción
            <input type="text" name="descripcion" value="<?php echo $category['Descripcion']?>" required>
        </p>
         <p>
            Estatus
            <select name="estatus" required>
                <option value="">Seleccionar</option>
                <option value="En existencia" <?php if($category['Estatus']=='En existencia'){ echo "selected"; }?> >En existencia</option>
                <option value="Agotado" <?php if($category['Estatus']=='Agotado'){ echo "selected"; }?>>Agotado</option>
            </select>
        </p>
        <p>
            <input type="submit" value="Aceptar">
        </p>
    </form>
</body>
</html>

<?php } ?>