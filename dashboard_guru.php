<?php
session_start();
if($_SESSION['role'] != 'guru'){
    header("Location: login.php");
}
?>

<h2>Dashboard Guru</h2>
<a href="logout.php">Logout</a>