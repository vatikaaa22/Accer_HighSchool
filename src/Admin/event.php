<?php
    include '../../helper/connection.php';
    include '../../helper/auth.php';
    include '../Layout/Admin/_top.php';
?>

<!-- Page content here -->
<div class="grid items-center ps-[20rem] pt-[7rem]">
    <span class="flex items-center justify-between mb-5">
        <!-- ADD EVENT -->
        <div class="flex gap-2 items-center justify-center">
            <h1 class="text-2xl font-bold">Event</h1>
            <button class="btn btn-sm text-white mt-1" onclick="document.getElementById('add_event_modal').showModal()"><i class="bx bx-plus-circle"></i></button>
        </div>
        <!-- END ADD EVENT -->
    </span>
    <div class="overflow-x-scroll max-w-[95rem] max-h-[48rem] border rounded-box shadow-md me-10">
        <table class="table">
            <!-- head -->
            <thead class="text-black text-lg">
                <tr>
                    <th>No</th>
                    <th>Event</th>
                    <th>Month</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-black">

            <?php
                include '../../helper/connection.php';

                $sql = "SELECT * FROM events";
                $query = mysqli_query($connection, $sql);

                $no = 1;

                if( mysqli_num_rows($query) == 0){
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td colspan='4' class='text-center'>No Event found.</td>";    
                    echo "</tr>";
                    echo "</tbody>";
                }

                while($data = mysqli_fetch_array($query)){
            ?>
                    <!-- row 1 -->
                    <tr>
                        <th>
                            <span class="text-sm"><?php echo $no ?></span>
                        </th>
                        <td>
                            <div class="font-bold"><?php echo $data['name'] ?></div>
                        <td>
                            <p class="text-sm">
                                <?php echo $data["event_date"]?>
                            </p>
                        </td>
                        <th>
                            <span class="flex items-center justify-center gap-1">
                                <button class="btn btn-sm bg-black text-white border-none text-lg" onclick="openUpdateModal(<?php echo $data['event_id']; ?>)"><i class="bx bx-edit"></i></button>    
                                <button class="btn btn-sm bg-red-500 text-white border-none text-lg" onclick="modalDelete(<?php echo $data['event_id']?>)" ><i class="bx bx-trash"></i></button>
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
    <dialog id="add_event_modal" class="modal">
            <form action="./eventCRUD/create.php" class="mb-10 border w-[40rem] shadow-md py-5 px-10 mt-4 rounded-box bg-gray-100 modal-box text-black" method="POST">
                    <h1 class="text-2xl font-bold text-black">Add information</h1>
        
                    <span class="grid gap-2 mt-5">
                        <div class="flex flex-col">
                                <label for="date" class="text-lg font-semibold text-black">Date</label>
                                <input type="date" name="date" id="date" class="input input-bordered bg-white" placeholder="Enter event date" />
                        </div>
                        <div class="flex flex-col">
                                <label for="name" class="text-lg font-semibold text-black">Name</label>
                                <input type="text" name="name" id="name" class="input input-bordered bg-white" placeholder="Enter event name" />
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
    <dialog id="update_eventt_modal" class="modal">
        <form id="updateEventForm" class="mb-10 border w-[40rem] shadow-md py-5 px-10 mt-4 rounded-box bg-gray-100 modal-box text-black" method="POST">
            <h1 class="text-2xl font-bold text-black">Update Fasilitas</h1>
            <div id="formContent">
                <!-- NANTI BERISI CONTENT -->
            </div>
            <div class="flex justify-end mt-4">
                <button class="btn text-white w-36" onclick="updateEventt()">Save</button>
            </div>
        </form>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    <!-- END MODAL UPDATE -->

    <!-- MODAL DELETE -->
    <dialog id="delete_event_modal" class="modal">
        <div class="modal-box bg-white text-black">
            <h3 class="font-bold text-lg">Confirm Delete</h3>
            <p class="py-4">Anda yakin untuk menghapus data?</p>
            <div class="modal-action">
                <button class="btn btn-outline mr-2" onclick="document.getElementById('delete_event_modal').close()">Cancel</button>
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
    let updateEventId;
    let deleteEventId;

    // UPDATE EVENT
    function openUpdateModal(eventId) {
        updateEventId = eventId;
        document.getElementById('update_eventt_modal').showModal();
        
        // Use AJAX to load the form content
        fetch('./eventCRUD/edit.php?id=' + eventId)
            .then(response => response.text())
            .then(data => {
                document.getElementById('formContent').innerHTML = data;
            })
            .catch(error => console.error('Error:', error));
    }

    
    function updateEventt(ev){
        if(updateEventId){
            let form = document.getElementById('updateEventForm');
            let formData = new FormData(form);
            formData.append('id', updateEventId);

            fetch('./eventCRUD/update.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if(data.success){
                        window.location.reload();
                    } else {
                        window.location.reload();
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    }


    // DELETE EVENT 
    function modalDelete(eventId){
        deleteEventId = eventId
        document.getElementById('delete_event_modal').showModal();
    }

    function confirmEventDelete(){
        if(deleteEventId){
            fetch('./eventCRUD/delete.php?event_id=' + deleteEventId)
                .then(response => response.json())
                .then(data => {
                    if(data.success){
                        location.reload();
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => console.error('Error:', error), location.reload());
        }
    }

</script>

<?php
    include '../Layout/Admin/_bottom.php';
?>


