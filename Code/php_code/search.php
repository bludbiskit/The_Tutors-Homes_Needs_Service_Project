<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbproject";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if(!$conn){
        echo 'Connection Error: ' . mysqli_connect_error();
    }

    // Gets Columns From Table Specified
    $sql = 'SELECT Average_Rating, Distance_From_Address FROM SERVICERS';

    // Stores Columns Into Variable
    $results= mysqli_query($conn, $sql);

    $HNS = mysqli_fetch_all($results, MYSQLI_ASSOC);

    // Free Database From Memory
    mysqli_free_result($results);

    // Close Connection
    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
        <!--  All snippets are MIT license http://bootdey.com/license -->
        <title>Filter search result page - Bootdey.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css-javascript/css/search.css">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>

    </head>
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
          <li class="nav-item">
              <a class="nav-link" href="./appointments.php">Appointments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./search.php">Search</a>
            </li>
        </ul>
        <?php if(isset($_SESSION['email'])) {?>
          <a style="margin-right: 5px" href="./SignIn.php" class="btn btn-outline-success">Sign In</a>
          <a href="./SignUp.php" class="btn btn-outline-success">Sign Up</a>
        <?php } else{?>
          <a style="margin-right: 5px" href="./SignOut.php" class="btn btn-outline-danger">Sign Out</a>
          <a href="./profile.php" class="btn btn-outline-success">View Profile</a>
        <?php }?>
      </div>
    </div>
  </nav>
    </header>
    <body>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

        <div class="container">
            <div class="row">
            <!-- BEGIN SEARCH RESULT -->
            <div class="col-md-12">
                <div class="grid search">
                <div class="grid-body">
                    <div class="row">
                    

                        
                       
                    </div>
                    <!-- END FILTERS -->
                    <!-- BEGIN RESULT -->
                    <div class="col-md-9">
                        <h2><i class="fa fa-file-o"></i> Result</h2>
                        <hr>
                        <!-- BEGIN SEARCH INPUT -->
                        <div class="input-group">
                        <form action="" method="GET" name="">
                            <table >
                                <tr>
                                    <td><input id="search" type="text" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" placeholder="Enter your search keywords" class="form-control"/></td>
                                    <td><input type="submit" name="" value="Search" /><i class="fa fa-search"></i></td>
                                    
                                </tr>
                                
                            </table>      
                           
                            <p>Showing all results matching "<?php echo isset($_GET['search']) ? $_GET['search'] : '';  ?>"</p>

                        </form>
                        
                        </div>
                        <?php 
                            $link = new mysqli($servername, $username, $password, $dbname);
                            if(isset($_REQUEST["search"])){
                                // Prepare a select statement
                                $sql = "SELECT SERVICERS.Average_Rating, SERVICERS.Distance_From_Address, SERVICES.Service, USERS.First_Name, USERS.Last_Name, USERS.Phone_Number, USERS.Email
                                        FROM SERVICERS, SERVICES, PROVIDESSERVICE,USERS
                                        WHERE SERVICES.Service LIKE ? AND
                                            PROVIDESSERVICE.Servicer_ID= SERVICERS.Servicer_ID AND
                                            SERVICERS.User_ID= USERS.User_ID AND
                                            PROVIDESSERVICE.Service= SERVICES.Service";
                                // Check connection
                                if($link === false){
                                    die("ERROR: Could not connect. " . mysqli_connect_error());
                                }
                                if($stmt = mysqli_prepare($link, $sql)){
                                    // Bind variables to the prepared statement as parameters
                                    mysqli_stmt_bind_param($stmt, "s", $param_term);
                                    
                                    // Set parameters
                                    $param_term = $_REQUEST["search"] . '%';
                                    
                                    // Attempt to execute the prepared statement
                                    if(mysqli_stmt_execute($stmt)){
                                        $result = mysqli_stmt_get_result($stmt);
                                        ?>
                                        <div class="table-responsive">
                                                    <table class="sortable">
                                                        <thead>
                                                            <tr>
                                                            <th scope="col"class="text text-center">First Name</th>
                                                            <th scope="col"class="text text-center">Last Name</th>
                                                            <th scope="col"class="text text-center">Phone Number</th>
                                                            <th scope="col"class="text text-center">Email</th>
                                                            <th scope="col"class="text text-center">Service Name</th>
                                                            <th scope="col"class="text text-center">Rating</th>
                                                            <th scope="col"class="text text-center">Distance From Address</th>
                                                            </tr>
                                                        </thead>
                                      <?php  // Check number of rows in the result set
                                        if(mysqli_num_rows($result) > 0){
                                            // Fetch result rows as an associative array
                                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                                ?>
    
                                                        <tr class="item">
                                                        <td class="text text-center"><?php echo htmlspecialchars($row['First_Name']); ?></td>
                                                        <td class="text text-center"><?php echo htmlspecialchars($row['Last_Name']); ?></td>
                                                        <td class="text text-center"><?php echo htmlspecialchars($row['Phone_Number']); ?></td>
                                                        <td class="text text-center"><?php echo htmlspecialchars($row['Email']); ?></td>
                                                        <td class="text text-center"><?php echo htmlspecialchars($row['Service']); ?></td>
                                                        <td class="text text-center"><?php echo htmlspecialchars($row['Average_Rating']); ?></td>
                                                        <td class="text text-center"><?php echo htmlspecialchars($row['Distance_From_Address']); ?></td>
                                                        </tr>
                                                        
                                    <?php
                                            }?>
                                            </table>
                                                    </div>
                                        <?php
                                        } else{
                                            echo "<p>No matches found</p>";
                                        }
                                    } else{
                                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                    }
                                }
                                // Close statement
                                mysqli_stmt_close($stmt);
                            }
                            // close connection
                            mysqli_close($link);
                        ?>
                        <!-- END SEARCH INPUT -->
                        
                       
                        
                        <!-- BEGIN TABLE RESULT -->
                        <!-- <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col"></th>
                                <th scope="col">Name</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Distance From Address</th>
                                </tr>
                            </thead>
                            <?php //foreach($HNS as $hns){ ?>
                                <tbody><tr>
                                <td class="number text-center">1</td>
                                <td class="image"><img src="https://via.placeholder.com/400x300/FF8C00" alt=""></td>
                                <td class="product"><strong>Product 1</strong><br>This is the product description.</td>
                                <td class="rate text-right"><?php// echo htmlspecialchars($hns['Average_Rating']); ?></td>
                                <td class="price text-right"><?php// echo htmlspecialchars($hns['Distance_From_Address']); ?></td>
                                </tr>
                            <?php //} ?>
                            
                        </tbody></table>
                        </div> -->
                        <!-- END TABLE RESULT -->
                        
                        <!-- BEGIN PAGINATION -->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                        <!-- END PAGINATION -->
                    </div>
                    <!-- END RESULT -->
                    </div>
                </div>
                </div>
            </div>
            <!-- END SEARCH RESULT -->
            </div>
        </div>

        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>