<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" /> -->

<div class="card table-responsive-xl px-4" id="user">

    <?php
    require_once "connect.php";
    ?>
    <h1>Users</h1>
    <div class="input-group mb-4 mt-3">
        <div class="form-outline">
            <p>Search by User Email</p>
            <input type="text" id="getEmail" />
        </div>
    </div>
    <table class="table table-bordered text-center w-100" id="user-table">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Vehicle Owner</th>
                <th>Parking Spot Owner</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody id="showdata">

            <!-- Loading user records here with lazyloading -->

        </tbody>
    </table>
    <button id="load-more">Load More</button>
    <!-- <script>
        $(document).ready(function() {
            var limit = 10; // Number of records to load at a time
            var offset = 0; // Initial offset
            var loading = false;

            // Function to load more user records
            function loadMoreUsers() {
                if (loading) return; // Prevent multiple requests
                loading = true;

                $.ajax({
                    type: 'POST',
                    url: 'lazyloaduser.php', // Create a PHP script to fetch user records
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
    </script> -->
</div>