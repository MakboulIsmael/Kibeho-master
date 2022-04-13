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
            <a href="setting.php">
              <div class="" style=" border: solid; background-color:#0A5A97; border-radius: 10px; border-width: 1.5px; width: 260px; height: 80px; margin-left: 290px; text-align: center; margin-top: -80px">
                <p style="margin-top: 30px; font-size: 16px; color: white;">Settings</p>
                <div class="" style=" border: solid; background-color: white; border-radius: 10px; border-width: 1.5px; width: 260px; height: 40px; margin-left: -1.5px; text-align: center; border-top: none">
                </div>
              </div>
            </a>
          </div>

          <!--Container-->
          <div class="container w-full mt-5 mx-auto px-2" style="margin-top: 100px; margin-left: 20px">

            <!--Card-->
            <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded-xl shadow-lg bg-white">

              <table id="example" border="2" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>

                  <tr>
                    <th data-priority="1">Id</th>
                    <th data-priority="2">USERTYPE</th>
                    <th data-priority="3">EMAIL</th>
                    <th data-priority="4">PASSWORD</th>
                    <th class='p-2' colspan='1'> Actions </th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM admin";
                  $result = $connection->query($sql);
                  if ($result->num_rows > 0) {
                    // output data of each row
                    while ($data = $result->fetch_assoc()) {
                  ?>
                      <tr>
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['usertype']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['password']; ?></td>
                        <td><?php echo "<a href=\"update-user.php?id=$data[id]\"><center>📝</center></a>" ?></td>

                      </tr>
                  <?php
                    }
                  } else {
                    echo "0 results";
                  }
                  ?>

                </tbody>
              </table>
            </div>
            <!--/Card-->
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