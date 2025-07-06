<?php 
    include "../../../helper/connection.php";

    $id = $_GET['fasilitas_id'];

    // Ambil nama file gambar dari database
    $query = "SELECT image FROM facilities WHERE facility_id = $id";
    $result = mysqli_query($connection, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $image_name = $row['image'];
        
        // Path lengkap ke file gambar
        $image_path = "../uploads/" . $image_name;
        
        // Hapus file gambar jika ada
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        
        // Hapus data dari database
        $sql = "DELETE FROM facilities WHERE facility_id = $id";
        if (mysqli_query($connection, $sql)) {
            echo "Data dan gambar berhasil dihapus";
            header('Location: ../fasilitas.php');
            exit();
        } else {
            echo "Data gagal dihapus: " . mysqli_error($connection);
        }
    } else {
        echo "Data tidak ditemukan";
    }

    header('Location: ../fasilitas.php');
    exit();
?>