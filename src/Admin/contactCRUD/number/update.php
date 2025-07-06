<?php
include "../../../../helper/connection.php";

if (isset($_GET['default'], $_GET['id'])) {
    $defaultValue = $_GET['default'];
    $id = $_GET['id'];

    $newDefaultValue = $defaultValue == 1 ? 0 : 1;
    
    $stmt = $connection->prepare("UPDATE phones SET `isDefault` = ? WHERE phone_id = ?");
    $stmt->bind_param("ii", $newDefaultValue, $id);
    $stmt->execute();

    $stmt->close();
    $connection->close();

    header('Location: ../../contact.php');
    exit;
} else {
    header('Location: ../../contact.php');
    exit;
}
?>