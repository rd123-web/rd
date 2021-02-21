<?php
include 'config.php';
$parent_category_id = 0;
$query = "SELECT * FROM tbl_category ";
$result = mysqli_query($connect,$query);

foreach($result as $row)
{
    $data = node_data($parent_category_id,$connect);
}
echo json_encode(array_values($data));
function node_data($parent_category_id,$connect)
{
$qry = "SELECT * FROM TBL_CATEGORY WHERE parent_category_id='$parent_category_id'";
$result = mysqli_query($connect,$qry);
$output = array();
foreach($result as $row)
{
    $sub_array =array();
    $sub_array['text'] = $row['category_name'];
    $sub_array['nodes'] = array_values(node_data($row['category_id'],$connect));

    $output[]=$sub_array;
}
return $output;

}


?>
