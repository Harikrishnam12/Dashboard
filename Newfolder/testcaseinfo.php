<?php
$con = mysqli_connect('localhost', 'hari' ,123456, 'dashboard');

$result = mysqli_query($con, "select * from projectinfo join testcaseinfo on projectinfo.ProjectID=testcaseinfo.ProjectID;");

$data1 = array();

while($row=mysqli_fetch_array($result)){
    $data1[] = $row;
}

echo  json_encode($data1);
?>

