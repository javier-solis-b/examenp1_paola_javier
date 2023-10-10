<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("location: index.php");
    exit;
}

if (isset($_GET['idp'])) {
    $idProducto = $_GET['idp'];

    // Realiza la conexión a la base de datos
    include_once '../conexion.php';


    $con = conectaDB();

    // Prepara la consulta para eliminar el producto
    $sql = "DELETE FROM tb_productos WHERE idPro = $idProducto";

    // Ejecuta la consulta
    if (mysqli_query($con, $sql)) {
        
         header("Location: dashboard.php?success=1");
    } else {
        echo "Error al eliminar el producto: " . mysqli_error($con);
    }

    // Cierra la conexión a la base de datos
    mysqli_close($con);
} else {
    echo "No se ha especificado un producto para eliminar.";
}
?>

