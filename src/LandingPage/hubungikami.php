<?php
    session_start();
    require_once '../layout/_top.php';
    require_once '../../helper/connection.php';

    // HUBUNGI KAMI 
    if(isset($_POST["submit"])){
        $nama = $_POST["nama"];
        $nomor = $_POST["nomor"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];

        $stmt = $connection->prepare("INSERT INTO services(`name`, `number`, `email`, `subject`, `message`) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sisss", $nama, $nomor, $email, $subject, $message); 
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $_SESSION['toast_message'] = 'Data berhasil ditambahkan';
            $_SESSION['toast_type'] = 'success';
        } else {
            $_SESSION['toast_message'] = 'Pesan Gagal Dikirim';
            $_SESSION['toast_type'] = 'error';
        }

        $stmt->close();
        $connection->close();

        // Redirect untuk menghindari pengiriman ulang form
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
?>

<div class="py-5 grid gap-10">
    <span class="w-full h-48 bg-black flex items-center justify-center" style="background-image: url(https://images.unsplash.com/20/cambridge.JPG?q=80&w=2047&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D); background-position: center;">
        <div class="bg-black w-full h-[100%] opacity-50 flex items-center justify-center">
            <h1 class="text-center text-4xl font-bold text-white">Hubungi Kami</h1>
        </div>
    </span>


        <span class="flex items-center justify-center gap-5 text-white">
            <!-- ALAMAT -->
            <div class="relative bg-gray-800 h-[15rem] w-[20rem] p-5 rounded-box grid" data-aos ="zoom-out">
                <div class="py-2 px-3 rounded-full bg-gray-900 absolute -top-1 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex items-center justify-center">
                    <i class="bx bx-map text-4xl"></i>
                </div>
                <h1 class="text-center font-bold py-2 text-xl">Alamat</h1>    
                <?php 
                    include "../../helper/connection.php";

                    $sql = "SELECT * FROM address WHERE `isDefault` = 1 LIMIT 1";
                    
                    $query = mysqli_query($connection, $sql);
                    
                    $data = mysqli_fetch_array($query);

                if($data){
                    do{
                ?>
                    <p><span class="font-semibold text-white"><?php echo $data["address_name"]?></span> : <br/><?php echo $data["address_info"]?></p>

                <?php 
                    } while($data = mysqli_fetch_array($query)); 
                }else{
                ?>
                    <span class="text-center">
                        <p><span class="font-semibold">Tidak Ada DATA</span></p>
                    </span>
                <?php 
                }
                ?>
            </div>
            <!-- END ALAMAT -->

            <!-- NOMOR Telepon -->
            <div class="relative bg-gray-800 h-[15rem] w-[20rem] p-5 rounded-box grid" data-aos ="zoom-out">
                <div class="py-2 px-3 rounded-full bg-gray-900 absolute -top-1 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex items-center justify-center">
                    <i class="bx bx-phone text-4xl"></i>
                </div>
                
                <h1 class="text-center font-bold py-2 text-xl">Nomer Telepon</h1>    

                <span class="text-center">
                <?php 
                include "../../helper/connection.php";

                $sql = "SELECT * FROM phones WHERE isDefault = 1 LIMIT 2";

                $query = mysqli_query($connection, $sql);

                $data = mysqli_fetch_array($query);

                if($data){
                    do{
                ?>
                        <p><span class="font-semibold text-white"><?php echo $data["username"]?></span> : <?php echo $data["number"]?> </p>
                <?php 
                    } while($data = mysqli_fetch_array($query)); 
                }else{
                ?>
                    <span class="text-center">
                        <p><span class="font-semibold">Tidak Ada DATA</span></p>
                    </span>
                <?php 
                }
                ?>
                </span>
            </div>
            <!--END  NOMOR Telepon -->
            
            <!-- EMAIL -->
            <div class="relative bg-gray-800 h-[15rem] w-[20rem] p-5 rounded-box grid" data-aos ="zoom-out">
                <div class="py-2 px-3 rounded-full bg-gray-900 absolute -top-1 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex items-center justify-center">
                    <i class="bx bx-envelope text-4xl"></i>
                </div>

                <h1 class="text-center font-bold py-2 text-xl">Email</h1> 
                <?php 
                    include "../../helper/connection.php";

                    $sql = "SELECT * FROM emails WHERE `isDefault` = 1 LIMIT 2";
                    
                    $query = mysqli_query($connection, $sql);


                    $data = mysqli_fetch_array($query);
                    $no = 1;

                if($data){
                    do{
                ?>
                    <p><span class="font-semibold text-white"><?php echo "Email ". $no ?></span> : <br/><p class="text-center">
                        <?php echo $data["email"]?>
                    </p></p>
                <?php 
                    $no++;
                    } while($data = mysqli_fetch_array($query)); 
                }else{
                ?>
                    <span class="text-center">
                        <p><span class="font-semibold">Tidak Ada DATA</span></p>
                    </span>
                <?php 
                }
                ?>
                
            </div>
            <!-- END EMAIL -->
        </span>

        <!-- FORM MASUKAN -->
        <span class="mt-5">
            <h1 class="font-bold  text-3xl text-center">&mdash; Form Kontak &mdash; </h1>
            <span class="flex items-center justify-center">
                <form action="" method="POST" class="w-3/4 py-10 items-center justify-center text-black" data-aos ="zoom-out">
                    <div class="mx-auto w-1/2">
        
                        <div class="grid gap-5">
                            <span class="flex gap-2 w-full">
                                <span class="grow">
                                    <label for="content" class="text-lg font-semibold text-white">Nama</label>
                                    <label class="input input-bordered flex items-center gap-2 bg-white grow">
                                        <input required type="text" class="grow" placeholder="Nama" name="nama" id="nama" />
                                    </label>
                                </span>
            
                                <span class="grow">
                                    <label for="content" class="text-lg font-semibold text-white">Nomor</label>
                                    <label class="input input-bordered flex items-center gap-2 bg-white grow">
                                        <input required type="number" class="grow" placeholder="Nomor" name="nomor" id="nomor" required/>
                                    </label>
                                </span>
                            </span>
        
                            <span class="flex gap-2 w-full">
                                <span class="grow">
                                    <label for="content" class="text-lg font-semibold text-white">Email</label>
                                    <label class="input input-bordered flex items-center gap-2 bg-white grow">
                                        <input required type="email" class="grow" placeholder="Email" name="email" id="email" required/>
                                    </label>
                                </span>
        
                                <span class="grow">
                                    <label for="content" class="text-lg font-semibold text-white">Subject</label>
                                    <label class="input input-bordered flex items-center gap-2 bg-white grow">
                                        <input required type="text" class="grow" placeholder="Subject" name="subject" id="subject" required />
                                    </label>
                                </span>
                            </span>
        
                            <div class="flex flex-col">
                                <label for="content" class="text-lg font-semibold text-white">Pesan</label>
                                <textarea name="message" id="content" class="input input-bordered bg-white h-40 py-1" placeholder="Tulis Pesan" required></textarea>
                            </div>
        
                            <div class=" flex items-center justify-end gap-2 w-full">
                                <button class="btn px-10 text-white bg-green-600 hover:bg-green-900" type="submit" name="submit">Kirim</button> 
                            </div>
                        </div>
                    </div>
                </form>
            </span>
        </span>
        <!-- END FORM MASUKAN -->
</div>


<script>
    toastr.options = {
        "closeButton": true,
        'progressBar': true,
        "positionClass": "toast-top-right",
    }

    $(document).(function() {
        <?php
        if (isset($_SESSION['toast_message'])) {
            $type = $_SESSION['toast_type'];
            $message = $_SESSION['toast_message'];
            
            // echo "toastr.$type('$message');";
            echo "toastr.success('$message');";

            unset($_SESSION['toast_message']);
            unset($_SESSION['toast_type']);
        }
        ?>
    });
</script>

<?php
    require_once '../layout/_bottom.php';
?>