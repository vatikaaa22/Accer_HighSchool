<?php
include "../../../helper/connection.php";

$name = $_POST["name"];
$id = $_POST["id"];
$description = $_POST["description"];

// Folder penyimpanan berkas/file 
$uploaddir = "../uploads/";

// Periksa apakah direktori ada, jika tidak, buat
if (!file_exists($uploaddir) && !is_dir($uploaddir)) {
    mkdir($uploaddir, 0777, true);
}

// Ambil informasi gambar lama
$sql_old_image = "SELECT image FROM facilities WHERE facility_id = '$id'";
$result_old_image = mysqli_query($connection, $sql_old_image);
$row_old_image = mysqli_fetch_assoc($result_old_image);
$old_image = $row_old_image['image'];

// Inisialisasi variabel untuk nama file baru
$new_image = null;

// Cek apakah ada file yang diupload
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    // Nama file temporary yang akan disimpan di server 
    $lokasifile = $_FILES['image']['tmp_name'];

    // Membaca nama file yang akan diupload 
    $namafile = $_FILES['image']['name'];

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
        echo "File gagal diupload. Error: " . $_FILES['image']['error'];
        exit();
    }
} else {
    $new_image = $old_image;
}

// Update database
$sql = "UPDATE facilities SET 
        name = '$name', 
        image = " . ($new_image ? "'$new_image'" : "NULL") . ", 
        description = '$description' 
        WHERE facility_id = '$id'";

$hasil = mysqli_query($connection, $sql);

if ($hasil) {
    header('Location: ../fasilitas.php');
    exit();
} else {
    echo "Error: " . mysqli_error($connection);
}
?>