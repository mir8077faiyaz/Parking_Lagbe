<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

<?php
include 'connect.php';
$pid = $_GET['updateid'];
$sql = "select * from `activeparking` where PID=$pid";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$timestart = $row['Timestart'];
$timeend = $row['Timeend'];
$status = $row['Status'];

// if (isset($_POST['submit'])) {
//     $timestart = $_POST['timestart'];
//     $timeend = $_POST['timeend'];
//     $status = $_POST['status'];

//     $sql = "update `activeparking` set OID=$pid,Timestart='$timestart',Timeend='$timeend',Status='$status' where OID=$oid";
//     $result = mysqli_query($conn, $sql);
//     if ($result) {
//         // echo "Updated Successfully";
//         header('location:admin.php');
//     } else {
//         die(mysqli_error($conn));
//     }
// }
?>

<div>
    <form class="search" method="post">
        <div class="form-group" id="startTimeSelect">
            <label for="exampleFormControlSelect1">Start Time</label>
            <select class="form-control" id="exampleFormControlSelect1" name="starttime" id="startTimeSelect">
                <option><?php echo $timestart ?></option>
                <option>06:00:00</option>
                <option>07:00:00</option>
                <option>08:00:00</option>
                <option>09:00:00</option>
                <option>10:00:00</option>
                <option>11:00:00</option>
                <option>12:00:00</option>
                <option>13:00:00</option>
                <option>14:00:00</option>
                <option>15:00:00</option>
                <option>16:00:00</option>
                <option>17:00:00</option>
                <option>18:00:00</option>
                <option>19:00:00</option>
                <option>20:00:00</option>
                <option>21:00:00</option>
                <option>22:00:00</option>
                <option>23:00:00</option>
            </select>
        </div>
        <div class="form-group" id="endTimeSelect">
            <label for="exampleFormControlSelect1">End Time</label>
            <select class="form-control" id="exampleFormControlSelect1" name="endtime">
                <option><?php echo $timeend ?></option>
                <option>06:00:00</option>
                <option>07:00:00</option>
                <option>08:00:00</option>
                <option>09:00:00</option>
                <option>10:00:00</option>
                <option>11:00:00</option>
                <option>12:00:00</option>
                <option>13:00:00</option>
                <option>14:00:00</option>
                <option>15:00:00</option>
                <option>16:00:00</option>
                <option>17:00:00</option>
                <option>18:00:00</option>
                <option>19:00:00</option>
                <option>20:00:00</option>
                <option>21:00:00</option>
                <option>22:00:00</option>
                <option>23:00:00</option>
            </select>
        </div>
        <button type="submit" class="btn btn-danger form-group" name="submit">Update Time</button>
    </form>
</div>
<div class="cardflex" style="width: 75%;">
    <!--PHP HERE-->
    <?php
    //echo date("h:00:00", time());
    if (isset($_POST["submit"])) {
        $nosearch = 0;
        $start = (int)str_replace(':', '', $_POST["starttime"]);
        $end = (int)str_replace(':', '', $_POST["endtime"]);
        if ($end < $start) {
            echo '<script>alert("Start time cannot be after End time")</script>';
        } else if ($start == $end) {
            echo '<script>alert("Start time cannot be the same as End time")</script>';
        } else {

            if ($start == "10" || $start == "20") {
                $strim = rtrim($start, '0');
                $strim = $strim . '0';
            } else {
                $strim = rtrim($start, '0');
            }
            if ($end == "10" || $end == "20") {

                $etrim = rtrim($end, '0');
                $etrim = $etrim . '0';
                //echo $etrim;
            } else {
                $etrim = rtrim($end, '0');
            }

            $sql = "UPDATE `activeparking` SET `Timestart`='$strim:00:00', `Timeend`='$etrim:00:00', `Status`='booked' WHERE `PID`='$pid'";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                // echo "Updated Successfully";
                header('location:admin.php');
            } else {
                die(mysqli_error($conn));
            }
            // $sql4="INSERT INTO `activeparking`(`PID`, `Timestart`, `Timeend`, `Status`) VALUES ('$pid','00:00:00','00:00:00','open')";
            // $result4=mysqli_query($conn,$sql4);

            // $mail=$_SESSION['email'];
            // $sql="Select * from `user` where Email='$mail'";
            // $result=mysqli_query($conn,$sql);
            // $row=mysqli_fetch_assoc($result);
            // $uid=$row['UID'];
            // $sql="Select * from `vehicledetails` where UID='$uid'";
            // $result=mysqli_query($conn,$sql);
            // $row=mysqli_fetch_assoc($result);
            // $vid=$row['VID'];
            // $date=date("Y/m/d");
            // // insert into parking history
            // $sqlf="INSERT INTO `parkinghistory`(`VID`, `PID`, `Date`, `TotalHours`, `TotalCost`) VALUES ('$vid','$pid','$date','$totalhrs','$totalcost')";
            // $res=mysqli_query($conn,$sqlf);
        }
        // // using location find PID from parkingdetails table
        // $sql = "SELECT * FROM `parkingspotdetails` WHERE Plocation LIKE '%$location%'";
        // $result = mysqli_query($conn, $sql);
        // while ($row = mysqli_fetch_assoc($result)) {
        //     $pid = $row['PID'];
        //     $bookflag = 1;

        // check if this PID already exists in the active parking table and slots are free.
        //     $sql1 = "select * from `activeparking` where OID=$oid";
        //     $result1 = mysqli_query($conn, $sql1);
        //     if ($result1) {
        //         $count = mysqli_num_rows($conn->query($sql1));
        //         if ($count > 0) {
        //             //For the existing parkings in active parking, update any necessary slots.
        //             $cur = date("h:00:00", time());
        //             $currint = (int)str_replace(':', '', $cur); // current time in integer

        //             while ($row1 = mysqli_fetch_assoc($result1)) {
        //                 $stime = (int)str_replace(':', '', $row1["Timestart"]); //start time in integer
        //                 $etime = (int)str_replace(':', '', $row1["Timeend"]); //end time in integer
        //                 $status = $row1["Status"];
        //                 if (($currint >= $etime) && $status == "booked") {
        //                     // Lists the spot which was booked.
        //                     //$oid=$row1['OID'];
        //                     //$freearr[]=$oid;
        //                     //free the parking space.
        //                     $sql3 = "UPDATE `activeparking` SET `Timestart`='00:00:00', `Timeend`='00:00:00', `Status`='open'";
        //                     $result3 = mysqli_query($conn, $sql3);
        //                 }

        //                 if ($start == $stime && $end == $etime) { //7-11
        //                     $bookflag = 0;
        //                     //echo "here2";
        //                 } else if ($start > $stime && $end < $etime) { // 8-10
        //                     $bookflag = 0;
        //                     //echo "here3";
        //                 } else if ($start < $stime && $end < $etime && $end > $stime) { //6-7
        //                     $bookflag = 0;
        //                     //echo "here4";
        //                 } else if ($start >= $stime && $end >= $etime && $start < $etime) {
        //                     //8 to 12, 8<11
        //                     $bookflag = 0;
        //                     //echo "here5";
        //                 } else if ($start < $stime && $end >= $etime) {
        //                     $bookflag = 0;
        //                     //echo "here6";
        //                 } else if ($start <= $stime && $end <= $stime) {
        //                     $bookflag = 1;
        //                     //echo "here7";
        //                 }
        //             }
        //             // No parking was found in active parking table
        //         } else {
        //             $sql4 = "INSERT INTO `activeparking`(`OID`, `Timestart`, `Timeend`, `Status`) VALUES ('$pid','00:00:00','00:00:00','open')";
        //             $result4 = mysqli_query($conn, $sql4);
        //         }
        //     }
        //     //display this location with the current PID once.
        //     if ($bookflag == 1) {
        //         echo '<div class="card mt-4">';
        //         echo '<div class="card-header">';
        //         echo $row['Plocation'];
        //         echo '</div>';
        //         echo '<div class="card-body">';
        //         $img = $row['Pphoto'];
        //         echo "<img src='$img'  "; //needs styling
        //         echo "alt='Parking Spot Image'>";
        //         echo "<p class='card-text'>Cost per hour:";
        //         echo $row['Costhour'];
        //         echo "</p>";
        //         echo "<a href='details.php?pid=$pid&start=$start&end=$end'";
        //         echo 'class="btn btn-primary">View Details</a>';
        //         echo '</div>';
        //         echo '</div>';
        //         $nosearch = 1;
        //     }
        //     // }
        // }

        // if ($nosearch == 0) {
        //     echo '<h1> No Results Found,Search Again! </h1>';
        // }
    }
    ?>
</div>

<!-- <div class="container my-5">
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
                <input type="tel" class="form-control form-control-lg" id="phonenum" name="phone" value=<?php echo $phone; ?> />
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

        if (firstname === "" || lastname === "" || phone === "") {
            alert("Please fill in all required fields.");
            return false;
        }

        return true;
    }
</script> -->