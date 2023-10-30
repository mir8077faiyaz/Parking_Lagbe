<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

<div class="card">
  <?php
  session_start();
  require_once "connect.php";
  $email = $_SESSION["uemail"];
  $query = "select PID,Date,TotalHours,TotalCost from `parkinghistory` join `vehicledetails` using(VID) join `user` using(UID) where Email ='$email' ";
  $result = mysqli_query($conn, $query);

  ?>
  <h1>Parking History</h1>
  <!-- <div class="card">
     <h4>Date of Parking:</h4>
     <h4>Time:</h4>
     <h4>Location:</h4>
     <h4>Vehicle:</h4>
   </div>
   <div class="card">
     <h4>Date of Parking:</h4>
     <h4>Time:</h4>
     <h4>Location:</h4>
     <h4>Vehicle:</h4>
   </div>
   <div class="card">
     <h4>Date of Parking:</h4>
     <h4>Time:</h4>
     <h4>Location:</h4>
     <h4>Vehicle:</h4>
   </div> -->
  <table class="table table-bordered text-center w-100">
    <tr>
      <th>Parking ID</th>
      <th>Date</th>
      <th>Start Time</th>
      <th>End Time</th>
      <th>Total Hour</th>
      <th>Total Cost</th>
    </tr>
    <tr>
      <?php
      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
          <td><?php echo $row['PID']; ?></td>
          <?php
          $sql = "SELECT `Timestart`, `Timeend` FROM `activeparking` WHERE PID='" . $row['PID'] . "' AND Status='booked'";
          $result1 = mysqli_query($conn, $sql);
          $row1=mysqli_fetch_assoc($result1);

          ?>
          <td><?php echo $row['Date']; ?></td>
          <td><?php echo $row1['Timestart']; ?></td>
          <td><?php echo $row1['Timeend']; ?></td>
          <td><?php echo $row['TotalHours']; ?></td>
          <td><?php echo $row['TotalCost']; ?></td>
    </tr>
<?php
        }
      } else {
        echo 'No Data to show';
      }
?>

</tr>
  </table>
</div>