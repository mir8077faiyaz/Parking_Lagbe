   <!-- <div class="cardgroup">
     <h1>Saved Vehicles</h1>
     <table class="table">
       <tbody>
         <tr>
           <td>
             <a class="vehicle-link" href="#">
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
     <link rel="stylesheet" type="text/css" href="../css/userprofile.css" />
     <?php
      session_start();
      require_once "connect.php";
      $email = $_SESSION["uemail"];
      $query = "select VName,VNum,VPhoto from `vehicledetails` join `user` using(UID) where Email ='$email'";
      $result = mysqli_query($conn, $query);

      ?>
     <h1>My Vehicle</h1>

     <?php
      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
         <div class="card">
           <img src="<?php echo $row['VPhoto'] ?>" alt="my car picture" />
           <!-- <p class="cartitle"><?php echo $row['VName'] ?></p>
           <div class="caroverlay"></div>
           <div class="button carbtn"><a href="#"> CHANGE CAR DETAILS </a></div> -->
           <h6>Car Name: <?php echo $row['VName'] ?></h6>
           <?php
            echo
            '<button class="btn btn-primary"><a href="updateuservehicle.php?updateid=' . $email . '" class="text-light">Update</a></button>'
            ?>
         </div>
         </tr>
     <?php
        }
      } else {
        echo 'No Data to show';
      }
      ?>
   </div>