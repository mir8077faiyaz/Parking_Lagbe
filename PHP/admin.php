<?php
date_default_timezone_set('Asia/Dhaka'); //get current time
require_once "connect.php";
session_start();
if(isset($_SESSION["username"])){
    if($_SESSION["username"]!="admin"){
        echo '<script>alert("You are not an Admin!")</script>';
        echo "<script>window.location.replace('login.php')</script>";
    }
}else{
    echo '<script>alert("Login as an Admin First!")</script>';
    echo "<script>window.location.replace('login.php')</script>";
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--always connect to external css using :    ..\relative path-->
    <link rel="stylesheet" type="text/css" href="../css/admin.css" />

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <title>Admin Panel</title>

</head>

<body class="d-flex flex-column justify-content-between" style="height:100vh" ;>
    <div>
        <!--Navbar-->

        <?php
        echo '<nav class="navbar navbar-expand-lg navbar-light ">';

        echo '    <a class="navbar-brand" href="admin.php">';
        echo '      <h1>Parking Lagbe Admin Panel</h1>';
        echo '    </a>';
        echo '    <button class="navbar-toggler btn-btn-success" type="button" data-toggle="collapse"';
        echo '      data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"';
        echo '      aria-label="Toggle navigation">';
        echo '      <span class="navbar-toggler-icon"></span>';
        echo '    </button>';
        
        echo '    <div class="collapse navbar-collapse" id="navbarSupportedContent">';
        echo '      <ul class="navbar-nav">';
        echo '        <li class="nav-item">';
        echo '          <a class="nav-link" href="logout.php">Logout</a>';
        echo '        </li>';
        echo '      </ul>';
        echo '    </div>';
        echo '  </nav>';

        ?>

        <div class="row">
            <div class="col-2">
                <div class="verticalnav" style="height:100vh" ;>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                        <a class="nav-link admin-link" id="user-link" aria-selected="false" onclick="return user_load()">Users</a>
                        <a class="nav-link admin-link" id="active-link" aria-selected="true" onclick="return active_load()">Active Parkings</a>
                        <a class="nav-link admin-link" id="history-link" aria-selected="false" onclick="return history_load()">Parking History</a>
                        <a class="nav-link admin-link" id="spot-link" aria-selected="false" onclick="return spot_load()">Parking Spot Details</a>
                        <a class="nav-link admin-link" id="vehicle-link" aria-selected="true" onclick="return vehicle_load()">Vehicle Details</a>


                    </div>
                </div>

            </div>

            <div class="col-9" id="container"></div>

        </div>
    </div>

    <footer class="myfoot">
        <p>
            ©&nbsp;Parking Lagbe 2023 &nbsp;| Developed by Shajreen, Mir and Abrar
        </p>
    </footer>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        // const xhr = new XMLHttpRequest();
        // const container = document.getElementById('container');
        function resetLinkClasses() {
            let links = document.querySelectorAll(".admin-link");
            links.forEach(link => {
                link.classList.remove("active");
            })
        }

        window.addEventListener('load', function() {
            user_load();
        });
        user_load = () => {
            resetLinkClasses()
            document.getElementById("user-link").classList.add("active");
            $("#container").load("users.php div.card", function() { //live-search users with Email
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

                var limit = 10; // Number of records to load at a time
                var offset = 0; // Initial offset
                var loading = false;

                // Function to load more user records
                function loadMoreUsers() {
                    if (loading) return; // Prevent multiple requests
                    loading = true;

                    $.ajax({
                        type: 'POST',
                        url: 'lazyloaduser.php',
                        data: {
                            limit: limit,
                            offset: offset
                        },
                        success: function(data) {
                            if (data) {
                                $('#user-table tbody').append(data); // Append new records to the table
                                offset += limit; // Increment the offset for the next load
                            } else {
                                $('#load-more').hide(); // Hide the "Load More" button when no more records are available
                            }
                            loading = false;
                        }
                    });
                }

                // Function to check if the user is near the bottom of the page
                function isNearBottom() {
                    return ($(window).scrollTop() + $(window).height() >= $(document).height() - 200); // Adjust the value as needed
                }

                // Automatically load more users when near the bottom of the page
                $(window).scroll(function() {
                    if (isNearBottom()) {
                        loadMoreUsers();
                    }
                });

                // Initial load of users
                loadMoreUsers();
            });

            return false;
        };

        active_load = () => {
            resetLinkClasses()
            document.getElementById("active-link").classList.add("active");
            $("#container").load("active.php div.card");
            return false;
        };

        history_load = () => {
            resetLinkClasses()
            document.getElementById("history-link").classList.add("active");
            $("#container").load("parkinghistory.php div.card");
            return false;
        };

        spot_load = () => {
            resetLinkClasses()
            document.getElementById("spot-link").classList.add("active");
            $("#container").load("spots.php div.card");
            return false;
        };

        vehicle_load = () => {
            resetLinkClasses()
            document.getElementById("vehicle-link").classList.add("active");
            $("#container").load("vehicles.php div.card");
            return false;
        };
        $('#user').on('load', function() {

        });
    </script>

</body>

</html>