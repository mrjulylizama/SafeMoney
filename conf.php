<?php
session_start();
$id=$_SESSION['id'];
require "php\conexion.php";

$sql="SELECT apellidos FROM `usuarios` WHERE id=$id ";
$resultado=$mysqli->query($sql);
$num=$resultado->num_rows;
if ($num>0) {
  $row=$resultado->fetch_object();
        $apellidos= $row->apellidos;
        
           
}else{
  $apellidos=" ";
}
$sql="SELECT email FROM `usuarios` WHERE id=$id ";
$resultado=$mysqli->query($sql);
$num=$resultado->num_rows;
if ($num>0) {
  $row=$resultado->fetch_object();
        $email= $row->email;
        
           
}else{
  $email="";
}
$sql="SELECT password FROM `usuarios` WHERE id=$id ";
$resultado=$mysqli->query($sql);
$num=$resultado->num_rows;
if ($num>0) {
  $row=$resultado->fetch_object();
        $password= $row->password;
        
           
}else{
  $password="";
}
          
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reportes</title>


  <link rel="stylesheet" href="dist\css\tablasdatos.css">
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
      <a href="index3.html" class="brand-link">
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
            <a href="#" class="d-block"><?php echo $_SESSION['nombre']?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="index.php" class="nav-link ">
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
            <a href="reportes.php" class="nav-link ">
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
            <a href="conf.php" class="nav-link active">
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
              <h1 class="m-0">Ajustes de Usuario</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Ajustes</a></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Button trigger modal -->
      <div class="col-sm-8  justify-content-center">
      <hr>
      
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <h3  class="d-block"><?php echo $_SESSION['nombre']?></h3>
            <form method="POST" name="form-work" action="guardar.php">
            <div class="form-group" >
						<input name="foto" class="form-foto" type="file">
					</div>

					<input type="submit" class="btn btn-primary"  value="Subir foto" >
           </form>
          </div>
        
              <hr>
              <form action="newdatos.php" method="post">
              <label>Nombre de Usuario </label>
              <br>
              <input type="text" name="nombre" value="<?php echo $_SESSION['nombre']?>" class="form-control">
              <br>
              <label>Apellidos de Usuario </label>
              <br>
              <input type="text" name="apellidos" value="<?php echo $apellidos?>" class="form-control">
              <br>
              <label>Email  </label>
              <br>
              <input type="text" name="email" value="<?php echo $email?>" class="form-control">
              <br>
              <label>Password  </label>
              <br>
              <input type="password" name="pass" value="<?php echo $password?>" class="form-control">
              <br>
                  
                      <input type="submit" class="btn btn-primary"  value="Guardar cambios" >
                      <br>
                      <br>
                    </form>


                    <form action="newdatos.php" method="post">
                    <Hr>
                    <br>
                    <label>Peririocidad de pago </label>
                    <input type="text" name="apellidos" value="tu salario ej. 200" class="form-control">
                    <input type="submit" class="btn btn-primary"  value="Guardar cambios" >
                     <br>
                    <br>
                    
                    </form>
            </div><!-- /.col -->
            
            



      <!-- Main content -->
      
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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="plugins\bootstrap\js\bootstrap.js"></script>
<script src="plugins\bootstrap\js\bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script >
$(document).ready(function() {
  $('#myTable').DataTable( {
    responsive: true
} );
} );
</script>

</body>


</html>