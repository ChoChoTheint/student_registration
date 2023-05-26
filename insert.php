<?php
require "conn.php";
session_start();

$stuId = $_SESSION['id'];
$name = $_SESSION['name'];
$father_name = $_SESSION['fatherName'];
$nrc = $_SESSION['nrc'];
$phone = $_SESSION['phone'];
$email = $_SESSION['email'];
$gender = $_SESSION['gender'];
$date_of_birth = $_SESSION['dob'];
$address = $_SESSION['address'];
$career = $_SESSION['career'];
$skill = $_SESSION['skill']; 
$file = $_SESSION["file"];
// print_r($filename);die();
// $file = $_FILES["file"]["name"];
// $file = $_SESSION['$fileName'];
$flag = 1;

// print_r('gg');die(); 
// if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($file["file"]) && $file["file"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $file["file"]["name"];
        $filetype = $file["file"]["type"];
        $filesize = $file["file"]["size"];
        
        $ext = pathinfo($filename,PATHINFO_EXTENSION);
        
        if(!array_key_exists($ext,$allowed)) die("error: please select a valid file format");
        $maxsize = 5 * 1024 * 1024;
        
        if($filesize > $maxsize) die("error: file size large than the allowed limit");
        if(in_array($filetype,$allowed)){
            $filename = $file["file"]["tmp_name"];
            $destination = "upload/" . $file["file"]["name"];
            if(file_exists($destination)){
                // echo $_FILES["file"]["name"] . " is already exits";
            }else{
                move_uploaded_file($filename,$destination);
                $file_path = "upload/" . $file["file"]["name"];
            }
        }else{
            echo "There was a problem uploading ......";
        }
    }else{
        echo "ERROR: " . $file["file"]["error"];
    }
    
    $qry = "INSERT INTO student_register(`name`,`father_name`,`nrc`,`phone_no`,`email`,`gender`,`date_of_birth`,`address`,`career`,`skill`,`file`,`flag`) VALUES ('$name','$father_name','$nrc','$phone','$email','$gender','$date_of_birth','$address','$career','$skill','$file_path','$flag')";
    
    if ($conn->query($qry) === TRUE) {
        echo "success";
        header('location:list.php');
    } else {
        echo "Error: ";
    }
// }


?>