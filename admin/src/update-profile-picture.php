<?php
session_start();
$title = "Admin Dashboard - CalmGeeks";

include_once("../../api/layout.php");
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
  <link rel="shortcut icon" type="image/png" href="../../assets/images/kibeho-1.jpg">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="../../assets/css/style.css">

  <!-- integrating datepicker -->
  <link rel="stylesheet" href="../../assets/css/jquery-ui.css">


</head>

<body>

  <div class="wrapper" style="background-image: url('../../assets/images/kibeho-3.jpg'); background-position: center; background-size: cover;">
    <div class="wrapper" style="background-color: #0a5a9780; width: 100%; height: 100%;">
      <div class="inner">
        <div class="image-holder">
          <img src="../../assets/images/kibeho-1.jpg" alt="" style="width: 100%;">

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
                                <p style="margin-top: 30px; font-size: 16px; color: white;">Attendence</p>
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
                        <a href="setting.php">
                            <div class="" style=" border: solid; background-color:#0A5A97; border-radius: 10px; border-width: 1.5px; width: 260px; height: 80px; margin-left: 290px; text-align: center; margin-top: -80px">
                                <p style="margin-top: 30px; font-size: 16px; color: white;">Settings</p>
                                <div class="" style=" border: solid; background-color: white; border-radius: 10px; border-width: 1.5px; width: 260px; height: 40px; margin-left: -1.5px; text-align: center; border-top: none">
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="" style="margin-top: 90px; margin-left: 160px">
                        <form method="post" enctype="multipart/form-data">
                            <input type="file" name="image">
                            <button type="submit" value="save" class="mx-52 mt-8 py-0 font-bold text-align text-1xl text-white  bg-yellow-400 text-items-center focus:outline-none border border-gray-600 rounded-full h-8 w-4/12 hover:bg-red-600 hover:text-black shad focus:outline-none" name="image">Save Image</button>
                            <?php

                            if (!isset($_FILES['image']['tmp_name'])) {
                                echo "";
                            } else {
                                $file = $_FILES['image']['tmp_name'];
                                $image = $_FILES["image"]["name"];
                                $image_name = addslashes($_FILES['image']['name']);
                                $size = $_FILES["image"]["size"];
                                $error = $_FILES["image"]["error"];

                                if ($error > 0) {
                                    die("Error uploading file! Code $error.");
                                } else {
                                    if ($size > 10000000) //conditions for the file
                                    {
                                        die("Format is not allowed or file size is too big!");
                                    } else {

                                        move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $_FILES["image"]["name"]);
                                        $location = "uploads/" . $_FILES["image"]["name"];
                                        $user = $_SESSION['id'];
                                        $update = mysqli_query($con, "UPDATE christian SET name = '$location' WHERE user_id='$user'");
                                    }
                                    header('location:profile.php');
                                }
                            }
                            ?>
                        </form>

                    </div>
                    <script>
                        $(document).ready(function() {

                            var table = $('#example').DataTable({
                                    responsive: true,
                                    dom: 'Bfrtip',
                                    buttons: ['excel', 'pdf']
                                })
                                .columns.adjust()
                                .responsive.recalc();
                        });
                    </script>

                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
</body>

</html>