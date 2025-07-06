<?php
    include '../../helper/connection.php';
    include '../Layout/Admin/_top.php';
?>

    <div class="grid items-center ps-[20rem] pt-[7rem]">
        <span class="flex items-center justify-center mb-5">
            <!-- ADD INFORMATION -->
            <div class="flex gap-2 flex-col items-center justify-center bg-white w-[50rem] rounded-box shadow-md py-5 border">
                <h1 class="text-2xl font-bold mb-5 text-black">Profile</h1>

                <label tabindex="0" class="btn w-32 h-32 btn-circle border-none overflow-hidden">
                            <div class="w-60 rounded-full">
                                <img src="https://i.pinimg.com/564x/a0/a8/46/a0a846db2c036d3a8fcf739bb5707e43.jpg" />
                            </div>
                </label>

                <h1 class="text-2xl font-bold">&mdash; Admin &mdash;</h1>
                
                
                <p class="text-center px-10 my-5 text-black">Admin mengelola akun pengguna, konten, dan keamanan sistem. Mereka memantau kinerja, menganalisis data, dan mengelola basis data. Admin memberikan dukungan teknis, melakukan pembaruan perangkat lunak, memastikan kepatuhan peraturan, dan melakukan audit rutin.</p>
                
                <a onclick="document.getElementById('logout_modal_profile').showModal()" class="btn btn-error text-white mb-5">Logout</a>

            </div>
            <!-- END ADD INFORMATION -->
        </span>
    </div>

    <!-- Logout Confirmation Modal -->
    <dialog id="logout_modal_profile" class="modal text-black">
                <div class="modal-box bg-white">
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

<?php
    include '../Layout/Admin/_bottom.php';
?>