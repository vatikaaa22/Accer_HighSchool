<?php
include "../../../helper/connection.php";

$name = mysqli_real_escape_string($connection, $_POST["title"]);
$id = mysqli_real_escape_string($connection, $_POST["id"]);
$event_date = mysqli_real_escape_string($connection, $_POST["event_date"]);

$sql = "UPDATE events SET 
    name = ?, 
    event_date = ?, 
    user_id = 1  
    WHERE event_id = ?";

$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, "ssi", $name, $event_date, $id);
$hasil = mysqli_stmt_execute($stmt);

if ($hasil) {
    header('Location: ../event.php');
    exit();
} else {
    echo "Error: " . mysqli_error($connection);
}
?>