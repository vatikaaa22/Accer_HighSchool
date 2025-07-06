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
            <h1 class="text-2xl font-bold">Fasilitas</h1>
            <button class="btn btn-sm text-white mt-1" onclick="document.getElementById('add_modal').showModal()"><i class="bx bx-plus-circle"></i></button>
        </div>
        <!-- END ADD INFORMATION -->
    </span>
    <div class="overflow-x-scroll max-w-[95rem] max-h-[48rem] border rounded-box shadow-md me-10">
        <table class="table">
            <!-- head -->
            <thead class="text-black text-lg">
                <tr>
                    <th>No</th>
                    <th>Facility Name</th>
                    <th>Description</th>
                    <th class="w-40">Image</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-black">

            <?php
                include '../../helper/connection.php';

                $sql = "SELECT * FROM facilities";
                $query = mysqli_query($connection, $sql);

                $no = 1;

                if( mysqli_num_rows($query) == 0){
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td colspan='5' class='text-center'>No Fasilitas found.</td>";    
                    echo "</tr>";
                    echo "</tbody>";
                }

                while($data = mysqli_fetch_array($query)){
            ?>
                    <tr>
                        <th>
                            <span class="text-sm"><?php echo $no ?></span>
                        </th>
                        <td>
                                    <div class="font-bold"><?php echo $data['name'] ?></div>
                        <td>
                            <p class="text-sm">
                                <?php echo $data["description"]?>
                            </p>
                        </td>
                        <td><img src="./uploads/<?php echo $data["image"] ?>" class="max-w-20 max-h-20 rounded-md"></td>
                        <th>
                            <span class="flex items-center justify-center gap-1">
                                <button class="btn btn-sm bg-black text-white border-none text-lg" onclick="openUpdateModal(<?php echo $data['facility_id']; ?>)"><i class="bx bx-edit"></i></button>    
                                <button class="btn btn-sm bg-red-500 text-white border-none text-lg" onclick="onDelete(<?php echo $data['facility_id'] ?>)" ><i class="bx bx-trash"></i></button>
                            </span> 
                        </th>
                    </tr>
            <?php
                $no++;
                }

                echo "</tbody>";
                echo "</table>";
            ?>
    </div>

    <!-- MODAL ADD -->
    <dialog id="add_modal" class="modal">
            <form action="./fasilitasCRUD/create.php" class="mb-10 border w-[40rem] shadow-md py-5 px-10 mt-4 rounded-box bg-gray-100 modal-box text-black" enctype="multipart/form-data" method="POST">
                    <h1 class="text-2xl font-bold text-black">Add Facility</h1>
        
                    <span class="grid gap-2 mt-5">
                        <input type="file" name="image" class="file-input file-input-bordered file-input-sm w-full border bg-white" required/>
                        <div class="flex flex-col">
                            <label for="name" class="text-lg font-semibold text-black">Name</label>
                            <input type="text" name="name" id="name" class="input input-bordered bg-white" placeholder="Enter Information name" />
                        </div>
                        <div class="flex flex-col">
                            <label for="description" class="text-lg font-semibold text-black">Description</label>
                            <textarea name="description" id="description" class="input input-bordered bg-white h-40 py-1" placeholder="Enter description"></textarea>
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
    <dialog id="update_fasilitas_modal" class="modal">
        <form id="updateFascilityForm" class="mb-10 border w-[40rem] shadow-md py-5 px-10 mt-4 rounded-box bg-gray-100 modal-box text-black" enctype="multipart/form-data" method="POST">
            <h1 class="text-2xl font-bold text-black">Update Fasilitas</h1>
            <div id="formContent">
                <!-- NANTI BERISI CONTENT -->
            </div>
            <div class="flex justify-end mt-4">
                <button class="btn text-white w-36" onclick="updateFasility()">Save</button>
            </div>
        </form>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    <!-- END MODAL UPDATE -->

    <!-- MODAL DELETE -->
    <dialog id="delete_fasilitas_modal" class="modal">
        <div class="modal-box bg-white text-black">
            <h3 class="font-bold text-lg">Confirm Delete</h3>
            <p class="py-4">Anda yakin untuk menghapus data?</p>
            <div class="modal-action">
                <button class="btn btn-outline mr-2" onclick="document.getElementById('delete_fasilitas_modal').close()">Cancel</button>
                <button class="btn btn-error text-white" onclick="confirmDelete()">Delete</button>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    <!-- END MODAL DELETE -->

</div>

<script>
    let updateFacilityId;

    // UPDATE
    function openUpdateModal(facilityId) {
        document.getElementById('update_fasilitas_modal').showModal();
        updateFacilityId = facilityId;
        
        // Use AJAX to load the form content
        fetch('./fasilitasCRUD/edit.php?id=' + facilityId)
            .then(response => response.text())
            .then(data => {
                document.getElementById('formContent').innerHTML = data;
            })
            .catch(error => console.error('Error:', error));
    }

    function updateFasility() {
        const form = document.getElementById('updateFascilityForm');
        const formData = new FormData(form);
        formData.append('id', updateFacilityId);

        if (typeof updateFacilityId === 'undefined' || updateFacilityId === null) {
            console.error('updateFacilityId tidak didefinisikan');
            return;
        }

        fetch('./fasilitasCRUD/update.php', {
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
                toastr.error("Terjadi kesalahan");
            }
        })
        .catch(error => {
            toastr.error("Error");
        });
    }

    // DELETE
    let currentFacilityId;

    function onDelete(facilityId) {
        currentFacilityId = facilityId;
        document.getElementById('delete_fasilitas_modal').showModal();
    }

    function confirmDelete() {
        if (currentFacilityId) {
            fetch('./fasilitasCRUD/delete.php?fasilitas_id=' + currentFacilityId)
                .then(response => response.text())
                .then(data => {
                    console.log(data);
                    closeModal();
                })
                .catch(error => {
                    console.error('Error:', error);
                    window.location.reload();
                    closeModal();
                });
        }
    }
</script>

<?php
    include '../Layout/Admin/_bottom.php';
?>
