<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php
require "conn.php";

$sql_query = "SELECT * FROM student_register";

if($result = $conn->query($sql_query)){

    if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);
      $id = $row['id'];
      $name = $row['name'];
      $father_name = $row['father_name'];
      $nrc = $row['nrc'];
      $phone_no = $row['phone_no'];
      $email = $row['email'];
      $gender = $row['gender'];
      $date_of_birth = $row['date_of_birth'];
      $address = $row['address'];
      $career = $row['career'];
      $skill = $row['skill'];
      $file_path = $row['file'];

    }
}
if(isset($_POST['submit'])){

//   $id = $_POST['id'];
  $name = $_POST['name'];
  $father_name = $_POST['fatherName'];
  $nrc = $_POST['nrc'];
  $phone_no = $_POST['phone'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $date_of_birth = $_POST['date_of_birth'];
  $address = $_POST['address'];
  $career = $_POST['career'];
  $skill = $_POST['skill'];
  $file_path = $_POST['file'];
  $updateSQL = "UPDATE student_register SET `id`= '$id', `name` = '$name', `father_name` = '$father_name', `nrc` = '$nrc', `phone_no` = '$phone_no', `email`= '$email', `gender` = '$gender', `date_of_birth` = '$date_of_birth', `address` = '$address', `career` = '$career', `skill` = '$skill',`file` = '$file_path' WHERE id = ".$id;      
  if(mysqli_query($conn,$updateSQL)){
            header('location:index.php');
        }else{               
            echo "Update error....." . mysqli_error($conn);
        }
      }
?>

<div class="container" my="2">
    <div>
        <a href="index.php">Home /</a>
        <a href="list.php">Go To List /</a>
    </div>
    <h1>Student Registration(Edit)</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id"  name="id" value="<?php echo $id; ?>">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
        </div>
        <div class="form-group">
            <label for="fatherName">Father's Name</label>
            <input type="text" class="form-control" id="fatherName" name="fatherName" value="<?php echo $father_name; ?>">
        </div>
        <div class="form-group">
            <label for="nrc">NRC</label>
            <input type="text" class="form-control" id="nrc" name="nrc" value="<?php echo $nrc; ?>">
        </div>
        <div class="form-group">
            <label for="phone">Phone No</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone_no; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="form-group">
        <label for="gender">Gender</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="0" <?php if ($gender == '0') echo "checked"; ?> onchange="validateRadio('img_sex');">
                <label class="form-check-label" for="">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="1" <?php if ($gender == '1') echo "checked"; ?> onchange="validateRadio('img_sex');" >
                <label class="form-check-label" for="">
                   Female
                </label>
            </div>
        </div>
        
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $date_of_birth; ?>">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>">
        </div>
        <div class="form-group">
            <label for="career">Career</label>
            <select class="form-select" aria-label="Default select example" name="career" value="<?php echo $career; ?>">
                <option value="1">Forent</option>
                <option value="2">Backend</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Skill</label>
            <?php print_r($skill); ?>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="skill" <?php if ($skill == '1') echo "checked"; ?>>
                <label class="form-check-label" for="inlineCheckbox1">C++</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2" name="skill" <?php if ($skill == '2') echo "checked"; ?>>
                <label class="form-check-label" for="inlineCheckbox2">Java</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="3" name="skill" <?php if ($skill == '3') echo "checked"; ?>>
                <label class="form-check-label" for="inlineCheckbox3">PHP</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="4" name="skill" <?php if ($skill == '4') echo "checked"; ?>>
                <label class="form-check-label" for="inlineCheckbox3">React</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="5" name="skill" <?php if ($skill == '5') echo "checked"; ?>>
                <label class="form-check-label" for="inlineCheckbox3">Android</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="6" name="skill" <?php if ($skill == '6') echo "checked"; ?>>
                <label class="form-check-label" for="inlineCheckbox3">laravel</label>
            </div>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="file" name="file">
            <label class="custom-file-label" for="file">Choose file</label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </form>
</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
