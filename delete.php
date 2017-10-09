<?php
include "db-connect.php";
$sql = "DELETE FROM animals WHERE id='$_GET[id]'";
if (mysqli_query($conn, $sql)) {
    header("refresh:0 ,url=database.php");
} else {
    echo "Error deleting image";
}
?>