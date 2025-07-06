<?php
include "../../../helper/connection.php";

$title = $_POST["title"];
$id = $_POST["id"];

// Folder penyimpanan berkas/file 
$uploaddir = "../uploads/";

// Ambil informasi gambar lama
$sql_old_image = "SELECT img FROM eskuls WHERE eskul_id = '$id'";
$result_old_image = mysqli_query($connection, $sql_old_image);
$row_old_image = mysqli_fetch_assoc($result_old_image);
$old_image = $row_old_image['img'];

// Inisialisasi variabel untuk nama file baru
$new_image = null;

// Cek apakah ada file yang diupload
if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
    // Nama file temporary yang akan disimpan di server 
    $lokasifile = $_FILES['img']['tmp_name'];

    // Membaca nama file yang akan diupload 
    $namafile = $_FILES['img']['name'];

    // Menggabungkan nama folder dan nama file 
    $uploadfile = $uploaddir . $namafile;

    if (move_uploaded_file($lokasifile, $uploadfile)) { 
        echo "Nama File <b>$namafile</b> sukses di upload";

        // Hapus file lama jika ada
        if ($old_image && file_exists($uploaddir . $old_image)) {
            unlink($uploaddir . $old_image);
        }

        $new_image = $namafile;
    } else {
        echo "File gagal diupload. Error: " . $_FILES['img']['error'];
        exit();
    }
} else {
    $new_image = $old_image;
}

// Update database
$sql = "UPDATE eskuls SET 
        title = '$title', 
        img = " . ($new_image ? "'$new_image'" : "NULL") . "
        WHERE eskul_id = '$id'";

$hasil = mysqli_query($connection, $sql);

if ($hasil) {
    header('Location: ../eskul.php');
    exit();
} else {
    echo "Error: " . mysqli_error($connection);
}