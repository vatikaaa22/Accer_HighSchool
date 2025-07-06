<?php
    include '../../helper/connection.php';
    include '../../helper/auth.php';
    include '../Layout/Admin/_top.php';
?>

<!-- Page content here -->
<div class="grid items-center ps-[20rem] pt-[7rem]">
    <span class="flex items-center justify-between mb-5">
        <!-- ADD ESKUL -->
        <div class="flex gap-2 items-center justify-center">
            <h1 class="text-2xl font-bold">EKSKUL</h1>
            <button class="btn btn-sm text-white mt-1" onclick="document.getElementById('add_eskul_modal').showModal()"><i class="bx bx-plus-circle"></i></button>
        </div>
        <!-- END ADD ESKUL -->
    </span>
    <div class="overflow-x-scroll max-w-[95rem] max-h-[48rem] border rounded-box shadow-md me-10">
        <table class="table">
            <!-- head -->
            <thead class="text-black text-lg">
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-black">

            <?php
                include '../../helper/connection.php';

                $sql = "SELECT * FROM eskuls";
                $query = mysqli_query($connection, $sql);

                $no = 1;

                if( mysqli_num_rows($query) == 0){
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td colspan='4' class='text-center'>No Eskul found.</td>";    
                    echo "</tr>";
                    echo "</tbody>";
                }

                while($data = mysqli_fetch_array($query)){
            ?>
                    <!-- row 1 -->
                    <tr>
                        <td>
                            <span class="text-sm"><?php echo $no ?></span>
                        </td>
                        <td>
                            <div class="font-bold"><?php echo $data['title'] ?></div>
                        </td>
                        <td class="flex items-center justify-center"><img src="./uploads/<?php echo $data["img"] ?>" class="max-w-20 max-h-20 rounded-md"></td>
                        <td>
                            <span class="flex items-center justify-center gap-1">
                                <button class="btn btn-sm bg-black text-white border-none text-lg" onclick="openUpdateModal(<?php echo $data['eskul_id']; ?>)"><i class="bx bx-edit"></i></button>    
                                <button class="btn btn-sm bg-red-500 text-white border-none text-lg" onclick="modalEskulDelete(<?php echo $data['eskul_id']?>)" ><i class="bx bx-trash"></i></button>
                            </span> 
                        </td>
                    </tr>
            <?php
                $no++;
                }

                echo "</tbody>";
                echo "</table>";
            ?>
    </div>

    <!-- MODAL ADD -->
    <dialog id="add_eskul_modal" class="modal">
            <form action="./eskulCRUD/create.php" class="mb-10 border w-[40rem] shadow-md py-5 px-10 mt-4 rounded-box bg-gray-100 modal-box text-black" enctype="multipart/form-data" method="POST">
                    <h1 class="text-2xl font-bold text-black">Add EKSKUL</h1>
        
                    <span class="grid gap-2 mt-5">
                            <input type="file" name="img" class="file-input file-input-bordered file-input-sm w-full border bg-white" required/>
                            <div class="flex flex-col">
                                <label for="title" class="text-lg font-semibold text-black">Title</label>
                                <input type="text" name="title" id="title" class="input input-bordered bg-white" placeholder="Enter Information Title" />
                            </div>
                    </span>
                    <div class="flex justify-end mt-4">
                        <button class="btn text-white w-36" type="sumbit">Save</button>
                    </div>
            </form>

            <form method="dialog" class="modal-backdrop">
                    <button>close</button>
            </form>
    </dialog>
    <!-- END MODAL ADD -->

    <!-- MODAL UPDATE -->
    <dialog id="update_eskul_modal" class="modal">
        <form id="updateEskulForm" class="mb-10 border w-[40rem] shadow-md py-5 px-10 mt-4 rounded-box bg-gray-100 modal-box text-black" enctype="multipart/form-data" method="POST">
            <h1 class="text-2xl font-bold text-black">Update EKSKUL</h1>
            <div id="formContent">
                <!-- NANTI BERISI CONTENT -->
            </div>
            <div class="flex justify-end mt-4">
                <button class="btn text-white w-36" onclick="updateEskul()">Save</button>
            </div>
        </form>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    <!-- END MODAL UPDATE -->

    <!-- MODAL DELETE -->
    <dialog id="delete_eskul_modal" class="modal">
        <div class="modal-box bg-white text-black">
            <h3 class="font-bold text-lg">Confirm Delete</h3>
            <p class="py-4">Anda yakin untuk menghapus data?</p>
            <div class="modal-action">
                <button class="btn btn-outline mr-2" onclick="document.getElementById('delete_eskul_modal').close()">Cancel</button>
                <button class="btn btn-error text-white" onclick="confirmEventDelete()">Delete</button>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    <!-- END MODAL DELETE -->

</div>

<script>
    // VARIABLE
    let updateEskulId;
    let deleteEskulId;

    // UPDATE EVENT
    function openUpdateModal(eskulId) {
        updateEskulId = eskulId;

        document.getElementById('update_eskul_modal').showModal();
        
        // Use AJAX to load the form content
        fetch('./eskulCRUD/edit.php?id=' + eskulId)
            .then(response => response.text())
            .then(data => {
                document.getElementById('formContent').innerHTML = data;
            })
            .catch(error => console.error('Error:', error));
    }
    
    // UPDATE ESKUL
    function updateEskul() {
        const form = document.getElementById('updateEskulForm');
        const formData = new FormData(form);
        formData.append('id', updateEskulId);

        if (typeof updateEskulId === 'undefined' || updateEskulId === null) {
            console.error('updateEskulId tidak didefinisikan');
            return;
        }

        fetch('./eskulCRUD/update.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.statusText);
            }
            return response.text();
        })
        .then(data => {
            console.log(data);
            if (data.includes("Error")) {
                window.location.reload();
            } else {
                window.location.reload();
            }
        })
        .catch(error => {
            toastr.error("Error");
        });
    }

    // DELETE EVENT 
    function modalEskulDelete(eventId){
        deleteEskulId = eventId
        document.getElementById('delete_eskul_modal').showModal();
    }

    function confirmEventDelete(){
        if(deleteEskulId){
            fetch('./eskulCRUD/delete.php?eskul_id=' + deleteEskulId)
                .then(response => response.json())
                .then(data => {
                    if(data.success){
                        window.location.reload();
                    } else {
                        window.location.reload();
                        alert(data.message);
                    }
                })
                .catch(error => console.error('Error:', error), window.location.reload());
        }
    }

</script>

<?php
    include '../Layout/Admin/_bottom.php';
?>


