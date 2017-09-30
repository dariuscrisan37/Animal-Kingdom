<?php include 'db-connect.php' ?>
<?php include 'random.php'?>
<?php
while($array = mysqli_fetch_array($result)) {
print_r($array);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Animal Kingdom</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="energy-view">energy</div>
<div id="energy"></div>
<div id="exit-button">
    <div id="child">X</div>
</div>
<div id="poza-animal" >
    <?php
    echo "<img src=\"get-image.php?id='$random'\">"


?>
</div>
<div id="nume-animal" ><?php
    echo $nume;
    ?>
</div>
<div id="litere"></div>
<div id="hint"></div>
</body>
<script src="game.js" type="text/javascript"></script>
</html>
