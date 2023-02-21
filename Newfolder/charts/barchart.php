<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Visuals</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <style type="text/css">
        .barchart {
            width: 700px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>


<div class="barchart">
  <canvas id="myChart"></canvas>
</div>

<script>
    //setup
  const data = {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
  };
    //config
    const config = {
        type: 'bar',
        data,
        options :{
            scales: {
                 y: {
                     beginAtZero: true
                    }
            }
        }  
    };

    
    //render
    const barchart = new Chart(
        document.getElementById('myChart'),
        config
    );

</script>


</body>
</html>