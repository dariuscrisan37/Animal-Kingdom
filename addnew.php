<?php

include "db-connect.php";
//$conn = mysqli_connect('localhost', 'root', '', 'animals');
$MAX_FILE_SIZE = 5000000;
if(isset($_POST['btnsave'])) {
    $nume = $_POST['nume_animal'];
    $imgName = $_FILES['poza']['name'];
    $imgFile = addslashes(file_get_contents($_FILES["poza"]["tmp_name"]));
    $imgSize = $_FILES['poza']['size'];
    $nume = strtoupper($nume);
    if (empty($nume)) {
        // Verifing the name filed
        $errMSG = "Va rog adaugati numele animalului";
    } // Verifing the file field
    else if (empty($imgName)) {
        $errMSG = "Va rog adaugati imaginea";
    } else {
        if ($imgName) {
            $extension = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
            if (($extension != "jpg") && ($extension != "jpeg")
                && ($extension != "png") && ($extension != "gif")
            ) {
                $errMSG = "Format necunoscut, alegeti alta imagine";
            } else {
                $size = $imgSize;

                if ($size > $MAX_FILE_SIZE) {
                    $errMSG = "Alegeti o imagine mai mica!";
                }
            }
        }

    }
    $sql = "INSERT INTO animals(word, animals) VALUE ('$nume', '$imgFile')";
    if (mysqli_query($conn, $sql)) {

        header("refresh:5, database.php"); //redirect page after 5 seconds.
    } else {
        echo $sql;
    }
    mysqli_close($conn);
    // if no error occured, continue ....

}

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Image</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
</head>
<body>
<div class="container">


    <div class="page-header">
        <h1 class="h2">Adauga un animal <a class="btn btn-default" href="database.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a></h1>
    </div>

    <?php
    if(isset($errMSG)){
        ?>
        <div class="alert alert-danger">
            <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
        </div>
        <?php
    }
    else if(isset($successMSG)){
        ?>
        <div class="alert alert-success">
            <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
    }
    ?>
    <form method="post" enctype="multipart/form-data" class="form-horizontal">

    <table class="table table-bordered table-responsive">

        <tr>
            <td><label class="control-label">Nume Animal</label></td>
            <td><input class="form-control" type="text" name="nume_animal" placeholder="Adaugati numele" value="" /></td>
        </tr>

       <tr>
            <td><input type="hidden" name="MAX_FILE_SIZE" value="1048576"/>
                <label class="control-label">Poza Animal</label></td>
            <td><input class="input-group" type="file" name="poza" size="30" /></td>
        </tr>

        <tr>
            <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
                    <span class="glyphicon glyphicon-save"></span> &nbsp; save
                </button>
            </td>
        </tr>

    </table>

</form>
</body>
</html>
