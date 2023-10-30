<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

<div class="card table-responsive-xl px-4">
    <?php
    require_once "connect.php";

    $sql = "select * from vehicledetails ";
    $result = mysqli_query($conn, $sql);

    ?>
    <h1>Registered Vehicles</h1>
    <table class="table table-bordered text-center w-100">
        <thead>
            <tr>
                <th>Vehicle ID</th>
                <th>User ID</th>
                <th>Vehicle Name</th>
                <th>Vehicle Number</th>
                <th>Vehicle Photo</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody id="showdata">
            <tr>
                <?php
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $vid = $row['VID'];
                ?>
                        <td><?php echo $row['VID']; ?></td>
                        <td><?php echo $row['UID']; ?></td>
                        <td><?php echo $row['VName']; ?></td>
                        <td><?php echo $row['VNum']; ?></td>
                        <td><img src="<?php echo $row['VPhoto']; ?>" alt="Vehicle Picture"></td>
                        <?php
                        echo
                        '<td><button class="btn btn-primary"><a href="updatevehicle.php?updateid=' . $vid . '" class="text-light">Update</a></button>
                            <button class="btn btn-danger"><a href="deletevehicle.php?deleteid=' . $vid . '" class="text-light">Delete</a></button>
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