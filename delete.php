<?php
require "conn.php";
$id= $_GET['id'];
$deleteQuery = "DELETE  FROM student_register WHERE id = ". $id;
if (mysqli_query($conn, $deleteQuery)) {
    header('location:index.php');
} else {
    echo "Delete error: " . mysqli_error($conn);
}

?>