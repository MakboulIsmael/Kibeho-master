<?php
include "api/config.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>KIBEHO SANCTUARY N.J | E-Rinde</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/kibeho-1.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- integrating datepicker -->
    <link rel="stylesheet" href="assets/css/jquery-ui.css">


</head>

<body>

    <div class="wrapper" style="background-image: url('assets/images/kibeho-3.jpg'); background-position: center; background-size: cover;">
        <div class="wrapper" style="background-color: #0a5a9780; width: 100%; height: 100%;">
            <div class="inner">
                <div class="image-holder">
                    <img src="assets/images/kibeho-1.jpg" alt="" style="width: 100%;">

                    <div style="text-align: center; font-weight: bold; font-size: 30px; background-color: #0A5A97;">
                        <span style="font-weight: bold; font-size: 25px; background-color: #0A5A97; color: #FFFFFF;">ATTENDEES:</span> <span style="font-weight: bold; font-size: 30px; background-color: #0A5A97; color: #FFFFFF;"> <?php echo $countUsers; ?> </span>
                    </div>
                    <span style="font-size: 11px;">

                        Powered by<a href="http://calmgeeks.com"> Calmgeeks </a>&copy; 2021
                    </span>

                </div>
                <form action="authenticate.php" method="post">
                    <h3>KIBEHO SANCTUARY N.J</h3>

                    <div class="form-group">
                        <input id="email" name="email" type="email" placeholder="Email Address" class="form-control">
                        &nbsp;&nbsp;&nbsp;
                        <input id="password" name="password" type="password" placeholder="password " class="form-control">

                    </div>
                    <div>
                        <button type="submit" class="border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Sign In
                        </button>
                    </div>
                </form>
                <a href="add-christian.php">
                    <button id="submit" name="submit" type="submit" style="width: 200px; padding: 5px;">Create Account
                        <i class="zmdi zmdi-arrow-right"></i>
                    </button>
                </a>

            </div>
        </div>
    </div>
</body>
</html>
<script>
  function validation() {
    var id = document.login.username.value;
    var ps = document.login.password.value;
    if (id.length == "" && ps.length == "") {
      alert("User Name and Password fields are empty");
      return false;
    } else {
      if (id.length == "") {
        alert("User Name is empty");
        return false;
      }
      if (ps.length == "") {
        alert("Password field is empty");
        return false;
      }
    }
  }
</script>
