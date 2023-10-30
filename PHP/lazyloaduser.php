<?php

include("connect.php");

if (isset($_POST['limit']) && isset($_POST['offset'])) {
    $limit = $_POST['limit'];
    $offset = $_POST['offset'];

    // Perform a database query to fetch additional user records
    // Customize the query based on your database structure
    // ...
    $sql = "SELECT UID, Email, Fname, Lname, PhoneNum, VOwner, POwner FROM user LIMIT $limit OFFSET $offset";
    $query = mysqli_query($conn, $sql);

    // Loop through the results and generate HTML for the additional records
    while ($row = mysqli_fetch_assoc($query)) {
        $id = $row['UID'];
        echo "<tr>";
        echo "<td>" . $row['UID'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['Fname'] . "</td>";
        echo "<td>" . $row['Lname'] . "</td>";
        echo "<td>" . $row['PhoneNum'] . "</td>";
        echo "<td>" . $row['VOwner'] . "</td>";
        echo "<td>" . $row['POwner'] . "</td>";
        echo '<td><button class="btn btn-primary"><a href="update.php?updateid=' . $id . '" class="text-light">Update</a></button>
                            <button class="btn btn-danger"><a href="delete.php?deleteid=' . $id . '" class="text-light">Delete</a></button>
                        </td>';
        echo "</tr>";
    }
}
