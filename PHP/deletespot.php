<?php
include 'connect.php';
if (isset($_GET['deleteid'])) {
    $pid = $_GET['deleteid'];

    $sql = "delete from `parkingspotdetails` where PID=$pid";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:admin.php');
    } else {
        die(mysqli_error($conn));
    }
}
