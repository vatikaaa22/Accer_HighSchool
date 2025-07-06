<?php
    include "../../../helper/connection.php";

    $title = $_POST["title"];

    // Nama file temporary yang akan disimpan di server 
    $lokasifile = $_FILES['img']['tmp_name'];

    // Membaca nama file yang akan diupload 
    $namafile = $_FILES['img']['name'];

    // Folder penyimpanan berkas/file 
    $uploaddir = "../uploads/";

    // Periksa apakah direktori ada, jika tidak, buat
    if (!file_exists($uploaddir) && !is_dir($uploaddir)) {
        mkdir($uploaddir, 0777, true);
    }

    // Menggabungkan nama folder dan nama file 
    $uploadfile = $uploaddir . $namafile;
    
    // Jika file berhasil di upload 
    if (move_uploaded_file($lokasifile, $uploadfile)) { 
        echo "Nama File <b>$namafile</b> sukses di upload";

        // Masukkan informasi file ke dalam database 
        $sql = "INSERT INTO eskuls(title, img, user_id) 
                VALUES('$title', '$namafile', 1)"; 
        $hasil = mysqli_query($connection, $sql);
        
        if ($hasil) {
            header('Location: ../eskul.php');
            exit();
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    } else {
        echo "File gagal diupload. Error: " . $_FILES['img']['error'];
    }
?>