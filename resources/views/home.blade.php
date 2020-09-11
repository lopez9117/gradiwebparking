  @extends('layout2')

  @section('content')  
  <style type="text/css">
      #dashboard{
        text-align: center;
        margin-left: -20px;
      }    

      .col-sm-4{
        margin-bottom:10px;

      }

  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
    </section>
    
    <!-- Main content -->
    <section class="content"  id="dashboard">
      <!-- Small boxes (Stat box) -->   
      <div class="container">  
        <div class="row">
          <div class="col-sm-4">
            <a href="/vehiculo"><img src="dist/img/bars-chart (1).png"/><h4>Admin Vehiculo</h4></a>
          </div>
          <div class="col-sm-4">
            <a href="usuarios"><img src="dist/img/innovation.png" width="60" height="60">
          
           <h4>Propietarios</h4></a>
           </div>
         
          



        </div>
      </div>
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
  @stop()
