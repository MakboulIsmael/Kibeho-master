<?php
$title = "Admin Dashboard - CalmGeeks";

include_once("../api/layout.php");
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  header('Location: ..');
  exit;
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>KIBEHO SANCTUARY N.J | E-Rinde</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/kibeho-1.jpg">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">

  <!-- integrating datepicker -->
  <link rel="stylesheet" href="../assets/css/jquery-ui.css">


</head>

<body>

  <div class="wrapper" style="background-image: url('../assets/images/kibeho-3.jpg'); background-position: center; background-size: cover;">
    <div class="wrapper" style="background-color: #0a5a9780; width: 100%; height: 100%;">
      <div class="inner">
        <div class="image-holder">
          <img src="../assets/images/kibeho-1.jpg" alt="" style="width: 100%;">

          <div style="text-align: center; font-weight: bold; font-size: 30px; background-color: #0A5A97;">
            <span style="font-weight: bold; font-size: 25px; background-color: #0A5A97; color: #FFFFFF;">ATTENDEES:</span> <span style="font-weight: bold; font-size: 30px; background-color: #0A5A97; color: #FFFFFF;"> <?php echo $countUsers; ?> </span>
          </div>
          <span style="font-size: 11px;">

            Powered by<a href="http://calmgeeks.com"> Calmgeeks </a>&copy; 2021
          </span>
        </div>
        <div>
          <div class="" style=" border: solid; background-color: white; border-radius: 10px; border-bottom: none; border-width: 1.5px; width: 560px; height: 20px; margin-left: 32px; text-align: center; margin-top: 20px">
            <a href="dashboard.php">
              <div class="" style=" border: solid; background-color:#0A5A97; border-radius: 10px; border-width: 1.5px; width: 260px; height: 80px; margin-left: 8px; text-align: center; margin-top: 8px">
                <p style="margin-top: 30px; font-size: 16px; color: white;">Dashboard</p>
                <div class="" style=" border: solid; background-color: white; border-radius: 10px; border-width: 1.5px; width: 260px; height: 40px; margin-left: -1.5px; text-align: center; border-top: none">
                </div>
              </div>
            </a>
            <a href="christians.php">
              <div class="" style=" border: solid; background-color:#0A5A97; border-radius: 10px; border-width: 1.5px; width: 260px; height: 80px; margin-left: 290px; text-align: center; margin-top: -80px">
                <p style="margin-top: 30px; font-size: 16px; color: white;">Christians</p>
                <div class="" style=" border: solid; background-color: white; border-radius: 10px; border-width: 1.5px; width: 260px; height: 40px; margin-left: -1.5px; text-align: center; border-top: none">
                </div>
              </div>
            </a>
          </div>

          <div class="" style=" border: solid; background-color: white; border-radius: 10px; border-bottom: none; border-width: 1.5px; width: 560px; height: 20px; margin-left: 32px; text-align: center; margin-top: 90px">
            <a href="profile.php">
              <div class="" style=" border: solid; background-color:#0A5A97; border-radius: 10px; border-width: 1.5px; width: 260px; height: 80px; margin-left: 8px; text-align: center; margin-top: 8px">
                <p style="margin-top: 30px; font-size: 16px; color: white;">Profile</p>
                <div class="" style=" border: solid; background-color: white; border-radius: 10px; border-width: 1.5px; width: 260px; height: 40px; margin-left: -1.5px; text-align: center; border-top: none">
                </div>
              </div>
            </a>
            <a href="logout.php">
              <div class="" style=" border: solid; background-color:#0A5A97; border-radius: 10px; border-width: 1.5px; width: 260px; height: 80px; margin-left: 290px; text-align: center; margin-top: -80px">
                <p style="margin-top: 30px; font-size: 16px; color: white;">Sign Out</p>
                <div class="" style=" border: solid; background-color: white; border-radius: 10px; border-width: 1.5px; width: 260px; height: 40px; margin-left: -1.5px; text-align: center; border-top: none">
                </div>
              </div>
            </a>
          </div>

          <?php

          //

          
          @$id = $_GET['id'];
          $sql = "SELECT * FROM admin where id= '$id'";
          $result = $connection->query($sql);
          if ($result->num_rows > 0) {
            // output data of each row
          }
          ?>
          <div class="bg-white mt-5 rounded-xl shadow-lg" style="margin-top: 60px; margin-left: 10px">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
              <div class="max-w-3xl mx-auto">

                <form action="authenticate.php" method="post" class="space-y-8 divide-y divide-gray-200 ">
                  <div class="space-y-8 divide-y divide-gray-200">
                    <h3>Update Your Profile</h3>

                    
                    <div class="form-group">
                      *<i class="zmdi zmdi-email"></i>
                      <input id="email" name="email" type="email" placeholder="Email Address (Imeli)" class="form-control" value="<?php echo $email ?>">
                      <i class="zmdi zmdi-email"></i>*
                      <i class="zmdi zmdi-key"></i>*
                      <input id="password" name="password" type="password" placeholder="Password" class="form-control " value="<?php echo $password ?>">
                      *<i class="zmdi zmdi-key"></i>
                    </div>
                      <div>
                        <button type="submit" class="border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                          Save Data
                        </button>
                      </div>
                </form>
              </div>



            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  </div>
  </div>
</body>

</html>