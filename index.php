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
<div id="energy-view">energy</div>
<div id="energy"></div>
<a href="#"><div id="exit-button">
    <div id="child">X</div>
    </div></a>
<div id="poza-animal" >
<!--image from database-->
    <?php
    echo "<img src=\"get-image.php?id='$random'\">"
?>
</div>
<div id="nume-animal" ><?php
    echo $nume;
    ?>
</div>

<div id="panouLitere">

    <div id="litere"></div>
    <div id="used"></div>
</div>
<div id="hint"></div>

<div>
    <audio id="sndCorrect" preload="auto">
        <source src="audio/goodbell.mp3">
    </audio>
    <audio id="sndBad" preload="auto">
        <source src="audio/bad.mp3">
    </audio>
    <audio id="sndWin" preload="auto">
        <source src="audio/win.mp3">
    </audio>
    <audio id="sndLose" preload="none">
        <source src="audio/lost.mp3">
    </audio>
</div>
<div id="myNav" class="overlay">
    <div class="overlay-content">
        <div id="mesaj"></div>
        <a href="index.php">Play Again</a>
    </div>

</div>
<a id="img" href="database.php"><img src="img/logo.png"></a>

<script src="game.js" type="text/javascript"></script>
</body>

</html>
