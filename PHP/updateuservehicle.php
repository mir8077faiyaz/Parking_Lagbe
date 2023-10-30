<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

<?php
include 'connect.php';
$email = $_GET['updateid'];
$sql = "select * from `vehicledetails` join `user` using(UID) where Email ='$email'";;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$id = $row['UID'];
$vname = $row['VName'];
$vnum = $row['VNum'];
$vphoto = $row['VPhoto'];

if (isset($_POST['submit'])) {
    $vname = $_POST['vname'];
    $vnum = $_POST['vnum'];
    $vphoto = $_POST['vphoto'];

    $sql = "update `vehicledetails` set VName='$vname',VNum='$vnum',VPhoto='../image/$vphoto' where UID=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "Updated Successfully";
        header('location:userprofile.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>

<div class="container my-5">
    <form onsubmit="return validation();" onkeydown="return event.key != 'Enter';" method="post">
        <div class="row align-items-center pt-4 pb-3">
            <div class="col-md-3 ps-5">
                <h6 class="mb-0 text-black">Vehicle Name</h6>
            </div>
            <div class="col-md-9 pe-5">
                <input type="text" class="form-control form-control-lg" id="vname" name="vname" value=<?php echo $vname; ?> />
            </div>
        </div>

        <div class="row align-items-center pt-4 pb-3">
            <div class="col-md-3 ps-5">
                <h6 class="mb-0 text-black">Vehicle Number</h6>
            </div>
            <div class="col-md-9 pe-5">
                <input type="text" class="form-control form-control-lg" id="vnum" name="vnum" value=<?php echo $vnum; ?> />
            </div>
        </div>
        <div class="row align-items-center pt-4 pb-3">
            <div class="col-md-3 ps-5">
                <h6 class="mb-0 text-black">Vehicle Photo</h6>
            </div>
            <div class="col-md-9 pe-5">
                <input type="file" class="form-control form-control-lg" id="vphoto" name="vphoto" value=<?php echo $vphoto; ?> />
            </div>
        </div>
        <button type="submit" class="btn btn-primary" id="regbutton" name="submit">
            Update
        </button>


    </form>
</div>
<script>
    function validation() {
        var vname = document.getElementById('vname').value;
        var vnum = document.getElementById('vnum').value;
        var vphoto = document.getElementById('vphoto').value;

        if (vname === "" || vnum === "") {
            alert("Please fill in all required fields.");
            return false;
        }

        return true;
    }
</script>