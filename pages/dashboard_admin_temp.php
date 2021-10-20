<?php
session_start();
 $username = $_SESSION['uname'];

include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <style>
    div.hideD {

  opacity: 0.85;
  color: #ff5500;
       
 
  background-size: 100% 200%; 
  background-image: linear-gradient(to bottom, #fff 50%, #ff6a00 50%);
  transition: 
    background-position .2s ease-in-out, 
    color .2s ease-in-out;
    
      }
      
      div.hideD:hover, div.hideD:focus + .hide {
   outline: 1px solid coral;
  background-position: 0 100%;
  color: black;
  opacity: 1
          background-color: #ff5500;
}

      th{
          
           background-position: 0 100%;
  color: darkred;
  opacity: 1
          background-color: #ff5500;
          
      }
/*
      .pass{
        padding-left: 1100px;
        padding-top: -200px;
    }
*/
      
  </style>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
        <?php
        $qry="select F_name from users where username='$username'";
          
            if ($result = $mysqli->query($qry)) {
               
             ?>
      <div class="logo">
        <a class="simple-text logo-normal">
             Welcome 
            <?php
                while( $row = $result->fetch_assoc()) {
            ?>
          <?php echo $row['F_name']; }} ?>
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="./dashboard_admin.php">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="./order_admin.php">
              <i class="now-ui-icons shopping_box"></i>
              <p>Order</p>
            </a>
          </li>
          <li>
            <a href="./students_admin.php">
              <i class="now-ui-icons users_single-02"></i>
              <p>Students</p>
            </a>
          </li>
          <li>
            <a href="./Lab-Assistant_admin.php">
              <i class="now-ui-icons education_hat"></i>
              <p>Lab-Assistants</p>
            </a>
          </li>
		  <li>
            <a href="./Equipment_admin.php">
              <i class="now-ui-icons education_agenda-bookmark"></i>
              <p>Equipment-details</p>
            </a>
          </li>
		  <li>
            <a href="./Queries_admin.php">
              <i class="now-ui-icons ui-1_email-85"></i>
              <p>Queries</p>
            </a>
          </li>
          <li>
            <a href="./logout.php">
              <i class="now-ui-icons media-1_button-power"></i>
              <p>Log Out</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">

        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="./dashboard_admin.php">Dashboard</a>
          </div>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <a href="./fpass.php">Change Password</a>  
            </div>
        </div>

      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
        </div>
    <div class="content">
        <div class="row">
          <div class="col-sm-2 col-sm-1">

              <div class="card"  onclick="location.href='students_admin.php'&nbsp;">
                  
                 <div class="hideD">
                  <div class="card-header">
                    
                    <h2 class="card-title"><center>Students</center></h2>
                     <div class="card-body" >
                        
                    <h5><center >
                        
                            Display all the details of Students
                        
                        </center></h5>
                         </div>
                     </div> 
                  </div>
                     
              </div>

            </div>
            <div class="col-sm-2 col-sm-1">

              <div class="card"  onclick="location.href='Lab-Assistant_admin.php'&nbsp;">
                  
                 <div class="hideD">
                  <div class="card-header">
                    
                    <h2 class="card-title"><center>Assistants</center></h2>
                     <div class="card-body" >
                        
                    <h5><center >
                        
                            Display all the details of lab Assistants
                        
                        </center></h5>
                         </div>
                     </div> 
                  </div>
                     
              </div>

            </div>
            <div class="col-sm-2 col-sm-1">

              <div class="card"  onclick="location.href='Equipment_admin.php'&nbsp;">
                  
                 <div class="hideD">
                  <div class="card-header">
                    
                    <h2 class="card-title"><center>Equipment</center></h2>
                     <div class="card-body" >
                        
                    <h5><center >
                        
                            Display all the details of Equipment
                        
                        </center></h5>
                         </div>
                     </div> 
                  </div>
                     
              </div>

            </div>
            <div class="col-sm-2 col-sm-1">

              <div class="card"  onclick="location.href='Order_admin.php'&nbsp;">
                  
                 <div class="hideD">
                  <div class="card-header">
                    
                    <h2 class="card-title"><center>Orders</center></h2>
                     <div class="card-body" >
                        
                    <h5><center >
                        
                            Display all the details of Orders Scheduled
                        
                        </center></h5>
                         </div>
                     </div> 
                  </div>
                     
              </div>

            </div>
          <br>
            <div class="col-md-6">

              <div class="card"  onclick="location.href='Queries_admin.php'&nbsp;">
                  
                 <div class="hideD">
                  <div class="card-header">
                    
                    <h2 class="card-title"><center>Recent Queries</center></h2>
                     <div class="card-body" >
          
                         <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                       Complain ID
                      </th>
                      <th>
                       Student ID
                      </th>
                      <th>
                        Complain Description
                      </th>
                      <th class="text-right">
                       Date of Complaint
                      </th>
                    </thead>
                      
                    <?php
  $query = "SELECT * FROM complain order by Com_date desc LIMIT 5 ;";  
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
?>    
                    <tbody>
                      <tr>
                        <td>
                          <?php echo $row["Com_Id"];  ?>
                        </td>
                        <td>
                         <?php echo $row["U_Id"];  ?>
                        </td>
                        <td>
                          <?php echo $row["Com_desp"];  ?>
                        </td>
                        <td class="text-right">
                          <?php echo $row["Com_date"];  ?>
                        </td>
                      </tr>
        <?php
    }
  $result->free();
 } 
        ?>
                        
                    </tbody>
                  </table>
                </div>
                        
                    <h5><center >
                        
                            Display all the details of Queries Posted
                        
                        </center></h5>
                         </div>
                     </div> 
                  </div>
                     
              </div>

            </div>
        </div>
    </div>
      </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
</body>

</html>