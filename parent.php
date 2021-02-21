<?php
include 'config.php';
 $query = "SELECT * FROM tbl_category ORDER BY category_name";
 $result = mysqli_query($connect,$query);
 $output = '<option value="0"> parent category</option>';
 foreach($result as $row)
 {
     $output .='<option valau="'.$row['category_id'].'" >'.$row['category_name'].'</option>';

 }
 echo $output;
