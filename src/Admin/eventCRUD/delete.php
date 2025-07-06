<?php 
    include "../../../helper/connection.php";

    $id = $_GET['event_id'];

    
        // Hapus data dari database
        $sql = "DELETE FROM events WHERE event_id = $id";
        if (mysqli_query($connection, $sql)) {
            echo "Data berhasil dihapus";
            header('Location: ../event.php');
            exit();
        } else {
            echo "Data gagal dihapus: " . mysqli_error($connection);
        }

    header('Location: ../event.php');
    exit();
?>