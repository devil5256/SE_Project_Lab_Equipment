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
   Order_Equipment
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
    <style>
        td{
            font-size: 18px;
            color:black;
        }
        h3{
            color:blue;
            text-align: center;
            font-variant: small-caps;
            font-weight: bold;
        }
        
        .quan-box{
            
            max-width: 50px;
        }
        .box{
            margin-left: 140px;
            margin-top: -100px;
        }
    </style>
    <script type="text/javascript">  
        function myFunction() 
        {
            confirm("Are you sure you want to submit?");
        }
    </script>
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
          <li >
            <a href="./dashboard_admin.php">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="active ">
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
            <a class="navbar-brand" href="./Lab-Assistant_admin.php">Order</a>
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
        <div class="box">
          <div class="col-md-10">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title"> Order Equipment</h3>
              </div>
              <div class="card-body">
             <form action="ordermail.php" method="post">
                 <table cellpadding="5">
                     <tr>
                         <td>Admin Name:</td><td><input style="width:260px;"type="text" name="aname" required></td>
                     </tr>
                     <tr>
                         <td>Reason to buy new equipments:</td><td><textarea cols="25" rows="5" name="des" required></textarea></td>
                     </tr>
                     <tr>
                         <?php
                         $fetch_query="select * from equipment_master;";
                         
                         ?>
                         <td>Equipment Name:</td><td><select name="equip1">
                         <option value="select">Select</option>
                         <?php if ($Result = $cnn->query($fetch_query)) {
                                while ($row = $Result->fetch_assoc()) {?>
                         <option value="<?php echo $row['equipment_name'];  ?>"> <?php echo $row['equipment_name'];  ?></option><?php }}?>
                                                        </select></td><td>Quantity:</td><td><input type="number" class="quan-box" name="quantity1"></td>
                     </tr>
                     <tr>
                         <td>Equipment Name:</td><td><select name="equip2">
                                                        <option value="select">Select</option>
                                                       <?php if ($Result = $cnn->query($fetch_query)) {
                                                while ($row = $Result->fetch_assoc()) {?>
                         <option value="<?php echo $row['equipment_name'];  ?>"> <?php echo $row['equipment_name'];  ?></option><?php }}?>
                                                        </select></td><td>Quantity:</td><td><input type="number" class="quan-box" name="quantity2"></td>
                     </tr>
                     <tr>
                         <td>Equipment Name:</td><td><select name="equip3">
                                                        <option value="select">Select</option>
                                <?php if ($Result = $cnn->query($fetch_query)) {
                                while ($row = $Result->fetch_assoc()) {?>
                         <option value="<?php echo $row['equipment_name'];  ?>"> <?php echo $row['equipment_name'];  ?></option><?php }}?>
                                                        </select></td><td>Quantity:</td><td><input type="number" class="quan-box" name="quantity3"></td>
                     </tr>
                     <tr>
                         <td>Equipment Name:</td><td><select name="equip4">
                                                        <option value="select">Select</option>
                                                        <?php if ($Result = $cnn->query($fetch_query)) {
                                while ($row = $Result->fetch_assoc()) {?>
                         <option value="<?php echo $row['equipment_name'];  ?>"> <?php echo $row['equipment_name'];  ?></option><?php }}?>
                                                        </select></td><td>Quantity:</td><td><input type="number" class="quan-box" name="quantity4"></td>
                     </tr>
                     <tr>
                         <td>Equipment Name:</td><td><select name="equip5">
                                                        <option value="select">Select</option>
                                                        <?php if ($Result = $cnn->query($fetch_query)) {
                                while ($row = $Result->fetch_assoc()) {?>
                         <option value="<?php echo $row['equipment_name'];  ?>"> <?php echo $row['equipment_name'];  ?></option><?php }}?>
                                                        </select></td><td>Quantity:</td><td><input type="number" class="quan-box" name="quantity5"></td>
                     </tr>
                     <tr>
                         <td>Equipment Name:</td><td><select name="equip6">
                                                        <option value="select">Select</option>
                                                       <?php if ($Result = $cnn->query($fetch_query)) {
                                while ($row = $Result->fetch_assoc()) {?>
                         <option value="<?php echo $row['equipment_name'];  ?>"> <?php echo $row['equipment_name'];  ?></option><?php }}?>
                                                        </select></td><td>Quantity:</td><td><input type="number" class="quan-box" name="quantity6"></td>
                     </tr>
                     <tr>
                         <td>Equipment Name:</td><td><select name="equip7">
                                                        <option value="select">Select</option>
                                                        <?php if ($Result = $cnn->query($fetch_query)) {
                                while ($row = $Result->fetch_assoc()) {?>
                         <option value="<?php echo $row['equipment_name'];  ?>"> <?php echo $row['equipment_name'];  ?></option><?php }}?>
                                                        </select></td><td>Quantity:</td><td><input type="number" class="quan-box" name="quantity7"></td>
                     </tr>
                     <tr>
                         <td>Equipment Name:</td><td><select name="equip8">
                                                        <option value="select">Select</option>
                                                        <?php if ($Result = $cnn->query($fetch_query)) {
                                while ($row = $Result->fetch_assoc()) {?>
                         <option value="<?php echo $row['equipment_name'];  ?>"> <?php echo $row['equipment_name'];  ?></option><?php }}?>
                                                        </select></td><td>Quantity:</td><td><input type="number" class="quan-box" name="quantity8"></td>
                     </tr>
                     <tr>
                        <td></td><td><input type="submit" value="SEND" name="submit" onclick="myFunction()"></td>
                     </tr>
                 </table>
          </form>
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