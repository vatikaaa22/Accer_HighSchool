<?php
require_once '../layout/_top.php';
?>

<div class="text-sm breadcrumbs bg-black opacity-50 pt-20 pb-3 text-white ps-5">
    <ul>
        <li><a>Beranda</a></li> 
        <li><a>Tentang Sekolah</a></li> 
    </ul>
</div>

<div class="relative min-h-screen py-10 bg-cover bg-center text-white" style="background-image: url(https://images.unsplash.com/20/cambridge.JPG?q=80&w=2047&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);">
    <!-- Overlay dengan opacity -->
    <div class="absolute inset-0 bg-black opacity-80"></div>
    
    <!-- Konten dengan opacity penuh -->
    <div class="relative z-10">
        <h1 class="text-center font-bold text-3xl pb-10">Sejarah Berdirinya Accer High School</h1>

        <div class="flex flex-col items-center justify-center pt-12">
        <img src="https://images.unsplash.com/20/cambridge.JPG?q=80&w=2047&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
            class="w-[700px] h-auto rounded-lg shadow-lg" alt="Accer High School" data-aos="zoom-out">
        <p class="pt-20 w-3/5 text-center">
            ACCER resmi didirikan pada 13 Mei 2024 pukul 14:30 WIB di Sleman, Yogyakarta. Berbeda dari kebanyakan negara yang menjalankan sistem pendidikan formal dan wajib, ACCER hadir dengan pendekatan yang lebih fleksibel dan kreatif. Sistem yang kami bangun bukan hanya sekadar meniru pola yang ada, tetapi dirancang langsung oleh para pemimpin dengan cara yang santai namun tetap terarah.
            Nama ACCER merupakan singkatan dari Akademi Cerdas Cermat yang Efektif dan Rajin. Filosofinya berangkat dari masa ketika kegiatan belajar dilakukan sebagai bagian dari waktu luang anak-anak—di sela aktivitas utama seperti bermain, mengaji, beribadah, dan menikmati masa muda. ACCER ingin menghidupkan kembali semangat belajar yang menyenangkan, tidak kaku, namun tetap bermakna.
        </p>
        </div>
    </div>
</div>


<!-- EVENT SEKOLAH -->
<div class="py-10">
    <h1 class="text-center font-bold text-3xl pb-10">&mdash; Accer High School Event &mdash;</h1>

    <div class="flex justify-center items-center gap-5 px-10 flex-wrap">
        
        <?php
            include '../../helper/connection.php';

            $test = "SELECT * FROM events";
            $test_query = mysqli_query($connection, $test);

            if(mysqli_num_rows($test_query) == 0){
                echo "<h2 class='text-3xl font-bold text-center my-10 text-white'>
                        Tidak Ada Event
                    </h2>";
            }

            // Query untuk mengambil semua bulan unik yang memiliki event
            $sql_months = "SELECT DISTINCT DATE_FORMAT(event_date, '%m') as month, DATE_FORMAT(event_date, '%M') as month_name FROM events ORDER BY month";
            $query_months = mysqli_query($connection, $sql_months);

            while($month = mysqli_fetch_array($query_months)) {
                $current_month = $month['month'];
                $month_name = $month['month_name'];

                // Query untuk mengambil event pada bulan ini
                $sql_events = "SELECT * FROM events WHERE DATE_FORMAT(event_date, '%m') = '$current_month'";
                $query_events = mysqli_query($connection, $sql_events);
            ?>

            <div class="card w-96 shadow-xl bg-gray-800 opacity-80 text-white" data-aos="zoom-out">
                <div class="card-body ">
                    <h2 class="text-3xl font-bold text-center mb-5">
                        <?php echo $month_name; ?>
                    </h2>
                    <span class="flex items-center justify-center flex-col min-h-[5rem]">
                    <?php
                    if(mysqli_num_rows($query_events) == 0){
                        echo "<span class='min-h-[5rem] flex items-center justify-center'>
                        <h1 class='text-center text-lg font-semibold'>Tidak Ada Event</h1>
                        </span>";
                    } else {
                        while($data = mysqli_fetch_array($query_events)){
                    ?>
                    <span class="flex gap-2">
                        <p class="text-center"><span class="font-semibold">[ <?php echo date('d-m-Y', strtotime($data['event_date'])); ?> ] </span> - <?php echo $data["name"]?></p>
                    </span>
                    <?php
                        }
                    }
                    ?>
                    </span>
                </div>
            </div>

            <?php
            }
            ?>
        
    </div>
</div>
<!-- END EVENT SEKOLAH -->

<!-- ESKUL SEKOLAH -->
<div class="py-10">
    <h1 class="text-center font-bold text-3xl pb-10">&mdash; Ekstra Kurikuler &mdash;</h1>

    <div class="flex justify-center gap-[10rem] px-[20rem] items-center flex-wrap">
        
        <?php
            include '../../helper/connection.php';

            $test = "SELECT * FROM eskuls";
            $test_query = mysqli_query($connection, $test);

            if(mysqli_num_rows($test_query) == 0){
                echo "<h2 class='text-3xl font-bold text-center my-10 text-white'>
                        Ekstra Kurikuler Belum Tersedia
                    </h2>";
            }

            while($data = mysqli_fetch_array($test_query)) {
            ?>
                <div class="flex flex-col gap-5 items-center justify-center">
                    <img src="../Admin/uploads/<?php echo $data["img"]; ?>" 
                        class="w-[12rem] h-[12rem] rounded-full shadow-lg" alt="Accer High School" data-aos="zoom-out">
                    <h1 class="text-xl font-semibold"><?php echo $data['title']?></h1>
                </div>

            <?php
            }
            ?>
    </div>
</div>
<!-- END ESKUL SEKOLAH -->

<?php
require_once '../layout/_bottom.php';
?>