<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

<div class="card">
    <?php
    require_once "connect.php";
    $query = "select * from activeparking";
    $result = mysqli_query($conn, $query);

    ?>
    <h1>Active Parkings</h1>
    <table class="table table-bordered text-center w-100">
        <thead>
            <tr>
                <!-- <th>Order ID</th> -->
                <th>Parking ID</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Status</th>
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
                        <td><?php echo $row['Timestart']; ?></td>
                        <td><?php echo $row['Timeend']; ?></td>
                        <td><?php echo $row['Status']; ?></td>

                        <?php
                        echo
                        '<td>
                        <button class="btn btn-primary"><a href="updateactive.php?updateid=' . $pid . '" class="text-light">Update</a></button>
                        <button class="btn btn-danger"><a href="cancel.php?cancelid=' . $pid . '" class="text-light">Cancel</a></button>
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