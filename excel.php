<?php
require "conn.php";
header("Content-Type: application/vnd.ms-xls");
header("Content-Disposition:attachment; filename=excel.xls");

?>
<?php 
$output = '';

if(isset($_POST['excel'])){
    $sql = "SELECT * FROM student_register where flag=1";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
?>
        <table class="table" bordered=1>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Career</th>
                <th>Phone</th>
            </tr>
<?php
        while ($row = mysqli_fetch_array($result)) {
            $career = $row['career'];
?>

         
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['email']?></td>
                    <td>
                    <?php if ($career == 1) { ?>
                        <?php echo '<td>'.'Backend'.'</td>'?>;
                    <?php }else{ ?>
                        <?php echo '<td>'.'Frontend '.'</td>'?>;
                    <?php }?>
                    </td>
                    <td><?php echo $row['phone_no']?></td>
                </tr>
<?php   } ?>
</table>;
<?php
    }
}

?>