<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

<div class="card">
    <?php
    require_once "connect.php";
    $query = "select * from parkinghistory";
    $result = mysqli_query($conn, $query);

    ?>
    <h1>Parking History</h1>
    <table class="table table-bordered text-center w-100">
        <thead>
            <tr>
                <th>Vehicle ID</th>
                <th>Parking ID</th>
                <th>Date</th>
                <th>Total Hours</th>
                <th>Total Cost</th>
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
                        <td><?php echo $row['PID']; ?></td>
                        <td><?php echo $row['Date']; ?></td>
                        <td><?php echo $row['TotalHours']; ?></td>
                        <td><?php echo $row['TotalCost']; ?></td>

                        <?php
                        echo
                        '<td><button class="btn btn-primary"><a href="removehistory.php?removeid=' . $vid . '" class="text-light">Remove</a></button>
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
</div>