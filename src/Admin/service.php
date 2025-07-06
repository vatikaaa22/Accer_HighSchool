<?php
    include '../../helper/connection.php';
    include '../../helper/auth.php';
    include '../Layout/Admin/_top.php';
?>

<!-- Page content here -->
<div class="grid items-center ps-[20rem] pt-[7rem]">
    <span class="flex items-center justify-between mb-5">
        <!-- ADD INFORMATION -->
        <div class="flex gap-2 items-center justify-center">
            <h1 class="text-2xl font-bold">Services</h1>
        </div>
        <!-- END ADD INFORMATION -->
    </span>
    <div class="overflow-x-scroll max-w-[95rem] max-h-[48rem] border rounded-box shadow-md me-10">
        <table class="table">
            <!-- head -->
            <thead class="text-black text-lg">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Number</th>
                    <th>Subject</th>
                    <th class="text-center">Message</th>
                </tr>
            </thead>
            <tbody class="text-black">

            <?php
                include '../../helper/connection.php';

                $sql = "SELECT * FROM services ORDER BY service_id DESC";
                $query = mysqli_query($connection, $sql);

                $no = 1;

                if( mysqli_num_rows($query) == 0){
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td colspan='5' class='text-center'>No data.</td>";    
                    echo "</tr>";
                    echo "</tbody>";
                }

                while($data = mysqli_fetch_array($query)){
            ?>
                    <tr>
                        <td>
                            <span class="text-sm"><?php echo $no ?></span>
                        </td>
                        <td>
                            <div class="font-bold"><?php echo $data['name'] ?></div>
                        </td>
                        <td>
                            <div><?php echo $data['email'] ?></div>
                        </td>
                        <td>
                            <div><?php echo $data['number'] ?></div>
                        </td>
                        <td>
                            <div><?php echo $data['subject'] ?></div>
                </td>
                        <td>
                        <p class="text-sm max-h-20 overflow-x-scroll">
                                <?php echo $data["message"]?>
                            </p>
                        </td>
                    </tr>
            <?php
                $no++;
                }

                echo "</tbody>";
                echo "</table>";
            ?>
    </div>


<?php
    include '../Layout/Admin/_bottom.php';
?>
