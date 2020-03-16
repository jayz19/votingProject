<?php
  $con= mysqli_connect("localhost","root","","voting");
?>  
  
  
  
  
  <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['author','score'],
          <?php
          $sql="SELECT * FROM votes";
          $fire= mysqli_query($con, $sql);

          while($result= mysqli_fetch_array($fire))
          {
            echo"['".$result['author']."',".$result['score']."],";
          }
          ?>
        ]);

        var options = {
          title: 'Voting Result'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
