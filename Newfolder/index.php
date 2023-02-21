<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<form action="#" method="post">
   <input type="text" name="clientid"><br>
    <input type="submit">
</form>

<?php
$con = mysqli_connect('localhost', 'hari' ,123456, 'dashboard');
$var1 = filter_var($_POST['clientid'], FILTER_SANITIZE_STRING);
$result = mysqli_query($con, "select * from projectinfo where ClientID = '$var1';"); 
$result1 = mysqli_query($con, "select * from projectinfo join testcaseinfo on projectinfo.ProjectID=testcaseinfo.ProjectID where ClientID = '$var1';");
$data = array();
$data1 = array();
while($row=mysqli_fetch_array($result)){
    $data[] = $row;
}
while($row=mysqli_fetch_array($result1)){
    $data1[] = $row;
}
?>

<h1 style="text-align: center">Automation Test Dashboard </h1>
<table  style="margin-left: auto; margin-right: auto;" class="table1">
    <thead>
    <tr>
        <th>ClientID</th>
        <th>ClientName</th>
        <th>ProjectID</th>
        <th>ProjectName</th>
    </tr>
</thead>
    <tbody id="data"> 
    </tbody>
</table>

<h1 class="heading" >Automation Test Matrix </h1>

<!-- <div class="barchart" style=" text-align: center; margin-left: auto; margin-right: auto; width: 35%;" >
    <canvas id="myChart"></canvas>
</div> -->

<table style="margin-left: auto; margin-right: auto;" class="table2">
    <thead>
    <tr>
        <th>ProjectID</th>
        <th>ProjectName</th>
        <th>SprintName</th>
        <th>PassedTestCaseCount</th>
        <th>FailedTestCaseCount</th>
        <th>SkippedTestCaseCount</th>
        <th>TotalTestCaseCount</th>
    </tr>
</thead>
    <tbody id="data1"> 
    </tbody>
</table>

<script>
    var data = <?php echo json_encode($data)?>;
        console.log(data);
        var html = "";
            for (var a = 0 ; a < data.length ; a++){
                var ClientID = data[a].ClientID;
                var ClientName = data[a].ClientName;
                var ProjectID = data[a].ProjectID;
                var ProjectName = data[a].ProjectName;
     
                html += "<tr class='active-row'>";
                    html += "<td>" + ClientID + "</td>";
                    html += "<td>" + ClientName + "</td>";
                    html += "<td>" + ProjectID + "</td>";
                    html += "<td>" + ProjectName + "</td>";
                html += "</tr>";
        document.getElementById("data").innerHTML = html;
         }
</script>

<script>
    var data = <?php echo json_encode($data1)?>;
        console.log(data);
            var html1 = "";
            for (var a = 0 ; a < data.length ; a++){
                var ProjectID = data[a].ProjectID;
                var ProjectName = data[a].ProjectName;
                var SprintName = data[a].SprintName;
                var PassedTestCaseCount = data[a].PassedTestCaseCount;
                var FailedTestCaseCount = data[a].FailedTestCaseCount;
                var SkippedTestCaseCount = data[a].SkippedTestCaseCount;
                var TotalTestCaseCount = data[a].TotalTestCaseCount;
          
                html1 += "<tr class='active-row'>";
                    html1 += "<td>" + ProjectID + "</td>";
                    html1 += "<td>" + ProjectName + "</td>";
                    html1 += "<td>" + SprintName + "</td>";
                    html1 += "<td>" + PassedTestCaseCount + "</td>";
                    html1 += "<td>" + FailedTestCaseCount + "</td>";
                    html1 += "<td>" + SkippedTestCaseCount + "</td>";
                    html1 += "<td>" + TotalTestCaseCount + "</td>";
                html1 += "</tr>";
            }
         document.getElementById("data1").innerHTML = html1;
</script>

<script> 
const data = {
    labels: ['PassedTests', 'FailedTests', 'SkippedTests', 'TotalTests'],
    datasets: [{
    label: 'Sprints Information',
    data: [146, 42, 18, 206],
    backgroundColor: [
      'rgba(0, 255, 0, 0.7)',
      'rgba(255,0, 0, 0.7)',
      'rgba(255, 255, 0, 0.7)',
      'rgba(0,0,255,0.7)',
    ],
  }]
};

const config = {
    type: 'bar',
    data: data,
    options: {
        plugins: {
            legend: false,
        },
    aspectRatio:2,
    scales: {
         y: {
         beginAtZero: true
        }
    }
  },
};

const barchart = new Chart(
    document.getElementById('myChart'),
    config
   );
</script> 

</body>
</html>





