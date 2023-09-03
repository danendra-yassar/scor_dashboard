<div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="me-md-3 me-xl-5">
                    <h2>Selamat Datang di Aplikasi Pengelolaan Bibit dan SCOR</h2>
                    <p class="mb-md-0"></p>
                  </div>
                  <div class="d-flex">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                    <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                    <p class="text-primary mb-0 hover-cursor">Analytics</p>
                  </div>
                </div>

                <!-- Report Bar -->
                <!-- <div class="d-flex justify-content-between align-items-end flex-wrap">
                  <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block ">
                    <i class="mdi mdi-download text-muted"></i>
                  </button>
                  <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                    <i class="mdi mdi-clock-outline text-muted"></i>
                  </button>
                  <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                    <i class="mdi mdi-plus text-muted"></i>
                  </button>
                  <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button>
                </div> -->

              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body dashboard-tabs p-0">
                  <ul class="nav nav-tabs px-4" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                    </li>

                    <!-- Sales and Purchase -->
                    <!-- <li class="nav-item">
                      <a class="nav-link" id="sales-tab" data-bs-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false">Sales</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="purchases-tab" data-bs-toggle="tab" href="#purchases" role="tab" aria-controls="purchases" aria-selected="false">Purchases</a>
                    </li> -->

                  </ul>
                  <div class="tab-content py-0 px-0">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">

                        <!-- Calendar -->
                        <!-- <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-calendar-heart icon-lg me-3 text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Start date</small>
                            <div class="dropdown">
                              <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                              </a>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                                <a class="dropdown-item" href="#">12 Aug 2018</a>
                                <a class="dropdown-item" href="#">22 Sep 2018</a>
                                <a class="dropdown-item" href="#">21 Oct 2018</a>
                              </div>
                            </div>
                          </div>
                        </div> -->

                        <!-- Show Data Stok Aktif -->

                        <?php
                          include "koneksi.php";

                          $get_data = mysqli_query($koneksi,"SELECT SUM(stok_aktif) AS total_stok FROM tb_jenis_bibit");
                          
                          while ($show = mysqli_fetch_array($get_data)){
                        ?>

                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-folder-multiple me-3 icon-lg text-info"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Stok Aktif</small>
                            <h5 class="me-2 mb-0"><?php echo $show['total_stok']?>&nbsp;bibit</h5>
                          </div>
                        </div>

                        <?php } ?>

                        <!-- Stok Total Masuk -->
                        <?php
                          include "koneksi.php";

                          $get_data2 = mysqli_query($koneksi,"SELECT SUM(stok_bibit_masuk) AS total_stok_masuk FROM tb_bibit_masuk");
                          
                          while ($show2 = mysqli_fetch_array($get_data2)){
                        ?>

                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-folder-download me-3 icon-lg text-success"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Stok Masuk</small>
                            <h5 class="me-2 mb-0"><?php echo $show2['total_stok_masuk']?>&nbsp;bibit</h5>
                          </div>
                        </div>

                        <?php } ?>

                        <!-- Stok Total Mutasi -->
                        <?php
                          include "koneksi.php";

                          $get_data3 = mysqli_query($koneksi,"SELECT SUM(stok_bibit_mutasi) AS total_stok_mutasi FROM tb_mutasi_bibit");
                          
                          while ($show3 = mysqli_fetch_array($get_data3)){
                        ?>

                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-folder-upload me-3 icon-lg text-danger"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Stok Keluar</small>
                            <h5 class="me-2 mb-0"><?php echo $show3['total_stok_mutasi']?>&nbsp;bibit</h5>
                          </div>
                        </div>

                        <?php } ?>

                        <!-- Total Pemohon -->
                        <?php
                          $get_data4 = mysqli_query($koneksi,"SELECT * FROM tb_mutasi_bibit");

                          $count_data = mysqli_num_rows($get_data4);
                        ?>
                        <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-account-multiple me-3 icon-lg text-warning"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Permohonan Masuk</small>
                            <h5 class="me-2 mb-0"><?=$count_data;?></h5>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h3>Data Stok bibit CDK 1</h3>
                  <div class="table-responsive">
                    <table id="recent-purchases-listing" class="table">
                      <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Bibit</th>
                            <th>Jumlah Stok</th>                            
                        </tr>
                      </thead>

                      <!-- SQL VIEW -->
                      <?php
                        include "koneksi.php";

                        $no = 1;

                        $get_data = mysqli_query($koneksi,"SELECT * FROM tb_jenis_bibit ");

                        while ($show = mysqli_fetch_array($get_data)){
                      ?>

                      <!-- Table View -->
                      <tbody>
                        <tr>
                            <td> <?php echo $no++ ?></td>
                                <td> <?php echo $show['jenis_bibit']?></td>
                                <td> <?php echo $show['stok_aktif']?></td>
                        </tr>
                      </tbody>

                      <?php } ?>

                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">News Feed</p>
                  <p class="text-muted">
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio dolorem expedita distinctio, voluptate possimus in asperiores nam iusto explicabo molestiae delectus sapiente ipsam nulla labore architecto autem quod deleniti blanditiis!
                  </p>
                  <div id="total-sales-chart-legend"></div>                  
                </div>
                <canvas id="total-sales-chart"></canvas>
              </div>
            </div>
          
          <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Cash deposits</p>
                  <p class="mb-4">To start a blog, think of a topic about and first brainstorm party is ways to write details</p>
                  <div id="cash-deposits-chart-legend" class="d-flex justify-content-center pt-3"></div>
                  <canvas id="cash-deposits-chart"></canvas>
                </div>
              </div>
            </div>


          </div>
      </div>