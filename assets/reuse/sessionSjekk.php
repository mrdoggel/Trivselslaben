<?php
    if (!isset($_SESSION['id'])) {
        header('location: assets/connection/logout.php');
    }
?>