                              <?php
                              error_reporting(0);

                                // skor
                                  $skor_plan = $_POST['skor_plan'];
                                  $skor_source = $_POST['skor_source'];
                                  $skor_make = $_POST['skor_make'];
                                  $skor_deliver = $_POST['skor_deliver'];
                                  $skor_return = $_POST['skor_return'];

                                  // bobot
                                  $bobot_plan = $_POST['bobot_plan'];
                                  $bobot_source = $_POST['bobot_source'];
                                  $bobot_make = $_POST['bobot_make'];
                                  $bobot_deliver = $_POST['bobot_deliver'];
                                  $bobot_return = $_POST['bobot_return'];

                                  // Hasil Nilai
                                  $nilai_plan = $skor_plan * $bobot_plan;
                                  $nilai_source = $skor_source * $bobot_source;
                                  $nilai_make = $skor_make * $bobot_make;
                                  $nilai_deliver = $skor_deliver * $bobot_deliver;
                                  $nilai_return = $skor_return * $bobot_return;
 
                                $dataPoints = array( 
                                  array("label"=>"Plan", "symbol" => "PLN","y"=>$nilai_plan),
                                  array("label"=>"Source", "symbol" => "SC","y"=>$nilai_source),
                                  array("label"=>"Make", "symbol" => "MK","y"=>$nilai_make),
                                  array("label"=>"Deliver", "symbol" => "DLV","y"=>$nilai_deliver),
                                  array("label"=>"Return", "symbol" => "RTN","y"=>$nilai_return),
                                )
                              
                              ?>

<head>

  <!-- Diagram -->
  <script>
      window.onload = function() {
      
      var chart = new CanvasJS.Chart("chartContainer", {
        theme: "light2",
        animationEnabled: true,
        data: [{
          type: "doughnut",
          indexLabel: "{symbol} - {y}",
          yValueFormatString: "#,##0.0\"%\"",
          showInLegend: true,
          legendText: "{label} : {y}",
          dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
      });
      chart.render();
      
      }
  </script>
  
</head>

<div class="content-wrapper">
    <div class="card">
                <div class="card-body">
                  <h2 class="display3">SCOR Analytics Level 1</h2>
                  <form class="form-sample" action="" method="POST">

                      <!-- Break -->
                      <br>

                      <!-- Proses -->
                      <blockquote class="blockquote blockquote-primary">
                        <h2>Proses</h2>
                        <br>

                        <!-- Plan -->
                        <p class="card-description">
                          Plan
                        </p>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Skor Plan</label>
                              <div class="col-sm-6">
                                <input type="text" class="form-control" name="skor_plan" id="skor_plan" placeholder="Masukkan Skor Plan">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Bobot Plan</label>
                              <div class="col-sm-6">
                                <input type="text" class="form-control" name="bobot_plan" id="bobot_plan" placeholder="Masukkan Bobot Plan">
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Source -->
                        <p class="card-description">
                          Source
                        </p>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Skor Source</label>
                              <div class="col-sm-6">
                                <input type="text" class="form-control" name="skor_source" id="skor_source" placeholder="Masukkan Skor Source">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label"> Bobot Source</label>
                              <div class="col-sm-6">
                                <input type="text" class="form-control" name="bobot_source" id="bobot_source" placeholder="Masukkan Bobot Source">
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Make -->
                        <p class="card-description">
                          Make
                        </p>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Skor Make</label>
                              <div class="col-sm-6">
                                <input type="text" class="form-control" name="skor_make" id="skor_make" placeholder="Masukkan Skor Make">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label"> Bobot Make</label>
                              <div class="col-sm-6">
                                <input type="text" class="form-control" name="bobot_make" id="bobot_make" placeholder="Masukkan Bobot Make">
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Deliver -->
                        <p class="card-description">
                          Deliver
                        </p>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Skor Deliver</label>
                              <div class="col-sm-6">
                                <input type="text" class="form-control" name="skor_deliver" id="skor_deliver" placeholder="Masukkan Skor Deliver">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label"> Bobot Deliver</label>
                              <div class="col-sm-6">
                                <input type="text" class="form-control" name="bobot_deliver" id="bobot_deliver" placeholder="Masukkan Bobot Deliver"
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Return -->
                        <p class="card-description">
                          Return
                        </p>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Skor Return</label>
                              <div class="col-sm-6">
                                <input type="text" class="form-control" name="skor_return" id="skor_return" placeholder="Masukkan skor return">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label"> Bobot Return</label>
                              <div class="col-sm-6">
                                <input type="text" class="form-control" name="bobot_return" id="bobot_return" placeholder="Masukkan Bobot return">
                              </div>
                            </div>
                          </div>
                        </div>

                      </blockquote>

                      <!-- Button -->
                      <button type="submit" class="btn btn-primary me-2">Hitung</button>
                      <button class="btn btn-danger">Reset</button>

                  </form>

                </div>
      </div>
</div>

<!-- HASIL HITUNG -->

<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2>Result</h2>
                  <p class="card-description">
                    
                  </p>

                  <!-- Tabel -->
                  <div class="table-responsive pt-3">
                    <table class="table table-striped">

                      <!-- Judul Tabel -->
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Proses Kinerja</th>
                              <th>Skor Proses</th>
                              <th>Bobot Proses</th>
                              <th>Nilai Akhir</th>
                              <th>Kinerja</th>
                          </tr>
                        </thead>

                      <!-- Isi Tabel -->
                      <tbody>
                      <!-- Hasil Hitungan -->
                        
                            <!-- Plan -->
                            <tr>
                              <td>1</td>
                              <td>Plan</td>
                              <?php
                                  if ($_POST){
                                      echo '<td>' .$_POST['skor_plan'].'</td>';
                                      echo '<td>' .$_POST['bobot_plan'].'</td>';
                                      
                                      // Nilai Total Kinerja
                                      if (isset($_POST["skor_plan"])) 
                                      {
                                          $skor_plan = $_POST["skor_plan"];
                                          $bobot_plan = $_POST["bobot_plan"];
                                          $hasil_plan = $skor_plan * $bobot_plan;

                                          echo '<td>' .$hasil_plan.'</td>';
                                            
                                      }
                                      
                                      $output = '';
                                      if (isset($_POST["skor_plan"])) 
                                      {
                                                  $skor_plan = $_POST["skor_plan"];
                                                  $bobot_plan = $_POST["bobot_plan"];
                                                  $percentage_scor = $skor_plan * $bobot_plan;
                                                  $progress_bar_class = '';
                                                  if($percentage_scor >= 80)
                                                  {
                                                      $progress_bar_class = 'bg-success';
                                                  }
                                                  else if($percentage_scor >= 60 && $percentage_scor < 79)
                                                  {
                                                      $progress_bar_class = 'bg-info';
                                                  }
                                                  else if($percentage_scor >= 30 && $percentage_scor < 59)
                                                  {
                                                      $progress_bar_class = 'bg-warning';
                                                  }
                                                  else
                                                  {
                                                      $progress_bar_class = 'bg-danger';
                                                  }
                                                  $output .= '
                                                      <div class="progress">
                                                              <div class="progress-bar '.$progress_bar_class.'" role="progressbar" aria-valuenow="'.$percentage_scor.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$percentage_scor.'%">
                                                                  
                                                              </div>
                                                      </div>
                                                  ';

                                        }
                                          echo '<td>' .$output.'</td>';
                                                                             
                                    }
                                
                              ?>
                            </tr>
                            
                            <!-- Source -->
                            <tr>
                              <td>2</td>
                              <td>Source</td>
                              <?php
                                  if ($_POST){
                                      echo '<td>' .$_POST['skor_source'].'</td>';
                                      echo '<td>' .$_POST['bobot_source'].'</td>';
                                      
                                      // Nilai Total Kinerja
                                      if (isset($_POST["skor_source"])) 
                                      {
                                          $skor_source = $_POST["skor_source"];
                                          $bobot_source = $_POST["bobot_source"];
                                          $hasil_source = $skor_source * $bobot_source;

                                          echo '<td>' .$hasil_source.'</td>';
                                            
                                      }
                                      
                                      $output = '';
                                      if (isset($_POST["skor_source"])) 
                                      {
                                              $skor_source = $_POST["skor_source"];
                                              $bobot_source = $_POST["bobot_source"];
                                              $percentage_scor = $skor_source * $bobot_source;
                                              $progress_bar_class = '';
                                                  if($percentage_scor >= 80)
                                                  {
                                                      $progress_bar_class = 'bg-success';
                                                  }
                                                  else if($percentage_scor >= 60 && $percentage_scor < 79)
                                                  {
                                                      $progress_bar_class = 'bg-info';
                                                  }
                                                  else if($percentage_scor >= 30 && $percentage_scor < 59)
                                                  {
                                                      $progress_bar_class = 'bg-warning';
                                                  }
                                                  else
                                                  {
                                                      $progress_bar_class = 'bg-danger';
                                                  }
                                                  $output .= '
                                                      <div class="progress">
                                                              <div class="progress-bar '.$progress_bar_class.'" role="progressbar" aria-valuenow="" aria-valuenow="'.$percentage_scor.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$percentage_scor.'%">
                  
                                                              </div>
                                                      </div>
                                                  ';

                                        }
                                          echo '<td>' .$output.'</td>';
                                                                             
                                    }
                                
                              ?>
                            </tr>
                            
                            <!-- Make -->
                            <tr>
                              <td>3</td>
                              <td>Make</td>
                              <?php
                                  if ($_POST){
                                      echo '<td>' .$_POST['skor_make'].'</td>';
                                      echo '<td>' .$_POST['bobot_make'].'</td>';
                                      
                                      // Nilai Total Kinerja
                                      if (isset($_POST["skor_make"])) 
                                      {
                                          $skor_make = $_POST["skor_make"];
                                          $bobot_make = $_POST["bobot_make"];
                                          $hasil_make = $skor_make * $bobot_make;

                                          echo '<td>' .$hasil_make.'</td>';
                                            
                                      }
                                      
                                      $output = '';
                                      if (isset($_POST["skor_make"])) 
                                      {
                                              $skor_make = $_POST["skor_make"];
                                              $bobot_make = $_POST["bobot_make"];
                                              $percentage_scor = $skor_make * $bobot_make;
                                              $progress_bar_class = '';
                                                  if($percentage_scor >= 80)
                                                  {
                                                      $progress_bar_class = 'bg-success';
                                                  }
                                                  else if($percentage_scor >= 60 && $percentage_scor < 79)
                                                  {
                                                      $progress_bar_class = 'bg-info';
                                                  }
                                                  else if($percentage_scor >= 30 && $percentage_scor < 59)
                                                  {
                                                      $progress_bar_class = 'bg-warning';
                                                  }
                                                  else
                                                  {
                                                      $progress_bar_class = 'bg-danger';
                                                  }
                                                  $output .= '
                                                      <div class="progress">
                                                              <div class="progress-bar '.$progress_bar_class.'" role="progressbar" aria-valuenow="" aria-valuenow="'.$percentage_scor.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$percentage_scor.'%">
                  
                                                              </div>
                                                      </div>
                                                  ';

                                        }
                                          echo '<td>' .$output.'</td>';
                                                                             
                                    }
                                
                              ?>
                            </tr>
                            
                            <!-- Deliver -->
                            <tr>
                              <td>4</td>
                              <td>Deliver</td>
                              <?php
                                  if ($_POST){
                                      echo '<td>' .$_POST['skor_deliver'].'</td>';
                                      echo '<td>' .$_POST['bobot_deliver'].'</td>';
                                      
                                      // Nilai Total Kinerja
                                      if (isset($_POST["skor_deliver"])) 
                                      {
                                          $skor_deliver = $_POST["skor_deliver"];
                                          $bobot_deliver = $_POST["bobot_deliver"];
                                          $hasil_deliver = $skor_deliver * $bobot_deliver;

                                          echo '<td>' .$hasil_deliver.'</td>';
                                            
                                      }
                                      
                                      $output = '';
                                      if (isset($_POST["skor_deliver"])) 
                                      {
                                              $skor_deliver = $_POST["skor_deliver"];
                                              $bobot_deliver = $_POST["bobot_deliver"];
                                              $percentage_scor = $skor_deliver * $bobot_deliver;
                                              $progress_bar_class = '';
                                                  if($percentage_scor >= 80)
                                                  {
                                                      $progress_bar_class = 'bg-success';
                                                  }
                                                  else if($percentage_scor >= 60 && $percentage_scor < 79)
                                                  {
                                                      $progress_bar_class = 'bg-info';
                                                  }
                                                  else if($percentage_scor >= 30 && $percentage_scor < 59)
                                                  {
                                                      $progress_bar_class = 'bg-warning';
                                                  }
                                                  else
                                                  {
                                                      $progress_bar_class = 'bg-danger';
                                                  }
                                                  $output .= '
                                                      <div class="progress">
                                                              <div class="progress-bar '.$progress_bar_class.'" role="progressbar" aria-valuenow="" aria-valuenow="'.$percentage_scor.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$percentage_scor.'%">
                  
                                                              </div>
                                                      </div>
                                                  ';

                                        }
                                          echo '<td>' .$output.'</td>';
                                                                             
                                    }
                                
                              ?>
                            </tr>

                            <!-- Return -->
                            <tr>
                              <td>5</td>
                              <td>Return</td>
                              <?php
                                  if ($_POST){
                                      echo '<td>' .$_POST['skor_return'].'</td>';
                                      echo '<td>' .$_POST['bobot_return'].'</td>';
                                      
                                      // Nilai Total Kinerja
                                      if (isset($_POST["skor_return"])) 
                                      {
                                          $skor_return = $_POST["skor_return"];
                                          $bobot_return = $_POST["bobot_return"];
                                          $hasil_return = $skor_return * $bobot_return;

                                          echo '<td>' .$hasil_return.'</td>';
                                            
                                      }
                                      
                                      $output = '';
                                      if (isset($_POST["skor_return"])) 
                                      {
                                              $skor_return = $_POST["skor_return"];
                                              $bobot_return = $_POST["bobot_return"];
                                              $percentage_scor = $skor_return * $bobot_return;
                                              $progress_bar_class = '';
                                                  if($percentage_scor >= 80)
                                                  {
                                                      $progress_bar_class = 'bg-success';
                                                  }
                                                  else if($percentage_scor >= 60 && $percentage_scor < 79)
                                                  {
                                                      $progress_bar_class = 'bg-info';
                                                  }
                                                  else if($percentage_scor >= 30 && $percentage_scor < 59)
                                                  {
                                                      $progress_bar_class = 'bg-warning';
                                                  }
                                                  else
                                                  {
                                                      $progress_bar_class = 'bg-danger';
                                                  }
                                                  $output .= '
                                                      <div class="progress">
                                                              <div class="progress-bar '.$progress_bar_class.'" role="progressbar" aria-valuenow="" aria-valuenow="'.$percentage_scor.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$percentage_scor.'%">
                  
                                                              </div>
                                                      </div>
                                                  ';

                                        }
                                          echo '<td>' .$output.'</td>';
                                                                             
                                    }
                                
                              ?>
                            </tr>

                            <!-- End Hasil -->

                          </tbody>

                          <!-- End Tabel -->

                    </table>

                    <br><br>

                  <!-- Total Proses Kinerja -->
                  <div class="row">
                     <div class="card">
                        <div class="card-body">
                              <h3>Nilai Kinerja Aktual</h3>

                              <br>
                                <?php
                                  // skor
                                  $skor_plan = $_POST['skor_plan'];
                                  $skor_source = $_POST['skor_source'];
                                  $skor_make = $_POST['skor_make'];
                                  $skor_deliver = $_POST['skor_deliver'];
                                  $skor_return = $_POST['skor_return'];

                                  // bobot
                                  $bobot_plan = $_POST['bobot_plan'];
                                  $bobot_source = $_POST['bobot_source'];
                                  $bobot_make = $_POST['bobot_make'];
                                  $bobot_deliver = $_POST['bobot_deliver'];
                                  $bobot_return = $_POST['bobot_return'];

                                  // Hasil Nilai
                                  $nilai_plan = $skor_plan * $bobot_plan;
                                  $nilai_source = $skor_source * $bobot_source;
                                  $nilai_make = $skor_make * $bobot_make;
                                  $nilai_deliver = $skor_deliver * $bobot_deliver;
                                  $nilai_return = $skor_return * $bobot_return;

                                  // Total
                                  $total_nilai = $nilai_plan + $nilai_source + $nilai_make + $nilai_deliver + $nilai_return;

                                  // print
                                  echo 
                                    '<blockquote class="blockquote blockquote-primary col-md-5">
                                        <h3>' .$total_nilai.'</h3>
                                     </blockquote>';
                                    
                                    // Monitoring
                                    if($total_nilai >= 90)
                                                  {
                                                      $monitoring = '<button type="button" class="btn btn-inverse-success btn-fw">Excellent</button>';
                                                  }
                                                  else if($total_nilai >= 70 && $total_nilai < 89)
                                                  {
                                                      $monitoring = '<button type="button" class="btn btn-inverse-primary btn-fw">Good</button>';
                                                  }
                                                  else if($total_nilai >= 50 && $total_nilai < 69)
                                                  {
                                                      $monitoring = '<button type="button" class="btn btn-inverse-info btn-fw">Average</button>';
                                                  }
                                                  else if($total_nilai >= 40 && $total_nilai < 49)
                                                  {
                                                      $monitoring = '<button type="button" class="btn btn-inverse-warning btn-fw">Marginal</button>';
                                                  }
                                                  else
                                                  {
                                                      $monitoring = '<button type="button" class="btn btn-inverse-danger btn-fw">Poor</button>';
                                                  }

                                            echo '<h2>' .$monitoring.'</h2>';

                                ?>
                         </div>
                     </div>
                  </div>

                  <!-- Diagram -->
                  <div class="card">
                    <div class="card-body">
                      <h3>Diagram</h3>
                      <div id="chartContainer" style="height: 360px; width: 100%;"></div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>