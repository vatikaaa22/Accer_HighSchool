<?php
require_once '../layout/_top.php';
?>
    <div class="hero min-h-screen" style="background-image: url(https://images.unsplash.com/20/cambridge.JPG?q=80&w=2047&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);" class="bg-opacity-90">
        <div class="hero-content flex-row-reverse text-white w-full">
            <img src="https://images.unsplash.com/photo-1527891751199-7225231a68dd?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="max-w-sm rounded-lg shadow-2xl" />
            <div class="bg-gray-800 ps-10 py-8 rounded-box opacity-80 grow min-w-7xl" >
                <h1 class="text-5xl font-bold">Selamat Datang</h1>
                <p class="text-xl">Website Accer High School</p>
                <p class="py-6">Berdiri sejak 13 mei 2024 pukul 14:30 wib sleman Yogyakarta.</p>
                <a class="btn text-white font-bold bg-black border-none" href="#berita" >Lihat lainnya !</a>
            </div>
        </div>
    </div>

    <div class="w-full min-[10rem] " id="berita">
        <h1 class="text-white text-center font-bold text-3xl py-10 bg-gray-800 ">&mdash;  Berita dan Acara &mdash; </h1>

        <div class="flex items-center justify-center bg-gray-800">

            <div class="flex items-center justify-center gap-5 text-white pb-10 flex-wrap" data-aos="fade-up">
    
            <?php
                include '../../helper/connection.php';
    
                $sql = "SELECT * FROM informations LIMIT 6";
                $query = mysqli_query($connection, $sql);
    
                $no = 1;
    
                if(mysqli_num_rows($query) == 0){
                    echo "<span class='h-screen flex items-center justify-center'>
                    <h1 class='text-center text-2xl font-bold'>Belum ada berita</h1>
                    </span>";
                }
    
                while($data = mysqli_fetch_array($query)){
            ?>
    
                <div class="flex items-start gap-5 max-w-lg flex-col h-[40rem] justify-center shadow-lg border border-gray-800 bg-gray-300 text-black rounded-box px-5">
                        <img src="../Admin/uploads/<?php echo $data["image"] ?>" class="max-w-md rounded-lg shadow-2xl max-h-60" />
                        <h1 class="text-3xl font-bold"><?php echo $data["title"] ?></h1>
                        <p class="py-3 text-justify max-w-md max-h-32 overflow-hidden"><?php echo $data["description"] ?></p>
                        <a class="btn font-bold" href="./berita.php">Selengkapnya !</a>    
                </div>
            <?php
                $no++;
                }
            ?>
    
            </div>
        </div>
     
    </div>

<?php
    require_once '../layout/_bottom.php';
?>

