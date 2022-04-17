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


                    <!--Container-->
                    <div class="container w-full mt-5 mx-auto px-2" style="margin-top: 100px; margin-left: 120px">

                        <!--Card-->
                        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded-xl shadow-lg bg-white">

                            <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                                
                                <tbody>
                                    <?php
                                    $id = $_SESSION['id'];
                                    $sql = "SELECT name FROM christian WHERE id = '{$id}'";
                                    $result = $connection->query($sql);
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($data = $result->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td><img src="<?php echo $data['name']; ?>"></td>
                                            </tr>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    ?>

                                    <?php
                                    $id = $_SESSION['id'];
                                    $sql = "SELECT * FROM users WHERE userid = '{$id}'";
                                    $result = $connection->query($sql);
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($data = $result->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td><?php echo $data['mak']; ?></td>
                                            </tr>
                                            <tr>
                                                <br><td><?php echo $data['name']; ?></td>
                                            </tr>

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