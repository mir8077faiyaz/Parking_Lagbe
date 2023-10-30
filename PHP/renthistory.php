<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

<div class="cardgroup">
  <?php
  require_once "connect.php";
  session_start();
  if (isset($_SESSION["username"])) {
    $email = $_SESSION["email"];
  }
  // $query = "SELECT PID, Date, TotalHours, TotalCost FROM parkinghistory";
  // $result = mysqli_query($conn, $query);
  $sql = "SELECT parkinghistory.PID, parkinghistory.Date, parkinghistory.TotalHours, parkinghistory.TotalCost
        FROM user
        JOIN parkingspotdetails ON user.UID = parkingspotdetails.UID
        JOIN parkinghistory ON parkingspotdetails.PID = parkinghistory.PID
        WHERE user.Email='$email'";
  $result = mysqli_query($conn, $sql);


  ?>
  <h1>Renting History</h1>
  <table class="table table-bordered text-center w-100">
    <tr>
      <th>Parking ID</th>
      <th>Date</th>
      <th>Total Hour</th>
      <th>Total Cost</th>
    </tr>
    <?php
    if ($result) {
      while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
          <td><?php echo $row['PID']; ?></td>
          <td><?php echo $row['Date']; ?></td>
          <td><?php echo $row['TotalHours']; ?></td>
          <td><?php echo $row['TotalCost']; ?></td>
        </tr>
    <?php
      }
    } else {
      echo '<tr><td colspan="4">No Data to show</td></tr>';
    }
    ?>
  </table>
</div>
