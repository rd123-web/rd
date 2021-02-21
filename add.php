<?php
include 'config.php';

$parent_id = $_POST['parent_id'];
$category_name =$_POST['category_name'];
$query = "INSERT INTO tbl_category(parent_category_id,category_name) VALUES('$parent_id','$category_name') ";


$q= mysqli_query($connect,$query);
if($q>0)
{
echo "Category added success";
}
else
{
    echo "Some Error During The Insert Category";
}
?>
