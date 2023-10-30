<!-- <div class="cardgroup">
  <h1>Saved Parking Spots</h1>
  <table class="table">
    <tbody>
      <tr>
        <td>
          <a class="spot-link" href="#">
            <div class="card align-items-center justify-content-center">
              <h3 class="">+ Add new</h3>
            </div>
          </a>
        </td>
        <td>
          <div class="card"></div>
        </td>
        <td>
          <div class="card"></div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="card"></div>
        </td>
        <td>
          <div class="card"></div>
        </td>
        <td>
          <div class="card"></div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="card"></div>
        </td>
        <td>
          <div class="card"></div>
        </td>
        <td>
          <div class="card"></div>
        </td>
      </tr>
    </tbody>
  </table>
</div> -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

<div class="card">
  <?php
  session_start();
  require_once "connect.php";
  $email = $_SESSION["uemail"];
  $query = "select Plocation,X(Pcoordinate) AS latitude, Y(Pcoordinate) AS longitude,Pphoto,Psize,Costhour,Security,Others from `parkingspotdetails` join `user` using(UID) where Email ='$email' ";
  $result = mysqli_query($conn, $query);

  ?>
  <h1>Saved Parking Spot</h1>
  <table class="table table-bordered text-center w-100">
    <tr>
      <th>Location</th>
      <th>Parking Space Photo</th>
      <th>Parking Size</th>
      <th>Cost per hour</th>
      <th>Security</th>
      <th>Others</th>
      <!-- <th>Operation</th> -->
    </tr>
    <tr>
      <?php
      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
          <td><?php echo $row['Plocation']; ?></td>
          <td><img src="<?php echo $row['Pphoto']; ?>" alt="Parking Spot Picture"></td>
          <td><?php echo $row['Psize']; ?></td>
          <td><?php echo $row['Costhour']; ?></td>
          <td><?php echo $row['Security']; ?></td>
          <td><?php echo $row['Others']; ?></td>
          <!-- <?php
          echo
          '<td><button class="btn btn-primary"><a href="updateuserspot.php?updatespot=' . $email . '" class="text-light">Update</a></button>
                        </td>'
          ?> -->
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