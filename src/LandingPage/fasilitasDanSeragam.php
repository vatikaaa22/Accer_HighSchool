<?php
require_once '../layout/_top.php';
?>

<div class="text-sm breadcrumbs bg-black opacity-50 pt-20 pb-3 text-white ps-5">
    <ul>
        <li><a>Beranda</a></li> 
        <li><a>Fasilitas dan Seragam</a></li> 
    </ul>
</div>

<span class="min-h-screen flex items-center justify-center gap-5 flex-wrap py-5">
    <?php
                include '../../helper/connection.php';
    
                $sql = "SELECT * FROM facilities";
                $query = mysqli_query($connection, $sql);
    
                $no = 1;
    
                if(mysqli_num_rows($query) == 0){
                    echo "<span class='h-screen flex items-center justify-center'>
                    <h1 class='text-center text-2xl font-bold'>Belum ada Data.</h1>
                    </span>";
                }
    
                while($data = mysqli_fetch_array($query)){
    ?>

    <div class="card w-96 bg-gray-800 shadow-xl text-white h-[35rem] border border-gray-200" data-aos="zoom-out">
        <figure class="w-full h-[19rem] overflow-hidden">
        <img 
            src="../Admin/uploads/<?php echo $data['image']; ?>" 
            alt="Cover Image" 
            class="w-full h-full object-cover" 
        />
        </figure>

        <div class="card-body">
            <h2 class="card-title text-3xl">
                <?php echo $data['name'] ?>
            </h2>
            <p><?php echo $data["description"]?></p>
        </div>
    </div>

    <?php
        $no++;
        }
    ?>
</span>



<?php
require_once '../layout/_bottom.php';
?>