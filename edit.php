<?php

include "db-connect.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM animals WHERE id=$id";
    $select = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($select);
    $name = $row['word'];
if(isset($_POST['btn_save_updates'])) {
    $name = $_POST['word'];
    $imgFile = addslashes(file_get_contents($_FILES["user_image"]["tmp_name"]));
    $imgName = $_FILES["user_image"]['name'];
    $imgSize = $_FILES["user_image"]['size'];
    $name = strtoupper($name);
    if ($imgName) {
        $extension = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        if (($extension != "jpg") && ($extension != "jpeg")
            && ($extension != "png") && ($extension != "gif")
        ) {
            $errMSG = "Format necunoscut, alegeti alta imagine";
        }


    }
    $sql = "UPDATE animals SET animals='$imgFile',word='$name' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {

        header("refresh:2 ,url=database.php");
    } else {
        echo $errMSG = "eroare la incarcarea imaginii " . $sql . "<br>" . mysqli_error($conn);
    }

}
mysqli_close($conn);
?>

<!doctype html>
<html lang="en">
<head>
    <script type="text/javascript">

    </script>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customize</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel=stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
</head>
<body>

<div class="container">


    <div class="page-header">
        <h1 class="h2">Edit <a class="btn btn-default" href="database.php"> Toate Animalele </a></h1>
    </div>

    <div class="clearfix"></div>

    <form method="post" enctype="multipart/form-data" class="form-horizontal">


        <?php
        if(isset($errMSG)){
            ?>
            <div class="alert alert-danger">
                <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
            </div>
            <?php
        }
        ?>


        <table class="table table-bordered table-responsive">

            <tr>
                <td><label class="control-label">Nume </label></td>
                <td><input class="form-control" type="text" name="word" value="<?php echo $name; ?>" required /></td>
            </tr>


            <tr>
                <td><label class="control-label">Imagine </label></td>
                <td>
                    <p><img src='get-image.php?id=<?php echo $id ?>' height="150" width="150" /></p>
                    <input class="input-group" type="file" name="user_image" accept="image/*" onchange="previewFile()"/>

                </td>
            </tr>

            <tr>
                <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
                        <span class="glyphicon glyphicon-save"></span> Update
                    </button>

                    <a class="btn btn-default" href="database.php"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>

                </td>
            </tr>

        </table>

    </form>
    <script>
        function previewFile() {
            var preview = document.querySelector('img');
            var file    = document.querySelector('input[type=file]').files[0];
            var reader  = new FileReader();

            reader.addEventListener("load", function () {
                preview.src = reader.result;
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>
