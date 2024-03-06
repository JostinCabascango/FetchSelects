<?php
require_once "config.php";
require_once "Database.php";

// Create a new Database instance
$db = new Database();

// Fetch all categories
$categorias = $db->getCategorias();

// Generate options for the select dropdown
function generateOptions($categorias)
{
    $options = '';
    foreach ($categorias as $categoria) {
        $options .= "<option value='{$categoria['id']}'>{$categoria['nombre']}</option>";
    }
    return $options;
}

$options = generateOptions($categorias);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<form action="getSubCategorias.php" method="post">
    <select name="categoria" id="categoria">
        <?php echo $options; ?>
    </select>
    <select name="subcategoria" id="subcategoria">
        <option value="0">Selecciona una categoría</option>
    </select>
    <input type="submit" value="Enviar">
</form>
<script src="../js/script.js"></script>
</body>
</html>