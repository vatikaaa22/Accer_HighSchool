<?php
    include "../../../../helper/connection.php";

    $name = $_POST["email"];
    $user_id = 1;
    $default = isset($_POST["default"]) && $_POST["default"] ? 1 : 0;

    $name = mysqli_real_escape_string($connection, $name);

    $stmt = $connection->prepare("INSERT INTO emails(email, `isDefault`, user_id) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $name, $default, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(["success" => "Data inserted successfully"]);
        header('Location: ../../contact.php');
    } else {
        echo json_encode(["error" => "Failed to insert data"]);
    }

    $stmt->close();
    $connection->close();
?>