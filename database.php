<?php

include "db-connect.php";

$sql = "SELECT * FROM animals";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id = $row["id"];
        echo "id: " . $id .  " - animals " . $row["word"]. "<br>";
        echo "<img src='get-image.php?id=$id'>";
    }

} else {
    echo "0 results";
}
$conn->close();
?>