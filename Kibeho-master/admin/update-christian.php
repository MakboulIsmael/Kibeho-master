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



                    <div class=" h-96 mx-32 items-center bg-gray-100 w-8/12 focus:outline-none border border-gray-400 rounded-b-xl rounded-r-xl">
                        <div class="flex-wrap mx-10 mt-0 w-full">
                            <?php


                            if (isset($_POST['update'])) {
                                $id = $_POST['id'];
                                $name = $_POST['name'];
                                $phone = $_POST['phone'];
                                $gender = $_POST['gender'];
                                $date = $_POST['date'];
                                $service = $_POST['service'];
                                $diocese = $_POST['diocese'];

                                $sql = "UPDATE users set name='$name',phone='$phone',gender='$gender',date='$date',service='$service',diocese='$diocese' WHERE id=$id";
                                $query = $connection->query($sql);
                                echo "<script>alert('Data Updated Successfully!'); window.location='christians.php'</script>";
                            }
                            @$id = $_GET['id'];
                            $select = $connection->query("SELECT * FROM users WHERE id='$id'");
                            while ($data = $select->fetch_assoc()) {
                                $id = $data['id'];
                                $name = $data['name'];
                                $phone = $data['phone'];
                                $gender = $data['gender'];
                                $date = $data['date'];
                                $service = $data['service'];
                                $diocese = $data['diocese'];
                            }
                            ?>
                            <table border="2" style="margin-top: 120px; margin-left: 150px">
                                <form action="update-christian.php" method="POST">

                                    <tr>
                                        <th>EMPLOYEE ID</th>
                                        <td><input type="text" readonly name="id" placeholder="ID~~~~~~" class=" text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-10 w-full mx-16" value="<?php echo $id ?>"></td>
                                    </tr>

                                    <tr>
                                        <th>FULL NAMES</th>
                                        <td><input type="text" name="name" placeholder="Full NAMES~~~~~~" class=" text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-10 w-full mx-16" value="<?php echo $name ?>"></td>
                                    </tr>

                                    <tr>
                                        <th>PHONE_NUM</th>
                                        <td><input type="text" name="phone" placeholder="Telephone~~~~~~" class="  text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-10 w-full mx-16" value="<?php echo $phone ?>"></td>
                                    </tr>

                                    <tr>
                                        <th>GENDER</th>
                                        <td><input type="text" name="gender" placeholder="Gender~~~~~~" class="  text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-10 w-full mx-16" value="<?php echo $gender ?>"></td>
                                    </tr>

                                    <tr>
                                        <th>*DATE*</th>
                                        <td><input type="text" name="date" placeholder="DATE~~~~~~" class="  text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-10 w-full mx-16" value="<?php echo $date ?>"></td>
                                    </tr>

                                    <tr>
                                        <th>*SERVICE*</th>
                                        <td><input type="text" name="service" placeholder="SERVICE~~~~~~" class=" text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-10 w-full mx-16" value="<?php echo $service ?>"></td>
                                    </tr>

                                    <tr>
                                        <th>*diocese*</th>
                                        <td><input type="text" name="diocese" placeholder="DIOCESE~~~~~~" class=" text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-10 w-full mx-16" value="<?php echo $diocese ?>"></td>
                                    </tr>
                                    </tr>
                            </table>

                            <center><input type="submit" name="update" value="Update Data" class="mx-52 mt-8 py-0 font-bold text-align text-1xl text-white  bg-yellow-400 text-items-center focus:outline-none border border-gray-600 rounded-full h-8 w-4/12 hover:bg-red-600 hover:text-black shad focus:outline-none"></center>
                            </form>
                        </div>

                    </div>
</body>

</html>



</div>
</div>

</div>
</div>
</div>
</body>

</html>