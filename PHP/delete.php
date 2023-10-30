<?php
    include 'connect.php';
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];

        $sql="delete from `user` where UID=$id";
        $result = mysqli_query($conn,$sql);
        if($result){
            header('location:admin.php');
        }else{
            die(mysqli_error($conn));
        }
    }
