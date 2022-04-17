<?php
$title = "Admin Dashboard - CalmGeeks";

include_once("../../api/layout.php");
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../..');
    exit;
}
?>


<?php

$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id = '$id' ";
$query = $connection -> query($sql);
header('location: christians.php');
?>