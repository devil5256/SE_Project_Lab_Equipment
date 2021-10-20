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
.button {
  border: none;
  color: white;
  padding: 10px 15px;
  text-align: center;
  text-decoration: none;
  display:table;
  font-size: 14px;
  margin: 10px 10px 10px 0px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white;
  color: black;
  border: 2px solid OrangeRed ;
}

.button1:hover {
  background-color:OrangeRed ;
  color: white;
}

.center {
  margin-left: auto;
  margin-right: auto;
}

.centerimg {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 15%;
}

input[type=text] {
  width: 30%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid OrangeRed;
}
</style>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue">
    
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
          <li>
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
<!--
          <li>
          	<li class="active ">
            <a href="./Equipment_Master_admin.php">
              <i class="now-ui-icons education_agenda-bookmark"></i>
              <p>Equipment-Master</p>
            </a>
          </li>
-->
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
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="./Lab-Assistant_admin.php">Equipment Master</a>
          </div>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <a href="../fpass.php">Change Password</a>  
            </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
          </div>
    <div class="content">
        <div class="row">
          <div class="col-md-12">
              <div class="card">
              <div class="card-header">
                <div class="a">
                <a href="./Equipment_admin.php">Go Back</a>
                


                <h4 class="card-title"> Equipment Master</h4>
                <div id="bar" class="card-title">
                  
                    <form method="post">
                     
                        <p style="color:Orange;font-size:15px;"><b>Equipment Name: </b></p>
                        <input type="text" name="equipnm"><br>
                        <button class="button button1" name="btn_sub">Submit</button>         
                    </form>

<?php


if (isset($_POST["btn_sub"]))
{

    $eq_nm=$_POST["equipnm"];

    $sql = "insert into equipment_master (equipment_name) values ('$eq_nm')";
    // echo $sql;
    $fire=$mysqli->query($sql);
    
    echo ("<script>location.href='Equipment__Master_admin.php</script>");

    


}


?>

                  </div>
              </div>

              </div>
            </div>
        </div>
    </div>
      
        </div>
      </div></div>
    
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
