<?php
session_start();
unset($_SESSION['login']);
$_SESSION['login'] = null;

echo "<script>
            localStorage.removeItem('selectedTab');
            window.location.href = 'login.php';
    </script>";

    exit();
?>