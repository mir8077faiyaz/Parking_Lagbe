<?php
include 'connect.php';
if (isset($_GET['cancelid'])) {
    $pid = $_GET['cancelid'];

    $sql = "delete from `activeparking` where PID=$pid";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:admin.php');
    } else {
        die(mysqli_error($conn));
    }
}
