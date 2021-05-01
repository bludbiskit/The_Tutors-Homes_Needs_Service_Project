<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        .auto-width {
          width: auto;
        }
        .text-center {
            text-align: center!important;
        }
        body {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-align: center;
            -ms-flex-pack: center;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }
        html, body {
            height: 100%;
        }
        body {
            margin: 0;
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff;
            padding-top: 5rem
        }    
        
    </style>
    <script>
    function toggleServices() {
      var x = document.getElementById("servicesList");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
    </script>
    <!-- Custom styles for this template -->
  </head>

  <body class="text-center">
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Home Needs</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./main.php">Home</a>
              </li>
            </ul>
            <?php if(isset($_SESSION['email'])) {?>
              <a style="margin-right: 5px" href="./SignOut.php" class="btn btn-outline-danger">Sign Out</a>
              <a href="./profile.php" class="btn btn-outline-success">View Profile</a>
            <?php } else{?>
              <a style="margin-right: 5px" href="./SignIn.php" class="btn btn-outline-success">Sign In</a>
              <a href="./SignUp.php" class="btn btn-outline-success">Sign Up</a>
            <?php }?>
          </div>
        </div>
      </nav>
    </header>
    <form class="form-signin" method="post" action="./signUpController.php" enctype="multipart/form-data">
      <h1 class="h3 mb-3 font-weight-normal">Sign Up Here!</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <label for="inputFirstName" class="sr-only">First Name</label>
      <input name="firstName" type="text" id="inputFirstName" class="form-control" placeholder="First Name" required>
      <label for="inputLastName" class="sr-only">Last Name</label>
      <input name="lastName" type="text" id="inputLastName" class="form-control" placeholder="Last Name" required>
      <label for="inputPhone" class="sr-only">Phone Number</label>
      <input name="phone" type="text" id="inputPhone" class="form-control" placeholder="Phone Number" required>
      <label for="inputAddress" class="sr-only">Address</label>
      <input name="address" type="text" id="inputAddress" class="form-control" placeholder="Address" required>
      <label for="inputZip" class="sr-only">Zip Code</label>
      <input name="zip" type="text" id="inputZip" class="form-control" placeholder="Zip Code" required>
      <label for="inputCity" class="sr-only">City</label>
      <input name="city" type="text" id="inputCity" class="form-control" placeholder="City" required>
      <label for="state" class="col-sm-2 control-label">State</label>
      <div class="h3 mb-3 font-weight-normal states">
        <select class="form-control" id="state" name="state" required>
          <option value="" disabled selected>N/A</option>
          <option value="AK">Alaska</option>
          <option value="AL">Alabama</option>
          <option value="AR">Arkansas</option>
          <option value="AZ">Arizona</option>
          <option value="CA">California</option>
          <option value="CO">Colorado</option>
          <option value="CT">Connecticut</option>
          <option value="DC">District of Columbia</option>
          <option value="DE">Delaware</option>
          <option value="FL">Florida</option>
          <option value="GA">Georgia</option>
          <option value="HI">Hawaii</option>
          <option value="IA">Iowa</option>
          <option value="ID">Idaho</option>
          <option value="IL">Illinois</option>
          <option value="IN">Indiana</option>
          <option value="KS">Kansas</option>
          <option value="KY">Kentucky</option>
          <option value="LA">Louisiana</option>
          <option value="MA">Massachusetts</option>
          <option value="MD">Maryland</option>
          <option value="ME">Maine</option>
          <option value="MI">Michigan</option>
          <option value="MN">Minnesota</option>
          <option value="MO">Missouri</option>
          <option value="MS">Mississippi</option>
          <option value="MT">Montana</option>
          <option value="NC">North Carolina</option>
          <option value="ND">North Dakota</option>
          <option value="NE">Nebraska</option>
          <option value="NH">New Hampshire</option>
          <option value="NJ">New Jersey</option>
          <option value="NM">New Mexico</option>
          <option value="NV">Nevada</option>
          <option value="NY">New York</option>
          <option value="OH">Ohio</option>
          <option value="OK">Oklahoma</option>
          <option value="OR">Oregon</option>
          <option value="PA">Pennsylvania</option>
          <option value="PR">Puerto Rico</option>
          <option value="RI">Rhode Island</option>
          <option value="SC">South Carolina</option>
          <option value="SD">South Dakota</option>
          <option value="TN">Tennessee</option>
          <option value="TX">Texas</option>
          <option value="UT">Utah</option>
          <option value="VA">Virginia</option>
          <option value="VT">Vermont</option>
          <option value="WA">Washington</option>
          <option value="WI">Wisconsin</option>
          <option value="WV">West Virginia</option>
          <option value="WY">Wyoming</option>
        </select>
      </div>
      <label for="inputLicense" class="sr-only">Driver's License Number</label>
      <input name="license" type="text" id="inputLicense" class="form-control" placeholder="Driver's License Number" required>
      <label for="picture" class="col-sm-2 control-label">Upload Your Profile Picture</label>
      <input type="file" id="myFile" name="profilePicture">
      <label for="driversLicense" class="col-sm-2 control-label">Upload Your Driver's License</label>
      <input type="file" id="myFile" name="driversLicensePicture">
      <div class="checkbox mb-3 auto-width" onclick="toggleServices()">
        <label>
          <input type="checkbox" value="remember-me"> Check if you are are a servicer, then select your services.
        </label>
      </div>
      <?php 
        // Include the database configuration file  
        require_once 'dbConfig.php'; 
        
        // Get image data from database 
        $result = $conn->query("SELECT * from services"); 
      ?>
      <div class="mb-3" id="servicesList" style="display: none">
        <label for="inputMiles" class="sr-only">Maximum Miles Willing to Travel</label>
        <input name="distance" type="text" id="inputMiles" class="form-control" placeholder="Miles">
        <?php if($result->num_rows > 0){ ?> 
          <?php while($row = $result->fetch_assoc()){ ?> 
            <div class="form-check mb-3" id="servicesList">
              <input class="form-check-input" type="checkbox" name="check_list[]" value="<?php echo $row['Service']; ?>" id="defaultCheck1">
              <label class="form-check-label text-start" for="defaultCheck1">
                <?php echo $row['Service']; ?>
              </label>
            </div>
          <?php } ?> 
        <?php } ?>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign Up!</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
    </form>
  </body>
</html>
