<?php

$serverName = "127.0.0.1";
// $serverUsername = "calmgnjh_kibehosanctuarynj";
// $serverPassword = "calmgnjh_kibehosanctuarynj";
// $serverDatabase = "calmgnjh_kibehosanctuarynj";
$serverUsername = "root";
$serverPassword = "";
$serverDatabase = "kibeho";
$connection = new mysqli($serverName, $serverUsername, $serverPassword, $serverDatabase);
// ini_set('session.cookie_httponly', 1);
// ini_set('session.use_only_cookies ', 1);
// ini_set('session.cookie_secure  ', 1);
// session_start();


$response = "";
$resultCode1 = 0;

$username = "";
$password = "";

$mak = "";
$nameFirst = "";
$nameLast = "";
$name = "";
$phone = "";
$phone = "";
$email = "";
$gender = "";
$date = "";
$service = "";
$country = "";
$diocese = "";
$province = "";
$district = "";
$sector = "";
$cell = "";
$village = "";
$countResult="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $submit = mysqli_real_escape_string($connection, !empty($_POST['submit']) ? $_POST['submit'] : "");
    
    $mak = mysqli_real_escape_string($connection, !empty($_POST['mak']) ? $_POST['mak'] : "");
    $nameFirst = mysqli_real_escape_string($connection, !empty($_POST['nameFirst']) ? $_POST['nameFirst'] : "");
    $nameLast = mysqli_real_escape_string($connection, !empty($_POST['nameLast']) ? $_POST['nameLast'] : "");
    $name = mysqli_real_escape_string($connection, isset($_POST['name']) && !empty($_POST['name']) ? $_POST['name'] : $nameFirst . " " . $nameLast);
    $account = mysqli_real_escape_string($connection, !empty($_POST['account']) ? $_POST['account'] : "Christian");
    $phone = mysqli_real_escape_string($connection, !empty($_POST['phone']) ? $_POST['phone'] : "");
    $email = mysqli_real_escape_string($connection, !empty($_POST['email']) ? $_POST['email'] : "");
    $gender = mysqli_real_escape_string($connection, !empty($_POST['gender']) ? $_POST['gender'] : "");
    $date = mysqli_real_escape_string($connection, !empty($_POST['date']) ? $_POST['date'] : "");
    $service = mysqli_real_escape_string($connection, !empty($_POST['service']) ? $_POST['service'] : "");
    $diocese = mysqli_real_escape_string($connection, !empty($_POST['diocese']) ? $_POST['diocese'] : "");
    $country = mysqli_real_escape_string($connection, !empty($_POST['country']) ? $_POST['country'] : "");
    $province = mysqli_real_escape_string($connection, !empty($_POST['province']) ? $_POST['province'] : "");
    $district = mysqli_real_escape_string($connection, !empty($_POST['district']) ? $_POST['district'] : "");
    $sector = mysqli_real_escape_string($connection, !empty($_POST['sector']) ? $_POST['sector'] : "");
    $cell = mysqli_real_escape_string($connection, !empty($_POST['cell']) ? $_POST['cell'] : "");
    $village = mysqli_real_escape_string($connection, !empty($_POST['village']) ? $_POST['village'] : "");
    $username = mysqli_real_escape_string($connection, !empty($_POST['username']) ? $_POST['username'] : $name . "-" . $phone . "-" . $gender);
    $password = mysqli_real_escape_string($connection, !empty($_POST['password']) ? $_POST['password'] : (!empty($phone) ? $phone : "kibeho"));


    
    
    if (!empty($username) && !empty($password)) {
        if (empty($account)) {
            $response = "Account Type required";
            $resultCode1 = 0;
        } else if (empty($mak)) {
            $response = "Code required";
            $resultCode1 = 0;
        } else if (empty($nameFirst)) {
            $response = "First Name required";
            $resultCode1 = 0;
        } else if (empty($nameLast)) {
            $response = "Last Name required";
            $resultCode1 = 0;
        } else if (empty($name)) {
            $response = "Name required";
            $resultCode1 = 0;
        } else if (empty($phone)) {
            $response = "Phone Number required";
            $resultCode1 = 0;
        } else if (false && empty($email)) {
            $response = "Email Address required";
            $resultCode1 = 0;
        } else if (empty($gender)) {
            $response = "Gender required";
            $resultCode1 = 0;
        } else if (empty($date)) {
            $response = "Date required";
            $resultCode1 = 0;
        } else if ($date != "27 November 2020" && empty($service)) {
            $response = "Service required";
            $resultCode1 = 0;
        } else if (empty($country)) {
            $response = "Country required";
            $resultCode1 = 0;
        } else if ($country == "Rwanda" && empty($diocese)) {
            $response = "Diocese required";
            $resultCode1 = 0;
        } else if ($country == "Rwanda" && empty($province)) {
            $response = "Province required";
            $resultCode1 = 0;
        } else if ($country == "Rwanda" && empty($district)) {
            $response = "District required";
            $resultCode1 = 0;
        } else if ($country == "Rwanda" && empty($sector)) {
            $response = "Sector required";
            $resultCode1 = 0;
        } else if ($country == "Rwanda" && empty($cell)) {
            $response = "Cell required";
            $resultCode1 = 0;
        } else if (false && $country == "Rwanda" && empty($village)) {
            $response = "Village required";
            $resultCode1 = 0;
        } else if ($submit === "1") {
            $response = "Attendance Card requested. Thank you";
            $resultCode1 = 2;
        } else if ($submit === "2") {
            $response = "";
            $resultCode1 = 0;
            
            $username = "";
            $password = "";
            $mak = "";
            $nameFirst = "";
            $nameLast = "";
            $name = "";
            $phone = "";
            $email = "";
            $gender = "";
            $date = "";
            $service = "";
            $country = "";
            $diocese = "";
            $province = "";
            $district = "";
            $sector = "";
            $cell = "";
            $village = "";
        } else {
            $countserv1=0;
            $countserv2=0;
            // limit of 200
            $service1limitSql = " SELECT count(*) from users  WHERE service = '$service' and date='$date'";
            $countserv1 = ($connection->query($service1limitSql)->fetch_array()[0]);
            $service2limitSql = " SELECT count(*) from users  WHERE service = '11:00 AM' and date='2021-11-28'";
            $countserv2 = ($connection->query($service2limitSql)->fetch_array()[0]);
            if($countserv2 > 400) {
                $response = "Service is Full Choose Another (Misa Yuzuye Hitamo Indi Misa)";
                $resultCode1 = 0;
            }
            elseif ($countserv1 > 600) {
                $response = "Service is Full Choose Another (Misa Yuzuye Hitamo Indi Misa)";
                $resultCode1 = 0;
            } else {
                
                $sql = " SELECT * FROM users WHERE username='$username' ";
                $result = $connection->query($sql);
                if ($result != null && $result->num_rows == 0) {
                    
                    // $password = alnEncrypt($password);
                    $sql = " INSERT INTO users 
                                (`username`,  `password`, `mak`, `account`,  `nameFirst`,  `nameLast`,  `name`,  `phone`,  `email`,  `date`,  `service`,  `gender`,  `diocese`,  `country`,  `province`,  `district`,  `sector`,  `cell`,  `village`) VALUES 
                                ('$username', '$password', '$mak', '$account', '$nameFirst', '$nameLast', '$name', '$phone', '$email', '$date', '$service', '$gender', '$diocese', '$country', '$province', '$district', '$sector', '$cell', '$village') ";
                    $resultRegister = $connection->query($sql);
                    
                    $sql = " SELECT * FROM users WHERE username='$username' and password='$password' ORDER BY id";
                    $result = $connection->query($sql);
                    if ($result != null && $result->num_rows > 0) {
                        
                        $response = "Attendee registered successfully";
                        $resultCode1 = 1;
                        header('location: ../christians.php');
                        
                        
                        
                        while ($row = $result->fetch_assoc()) {
                            if (!isset($isLogout) || $isLogout === true) {
                                $_SESSION["userUID"] = $row["id"];
                            }
                            
                            break;
                        }
                    } else {
                        $response = "Attendee not registered. Please try again.";
                        $resultCode1 = 1;
                    }
                } else {
                    $response = "Attendee already registered. Please try again";
                    $resultCode1 = 0;
                }
            }
            
            
                  // send massage


                  if(isset($_POST["submit"])){
                      
                    $message = "Dear Sir/Madam, You have all welcome to church Here is the code to use  " .$mak;
                    $data=array("sender"=>'CMS', "recipients"=> $phone, "message"=> $message,);

                    $url="https://www.intouchsms.co.rw/api/sendsms/.json";
                    $data=http_build_query($data);
                    $username="Gentille";
                    $password="0786112482";

                    $ch=curl_init();

                    curl_setopt($ch,CURLOPT_URL,$url);
                    curl_setopt($ch,CURLOPT_USERPWD,$username.":".$password);
                    curl_setopt($ch,CURLOPT_POST,true);
                    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
                    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);

                    $result=curl_exec($ch);
                    $httpcode=curl_getinfo($ch,CURLINFO_HTTP_CODE);

                    curl_close($ch);

                    if($httpcode == 200){
                        echo "Message Sent!";
                    } else {
                        echo "Message Not Sent!";
                    }
                  }
            
            
        }
    } else {
        if (empty($username)) {
            $response = "Username required";
            $resultCode1 = 0;
        } else if (empty($password)) {
            $response = "Password required";
            $resultCode1 = 0;
        } else {
            $response = "Username and Password required";
            $resultCode1 = 0;
        }
    }
}


$sql = " SELECT COUNT('id') FROM users WHERE account = 'SuperAdmin' ";
$countUserSuperAdmin = $connection->query($sql)->fetch_array()[0];
$sql = " SELECT COUNT('id') FROM users";
$countUsers = ($connection->query($sql)->fetch_array()[0]) - $countUserSuperAdmin;
$countResult=$countUsers;
$countsql="SELECT count(*) from users WHERE date='$date' AND service='$service'";
$countResult=($connection->query($countsql)->fetch_array()[0]);
$malecount="SELECT count(*) from users WHERE gender='Male'";
$femalecount="SELECT count(*) from users WHERE gender='Female'";

$countMale=($connection->query($malecount)->fetch_array()[0]);
$countFemale=($connection->query($femalecount)->fetch_array()[0]);
$error='';
