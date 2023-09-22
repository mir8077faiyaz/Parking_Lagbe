<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!--always connect to external css using :    ..\relative path-->
  <link rel="stylesheet" type="text/css" href="../css/search.css" />

  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

  <title>Parking Spots</title>
</head>

<body>
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-light ">
    <a class="navbar-brand" href="#">
      <h1>Parking Lagbe</h1>
    </a>
    <button class="navbar-toggler btn-btn-success" type="button" data-toggle="collapse"
      data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="home.html">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.html">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.html">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.html">Login</a>
        </li>
      </ul>
    </div>
  </nav>

  <!--jhamela-->
  <div class="container-fluid carddiv" >
    <div>
      <form class="search" >
        <div class="form-group">
          <label for="exampleFormControlInput1">Location</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="banani,dhaka,bangladesh" required/>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Start Time</label>
          <select class="form-control" id="exampleFormControlSelect1">
            <option>00:00</option>
            <option>01:00</option>
            <option>02:00</option>
            <option>03:00</option>
            <option>04:00</option>
            <option>05:00</option>
            <option>06:00</option>
            <option>07:00</option>
            <option>08:00</option>
            <option>09:00</option>
            <option>10:00</option>
            <option>11:00</option>
            <option>12:00</option>
            <option>13:00</option>
            <option>14:00</option>
            <option>15:00</option>
            <option>16:00</option>
            <option>17:00</option>
            <option>18:00</option>
            <option>19:00</option>
            <option>20:00</option>
            <option>21:00</option>
            <option>22:00</option>
            <option>23:00</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">End Time</label>
          <select class="form-control" id="exampleFormControlSelect1">
            <option>00:00</option>
            <option>01:00</option>
            <option>02:00</option>
            <option>03:00</option>
            <option>04:00</option>
            <option>05:00</option>
            <option>06:00</option>
            <option>07:00</option>
            <option>08:00</option>
            <option>09:00</option>
            <option>10:00</option>
            <option>11:00</option>
            <option>12:00</option>
            <option>13:00</option>
            <option>14:00</option>
            <option>15:00</option>
            <option>16:00</option>
            <option>17:00</option>
            <option>18:00</option>
            <option>19:00</option>
            <option>20:00</option>
            <option>21:00</option>
            <option>22:00</option>
            <option>23:00</option>
          </select>
        </div>
        <button type="submit"  class="btn btn-danger form-group">Search</button>
      </form>
    </div>
    <div class="cardflex" style="width: 75%;" >
      <div class="card mt-4" >
        <div class="card-header">
          Featured
        </div>
        <div class="card-body" >
          <img src="..\image\parking1.jpg" alt="">
          <h5 class="card-title">Road 12, Banani, Dhaka</h5>
          <p class="card-text">৳100/3hours</p>
          <a href="details.html" class="btn btn-primary">View Details</a>
        </div>
      </div>
      <div class="card mt-4" >
        <div class="card-header">
          Featured
        </div>
        <div class="card-body">
          <img src="..\image\parking 2.jpg" alt="">
          <h5 class="card-title">Road 10, Banani, Dhaka</h5>
          <p class="card-text">৳110/3hours</p>
          <a href="details.html"  class="btn btn-primary">View Details</a>
        </div>
      </div>
      <div class="card mt-4" >
        <div class="card-header">
          Featured
        </div>
        <div class="card-body">
          <img src="..\image\parking 3.jpg" alt="">
          <h5 class="card-title">Road 28, Banani Dhaka</h5>
          <p class="card-text">৳90/3hours</p>
          <a href="details.html" class="btn btn-primary">View Details</a>
        </div>
      </div>
      
    </div>
  </div>

  <footer class="myfoot">
    <p>©&nbsp;Parking Lagbe 2023 &nbsp;| Developed by Shajreen, Mir and Abrar</p>
  </footer>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
</body>

</html>

</html>