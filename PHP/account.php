<div class="card">
  <div class="account-tab" id="v-pills-tabContent">
    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
      <h1>Account Settings</h1>
      <form class="needs-validation" novalidate>
        <?php
        session_start();
        require_once "connect.php";
        $email = $_SESSION["uemail"];
        $sql = "select * from `user` where Email ='$email'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $fname = $row['Fname'];
        $lname = $row['Lname'];
        $pass = $row['Password'];
        $phone = $row['PhoneNum'];
        ?>
        <div class="form-row">
          <div class="col-md-4 mb-3">
            <label for="validationCustom01">First name</label>
            <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value=<?php echo $fname ?> required />
            <div class="valid-feedback">Looks good!</div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="validationCustom02">Last name</label>
            <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value=<?php echo $lname ?> required />
            <div class="valid-feedback">Looks good!</div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-4 mb-3">
            <label for="validationPhoneNumber">Phone Number</label>
            <div class="input-group">
              <input type="tel" class="form-control" id="validationPhoneNumber" placeholder="Phone number" value=<?php echo $phone ?> aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
                Please enter a valid phone number.
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="pass">Password</label>
            <input type="password" class="form-control" id="pass" name="pass" value=<?php echo $pass ?> required />
            <div class="invalid-feedback">Enter a valid password.</div>
          </div>
          <!-- <div class="col-md-4 mb-3">
            <label>Vehicle Owner</label>
            <p><?php echo $vowner ?></p>
          </div>
          <div class="col-md-4 mb-3">
            <label>Parking Spot Renter</label>
            <p><?php echo $powner ?></p>
          </div> -->
        </div>
    </div>
    <?php
    echo
    '<button class="btn btn-primary"><a href="updateaccount.php?updateid=' . $email . '" class="text-light">Update</a></button>'
    ?>
    </form>
  </div>
  <!-- <script>
    var p = document.getElementById("pass");
    var w = document.getElementById("pass-warn");
    var l = document.getElementById("length");

    p.onfocus = function() {
      w.style.display = "block";
    }
    p.onblur = function() {
      w.style.display = "none";
    }

    p.onkeyup = function() {
      if (l.value.length > 8 || l.value.length < 16) {
        w.classList.remove("invalid");
        w.classList.add("valid");
      } else {
        w.classList.remove("valid");
        w.classList.add("invalid");
      }
    }
  </script> -->
</div>