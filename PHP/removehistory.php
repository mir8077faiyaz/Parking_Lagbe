<?php
include 'connect.php';
if (isset($_GET['removeid'])) {
    $vid = $_GET['removeid'];

    $sql = "delete from `parkinghistory` where VID=$vid";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:admin.php');
    } else {
        die(mysqli_error($conn));
    }
}
