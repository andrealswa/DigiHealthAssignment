<?php
  require 'header.php';
?>

<div class="padding">
  <div class="bg-primary">
    <br><br>
    <h1 class="display-3 text-white text-center">Hospital Data Analysis For Nurses</h1>
    <div class="my-12 py-12">
      <div class="col-md-14 p-lg-5 mx-auto my-5">

        <div class="jumbotron">

        
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
                      
                      $query  = "SELECT medication, COUNT(*) AS cnt FROM users WHERE uidType='Patient' GROUP BY medication";
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
                    title: 'Distribution of Medication Across Patients',
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
                      
                      $query  = "SELECT assignedDoctor, COUNT(*) AS cnt FROM users WHERE uidType='Patient' GROUP BY assignedDoctor";
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
                    title: 'Distribution of Patients Across All Physicians',
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
                      
                      // SELECT * FROM users WHERE uidType='Patient'
                      $query  = "SELECT diagnosis, COUNT(*) AS cnt FROM users WHERE uidType='Patient' GROUP BY diagnosis";
                      $result = $conn->query($query);

                      if (!$result) die ("Database phydash.php access failed: " . $conn->error);

                      $rows = $result->num_rows;

                      for ($j = 0 ; $j < $rows ; ++$j){
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
                    title: 'Diagnosed Conditions In Patients',
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
      require 'workHoursN.php';
    ?>



  </div>
</div>


<div class="padding">
  <div class="jumbotron">
    <h1 class="display-4 text-center">Nurse Hospital User Administration</h1>
    <?php
        require 'usertable.php';
      ?>
  </div>
</div>




<?php
    require 'footer.php';
  ?>
