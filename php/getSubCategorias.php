<?php
require 'config.php';
require 'Database.php';

// Obtenemos el id de la categoría
$categoriaId = $_POST['categoriaId'];

// Creamos una nueva instancia de la base de datos
$db = new Database();

// Obtenemos las subcategorías de la categoría seleccionada
$subcategorias = $db->getSubcategorias($categoriaId);

// Creamos un array para almacenar la respuesta
$response = array();

// Iteramos sobre las subcategorías y las almacenamos en el array de respuesta
foreach ($subcategorias as $subcategoria) {
    $subcategory = new stdClass();
    $subcategory->id = $subcategoria['id'];
    $subcategory->nombre = $subcategoria['nombre'];
    $response[] = $subcategory;
}

// Devolvemos la respuesta en formato JSON
echo json_encode($response);