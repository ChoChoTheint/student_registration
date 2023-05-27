<?php
require "conn.php";
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
          <div class="row col-md-12">
                <form action="" method="GET">
                    <input name="search" required type="text" placeholder="Search id, name and email"  value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>">
                    <button class="btn btn-primary" type="submit" name="">Search</button>
                </form>
                <form action="excel.php" method="post">
                    <input type="submit" class="btn btn-success" name="excel" value="excel">
                </form>
          </div>
        
    <?php
                        echo '<div class="my-3">';
                        echo '<table class="table" >';
                        echo '<tr>';
                        echo '<th>NO</th>';
                        echo '<th>ID</th>';
                        echo '<th>Name</th>';
                        echo '<th>Email</th>';
                        echo '<th>Career </th>';
                        echo '<th>Phone No</th>';
                        echo '</tr>'; 
                        $page_record = 3;
                        if(isset($_GET['page'])){
                            $page = $_GET["page"];
                        }else{
                            $page = 1;
                        }
                        $start = ($page -1) * $page_record;
                        // $query = "SELECT * FROM student_register LIMIT $start,$page_record";
                        $query = "SELECT * FROM student_register where flag =1";
                        if(isset($_GET['search'])){
                            $search = $_GET["search"];
                            $query .= " and CONCAT(id,name,email) LIKE '%$search%' ";
                        }
                        $query .= " LIMIT $start,$page_record";
                        $result = mysqli_query($conn,$query);   
                        $no = 1;   
                        
                            while($row = mysqli_fetch_array($result)){
                                $id = $row['id'];
                                $id_add = "000".$id;
                                $career = $row['career'];
                                echo '<tr>';
                                echo '<th>'.$no.'</th>';
                                echo '<th>'.$id_add.'</th>';
                                echo '<td>'.$row['name'].'</td>';
                                echo '<td>'.$row['email'].'</td>';
                                if ($career == 1) {
                                    echo '<td>'.'Backend'.'</td>';
                                }else{
                                    echo '<td>'.'Forentend'.'</td>';
                                }
                                echo '<td>'.$row['phone_no'].'</td>';
                                echo "<td><a href='edit.php?id=$id'>Edit</a></td>";
                                echo "<td><a href='detail.php?id=$id'>Detail</a></td>";
                                echo "<td><a href='delete.php?id=$id'>Delete</a></td>";
                                echo "<td><a href='index.php?id=$id'>Home</a></td>";
                                echo '</tr>';
                                $no++;
                            }
                    echo '</table>';
                    echo '</div>';
                mysqli_free_result($result);  
                $query = "SELECT COUNT(*) FROM student_register";
                $result = mysqli_query($conn,$query);
                $row = mysqli_fetch_row($result);
                $tot_rec = $row[0];
                
                $tot_page = ceil($tot_rec / $page_record);
                $link = "";
                for ($i=1; $i<=$tot_page; $i++) {   
                    if ($i == $page) {   
                        $link .= "<a class = 'active' href='list.php?page=".$i."'>".$i." </a>";   
                    }               
                    else  {   
                        $link .= "<a href='list.php?page=".$i."'>".$i." </a>";     
                    }   
                  };
                  echo $link;   

    
                ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
