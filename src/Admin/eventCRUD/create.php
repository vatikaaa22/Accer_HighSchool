<?php
    include "../../../helper/connection.php";

    $event_date = $_POST["date"];
    $name = $_POST["name"];

    $event_date = mysqli_real_escape_string($connection, $event_date);
    $name = mysqli_real_escape_string($connection, $name);

    // Corrected the bind_param type for $name from "si" to "ss" as both parameters are strings
    $stmt = $connection->prepare("INSERT INTO events(event_date, `name`) VALUES (?, ?)");
    $stmt->bind_param("ss", $event_date, $name); // Changed "si" to "ss"
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(["success" => "Data inserted successfully"]);
        // Moved header before any output to ensure it works correctly
        header('Location: ../event.php');
        exit(); // Added exit to prevent further script execution after redirection
    } else {
        echo json_encode(["error" => "Failed to insert data"]);
    }

    $stmt->close();
    $connection->close();
?>