<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

<?php
include 'connect.php';
$email = $_GET['updateid'];
$sql = "select Fname, Lname, PhoneNum, Password from `user` where Email='" . mysqli_escape_string($conn, $email) . "'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$fname = $row['Fname'];
$lname = $row['Lname'];
$phone = $row['PhoneNum'];
$pass = $row['Password'];

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];

    $sql = "update `user` set Fname='$fname',Lname='$lname',PhoneNum='$phone',Password='$pass' where Email='" . mysqli_escape_string($conn, $email) . "'";
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
                <h6 class="mb-0 text-black">First Name</h6>
            </div>
            <div class="col-md-9 pe-5">
                <input type="text" class="form-control form-control-lg" id="fname" name="fname" value=<?php echo $fname; ?> />
            </div>
        </div>

        <div class="row align-items-center pt-4 pb-3">
            <div class="col-md-3 ps-5">
                <h6 class="mb-0 text-black">Last Name</h6>
            </div>
            <div class="col-md-9 pe-5">
                <input type="text" class="form-control form-control-lg" id="lname" name="lname" value=<?php echo $lname; ?> />
            </div>
        </div>
        <div class="row align-items-center pt-4 pb-3">
            <div class="col-md-3 ps-5">
                <h6 class="mb-0 text-black">Phone Number</h6>
            </div>
            <div class="col-md-9 pe-5">
                <input type="tel" class="form-control form-control-lg" id="phone" name="phone" value=<?php echo $phone; ?> />
            </div>
        </div>
        <div class="row align-items-center pt-4 pb-3">
            <div class="col-md-3 ps-5">
                <h6 class="mb-0 text-black">Password</h6>
            </div>
            <div class="col-md-9 pe-5">
                <input type="password" class="form-control form-control-lg" id="pass" name="pass" value=<?php echo $pass; ?> />
            </div>
        </div>
        <button type="submit" class="btn btn-primary" id="regbutton" name="submit">
            Update
        </button>


    </form>
</div>
<script>
    function validation() {
        var firstname = document.getElementById('fname').value;
        var lastname = document.getElementById('lname').value;
        var phone = document.getElementById('phone').value;
        var pass = document.getElementById('pass').value;

        if (firstname === "" || lastname === "" || phone === "" || pass === "") {
            alert("Please fill in all required fields.");
            return false;
        }

        return true;
    }
</script>