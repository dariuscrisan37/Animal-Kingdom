<?php
include "db-connect.php";

// Get the highest ID in the database
//$maxIdQuery = "SELECT Max(id) FROM animals;";
//$maxIdResult = mysqli_query($conn,$maxIdQuery);
//$maxArray = mysqli_fetch_array($maxIdResult);
//$maxId = $maxArray['Max(id)'];



// Get random images and texts from the database
//$random = rand(1, $maxId);
//$query = "SELECT * FROM animals WHERE id = '".$random."';";
$query = "SELECT * FROM animals ORDER BY RAND() LIMIT 1";
$result = mysqli_query($conn,$query);
$animal = mysqli_fetch_array($result);
$nume = $animal['word'];
$random = $animal['id'];

?>