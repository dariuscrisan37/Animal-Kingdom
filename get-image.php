<?php

$id = $_GET['id'];
// do some validation here to ensure id is safe

include "db-connect.php";

$sql = "SELECT * FROM animals WHERE id=$id";
$result = $conn->query($sql);

$row = $result->fetch_assoc();
$conn->close();

header("Content-type: image/jpeg");
echo $row['animals'];
?>