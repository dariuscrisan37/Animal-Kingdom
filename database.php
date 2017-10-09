<?php

include "db-connect.php";

$conn = mysqli_connect('localhost', 'root', '', 'animals');

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customize</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel=stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
</head>
<body style="background: #B5C68E">

<div class="container">

    <div class="header">
        <h1 class="h1">Toate animalele  <a class="btn btn-default" href="addnew.php">
                <span class="glyphicon glyphicon-plus"></span>&nbsp; Adauga </a></h1>

    </div>

</div>

<div class="row">
    <?php
    $sql = "SELECT * FROM animals";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    extract($row);
    $id = $row["id"];
    ?>
    <div class="col-xs-3 text-center">
        <p class="header h2"><?php echo $id."&nbsp;/&nbsp;". $row["word"]; ?></p>
        <img src='get-image.php?id=<?php echo $id ?>' class="img-rounded" width="250px" height="250px" />
        <p class="page-header">
				<span>
				<a class="btn btn-info" href="edit.php?id=<?php echo $row['id']; ?>" title="click for edit" onclick="return confirm('Vrei sa editezi?')"><span class="glyphicon glyphicon-edit"></span> Edit</a>
				<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id'];?>" title="click for delete" onclick="return confirm('Vrei sa stergi?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
				</span>
        </p>
    </div>
    <?php
    }
    }else {
        ?>
        <div class="col-xs-12">
            <div class="alert alert-warning">
                <span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
            </div>
        </div>
        <?php
    }

    ?>


</div>
</body>
</html>
