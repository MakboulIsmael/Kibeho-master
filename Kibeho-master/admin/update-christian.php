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



                    <div class=" h-96 mx-32 items-center bg-gray-100 w-8/12 focus:outline-none border border-gray-400 rounded-b-xl rounded-r-xl">
                        <div class="flex-wrap mx-10 mt-0 w-full">
                            <?php


                            if (isset($_POST['update'])) {
                                $id = $_POST['id'];
                                $mak = $_POST['mak'];
                                $nameFirst = $_POST['nameFirst'];
                                $phone = $_POST['phone'];
                                $email = $_POST['email'];
                                $gender = $_POST['gender'];
                                $date = $_POST['date'];
                                $service = $_POST['service'];
                                $diocese = $_POST['diocese'];
                                $country = $_POST['country'];
                                $province = $_POST['province'];
                                $sector = $_POST['sector'];
                                $cell = $_POST['cell'];
                                $village = $_POST['village'];
                                $timeCreated = $_POST['timeCreated'];
                                $timeEdited = $_POST['timeEdited'];

                                $sql = "UPDATE users set mak='$mak',nameFirst='$nameFirst',nameLast='$nameLast',phone='$phone',email='$email',gender='$gender',date='$date',service='$service',diocese='$diocese',country='$country',province='$province',district='$district',sector='$sector',cell='$cell',village='$village',timeCreated='$timeCreated',timeEdited='$timeEdited' WHERE id=$id";
                                $query = $connection->query($sql);
                                echo "<script>alert('Data Updated Successfully!'); window.location='christians.php'</script>";
                            }
                            @$id = $_GET['id'];
                            $select = $connection->query("SELECT * FROM users WHERE id='$id'");
                            while ($data = $select->fetch_assoc()) {
                                $id = $data['id'];
                                $mak = $data['mak'];
                                $nameFirst = $data['nameFirst'];
                                $nameLast = $data['nameLast'];
                                $phone = $data['phone'];
                                $email = $data['email'];
                                $gender = $data['gender'];
                                $date = $data['date'];
                                $service = $data['service'];
                                $diocese = $data['diocese'];
                                $country = $data['country'];
                                $province = $data['province'];
                                $sector = $data['sector'];
                                $cell = $data['cell'];
                                $village = $data['village'];
                                $timeCreated = $data['timeCreated'];
                                $timeEdited = $data['timeEdited'];
                            }
                            ?>
                            <table border="2" style="margin-top: 120px; margin-left: 150px">
                                <form action="update-christian.php" method="POST">

                                    <tr>
                                        <th>CHRISTIAN ID</th>
                                        <td><input type="text" readonly name="id" placeholder="ID~~~~~~" class=" text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-10 w-full mx-16" value="<?php echo $id ?>"></td>
                                    </tr>

                                    <tr>
                                        <th>ATTENDENCE-CODE</th>
                                        <td><input type="text" readonly name="mak" placeholder="ATTENDENCE-CODE~~~~~~" class=" text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-10 w-full mx-16" value="<?php echo $mak ?>"></td>
                                    </tr>

                                    <tr>
                                        <th>FIRSTNAME</th>
                                        <td><input type="text" name="nameFirst" placeholder="FIRSTNAME~~~~~~" class="  text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-10 w-full mx-16" value="<?php echo $nameFirst ?>"></td>
                                    </tr>

                                    <tr>
                                        <th>LASTNAME</th>
                                        <td><input type="text" name="nameLast" placeholder="LASTNAME~~~~~~" class="  text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-10 w-full mx-16" value="<?php echo $nameLast ?>"></td>
                                    </tr>

                                    <tr>
                                        <th>*PHONE-NUMBER*</th>
                                        <td><input type="text" name="phone" placeholder="PHONE-NUMBER~~~~~~" class="  text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-10 w-full mx-16" value="<?php echo $phone ?>"></td>
                                    </tr>

                                    <tr>
                                        <th>*EMAIL*</th>
                                        <td><input type="text" name="email" placeholder="EMAIL~~~~~~" class=" text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-10 w-full mx-16" value="<?php echo $email ?>"></td>
                                    </tr>

                                    <tr>
                                        <th>*GENDER*</th>
                                        <td><input type="text" name="gender" placeholder="GENDER~~~~~~" class=" text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-10 w-full mx-16" value="<?php echo $gender ?>"></td>
                                    </tr>

                                    <tr>
                                        <th>DATE</th>
                                        <td><input type="text" name="date" placeholder="DATE~~~~~~" class=" text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-10 w-full mx-16" value="<?php echo $date ?>"></td>
                                    </tr>

                                    <tr>
                                        <th>SERVICE</th>
                                        <td><input type="text" name="service" placeholder="SERVICE~~~~~~" class=" text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-10 w-full mx-16" value="<?php echo $service ?>"></td>
                                    </tr>

                                    <tr>
                                        <th>DIOCESE</th>
                                        <td><input type="text" name="diocese" placeholder="DIOCESE~~~~~~" class="  text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-10 w-full mx-16" value="<?php echo $diocese ?>"></td>
                                    </tr>

                                    <tr>
                                        <th>COUNTRY</th>
                                        <td><input type="text" name="country" placeholder="COUNTRY~~~~~~" class="  text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-10 w-full mx-16" value="<?php echo $country ?>"></td>
                                    </tr>

                                    <tr>
                                        <th>*PROVINCE*</th>
                                        <td><input type="text" name="province" placeholder="PROVINCE~~~~~~" class="  text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-10 w-full mx-16" value="<?php echo $province ?>"></td>
                                    </tr>

                                    <tr>
                                        <th>*DISTRICT*</th>
                                        <td><input type="text" name="district" placeholder="DISTRICT~~~~~~" class=" text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-10 w-full mx-16" value="<?php echo $district ?>"></td>
                                    </tr>

                                    <tr>
                                        <th>*SECTOR*</th>
                                        <td><input type="text" name="sector" placeholder="SECTOR~~~~~~" class=" text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-10 w-full mx-16" value="<?php echo $sector ?>"></td>
                                    </tr>

                                    <tr>
                                        <th>CELL</th>
                                        <td><input type="text" name="cell" placeholder="CELL~~~~~~" class="  text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-10 w-full mx-16" value="<?php echo $country ?>"></td>
                                    </tr>

                                    <tr>
                                        <th>*VILLAGE*</th>
                                        <td><input type="text" name="village" placeholder="VILLAGE~~~~~~" class="  text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-10 w-full mx-16" value="<?php echo $village ?>"></td>
                                    </tr>

                                    <tr>
                                        <th>*REGISTED-TIME*</th>
                                        <td><input type="text" name="timeCreated" placeholder="REGISTED-TIME~~~~~~" class=" text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-10 w-full mx-16" value="<?php echo $timeCreated ?>"></td>
                                    </tr>

                                    <tr>
                                        <th>*EDITED-TIME*</th>
                                        <td><input type="text" name="timeEdited" placeholder="EDITED-TIME~~~~~~" class=" text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-10 w-full mx-16" value="<?php echo $timeEdited ?>"></td>
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