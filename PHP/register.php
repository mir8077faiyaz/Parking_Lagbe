<?php
require_once "connect.php";
session_start();
if (isset($_SESSION["email"])) {
    header("location: home.php"); // as the session is already set the user is logged in
    exit();
} elseif (isset($_COOKIE["email"])) {
    header("location: home.php"); // as the cookie is already set the user is logged in
    exit();
}

error_reporting(E_ERROR | E_PARSE);
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!--always connect to external css using :    ..\relative path-->
  <link rel="stylesheet" type="text/css" href="../Css/register.css" />

  <!-- Bootstrap CSS -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpq_AT05oYjZcuMcsLuH_NLeKdZDJSLTU&libraries=places"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

  <title>Register</title>
</head>

<body>
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">
      <h1>Parking Lagbe</h1>
    </a>
    <button class="navbar-toggler btn-btn-success" type="button" data-toggle="collapse"
      data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
      </ul>
    </div>
  </nav>

  <section class="" style="color: rgb(19, 1, 1)">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-9">
          <h1 class="text-black mb-4 ml-10" style="text-align: center; margin-bottom: 0">
            Register
          </h1>

          <div class="card bg-dark text-white ml-5 mr-5" style="
                border-radius: 15px;
                background-color: black;
                margin-top: 0px;
              ">
            <div class="card-body">
            <form action="register.php" onsubmit="return validation();" onkeydown="return event.key != 'Enter';" method="post" id="locationForm">

                <div class="row align-items-center pt-4 pb-3">
                  <div class="col-md-3 ps-5">
                    <h6 class="mb-0 text-white">First Name</h6>
                  </div>
                  <div class="col-md-9 pe-5">
                    <input type="text" class="form-control form-control-lg" id="fname" name="fname" />
                  </div>
                </div>

                <div class="row align-items-center pt-4 pb-3">
                  <div class="col-md-3 ps-5">
                    <h6 class="mb-0 text-white">Last Name</h6>
                  </div>
                  <div class="col-md-9 pe-5">
                    <input type="text" class="form-control form-control-lg" id="lname" name="lname"/>
                  </div>
                </div>

                <div class="row align-items-center py-3">
                  <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Email address</h6>
                  </div>
                  <div class="col-md-9 pe-5">
                    <input type="email" class="form-control form-control-lg" id="mail" name="email"/>
                  </div>
                </div>
                <div class="row align-items-center pt-4 pb-3">
                  <div class="col-md-3 ps-5">
                    <h6 class="mb-0 text-white pb-5">Password</h6>
                  </div>
                  <div class="col-md-9 pe-5">
                    <input type="password" class="form-control form-control-lg" id="pass" name="pass" />
                    <p class="text-muted" style="margin: top 0; margin-bottom: 0">
                    Password should be between 8 and 32 characters and should not contain special characters.
                    </p>
                  </div>
                </div>
                <div class="row align-items-center pt-4 pb-3">
                  <div class="col-md-3 ps-5">
                    <h6 class="mb-0 text-white">Phone Number</h6>
                  </div>
                  <div class="col-md-9 pe-5">
                    <input type="tel" class="form-control form-control-lg" id="phonenum" name="phone"/>
                  </div>
                </div>
                <div class="dropdown d-flex justify-content-center"  id="dropid">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <p id="mydrop">Register As</p>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button onclick="regFunction1()" type="button" class="dropdown-item" name="vowner">
                      Vehicle Owner
                    </button>
                    <button onclick="regFunction2()" type="button" class="dropdown-item" name="powner">
                      Spot Renter
                    </button>
                  </div>
                </div>
                <div id="vehicle-owner" style="display: none">
                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0 text-white">Vehicle Number</h6>
                    </div>
                    <div class="col-md-9 pe-5">
                      <input type="text" class="form-control form-control-lg" id="vnum" name="vnum"/>
                    </div>
                  </div>
                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0 text-white">Vehicle name</h6>
                    </div>
                    <div class="col-md-9 pe-5">
                      <input type="text" class="form-control form-control-lg" id="vname" name="vname"/>
                    </div>
                  </div>
                  <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0">Upload Vehicle Photo</h6>
                    </div>
                    <div class="col-md-9 pe-5">
                      <input class="form-control form-control-lg" type="file" id="vphoto" name="vphoto"/>
                    </div>
                  </div>
                </div>
                <div id="parking-owner" style="display: none">
                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0 text-white">Spot Location</h6>
                    </div>
                    <div class="col-md-9 pe-5">
                      <input type="text" class="form-control form-control-lg" id="slocation" name="slocation"/>
                    </div>
                  </div>
                  <div class="d-flex justify-content-center">
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#mapModal" > Open Map</button>
                  </div>
                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0 text-white">Space size</h6>
                    </div>
                    <div class="col-md-9 pe-5">
                      <input type="text" class="form-control form-control-lg" id="ssize" name="ssize"/>
                    </div>
                  </div>
                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0 text-white">Cost Per Hour</h6>
                    </div>
                    <div class="col-md-9 pe-5">
                      <input type="text" class="form-control form-control-lg" id="scost" name="scost"/>
                    </div>
                  </div>
                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0 text-white">Security</h6>
                    </div>
                    <div class="col-md-9 pe-5">
                      <input type="text" class="form-control form-control-lg" id="ssecure" name="ssecure"/>
                    </div>
                  </div>
                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0 text-white">Other Info</h6>
                    </div>
                    <div class="col-md-9 pe-5">
                      <input type="text" class="form-control form-control-lg" id="sothers" name="sothers" />
                    </div>
                  </div>

                  <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0">Upload Parking Space photo</h6>
                    </div>
                    <div class="col-md-9 pe-5">
                      <input class="form-control form-control-lg" type="file" id="sphoto" name="sphoto"/>
                    </div>
                  </div>
                </div>
                <div class="px-5 py-2 d-flex justify-content-center">
                  <button type="submit" class="btn btn-danger btn-lg" id="regbutton"
                    style="display: none;" name="submit">
                    Register
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 <!-- Map Modal -->
 <div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="mapModalLabel">Select Location on Map</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <div id="map" style="width: 100%; height: 400px;"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="saveLocation()">Save Location</button>
        </div>
      </div>
    </div>
  </div>
  <div class="randheight"></div>

  <footer class="myfoot">
    <p>
      ©&nbsp;Parking Lagbe 2023 &nbsp;| Developed by Shajreen, Mir and Abrar
    </p>
  </footer>
  <!--Stops form resubmission on refresh-->
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

  <!--For Different Registration options-->
  <script>
    var whichowner = -1; //to check which owner
    function regFunction1() {
      y = document.getElementById("parking-owner");
      y.style.display = "none";
      x = document.getElementById("vehicle-owner");
      x.style.display = "block";
      a = document.getElementById("regbutton");
      a.style.display = "block";
      whichowner = 1; // for vehicle 
      document.getElementById("mydrop").innerText = "Vehicle Owner";
      
    }

    function regFunction2() {

      y = document.getElementById("parking-owner");
      y.style.display = "block";
      x = document.getElementById("vehicle-owner");
      x.style.display = "none";
      a = document.getElementById("regbutton");
      a.style.display = "block";
      whichowner = 0; // for parking space owner
      document.getElementById("mydrop").innerText = "Parking Spot Renter";
    }

    function validation() {
      const ids = [];
      //0-4 main info
      //5-7 vehicle info
      //8-14 parking space info
      ids.push(
        "fname", //0
        "lname", //1
        "mail",  //2
        "pass",  //3
        "phonenum", //4
        "vnum", //5
        "vname", //6
        "vphoto", //7
        "slocation", //8
        "ssize", //9
        "scost", //10
        "ssecure", //1
        "sothers", //12
        "sphoto" //13
      );
      const idvar = [];
      console.log(whichowner);
      for (var i = 0; i < ids.length; i++) {
        idvar[i] = document.getElementById(ids[i]);
        console.log(idvar[i]);
      }
      console.log(whichowner);
      //for basic form information
      if (
        idvar[0].value.trim() == "" ||
        idvar[1].value.trim() == "" ||
        idvar[2].value.trim() == "" ||
        idvar[3].value.trim() == "" ||
        idvar[4].value.trim() == ""
      ) {
        alert("Cannot leave fields blank");
        
        return false;
      }
      var phoneregex = /^(\+\d{1,2})?\d{11}$/;
      if(!(phoneregex.test(idvar[4].value))){
        alert("Phone number must be 11 digits and must contain digits only");
        
        return false;
      }
      var emailregex=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      if(!(emailregex.test(idvar[2].value))){
        alert("Invalid Email");
        return false;
      }

      //Password validation
      var p = document.getElementById("pass").value;
      if(p.length < 8 || p.length > 32 || !/^[a-zA-Z0-9]+$/.test(p)) {
        //console.log("Here for password!");
        alert('Password should be between 8 and 32 characters and should not contain special characters.');
        
        return false;
      }
      //Password validation
      //for vehicle owner and parking space owner
      // if(whichowner==0){
      //   if(!(is_numeric(idvar[10].value))){
      //     alert("Cost Must be an integer or float only");
          
      //     return false;
      //   }
      // }
      var sc=document.getElementById("scost").value;
      if(!(/^[0-9]+$/.test(sc)) && whichowner==0){
        alert("Cost Must be an integer or float only");
        return false;
      }


      if (
        whichowner == 1 &&
        (idvar[5].value.trim() == "" ||
          idvar[6].value.trim() == "" ||
          idvar[7].value.files.length == 0)
      ) {
        alert("Cannot leave fields blank");
        
        return false;
      } else if (
        whichowner == 0 &&
        (idvar[8].value.trim() == "" ||
          idvar[9].value.trim() == "" ||
          idvar[10].value.trim() == "" ||
          idvar[11].value.trim() == "" ||
          idvar[12].value.trim() == "" ||
          idvar[13].value.files.length == 0)
      ) {
        alert("Cannot leave fields blank");
        
        return false;
      } else {
        return true;
      }
    }
  </script>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>

<!-- Combined JavaScript code -->

<script>
  var map;
  var mapMarkers = []; // Declare an array to store markers
  var searchBox;

  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -34.397, lng: 150.644},
      zoom: 8
    });

    // Add a click event listener to the map
    google.maps.event.addListener(map, 'click', function(event) {
      placeMarker(event.latLng);
    });

    // Create the search box only if it doesn't exist
    if (!searchBox) {
      createSearchBox();
    }
  }

  function createSearchBox() {
    // Create the search box and link it to the UI element.
    var input = document.createElement('input');
    input.id = 'pac-input';
    input.className = 'controls';
    input.type = 'text';
    input.placeholder = 'Search Box';
    document.getElementById('mapModal').getElementsByClassName('modal-body')[0].appendChild(input);

    searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
      searchBox.setBounds(map.getBounds());
    });

    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function() {
      var places = searchBox.getPlaces();

      if (places.length == 0) {
        return;
      }

      // Clear existing markers
      mapMarkers.forEach(marker => marker.setMap(null));
      mapMarkers = [];

      // For each place, get the icon, name and location.
      var bounds = new google.maps.LatLngBounds();
      places.forEach(function(place) {
        if (!place.geometry) {
          console.log("Returned place contains no geometry");
          return;
        }

        // Place a marker for each place.
        var marker = new google.maps.Marker({
          map: map,
          title: place.name,
          position: place.geometry.location
        });

        mapMarkers.push(marker);

        if (place.geometry.viewport) {
          // Only geocodes have viewport.
          bounds.union(place.geometry.viewport);
        } else {
          bounds.extend(place.geometry.location);
        }
      });
      map.fitBounds(bounds);
    });
  }

  function placeMarker(location) {
    // Clear existing markers
    mapMarkers.forEach(marker => marker.setMap(null));
    mapMarkers = [];

    // Place a marker at the clicked location
    var marker = new google.maps.Marker({
      position: location,
      map: map
    });

    mapMarkers.push(marker);
  }

  function saveLocation() {
    // Retrieve latitude and longitude from the marker (you can modify this based on your requirements)
    var marker = mapMarkers[0];
    if (marker) {
      var lat = marker.getPosition().lat();
      var lng = marker.getPosition().lng();

      var latInput = document.createElement('input');
      latInput.type = 'hidden';
      latInput.name = 'latitude';
      latInput.value = lat;
      document.getElementById('locationForm').appendChild(latInput);

      var lngInput = document.createElement('input');
      lngInput.type = 'hidden';
      lngInput.name = 'longitude';
      lngInput.value = lng;
      document.getElementById('locationForm').appendChild(lngInput);

      // Do something with the latitude and longitude (e.g., store in PHP variables or send to the server)
      console.log("Latitude: " + lat + ", Longitude: " + lng);
    }

    // Close the modal
    $('#mapModal').modal('hide');
  }

  // Trigger initMap when the modal is shown
  $('#mapModal').on('shown.bs.modal', function() {
    initMap();
  });

  // Destroy search box when the modal is hidden
  $('#mapModal').on('hidden.bs.modal', function() {
    if (searchBox) {
      searchBox.unbindAll();
      searchBox = null;
      $('#pac-input').remove();
    }
  });

</script>


</body>

</html>
<?php 
  print_r($_POST);

  if(isset($_POST["submit"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $phone = $_POST["phone"];
    $vnum = $_POST["vnum"];
    $vname = $_POST["vname"];

    $vphoto = $_POST["vphoto"];
    $slocation = $_POST["slocation"];
    $ssize = $_POST["ssize"];
    $scost = $_POST["scost"];
    $ssecure = $_POST["ssecure"];
    $sothers = $_POST["sothers"];
    $sphoto = $_POST["sphoto"];
    $lat = $_POST["latitude"];
    $long = $_POST["longitude"];

    // this if for parking owner only.
    if (empty($vnum) || empty($vname) || empty($vphoto)) {
        $sql1 = "INSERT INTO `user`(`Fname`, `Lname`, `Email`, `Password`, `PhoneNum`, `VOwner`, `POwner`) VALUES ('$fname','$lname','$email','$pass','$phone','no','yes')";

        //Exception handling code starts:
        try {
            $result = mysqli_query($conn, $sql1);
            if ($result) {
                $sql2 = "SELECT `UID` FROM `user` where Email='$email'";
                $result2 = mysqli_query($conn, $sql2);
                $row = mysqli_fetch_assoc($result2);
                $uid = $row["UID"];
                $sql3 = "INSERT INTO `parkingspotdetails`(`UID`, `Plocation`, `Pcoordinate`, `Pphoto`, `Psize`, `Costhour`, `Security`, `Others`) 
             VALUES ('$uid', '$slocation', ST_GeomFromText('POINT($lat $long)'), '../image/$sphoto', '$ssize', '$scost', '$ssecure', '$sothers')";

                $result3 = mysqli_query($conn, $sql3);
                echo "<script>window.location.replace('login.php')</script>";
            }
        } catch (mysqli_sql_exception $e) {
            echo "<script>alert('Email address is already registered. Please use a different email.');</script>";
        }
        //Exception handling code ends:
    }
    // this else if for vehicle owner only.
    elseif (
        empty($slocation) ||
        empty($ssize) ||
        empty($scost) ||
        empty($ssecure) ||
        empty($sothers) ||
        empty($sphoto)
    ) {
        $sql1 = "INSERT INTO `user`(`Fname`, `Lname`, `Email`, `Password`, `PhoneNum`, `VOwner`, `POwner`) VALUES ('$fname','$lname','$email','$pass','$phone','yes','no')";
        //Exception handling code starts:
        try {
            $result = mysqli_query($conn, $sql1);
            if ($result) {
                $sql2 = "SELECT `UID` FROM `user` where Email='$email'";
                $result2 = mysqli_query($conn, $sql2);
                $row = mysqli_fetch_assoc($result2);
                $uid = $row["UID"];
                $sql3 = "INSERT INTO `vehicledetails`(`UID`, `VName`, `VNum`,`VPhoto`) VALUES ('$uid','$vname','$vnum','../image/$vphoto')";
                $result3 = mysqli_query($conn, $sql3);
                echo "<script>window.location.replace('login.php')</script>";
            }
        } catch (mysqli_sql_exception $e) {
            echo "<script>alert('Email address is already registered. Please use a different email.');</script>";
        }
        //Exception handling code ends:
    } else {
        $sql1 = "INSERT INTO `user`(`Fname`, `Lname`, `Email`, `Password`, `PhoneNum`, `VOwner`, `POwner`) VALUES ('$fname','$lname','$email','$pass','$phone','yes','yes')";
        //Exception handling code starts:
        try {
            $result = mysqli_query($conn, $sql1);
            if ($result) {
                $sql2 = "SELECT `UID` FROM `user` where Email='$email'";
                $result2 = mysqli_query($conn, $sql2);
                $row = mysqli_fetch_assoc($result2);
                $uid = $row["UID"];
                $sql3 = "INSERT INTO `parkingspotdetails`(`UID`, `Plocation`, `Pcoordinate`, `Pphoto`, `Psize`, `Costhour`, `Security`, `Others`) 
         VALUES ('$uid', '$slocation', ST_GeomFromText('POINT(40.71727401 -74.00898606)'), '../image/$sphoto', '$ssize', '$scost', '$ssecure', '$sothers')";

                $result3 = mysqli_query($conn, $sql3);

                $sql4 = "INSERT INTO `vehicledetails`(`UID`, `VName`, `VNum`,`VPhoto`) VALUES ('$uid','$vname','$vnum','../image/$vphoto')";
                $result3 = mysqli_query($conn, $sql4);
                echo "<script>window.location.replace('login.php')</script>";
            }
        } catch (mysqli_sql_exception $e) {
            echo "<script>alert('Email address is already registered. Please use a different email.');</script>";
        }
        //Exception handling code ends:
    }
    // else for both parking owners and vehicle owners.
}

?>
