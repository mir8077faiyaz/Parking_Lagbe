<?php
include("connect.php");

$email = $_POST["email"];

$sql = "SELECT UID, Email, Fname, Lname, PhoneNum, VOwner, POwner FROM user WHERE Email LIKE '$email%'";
$query = mysqli_query($conn, $sql);
// $data = '';

while ($row = mysqli_fetch_assoc($query)) {
    $id = $row['UID'];
    // $data .= "<tr><td>" . $row['UID'] . "</td><td>" . $row['Email'] . "</td><td>" . $row['Fname'] . "</td><td>" . $row['Lname'] . "</td><td>" . $row['PhoneNum'] . "</td><td>" . $row['VOwner'] . "</td><td>" . $row['POwner'] . "</td></tr>";
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
// echo $data;
