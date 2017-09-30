<?php
include "db-connect.php";

// Get the highest ID in the database
$maxIdQuery = "SELECT Max(id) FROM animals;";
$maxIdResult = mysqli_query($conn,$maxIdQuery);
$maxArray = mysqli_fetch_array($maxIdResult);
$maxId = $maxArray['Max(id)'];



// Get random images and texts from the database
$random = rand(1, $maxId);
$query = "SELECT * FROM animals WHERE id = '".$random."';";
$result = mysqli_query($conn,$query);
$array = mysqli_fetch_array($result);
$nume = $array['word'];

?>