<?php
    require_once '../../helper/connection.php';
    require_once '../Layout/Admin/_top.php';
?>

    <!-- Page content here -->
    <div class="grid items-center ps-[20rem] pt-[7rem]">
        <div role="tablist" class="tabs tabs-bordered">
                <!-- phone -->
                <input type="radio" name="my_tabs_1" role="tab" class="tab" aria-label="Number" onclick="initializeCheck(1)" id="tab1"/>
                <div role="tabpanel" class="tab-content p-5">

                <span class="flex items-center justify-between mb-5">
                    <!-- ADD PHONE -->
                    <div class="flex gap-2 items-center justify-center">
                        <h1 class="text-2xl font-bold">Number</h1>
                        <button class="btn btn-sm text-white mt-1" onclick="document.getElementById('number_add_modal').showModal()"><i class="bx bx-plus-circle"></i></button>
                    </div>
                    <!-- END ADD PHONE -->

                    <!-- SEARCH -->
                    <form action="" method="GET" class="flex items-center">
                        <label class="input input-bordered flex items-center gap-2 bg-white me-10 shadow-md text-black">
                            <input type="text" name="search" class="grow" placeholder="Search by username" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" />
                            <button type="submit"><i class="bx bx-search"></i></button>
                        </label>
                    </form>
                    <!-- END SEARCH -->
                </span>

                <div class="overflow-x-scroll border rounded-box shadow-md me-10">
                    <table class="table">
                        <!-- head -->
                        <thead class="text-black text-lg">
                            <tr>
                                <th>No</th>
                                <th>Role</th>
                                <th>Number</th>
                                <th>Default</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-black">
                        <?php
                            include '../../helper/connection.php';

                            $search = isset($_GET['search']) ? $_GET['search'] : '';
        
                            $sql = "SELECT * FROM phones";

                            if (!empty($search)) {
                                $sql .= " WHERE (username LIKE ? OR number LIKE ?)";
                            } 
        
                            $stmt = $connection->prepare($sql);
        
                            if (!empty($search)) {
                                $searchParam = "%$search%";
                                $stmt->bind_param("ss", $searchParam, $searchParam);
                            }
        
                            $stmt->execute();
                            $result = $stmt->get_result();
        
                            $no = 1;

                            if ($result->num_rows == 0) {
                                echo "<tbody>";
                                echo "<tr>";
                                echo "<td colspan='5' class='text-center'>No Data.</td>";    
                                echo "</tr>";
                                echo "</tbody>";
                            }
        
                            while ($data = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <th>
                                        <span class="text-sm">
                                        <?php echo $no ?>
                                        </span>
                                    </th>
                                    <td>
                                            <div>
                                                <div class="text-sm font-semibold"><?php echo $data["username"]?></div>
                                            </div>
                                        </div>
                                    <td><?php echo $data['number']?></td>
                                    <td class="flex gap-1 items-center">
                                        <label>
                                            <input type="checkbox" class="checkbox" <?php echo $data['isDefault'] == 1 ? 'checked' : ''; ?>  />
                                        </label>
                                        <p class="mb-2">
                                            Yes
                                        </p>
                                    </td>
                                    <th>
                                        <span class="flex items-center justify-center gap-1">
                                            <button class="btn btn-sm bg-black text-white border-none text-lg" onclick="openUpdateModal(<?php echo $data['isDefault']; ?>, <?php echo $data['phone_id']; ?>)"><i class="bx bx-edit"></i></button>
                                            <button class="btn btn-sm bg-red-500 text-white border-none text-lg" onclick="openDeleteNumberModal(<?php echo $data['phone_id']; ?>)"><i class="bx bx-trash"></i></button>
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
                
            </div>
            
                <!-- email -->
                <input type="radio" name="my_tabs_1" role="tab" class="tab" aria-label="Email"  onclick="initializeCheck(2)" id="tab2"/>
                <div role="tabpanel" class="tab-content p-5">

                    <span class="flex items-center justify-between mb-5">
                        <!-- ADD EMAIL -->
                        <div class="flex gap-2 items-center justify-center">
                            <h1 class="text-2xl font-bold">Email</h1>
                            <button class="btn btn-sm text-white mt-1" onclick="document.getElementById('email_add_modal').showModal()"><i class="bx bx-plus-circle"></i></button>
                        </div>
                        <!-- END ADD EMAIL -->
                    </span>

                    <div class="overflow-x-scroll border rounded-box shadow-md me-10">
                        <table class="table">
                            <!-- head -->
                            <thead class="text-black text-lg">
                                <tr>
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>Default</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-black">
                            <?php
                                include '../../helper/connection.php';

                                $sql = "SELECT * FROM emails";
                                $result = $connection->query($sql);

                                $no = 1;

                                if ($result->num_rows == 0) {
                                    echo "<tbody>";
                                    echo "<tr>";
                                    echo "<td colspan='5' class='text-center'>No Data.</td>";    
                                    echo "</tr>";
                                    echo "</tbody>";
                                }

                                while ($data = $result->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <th>
                                            <span class="text-sm"><?php echo $no ?></span>
                                        </th>
                                        <td><?php echo $data["email"] ?></td>
                                        <td class="flex gap-1 items-center">
                                            <label>
                                                <input type="checkbox" class="checkbox" <?php echo $data['isDefault'] == 1 ? 'checked' : ''; ?>  />
                                            </label>
                                            <p class="mb-2">
                                                Yes
                                            </p>
                                        </td>
                                        <th>
                                            <span class="flex items-center justify-center gap-1">
                                                <button class="btn btn-sm bg-black text-white border-none text-lg" onclick="openUpdateEmailModal(<?php echo $data['isDefault']; ?>, <?php echo $data['email_id']; ?>)"><i class="bx bx-edit"></i></button>
                                                <button class="btn btn-sm bg-red-500 text-white border-none text-lg" onclick="openEmailModal(<?php echo $data['email_id']; ?>)" ><i class="bx bx-trash"></i></button>
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
                    
                </div>
                
                <!-- address -->
                <input type="radio" name="my_tabs_1" role="tab" class="tab" aria-label="Address"  onclick="initializeCheck(3)" id="tab3" />
                <div role="tabpanel" class="tab-content p-5">

                    <span class="flex items-center justify-between mb-5">
                        <!-- ADD ADDRESS -->
                        <div class="flex gap-2 items-center justify-center">
                            <h1 class="text-2xl font-bold">Address</h1>
                            <button class="btn btn-sm text-white mt-1" onclick="document.getElementById('address_add_modal').showModal()"><i class="bx bx-plus-circle"></i></button>
                        </div>
                        <!-- END ADD ADDRESS -->

                    </span>
                    
                    <div class="overflow-x-scroll border rounded-box shadow-md me-10">
                        <table class="table">
                            <!-- head -->
                            <thead class="text-black text-lg">
                                <tr>
                                    <th>No</th>
                                    <th>Address</th>
                                    <th>Address Detail</th>
                                    <th class="text-center">Default</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-black">
                            <?php
                                include '../../helper/connection.php';

                                $sql = "SELECT * FROM address";
                                $result = $connection->query($sql);

                                $no = 1;

                                if ($result->num_rows == 0) {
                                    echo "<tbody>";
                                    echo "<tr>";
                                    echo "<td colspan='6' class='text-center'>No Data.</td>";    
                                    echo "</tr>";
                                    echo "</tbody>";
                                }

                                while ($data = $result->fetch_assoc()) {
                            ?>
        
                                    <tr>
                                        <th>
                                            <span class="text-sm"><?php echo $no ?></span>
                                        </th>
                                        <td><?php echo $data['address_name'] ?></td>
                                        <td><?php echo $data['address_info'] ?></td>
                                        <td class="flex gap-1 items-center">
                                            <label>
                                                <input type="checkbox" class="checkbox" <?php echo $data['isDefault'] == 1 ? 'checked' : ''; ?>  />
                                            </label>
                                            <p class="mb-2">
                                                Yes
                                            </p>
                                        </td>
                                        <th>
                                            <span class="flex items-center justify-center gap-1">
                                                <button class="btn btn-sm bg-black text-white border-none text-lg" onclick="openUpdateAddressModal(<?php echo $data['isDefault']; ?>, <?php echo $data['address_id']; ?>)"><i class="bx bx-edit"></i></button>
                                                <button class="btn btn-sm bg-red-500 text-white border-none text-lg"  onclick="openAddressModal(<?php echo $data['address_id']; ?>)" ><i class="bx bx-trash"></i></button>
                                            </span> 
                                        </th>
                                    </tr>

                <?php
                            $no++;
                            }
                            $stmt->close();

                        echo "</tbody>";
                    echo "</table>";
                ?>
                    </div>
                
                </div>
        </div>
    </div>

        <!-- ADD -->
        <!-- MODAL NUMBER -->
        <dialog id="number_add_modal" class="modal">
            <form action="./contactCRUD/number/create.php" class="mb-10 border w-[40rem] shadow-md py-5 px-10 mt-4 rounded-box bg-gray-100 modal-box text-black" enctype="multipart/form-data" method="POST">
                    <h1 class="text-2xl font-bold text-black">Add Number</h1>
        
                    <span class="grid gap-2 mt-5">
                            <select class="select select-bordered w-full bg-white" name="username">
                                <option disabled selected>Pilih Role</option>
                                <option>Humas</option>
                                <option>Pengajaran</option>
                            </select>
                            <div class="flex flex-col">
                                <label for="number" class="text-lg font-semibold text-black">Number</label>
                                <input type="number" name="number" id="number" class="input input-bordered bg-white" placeholder="Enter number" required />
                            </div>
                    </span>
                    <div class="flex justify-end mt-4">
                        <button class="btn text-white w-36 border-black" type="sumbit">Save</button>
                    </div>
            </form>

            <form method="dialog" class="modal-backdrop">
                    <button>close</button>
            </form>
        </dialog>
        <!-- END MODAL NUMBER -->

        <!-- MODAL EMAIL -->
        <dialog id="email_add_modal" class="modal">
            <form action="./contactCRUD/email/create.php" class="mb-10 border w-[40rem] shadow-md py-5 px-10 mt-4 rounded-box bg-gray-100 modal-box text-black" method="POST">
                    <h1 class="text-2xl font-bold text-black">Add Email</h1>
        
                    <span class="flex flex-col mt-5">
                                <label for="email" class="text-lg font-semibold text-black">Email</label>
                                <input type="email" name="email" id="email" class="input input-bordered bg-white" placeholder="Enter email" required />
                    </span>
                    <div class="flex justify-end mt-4">
                        <button class="btn text-white w-36" type="sumbit">Save</button>
                    </div>
            </form>

            <form method="dialog" class="modal-backdrop">
                    <button>close</button>
            </form>
        </dialog>
        <!-- END MODAL EMAIL -->
        
        <!-- MODAL ADDRESS -->
        <dialog id="address_add_modal" class="modal">
            <form action="./contactCRUD/address/create.php" class="mb-10 border w-[40rem] shadow-md py-5 px-10 mt-4 rounded-box bg-gray-100 modal-box text-black" method="POST">
                    <h1 class="text-2xl font-bold text-black">Add Address</h1>
        
                    <span class="flex flex-col my-5">
                                <label for="address" class="text-lg font-semibold text-black">Address Name</label>
                                <input type="text" name="address_name" id="address" class="input input-bordered bg-white" placeholder="Enter address" required />
                    </span>

                    <div class="flex flex-col">
                                <label for="address_info" class="text-lg font-semibold text-black">Address Detail</label>
                                <textarea name="address_info" id="address_info" class="input input-bordered bg-white h-40 py-1" placeholder="Enter Address"></textarea>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button class="btn text-white w-36" type="sumbit">Save</button>
                    </div>
            </form>

            <form method="dialog" class="modal-backdrop">
                    <button>close</button>
            </form>
        </dialog>
        <!-- END MODAL ADDRESS -->
        <!-- END ADD -->


        <!-- UPDATE -->
        <!-- UPDATE DEFAULT NUMBER -->
        <dialog id="update_number_modal" class="modal text-black">
            <div class="modal-box bg-white">
                <h3 class="font-bold text-lg">Edit Default?</h3>
                <p class="py-4">Apakah anda yakin untuk mengubahnya ?</p>
                <div class="modal-action">
                    <form method="dialog">
                        <button class="btn btn-outline mr-2 text-black">Cancel</button>
                        <button onclick="updateDefault()" class="btn btn-base-200 text-white">Yes</button>
                    </form>
                </div>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>

        <!-- UPDATE DEFAULT EMAIL -->
        <dialog id="update_email_modal" class="modal text-black">
            <div class="modal-box bg-white">
                <h3 class="font-bold text-lg">Edit Default?</h3>
                <p class="py-4">Apakah anda yakin untuk mengubahnya ?</p>
                <div class="modal-action">
                    <form method="dialog">
                        <button class="btn btn-outline mr-2 text-black">Cancel</button>
                        <button onclick="updateEmailDefault()" class="btn btn-base-200 text-white">Yes</button>
                    </form>
                </div>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>

        <!-- UPDATE DEFAULT ADDRESS -->
        <dialog id="update_address_modal" class="modal text-black">
            <div class="modal-box bg-white">
                <h3 class="font-bold text-lg">Edit Default?</h3>
                <p class="py-4">Apakah anda yakin untuk mengubahnya ?</p>
                <div class="modal-action">
                    <form method="dialog">
                        <button class="btn btn-outline mr-2 text-black">Cancel</button>
                        <button onclick="updateAddressDefault()" class="btn btn-base-200 text-white">Yes</button>
                    </form>
                </div>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>
        <!-- END UPDATE -->


        <!-- DELETE -->
        <!-- DELETE NUMBER -->
        <dialog id="delete_number_modal" class="modal">
        <div class="modal-box bg-white text-black">
            <h3 class="font-bold text-lg">Confirm Delete</h3>
            <p class="py-4">Anda yakin untuk menghapus data?</p>
            <div class="modal-action">
                <button class="btn btn-outline mr-2" onclick="document.getElementById('delete_number_modal').close()">Cancel</button>
                <button class="btn btn-error text-white" onclick="confirmNumberDelete()">Delete</button>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
        </dialog>
        <!-- END DELETE NUMBER -->

        <!-- DELETE EMAIL -->
        <dialog id="delete_email_modal" class="modal">
        <div class="modal-box bg-white text-black">
            <h3 class="font-bold text-lg">Confirm Delete</h3>
            <p class="py-4">Anda yakin untuk menghapus data?</p>
            <div class="modal-action">
                <button class="btn btn-outline mr-2" onclick="document.getElementById('delete_email_modal').close()">Cancel</button>
                <button class="btn btn-error text-white" onclick="confirmEmailDelete()">Delete</button>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
        </dialog>
        <!-- END DELETE EMAIL -->
        
        <!-- DELETE ADRESS -->
        <dialog id="delete_address_modal" class="modal">
        <div class="modal-box bg-white text-black">
            <h3 class="font-bold text-lg">Confirm Delete</h3>
            <p class="py-4">Anda yakin untuk menghapus data?</p>
            <div class="modal-action">
                <button class="btn btn-outline mr-2" onclick="document.getElementById('delete_address_modal').close()">Cancel</button>
                <button class="btn btn-error text-white" onclick="confirmAddressDelete()">Delete</button>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
        </dialog>
        <!-- END DELETE ADRESS -->

        <!-- END DELETE -->




        <script>
            // MODAL UPDATE
            function openUpdateModal(defaultId, id) {
                window.currentDefaultId = defaultId;
                window.currentId = id;
                document.getElementById('update_number_modal').showModal();
            }
            function openUpdateEmailModal(defaultId, id) {
                window.currentDefaultId = defaultId;
                window.currentId = id;
                document.getElementById('update_email_modal').showModal();
            }
            function openUpdateAddressModal(defaultId, id) {
                window.currentDefaultId = defaultId;
                window.currentId = id;
                document.getElementById('update_address_modal').showModal();
            }

            // UPDATE DATA
            function updateDefault() {
                if (window.currentId) {
                    window.location.href = `./contactCRUD/number/update.php?default=${window.currentDefaultId}&id=${window.currentId}`;
                }
            }
            function updateEmailDefault() {
                if (window.currentId) {
                    window.location.href = `./contactCRUD/email/update.php?default=${window.currentDefaultId}&id=${window.currentId}`;
                }
            }
            function updateAddressDefault() {
                if (window.currentId) {
                    window.location.href = `./contactCRUD/address/update.php?default=${window.currentDefaultId}&id=${window.currentId}`;
                }
            }

            // CHECKBOX
            function initializeCheck(id) {
                localStorage.setItem('selectedTab', id);
            }

            document.addEventListener('DOMContentLoaded', function() {
                var tab1 = document.getElementById('tab1');
                var tab2 = document.getElementById('tab2');
                var tab3 = document.getElementById('tab3');

                var selectedTab = localStorage.getItem('selectedTab');

                if (selectedTab === null || selectedTab === '1') {
                    tab1.checked = true;
                } else if (selectedTab === '2') {
                    tab2.checked = true;
                } else {
                    tab3.checked = true;
                }
            });


            // DELETE
            let numberID;
            let emailID;
            let adressID;

            // NUMBER
            function openDeleteNumberModal(id) {
                numberID = id;
                document.getElementById('delete_number_modal').showModal();
            }

            // NUMBER Delete
            function confirmNumberDelete() {
                window.location.href = `./contactCRUD/number/delete.php?phone_id=${numberID}`;
            }

            // EMAIL 
            function openEmailModal(id) {
                emailID = id;
                document.getElementById('delete_email_modal').showModal();
            }

            // EMAIL DELETE
            function confirmEmailDelete() {
                window.location.href = `./contactCRUD/email/delete.php?email_id=${emailID}`;
            }


            // ADRESS
            function openAddressModal(id) {
                adressID = id;
                document.getElementById('delete_address_modal').showModal();
            }

            // ADRESS DELETE
            function confirmAddressDelete() {
                window.location.href = `./contactCRUD/address/delete.php?address_id=${adressID}`;
            }

        </script>


<?php
    include '../Layout/Admin/_bottom.php';
?>