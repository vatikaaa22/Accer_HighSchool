    <?php
    require_once '../layout/_top.php';
?>

<div class="text-sm breadcrumbs bg-black opacity-50 pt-20 pb-3 text-white ps-5">
    <ul>
        <li><a>Beranda</a></li> 
        <li><a>Berita</a></li> 
    </ul>
</div>

<span class="min-h-screen">
    <div class="grid gap-2 my-5 px-10">
        <?php
            include '../../helper/connection.php';

            $sql = "SELECT * FROM informations";
            $query = mysqli_query($connection, $sql);

            if(mysqli_num_rows($query) == 0){
                echo "<span class='h-screen flex items-center justify-center'>
                <h1 class='text-center text-2xl font-bold'>Belum ada berita</h1>
                </span>";
            }

            while($data = mysqli_fetch_array($query)){
        ?>

        <span class="flex">
            <div class="card card-side w-full bg-gray-950 shadow-xl text-white" data-aos="fade-in">
            <img src="../Admin/uploads/<?php echo $data["image"]?>"  class="rounded-l-lg shadow-2xl max-w-lg max-h-[20rem]">
                <div class="card-body">
                    <small>Berita Terkini</small>
                    <h2 class="card-title text-2xl font-bold"><?php echo $data["title"]?></h2>
                    <p class="max-h-[10rem] overflow-x-scroll"><?php echo $data["description"]?></p>
                    <span class="flex gap-3 mt-2">
                        <span class="flex btn btn-sm gap-1 items-center justify-center bg-green-500 text-white opacity-80 hover:bg-green-800"><i class="bx bx-calendar"></i><?php echo $data["information_date"]?></span>
                        <span class="flex btn btn-sm gap-1 items-center justify-center bg-blue-500 text-white opacity-80 hover:bg-blue-800"><i class="bx bx-map"></i><?php echo $data["location"]?></span>
                    </span>
                </div>
            </div>
        </span>

        <?php
            }
        ?>
        
    </div>
</span>



<?php
    require_once '../layout/_bottom.php';
?>