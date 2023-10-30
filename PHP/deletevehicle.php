<?php
include 'connect.php';
if (isset($_GET['deleteid'])) {
    $vid = $_GET['deleteid'];

    $sql = "delete from `vehicledetails` where VID=$vid";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:admin.php');
    } else {
        die(mysqli_error($conn));
    }
}
