<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verifica si se ha enviado un archivo
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $targetDir = "public/uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);

        // Mueve el archivo al directorio de destino
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "Imagen subida exitosamente.";
        } else {
            echo "Error al subir la imagen.";
        }
    } else {
        echo "Error: No se ha seleccionado ningún archivo.";
    }
}
?>
