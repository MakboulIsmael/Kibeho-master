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



//codes to upload a file are below
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["anyfile"]) && $_FILES["anyfile"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "pdf" => "application/pdf");
        $filename = $_FILES["anyfile"]["name"];
        $filetype = $_FILES["anyfile"]["type"];
        $filesize = $_FILES["anyfile"]["size"];
    
        // Validate file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Validate file size - 10MB maximum
        $maxsize = 10 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Validate type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("uploads/" . $filename)){
                echo $filename . " is already exists.";
            } else{
                if(move_uploaded_file($_FILES["anyfile"]["tmp_name"], "uploads/" . $filename)){
                    
                    $phone=$_POST["phone"];
                    $email=$_POST["email"];
                    $sql = "INSERT INTO christian VALUES ('','$filename', $filesize, 0, '$phone', '$email')";
                    if (mysqli_query($connection, $sql) or die(mysqli_error($connection))) {
                        echo "<font color='green'><p> File Inserted to DB successfully</p></font>";
                        header('location: index.php');
                    }
                }else{

                   echo "File is not uploaded";
                }
                
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["anyfile"]["error"];
    }
}
?> 