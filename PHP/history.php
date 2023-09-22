<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--always connect to external css using :    ..\relative path-->
    <link rel="stylesheet" type="text/css" href="../css/history.css" />

    <!-- Bootstrap CSS -->

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />

    <title>User Profile</title>
  </head>

  <body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="#"><h1>Parking Lagbe</h1></a>
      <button
        class="navbar-toggler btn-btn-success"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="home.html"
              >Home <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home.html">Logout</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="row">
      <div class="verticalnav col-3">
        <div
          class="nav flex-column nav-pills"
          id="v-pills-tab"
          role="tablist"
          aria-orientation="vertical"
        >
          <a class="navbar-brand" href="userprofile.html"
            ><h3 style="color: aliceblue; margin-left: 1%">Username</h3></a
          >
          <a class="nav-link active" href="history.html" aria-selected="true"
            >Parking History</a
          >
          <a class="nav-link" href="account.html" aria-selected="false"
            >Account Settings</a
          >
          <a class="nav-link" href="savedvehicles.html" aria-selected="false"
            >Saved Vehicles</a
          >
        </div>
      </div>

      <div class="cardgroup">
        <h1>Parking History</h1>
        <div class="card">
          <h4>Date of Parking:</h4>
          <h4>Time:</h4>
          <h4>Location:</h4>
          <h4>Vehicle:</h4>
        </div>
        <div class="card">
          <h4>Date of Parking:</h4>
          <h4>Time:</h4>
          <h4>Location:</h4>
          <h4>Vehicle:</h4>
        </div>
        <div class="card">
          <h4>Date of Parking:</h4>
          <h4>Time:</h4>
          <h4>Location:</h4>
          <h4>Vehicle:</h4>
        </div>
      </div>
      <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
          <div
            class="tab-pane fade show active"
            id="v-pills-home"
            role="tabpanel"
            aria-labelledby="v-pills-home-tab"
          >
            ...
          </div>
          <div
            class="tab-pane fade"
            id="v-pills-profile"
            role="tabpanel"
            aria-labelledby="v-pills-profile-tab"
          >
            ...
          </div>
          <div
            class="tab-pane fade"
            id="v-pills-messages"
            role="tabpanel"
            aria-labelledby="v-pills-messages-tab"
          >
            ...
          </div>
          <div
            class="tab-pane fade"
            id="v-pills-settings"
            role="tabpanel"
            aria-labelledby="v-pills-settings-tab"
          >
            ...
          </div>
        </div>
      </div>
    </div>

    <footer class="myfoot">
      <p>
        ©&nbsp;Parking Lagbe 2023 &nbsp;| Developed by Shajreen, Mir and Abrar
      </p>
    </footer>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script>
  </body>
</html>