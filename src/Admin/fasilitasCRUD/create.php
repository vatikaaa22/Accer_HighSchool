<?php
    include "../../../helper/connection.php";

    // Nama file temporary yang akan disimpan di server 
    $lokasifile = $_FILES['image']['tmp_name'];

    // Membaca nama file yang akan diupload 
    $namafile = $_FILES['image']['name'];

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

        $name = $_POST["name"];
        $description = $_POST["description"];
        $user_id = 1;

        $name = mysqli_real_escape_string($connection, $name);

        $stmt = $connection->prepare("INSERT INTO facilities(name, description, `user_id`, image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $name, $description, $user_id, $namafile);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo json_encode(["success" => "Data inserted successfully"]);
            header('Location: ../fasilitas.php');
            exit();
        } else {
            echo json_encode(["error" => "Failed to insert data"]);
        }

        $stmt->close();
        $connection->close();
    }
?>