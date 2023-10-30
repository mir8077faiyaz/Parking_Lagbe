<?php
include 'connect.php';
$pid = $_GET['updateid'];
$sql = "select PID,UID,Plocation,X(Pcoordinate) as latitude, Y(Pcoordinate) as longitude,Pphoto, Psize,Costhour,Security,Others from parkingspotdetails where PID=$pid";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$ploc = $row['Plocation'];
$pxcoor = $row['latitude'];
$pycoor = $row['longitude'];
$photo = $row['Pphoto'];
$psize = $row['Psize'];
$cost = $row['Costhour'];
$security = $row['Security'];
$others = $row['Others'];

if (isset($_POST['submit'])) {
    $ploc = $_POST['ploc'];
    $pxcoor = $_POST['xcoor'];
    $pycoor = $_POST['ycoor'];
    $photo = $_POST['photo'];
    $psize = $_POST['psize'];
    $cost = $_POST['cost'];
    $security = $_POST['security'];
    $others = $_POST['others'];

    $sql = "update `parkingspotdetails` set Plocation='$ploc',Pcoordinate=POINT($pxcoor,$pycoor),Pphoto='../image/$photo',Psize='$psize',Costhour='$cost',Security='$security',Others='$others' where PID=$pid";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "Updated Successfully";
        header('location:admin.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpq_AT05oYjZcuMcsLuH_NLeKdZDJSLTU&libraries=places"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <title>Update Spot</title>
</head>
<body>
    
<div class="container my-5">
    <form onsubmit="return validation();" onkeydown="return event.key != 'Enter';" method="post">
        <div class="row align-items-center pt-4 pb-3">
            <div class="col-md-3 ps-5">
                <h6 class="mb-0 text-black">Parking Location</h6>
            </div>
            <div class="col-md-9 pe-5">
                <input type="text" class="form-control form-control-lg" id="ploc" name="ploc" value=<?php echo $ploc; ?> />
            </div>
        </div>

        <div class="row align-items-center pt-4 pb-3">
            <div class="col-md-3 ps-5">
                <h6 class="mb-0 text-black">Parking Coordinates</h6>
                <h6 class="mb-0 text-black" id="latitude">Latitude:</h6>
                <input type="number" class="form-control form-control-lg" id="xcoor" name="xcoor" value=<?php echo $pxcoor; ?> />
                <h6 class="mb-0 text-black" id="longitude">Longitude:</h6>
                <input type="number" class="form-control form-control-lg" id="ycoor" name="ycoor" value=<?php echo $pycoor; ?> />
            </div>
            <div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mapModal"> Open Map</button>
            </div>
            <!-- <div class="col-md-9 pe-5">
                <input type="text" class="form-control form-control-lg" id="pcoor" name="pcoor" value=<?php echo $pcoor; ?> />
            </div> -->
        </div>
        <div class="row align-items-center pt-4 pb-3">
            <div class="col-md-3 ps-5">
                <h6 class="mb-0 text-black">Parking Spot Photo</h6>
            </div>
            <div class="col-md-9 pe-5">
                <input type="file" class="form-control form-control-lg" id="photo" name="photo" value=<?php echo $photo; ?> />
            </div>
        </div>
        <div class="row align-items-center pt-4 pb-3">
            <div class="col-md-3 ps-5">
                <h6 class="mb-0 text-black">Parking Size</h6>
            </div>
            <div class="col-md-9 pe-5">
                <input type="text" class="form-control form-control-lg" id="psize" name="psize" value=<?php echo $psize; ?> />
            </div>
        </div>
        <div class="row align-items-center pt-4 pb-3">
            <div class="col-md-3 ps-5">
                <h6 class="mb-0 text-black">Cost</h6>
            </div>
            <div class="col-md-9 pe-5">
                <input type="number" class="form-control form-control-lg" id="cost" name="cost" value=<?php echo $cost; ?> />
            </div>
        </div>
        <div class="row align-items-center pt-4 pb-3">
            <div class="col-md-3 ps-5">
                <h6 class="mb-0 text-black">Security</h6>
            </div>
            <div class="col-md-9 pe-5">
                <input type="text" class="form-control form-control-lg" id="security" name="security" value=<?php echo $security; ?> />
            </div>
        </div>
        <div class="row align-items-center pt-4 pb-3">
            <div class="col-md-3 ps-5">
                <h6 class="mb-0 text-black">Others</h6>
            </div>
            <div class="col-md-9 pe-5">
                <input type="text" class="form-control form-control-lg" id="others" name="others" value=<?php echo $others; ?> />
            </div>
        </div>
        <button type="submit" class="btn btn-primary" id="regbutton" name="submit">
            Update
        </button>
    </form>

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
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>

    <script>
    function validation() {
        var location = document.getElementById('ploc').value;
        var photo = document.getElementById('photo').value;
        var size = document.getElementById('psize').value;
        var cost = document.getElementById('cost').value;
        var security = document.getElementById('security').value;
        var others = document.getElementById('others').value;

        if (location === "" || size === "" || cost === "" || security === "" || others === "") {
            alert("Please fill in all required fields.");
            return false;
        }

        return true;
    }
    </script>

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








