<?php
require "conn.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assiment Setting</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php
$qry = "SELECT student_id FROM student_register ORDER BY student_id DESC";
$result = mysqli_query($conn, $qry);
$number =  $result->num_rows;
$id_add = "000".$number;
$nameErr= $fatherErr = $emailErr = $genderErr = $phErr = $addressErr = "";
$name = $father = $email = $gender = $phone =$address = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  $value = true;
  
  if (empty($_POST["name"])) {
      $nameErr = "Name is required";
      $value =false;
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
            $value = false;
        }
        $value = true;
    }
    if (empty($_POST["fatherName"])) {
        $fatherErr = "Father name is required";
        $value = false;
    } else {
        $father = test_input($_POST["fatherName"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$father)) {
            $fatherErr = "Only letters and white space allowed";
            $value = false;
        }
        $value = true;

    }
    if (empty($_POST["phone_no"])) {
        $phErr = "Phone no is required";
        $value = false;
    } else {
        $phone = test_input($_POST["phone_no"]);
        if (!preg_match("'/^[0-9]{10}+$/'",$phone)) {
            $phErr = "+951234567";
            $value = false;
        }
        $value = true;

    }
    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
        $value = false;
    } else {
        $address = test_input($_POST["address"]);
        if (!preg_match("'/^[^@]{1,63}@[^@]{1,255}$/'",$address)) {
            $addressErr = "Not matched! Eg:15 Pearl St, N-K, Yangon";
            $value = false;
        }
        $value = true;

    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $value = false;
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $value = false;
        }
        $value = true;

    }
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
    $value = false;
  } else {
    $gender = test_input($_POST["gender"]);
    $value = true;
  }

  if($value){
      
        $_SESSION['id'] = $_POST['id'];
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['fatherName'] = $_POST['fatherName'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['phone'] = $_POST['phone'];
        $_SESSION['nrc'] = $_POST['nrc'];
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['dob'] = $_POST['dob'];
        $_SESSION['address'] = $_POST['address'];
        $_SESSION['career'] = $_POST['career'];
        $_SESSION['skill'] = $_POST['skill'];
        $_SESSION['file'] = $_FILES;
        header('location:insert.php');
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//
?>

<div class="container m-4">
    <h1>Student Registration Form</h1>
    <form method="POST" action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id"  name="id" value="<?php echo $id_add; ?>">
            
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name">
            <span class="error"><?php echo $nameErr;?></span>
        </div>
        <div class="form-group">
            <label for="fatherName">Father's Name</label>
            <input type="text" class="form-control" id="fatherName" name="fatherName">
            <span class="error"><?php echo $fatherErr;?></span>
        </div>
        <div class="form-group">
            <label for="nrc">NRC</label>
            <input type="text" class="form-control" id="nrc" name="nrc">
        </div>
        <div class="form-group">
            <label for="phone">Phone No</label>
            <input type="text" class="form-control" id="phone" name="phone">
            <span class="error"><?php echo $phErr;?></span>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email">
            <span class="error"><?php echo $emailErr;?></span>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="0">
                <label class="form-check-label" for="">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender"  value="1">
                <label class="form-check-label" for="">
                   Female
                </label>
            </div>
        </div>
        
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address">
        </div>
        <div class="form-group">
            <label for="career">Career</label>
            <select class="form-select" aria-label="Default select example" name="career">
                <option value="1">Forent</option>
                <option value="2">Backend</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Skill</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="skill">
                <label class="form-check-label" for="inlineCheckbox1">C++</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2" name="skill">
                <label class="form-check-label" for="inlineCheckbox2">Java</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="3" name="skill">
                <label class="form-check-label" for="inlineCheckbox3">PHP</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="4" name="skill">
                <label class="form-check-label" for="inlineCheckbox3">React</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="5" name="skill">
                <label class="form-check-label" for="inlineCheckbox3">Android</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="6" name="skill">
                <label class="form-check-label" for="inlineCheckbox3">laravel</label>
            </div>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="file" name="file">
            <label class="custom-file-label" for="file">Choose file</label>
        </div>
        <button type="submit" name="save" class="btn btn-primary">Save</button>
        <!-- <button type="submit" name="reset" class="btn btn-danger">Reset</button> -->
    </form>
</div>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>