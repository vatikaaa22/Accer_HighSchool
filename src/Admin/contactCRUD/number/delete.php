<?php 
    include "../../../../helper/connection.php";

    $id = $_GET['phone_id'];

    
        // Hapus data dari database
        $sql = "DELETE FROM phones WHERE phone_id = $id";
        if (mysqli_query($connection, $sql)) {
            echo "Data berhasil dihapus";
            header('Location: ../../contact.php');
            exit();
        } else {
            echo "Data gagal dihapus: " . mysqli_error($connection);
        }

    header('Location: ../../contact.php');
    exit();
?>