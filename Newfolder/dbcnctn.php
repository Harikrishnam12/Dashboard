<?php

$con = mysqli_connect('localhost', 'hari' ,123456, 'dashboard');
if (mysqli_connect_errno()) {
    echo "failed to connect";
    exit();
}

$result = mysqli_query($con, "select * from projectinfo");
echo "<h1 >Project Information</h1>";
echo "<table id = 'table1' align = 'center' border='1' width='300' cellspacing='0'>";
echo "<th bgcolor='orange'>ClientID</th>";
echo "<th bgcolor='orange'>ClientName</th>";
echo "<th bgcolor='orange'>ProjectID</th>";
echo "<th bgcolor='orange'>ProjectName</th>";
while($row=mysqli_fetch_array($result)){
  echo "<tr>";
        echo "<td bgcolor='lightgrey'>$row[ClientID]</td>";
        echo "<td bgcolor='lightgrey'>$row[ClientName]</td>";
        echo "<td bgcolor='lightgrey'>$row[ProjectID]</td>";
        echo "<td bgcolor='lightgrey'>$row[ProjectName]</td>";
  echo "</tr>";}
echo"</table>";


$result1 = mysqli_query($con, "select * from testcaseinfo");
echo "<h1 >Testcase's Information</h1>";
echo "<table align = 'center' border='1' width='300' cellspacing='0'>";
echo "<th bgcolor='orange'>ProjectID</th>";
echo "<th bgcolor='orange'>SprintName</th>";
echo "<th bgcolor='orange'>PassedTestCaseCount</th>";
echo "<th bgcolor='orange'>FailedTestCaseCount</th>";
echo "<th bgcolor='orange'>SkippedTestCaseCount</th>";
echo "<th bgcolor='orange'>TotalTestCaseCount</th>";
while($row=mysqli_fetch_array($result1)){
  echo "<tr>";
        echo "<td bgcolor='lightgrey'>$row[ProjectID]</td>";
        echo "<td bgcolor='lightgrey'>$row[SprintName]</td>";
        echo "<td bgcolor='lightgrey'>$row[PassedTestCaseCount]</td>";
        echo "<td bgcolor='lightgrey'>$row[FailedTestCaseCount]</td>";
        echo "<td bgcolor='lightgrey'>$row[SkippedTestCaseCount]</td>";
        echo "<td bgcolor='lightgrey'>$row[TotalTestCaseCount]</td>";
  echo "</tr>";}
echo"</table>";
?>

