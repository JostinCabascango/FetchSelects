<?php

class Database
{
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        if ($this->conn->connect_error) {
            die("Error con la conexión" . $this->conn->connect_error);
        }
    }

    public function getCategorias()
    {
        $sql = "SELECT id, nombre FROM categorias";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function getSubcategorias($idCategoria)
    {
        $sql = "SELECT id, nombre FROM subcategorias WHERE id_categoria = $idCategoria";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

}

?>
