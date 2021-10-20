<?php
include("connect.php")
?>
<?php
           session_start();
            $username = $_SESSION['uname'];
            
			$cnn = mysqli_connect("localhost", "root","","labequipment");
			$qry="select F_name from users where username='$username'";
          
            if ($result = $cnn->query($qry)) {
                while ($row = $result->fetch_assoc()) {
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
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue">
      <!--
        You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a class="simple-text logo-normal">
          Welcome <?php echo $row['F_name']; }} ?>
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
            <a href="./Order_admin.php">
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
          <li class="active ">
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
            <a href="../logout.php">
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
            <a class="navbar-brand" href="./Lab-Assistant_admin.php">Lab Assistants</a>
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
                <h4 class="card-title"> Lab Assistants' List</h4>
                <div id="bar" style="float: right;" class="card-title">
                    <form method="post">
                        <label for="cars">Filter By:</label>
                        <select name="fields" >
                            <option value="U_Id">ID</option>
                            <option value="F_Name">First Name</option>
                            <option value="L_Name">Last Name</option>
                            <option value="email">E-mail</option>
                            <option value="Semester">Teaching in Semester</option>
                         
                        </select>
                        <input name="input" placeholder="Search">
                        <input type="submit" value="Filter" name="submit">&#160;&#160;&#160;&#160;          
                        <input type="radio" name="order" value="asc" checked> Ascending&#160;&#160;    
                        <input type="radio" name="order" value="desc"> Descending&#160;&#160;&#160;&#160;&#160; 
                        <a href="Lab-Assistant_admin.php" style="float: bottom-right;" >Reset</a>
                    </form>
                  </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                      <thead class=" text-primary">


<!--              <table border="0" cellspacing="2" cellpadding="2"> -->
                  <tr>
                  
                      <th> <B> ID </B></th> 
                      <th> <B> First Name </B></th> 
                      <th> <B> Last Name </B></th> 
                      <th> <B> Contact No </B></th> 
                      <th> <B> E-mail </B></th> 
                      <th> <B> Teaching in Semester </B></th>
          
                      
                  </tr>
                      </thead>
<?php 
$order = "asc";
$query = "SELECT * FROM users where role_id = 2";
$type = "U_Id";                      

if(isset($_POST["submit"])) {
    
    $input = $_POST["input"];
    $field = $_POST["fields"];
    $type = $_POST["fields"];
    $order = $_POST["order"];
     $query .= " && $field like '$input%'";

}

    $query .= " order by $type $order";

if ($result = $cnn->query($query)) {
    while ($row = $result->fetch_assoc()) {
?>
             <tbody>
                <tr> 
                  <td><?php echo $row["U_Id"];  ?></td> 
                  <td><?php echo $row["F_name"]; ?></td> 
                  <td><?php echo $row["L_Name"]; ?></td> 
                  <td><?php echo $row["Contact_no"]; ?></td> 
                  <td><?php echo $row["Email"]; ?></td>
                  <td><?php echo $row["Semester"]; ?></td>
                </tr>
 <?php   }
                  
    $result->free();
 } 
?>
                      </tbody>
                    </table>
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
