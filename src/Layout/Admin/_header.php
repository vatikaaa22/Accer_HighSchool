        <?php
            $currentPath = $_SERVER['PHP_SELF'];

            function isActive($path) {
                global $currentPath;
                    return strpos($currentPath, $path) !== false ? 'bg-black text-white' : 'bg-gray-300 text-black';
            }
        ?>

        <!-- Navbar -->
            <div class="navbar bg-white shadow-md mx-10 rounded-box max-w-[96vw] fixed top-5 border">
                <div class="flex-none lg:hidden">
                    <label for="my-drawer" class="btn btn-square btn-ghost drawer-button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </label>
                </div>
                <div class="flex-1">
                    <a class="btn btn-ghost text-xl text-black font-bold">Admin Dashboard</a>
                </div>
                <div class="flex-none">
                    <div class="dropdown dropdown-end">
                        <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                            <div class="w-10 rounded-full">
                                <img src="https://i.pinimg.com/564x/a0/a8/46/a0a846db2c036d3a8fcf739bb5707e43.jpg" />
                            </div>
                        </label>
                        <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-white rounded-box w-52 text-black">
                            <li><a href="profile.php">Profile</a></li>
                            <li><a onclick="document.getElementById('logout_modal').showModal()">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end Navbar -->

            <!-- Sidebar -->
            <div class="grid fixed left-10 top-28 rounded-box text-black font-bold border shadow-lg bg-white">
                        <ul class="menu p-4 overflow-y-auto w-60 grid gap-2">
                            <li>
                                <a href="../Admin/index.php" class="btn border-none hover:text-white <?php echo isActive('Admin/index.php'); ?>">
                                    <i class='bx bx-home'></i>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="../Admin/information.php" class="btn border-none hover:text-white <?php echo isActive('Admin/information.php'); ?>">
                                    <i class='bx bx-info-circle'></i>
                                    Information
                                </a>
                            </li>
                            <li>
                                <a href="../Admin/fasilitas.php" class="btn border-none hover:text-white <?php echo isActive('Admin/fasilitas.php'); ?>">
                                    <i class='bx bx-folder'></i>
                                    Fasilitas
                                </a>
                            </li>
                            <li>
                                <a href="../Admin/event.php" class="btn border-none hover:text-white <?php echo isActive('Admin/event.php'); ?>">
                                    <i class='bx bx-calendar'></i>
                                    Event
                                </a>
                            </li>
                            <li>
                                <a href="../Admin/eskul.php" class="btn border-none hover:text-white <?php echo isActive('Admin/eskul.php'); ?>">
                                    <i class='bx bxs-graduation'></i>
                                    EKSKUL
                                </a>
                            </li>
                            <li>
                                <a href="../Admin/contact.php" class="btn border-none hover:text-white <?php echo isActive('Admin/contact.php'); ?>">
                                    <i class='bx bx-phone'></i>
                                    Contact
                                </a>
                            </li>
                            <li>
                                <a href="../Admin/service.php" class="btn border-none hover:text-white <?php echo isActive('Admin/service.php'); ?>">
                                    <i class='bx bx-message-square-detail'></i>
                                    Services
                                </a>
                            </li>
                            <li>
                                <a href="../Admin/profile.php" class="btn border-none hover:text-white <?php echo isActive('Admin/profile.php'); ?>">
                                    <i class='bx bx-user'></i>
                                    Profile
                                </a>
                            </li>
                        </ul>
            </div>


            <!-- Logout Confirmation Modal -->
            <dialog id="logout_modal" class="modal">
                <div class="modal-box bg-white text-black">
                    <h3 class="font-bold text-lg">Confirm Logout</h3>
                    <p class="py-4">Anda yakin untuk keluar?</p>
                    <div class="modal-action">
                        <form method="dialog">
                            <button class="btn btn-outline mr-2">Cancel</button>
                            <a href="logout.php" class="btn btn-error text-white">Logout</a>
                        </form>
                    </div>
                </div>
                <form method="dialog" class="modal-backdrop">
                    <button>close</button>
                </form>
            </dialog>
