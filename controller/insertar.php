<?php
// Incluir el archivo de conexión a la base de datos
include_once '../conexion.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establecer la conexión a la base de datos
    $conexion = conectaDB();

    // Recibir los datos del formulario
    $nombre = $_POST['NomProducto'];
    $precio = $_POST['Precio'];
    $existencia = $_POST['Existencia'];

    // Preparar la consulta SQL para insertar los datos en la tabla
    $sql = "INSERT INTO tb_productos (Nombre, Precio, Ext) VALUES (?, ?, ?)";

    if ($stmt = $conexion->prepare($sql)) {
        // Vincular las variables a la declaración preparada como parámetros
        $stmt->bind_param("sdi", $nombre, $precio, $existencia);

       if ($stmt->execute()) {
    // La inserción fue exitosa
    header("Location: dashboard.php?success=1"); // Redirige al dashboard con un mensaje de éxito
    exit();
} else {
    // Si ocurrió un error en la inserción
    header("Location: dashboard.php?error=1"); // Redirige al dashboard con un mensaje de error
    exit();
}

        // Cerrar la declaración preparada
        $stmt->close();
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}
?>

?>

