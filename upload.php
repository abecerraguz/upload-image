<?php

    $submit = isset($_POST["submit"]) ? $_POST["submit"] : '';


    if ( $_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["imagen"])) {

        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["imagen"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $imagen =  "uploads/" . $_FILES["imagen"]["name"];
     
        // Comprueba si el archivo de imagen es una imagen real o una imagen falsa
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["imagen"]["tmp_name"]);
            if ($check !== false) {
                echo "El archivo es una imagen. - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "El archivo no es una imagen.";
                $uploadOk = 0;
            }
        }


        // Compruebe si el archivo ya existe
        if (file_exists($targetFile)) {
            echo "Lo sentimos, el archivo ya existe.";
            $uploadOk = 0;
        }

        // Check file size (adjust as needed)
        if ($_FILES["imagen"]["size"] > 500000) {
            echo "Lo sentimos, su archivo es demasiado grande.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        $allowedFormats = ["jpg", "jpeg", "png", "gif", "webp", "avif"];
        if (!in_array($imageFileType, $allowedFormats)) {
            echo "Lo sentimos, sólo se permiten archivos WEBP, AVIF, JPG, JPEG, PNG y GIF.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if($uploadOk == 0){
                echo "Lo sentimos, su archivo no fue subido.";
        }else{
    
            $dir = "uploads/";
            $fichero = $_SERVER['DOCUMENT_ROOT']."/{$dir}";
            echo $fichero;

            // if(isset($_FILES["imagen"]) && $_FILES["imagen"] != null){
            //     $fichero = $_SERVER['DOCUMENT_ROOT']."/{$dir}";
                    
            //         if(  move_uploaded_file($_FILES["imagen"]["tmp_name"], $fichero.basename($_FILES["imagen"]["tmp_name"])  )   ){
            //             echo "Subido correctamente";
            //         }else{
            //             echo $fichero;
            //             echo "<br>Error al intentar subir";
            //         }
           
            // }
                


                 
        }
    

   
    } else {
        echo "El formulario no se ha enviadoooooooo.";
    }




?>