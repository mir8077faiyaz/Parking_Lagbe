<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpq_AT05oYjZcuMcsLuH_NLeKdZDJSLTU&libraries=places"></script>
<div class="card table-responsive-xl px-4">
    <?php
    require_once "connect.php";

    $sql = "select PID,UID,Plocation,X(Pcoordinate) as latitude, Y(Pcoordinate) as longitude,Pphoto, Psize,Costhour,Security,Others from parkingspotdetails ";
    $result = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_assoc($result);

    // $latitude = $row['latitude'];
    // $longitude = $row['longitude'];

    // $query = "select * from parkingspotdetails";
    // $result = mysqli_query($conn, $query);

    ?>
    <h1>Parking Spots</h1>
    <table class="table table-bordered text-center w-100">
        <thead>
            <tr>
                <th>Parking ID</th>
                <th>User ID</th>
                <th>Location</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Parking Spot Photo</th>
                <th>Parking Size</th>
                <th>Cost per Hour</th>
                <th>Security</th>
                <th>Other info</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody id="showdata">
            <tr>
                <?php
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $pid = $row['PID'];
                ?>
                        <td><?php echo $row['PID']; ?></td>
                        <td><?php echo $row['UID']; ?></td>
                        <td><?php echo $row['Plocation']; ?></td>
                        <td><?php echo $row['latitude']; ?></td>
                        <td><?php echo $row['longitude']; ?></td>
                        <td><img src="<?php echo $row['Pphoto']; ?>" alt="Spot Picture"></td>
                        <td><?php echo $row['Psize']; ?></td>
                        <td><?php echo $row['Costhour']; ?></td>
                        <td><?php echo $row['Security']; ?></td>
                        <td><?php echo $row['Others']; ?></td>
                        <?php
                        echo
                        '<td><button class="btn btn-primary"><a href="updatespot.php?updateid=' . $pid . '" class="text-light">Update</a></button>
                            <button class="btn btn-danger"><a href="deletespot.php?deleteid=' . $pid . '" class="text-light">Delete</a></button>
                        </td>'
                        ?>
            </tr>
    <?php
                    }
                } else {
                    echo 'No Data to show';
                }
    ?>
        </tbody>
        </tr>
    </table>

    <script>
        $(document).ready(function() {
            $('#getEmail').on("keyup", function() {
                var getEmail = $(this).val();
                $.ajax({
                    method: 'POST',
                    url: 'searchajax.php',
                    data: {
                        email: getEmail
                    },
                    success: function(response) {
                        $("#showdata").html(response);
                    }
                });
            });
        });
    </script>
</div>