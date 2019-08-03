<?php
  require 'header.php';
?>

<div class="padding">



  <div class="bg-primary">
    <br><br>
    <h1 class="display-3 text-center text-white">Hospital Data Analysis For Doctors</h1>
    <div class="my-12 py-12">
      <div class="col-md-14 p-lg-5 mx-auto my-5">

        <div class="jumbotron">
          
          <!-- Chart 1 Pie Chart-->
          <head>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
            google.charts.load('current', {
              'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart1);

            // Start of chart draw
            function drawChart1() {
              var data = google.visualization.arrayToDataTable([
                ['User Type', 'Number of Individuals of each user type'],
                <?php
                  require 'includes/dbh.inc.php';
                  
                  $query  = "SELECT uidType, COUNT(*) AS cnt FROM users GROUP BY uidType";
                  $result = $conn->query($query);

                  if (!$result) die ("Database phydash.php access failed: " . $conn->error);

                  $rows = $result->num_rows;

                  for ($j = 0 ; $j < $rows ; ++$j){
                    $result->data_seek($j);
                    $row = $result->fetch_array(MYSQLI_ASSOC);

                    $idUsers=$row['uidType'];
                    $cnt=$row['cnt'];
                    echo "['$idUsers',$cnt]";
                    if($j!=$rows-1){
                      echo ",";
                    }
                  }
                  $result->close();
                  $conn->close();
                ?>
              ]);

              var options = {
                title: 'Distributions of Users: Doctors, Nurses, Patients'
              };

              var chart = new google.visualization.PieChart(document.getElementById('piechart'));

              chart.draw(data, options);
            }
            // End of drawchart
            // Need to get more data for patients
            </script>
          </head>
          <body>
            <div id="piechart" class="chart" style="width: 100%; min-height: 450px"></div>
          </body>
          <br>

          <!-- Chart 2 Height vs Weight Line Graph -->
          <head>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
            google.charts.load('current', {
              'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart2);
            function drawChart2() {
              // This changes a lot.
              var data = google.visualization.arrayToDataTable([
                ['Sales', 'Expenses'],
                <?php
                      // This php will return the other comma separated values.
                      require 'includes/dbh.inc.php';
                      
                      // Pull uheight and uweight from users.
                      // Order the query by weight in ascending order.
                      $query  = "SELECT uheight, uweight FROM users ORDER BY uweight ASC";
                      $result = $conn->query($query);

                      if (!$result) die ("Database phydash.php access failed: " . $conn->error);

                      $rows = $result->num_rows;

                      for ($j = 0 ; $j < $rows ; ++$j){
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);

                        // Store the uheight and uweight into variables.
                        $uweight=$row['uweight'];
                        $uheight=$row['uheight'];
                        echo "['$uweight',$uheight]";

                        // Add commas only if not the last row.
                        if($j!=$rows-1){
                          echo ",";
                        }
                      }
                      $result->close();
                      $conn->close();
                    ?>
              ]);

              var options = {
                title: 'Weight Compared to Height of All Users in the Hospital',
                curveType: 'none',
                legend: {
                  position: 'bottom'
                },
                hAxis: {
                  title: 'Weight (kg)'
                },
                vAxis: {
                  title: 'Height (cm)'
                }
              };

              var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
              chart.draw(data, options);
            }
            </script>
          </head>
          <body>
            <div id="curve_chart" style="width: 100%; min-height: 450px"></div>
          </body>
        
          <br>


          <!-- Chart 3 -->
          <html>
            <head>
              <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
              <script type="text/javascript">
                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(drawChart3);
                function drawChart3() {
                  var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],

                    <?php
                      require 'includes/dbh.inc.php';
                      
                      $query  = "SELECT medication, COUNT(*) AS cnt FROM users GROUP BY medication";
                      $result = $conn->query($query);

                      if (!$result) die ("Database phydash.php access failed: " . $conn->error);

                      $rows = $result->num_rows;

                      for ($j = 0 ; $j < $rows ; ++$j){
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);

                        $idUsers=$row['medication'];
                        $cnt=$row['cnt'];
                        echo "['$idUsers',$cnt]";
                        if($j!=$rows-1){
                          echo ",";
                        }
                      }
                      $result->close();
                      $conn->close();
                    ?>


                  ]);

                  var options = {
                    title: 'Distribution of Medication Across The Hospital',
                    pieHole: 0.4,
                  };

                  var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                  chart.draw(data, options);
                }
              </script>
            </head>
            <body>
              <div id="donutchart" style="width: 100%; min-height: 450px"></div>
            </body>
          </html>
      
          <br>

          <!-- Chart 4 -->
          <html>
            <head>
              <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
              <script type="text/javascript">
                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(drawChart4);
                function drawChart4() {
                  var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    <?php
                      require 'includes/dbh.inc.php';
                      
                      $query  = "SELECT assignedDoctor, COUNT(*) AS cnt FROM users GROUP BY assignedDoctor";
                      $result = $conn->query($query);

                      if (!$result) die ("Database phydash.php access failed: " . $conn->error);

                      $rows = $result->num_rows;

                      for ($j = 0 ; $j < $rows ; ++$j){
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);

                        $idUsers=$row['assignedDoctor'];
                        $cnt=$row['cnt'];
                        echo "['$idUsers',$cnt]";
                        if($j!=$rows-1){
                          echo ",";
                        }
                      }
                      $result->close();
                      $conn->close();
                    ?>
                  ]);

                  var options = {
                    title: 'Distribution of All Hopsital Users Across All Active Physicians',
                    is3D: true,
                  };

                  var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                  chart.draw(data, options);
                }
              </script>
            </head>
            <body>
              <div id="piechart_3d" style="width: 100%; min-height: 450px"></div>
            </body>
          </html>


          <br>


          <!-- Chart 5 -->
          <html>
            <head>
              <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
              <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart5);

                function drawChart5() {
                  var data = google.visualization.arrayToDataTable([
                    ['Height', 'Weight'],
                    <?php
                      // This php will return the other comma separated values.
                      require 'includes/dbh.inc.php';
                      
                      // Pull uheight and uweight from users.
                      // Order the query by weight in ascending order.
                      $query  = "SELECT uheight, uweight FROM users WHERE uidType='Patient' ORDER BY uweight ASC";
                      $result = $conn->query($query);

                      if (!$result) die ("Database phydash.php access failed: " . $conn->error);

                      $rows = $result->num_rows;

                      for ($j = 0 ; $j < $rows ; ++$j){
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);

                        // Store the uheight and uweight into variables.
                        $uweight=$row['uweight'];
                        $uheight=$row['uheight'];
                        echo "['$uweight',$uheight]";

                        // Add commas only if not the last row.
                        if($j!=$rows-1){
                          echo ",";
                        }
                      }
                      $result->close();
                      $conn->close();
                    ?>
                  ]);

                  var options = {
                    title: 'Scatter Plot of Height vs. Weight of Patients Only',
                    hAxis: {title: 'Weight (kg)', minValue: 0, maxValue: 100},
                    vAxis: {title: 'Height (cm)', minValue: 100, maxValue: 200},
                    legend: 'none'
                  };

                  var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));

                  chart.draw(data, options);
                }
              </script>
            </head>
            <body>
              <div id="chart_div" style="width: 100%; min-height: 450px"></div>
            </body>
          </html>
          
          <br>

          <!-- Chart 6 -->
          <html>
            <head>
              <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
              <script type="text/javascript">
                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(drawChart6);
                function drawChart6() {
                  var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    <?php
                      require 'includes/dbh.inc.php';
                      
                      $query  = "SELECT diagnosis, COUNT(*) AS cnt FROM users GROUP BY diagnosis";
                      $result = $conn->query($query);

                      if (!$result) die ("Database phydash.php access failed: " . $conn->error);

                      $rows = $result->num_rows;

                      for ($j = 0 ; $j < $rows ; ++$j) {
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);

                        $idUsers=$row['diagnosis'];
                        $cnt=$row['cnt'];
                        echo "['$idUsers',$cnt]";
                        if($j!=$rows-1){
                          echo ",";
                        }
                      }
                      $result->close();
                      $conn->close();
                    ?>
                  ]);

                  var options = {
                    title: 'Diagnosed Conditions Across the Hospital',
                    pieHole: 0.4,
                  };

                  var chart = new google.visualization.PieChart(document.getElementById('donutchart2'));
                  chart.draw(data, options);
                }
              </script>
            </head>
            <body>
              <div id="donutchart2" style="width: 100%; min-height: 450px"></div>
            </body>
          </html>


          <br>

          <script>
            // Automatically redraw the gstatic charts if the window sizes changes at all.
            $(window).resize(function(){
              drawChart1();
              drawChart2();
              drawChart3();
              drawChart4();
              drawChart5();
              drawChart6();
            });
          </script>

        </div>
      </div>
    </div>


    <?php
      require 'workHoursP.php';
    ?>


  </div>
</div>



<br> 

<div class="padding">
  <div class="jumbotron">
    <h1 class="display-4 text-center">Physician Update and Delete Users</h1>
    <?php
        require 'usertable.php';
      ?>
  </div>
</div>

<br>

<?php
    require 'footer.php';
  ?>
