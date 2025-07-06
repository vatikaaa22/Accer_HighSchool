<?php
    include "../../../../helper/connection.php";

    $address = $_POST["address_name"];
    $address_info = $_POST["address_info"];
    $default = isset($_POST["default"]) && $_POST["default"] ? 1 : 0;
    $user_id = 1;

    $address = mysqli_real_escape_string($connection, $address);

    $stmt = $connection->prepare("INSERT INTO address(address_name, `isDefault`, user_id, address_info) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $address,  $default, $user_id, $address_info);
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