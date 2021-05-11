<?php
session_start();
require "php\conexion.php";
$id = $_SESSION['id'];
$sql = "SELECT SUM(monto)as monto FROM `ingresos` WHERE id_usuario =$id AND MONTH(fecha) = MONTH(CURDATE()) ";
$resultado = $mysqli->query($sql);
$num = $resultado->num_rows;
if ($num > 0) {
  $row = $resultado->fetch_object();
  $ingresos = number_format($row->monto, 2, ".", ",");
  $ingresos2 = $row->monto;
} else {
  $ingresos = "0";
}
$sql = "SELECT SUM(cantidad)as monto FROM `egresos` WHERE id_usuario =$id AND MONTH(fecha) = MONTH(CURDATE())";
$resultado = $mysqli->query($sql);
$num = $resultado->num_rows;
if ($num > 0) {
  $row = $resultado->fetch_object();
  $egreso = number_format($row->monto, 2, ".", ",");
  $egreso2 = $row->monto;
} else {
  $egreso = "0";
}
$sql = "SELECT count(cantidad)as gastos FROM `egresos` WHERE id_usuario =$id AND MONTH(fecha) = MONTH(CURDATE())";
$resultado = $mysqli->query($sql);
$num = $resultado->num_rows;
if ($num > 0) {
  $row = $resultado->fetch_object();
  $gastos = $row->gastos;
} else {
  $gastos = "0";
};

$monto = number_format($ingresos2 - $egreso2, 2, ".", ",");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">

      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <!-- Notifications Dropdown Menu -->

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SafeMoney</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['nombre'] ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="index.php" class="nav-link active">
                <i class="nav-icon fas fa-laptop-house"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="ingresos.php" class="nav-link">
                <i class="nav-icon fas fa-coins"></i>
                <p>
                  Ingresos
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="egresos.php" class="nav-link">
                <i class=" nav-icon fas fa-hand-holding-usd"></i>
                <p>
                  Egresos
                </p>
              </a>
            </li>


            <li class="nav-item">
              <a href="reportes.php" class="nav-link">
                <i class=" nav-icon fas fa-file-invoice-dollar"></i>
                <p>
                  Reportes
                </p>
              </a>
            </li>


            <hr>
            <hr>
            <hr>
            <hr>
            <hr>
            <hr>


            <li class="nav-item">
              <a href="conf.php" class="nav-link">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  AJUSTES
                </p>
              </a>
            </li>


            <li class="nav-item">
              <a href="cerrarsession.php" class="nav-link">
                <i class="nav-icon fas fa-door-open"></i>
                <p>
                  CERRAR SESSION
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo "$" . $monto ?></h3>

                  <p>Fondo</p>
                </div>
                <div class="icon">
                  <i class="fas fa-wallet"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo "$" . $ingresos ?></h3>

                  <p>Total de Ingresos</p>
                </div>
                <div class="icon">
                  <i class="fas fa-coins"></i>
                </div>
                <a href="ingresos.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo "$" . $egreso ?></h3>

                  <p>Total de Egresos</p>
                </div>
                <div class="icon">
                  <i class="fas fa-receipt"></i>
                </div>
                <a href="egresos.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?php echo $gastos ?></h3>

                  <p>Gastos realizados este mes</p>
                </div>
                <div class="icon">
                  <i class="fas fa-hand-holding-usd"></i>
                </div>
                <a href="egresos.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Flujo de efectivo</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="speedChart" width="600" height="400"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- DIRECT CHAT -->

            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">
              <div class="card">
                <div class="card-header">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Area Chart</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="chart">
                        <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
              </div>


              <!-- /.card -->
            </section>
            <!-- right col -->
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2020-2021 SafeMoney.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.1.0-rc
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>

  <script>
    var speedCanvas = document.getElementById("speedChart");

    Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 18;

    var dataFirst = {
      label: "Ingresos",
      data: [
        <?php
        $sql = "SELECT * from ingresos where id_usuario=$id ORDER BY id DESC";
        $result = mysqli_query($mysqli, $sql);
        while ($mostrar = mysqli_fetch_array($result)) {
          echo $mostrar['monto'] . ","
        ?>
        <?php } ?>
      ],
      lineTension: 0,
      fill: false,
      borderColor: 'Green'
    };

    var dataSecond = {
      label: "Gastos",
      data: [
        <?php
        $sql = "SELECT cantidad from egresos where id_usuario=$id ORDER BY id DESC";
        $result = mysqli_query($mysqli, $sql);
        while ($mostrar = mysqli_fetch_array($result)) {
          echo $mostrar['cantidad'] . ","
        ?>
        <?php } ?>
      ],
      lineTension: 0,
      fill: false,
      borderColor: 'Red'
    };

    var speedData = {
      labels: [
        <?php
        $sql = "SELECT DAY(fecha)as fecha from ingresos where id_usuario=$id ORDER BY id DESC";
        $result = mysqli_query($mysqli, $sql);
        while ($mostrar = mysqli_fetch_array($result)) {
          echo $mostrar['fecha'] . ","
        ?>
        <?php } ?>
      ],
      datasets: [dataFirst, dataSecond]
    };

    var chartOptions = {
      legend: {
        display: true,
        position: 'top',
        labels: {
          boxWidth: 80,
          fontColor: 'black'
        }
      }
    };

    var lineChart = new Chart(speedCanvas, {
      type: 'line',
      data: speedData,
      options: chartOptions
    });
  </script>
  <script>
    $(function() {
      /* ChartJS
       * -------
       * Here we will create a few charts using ChartJS
       */

      //--------------
      //- AREA CHART -
      //--------------

      // Get context with jQuery - using jQuery's .get() method.
      var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

      var areaChartData = {
        labels: [
          <?php
          $sql = "SELECT  DAY(fecha)as fecha from ingresos where id_usuario=$id ORDER BY id DESC";
          $result = mysqli_query($mysqli, $sql);
          while ($mostrar = mysqli_fetch_array($result)) {
            echo $mostrar['fecha'] . ",";
          }
          ?>
        ],
        datasets: [{
            label: 'Ingresos',
            backgroundColor: 'rgba(60,141,188,0.9)',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: [
              <?php
              $sql = "SELECT * from ingresos where id_usuario=$id ORDER BY id DESC";
              $result = mysqli_query($mysqli, $sql);
              while ($mostrar = mysqli_fetch_array($result)) {
                echo $mostrar['monto'] . ","
              ?>
              <?php } ?>
            ],
          },
          {
            label: 'Gastos',
            backgroundColor: 'rgba(210, 214, 222, 1)',
            borderColor: 'rgba(210, 214, 222, 1)',
            pointRadius: false,
            pointColor: 'rgba(210, 214, 222, 1)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [
              <?php
              $sql = "SELECT cantidad from egresos where id_usuario=$id ORDER BY id DESC";
              $result = mysqli_query($mysqli, $sql);
              while ($mostrar = mysqli_fetch_array($result)) {
                echo $mostrar['cantidad'] . ","
              ?>
              <?php } ?>
            ],
          },
        ]
      }

      var areaChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            gridLines: {
              display: false,
            }
          }],
          yAxes: [{
            gridLines: {
              display: false,
            }
          }]
        }
      }

      // This will get the first returned node in the jQuery collection.
      var areaChart = new Chart(areaChartCanvas, {
        type: 'line',
        data: areaChartData,
        options: areaChartOptions
      })

    })
  </script>

</body>

</html>