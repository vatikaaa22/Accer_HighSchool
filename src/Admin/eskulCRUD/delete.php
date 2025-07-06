<?php 
    include "../../../helper/connection.php";

    $id = $_GET['eskul_id'];

    
        // Hapus data dari database
        $sql = "DELETE FROM eskuls WHERE eskul_id = $id";
        if (mysqli_query($connection, $sql)) {
            echo "Data berhasil dihapus";
            header('Location: ../eskul.php');
            exit();
        } else {
            echo "Data gagal dihapus: " . mysqli_error($connection);
        }

    header('Location: ../eskul.php');
    exit();
?>