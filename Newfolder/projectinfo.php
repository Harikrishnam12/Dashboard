<?php
$con = mysqli_connect('localhost', 'hari' ,123456, 'dashboard');

$result = mysqli_query($con, "select * from projectinfo;");

$data = array();

while($row=mysqli_fetch_array($result)){
    $data[] = $row;
}

echo json_encode($data);
?>