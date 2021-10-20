<!--

=========================================================
* Now UI Dashboard - v1.5.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-dashboard
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<?php
error_reporting(0);
$flag = true;
$Full_NameErr = $Enrol_noErr = $Err = $Email_idErr = "";
    $Full_Name = $Enrol_no = $Email_id = "";
if(isset($_POST['submit']))
{
     
    
    if (empty($_POST["Full_Name"]))
        {  
            $Full_NameErr = "Name is required";
            $flag = false;
          
        }
        else
        {  
            $Full_Name = $_POST["Full_Name"];  
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]*$/",$Full_Name))
            {  
                $Full_NameErr = "Only alphabets and white space are allowed"; 
                $flag = false;
                
            }  
        }
        if (empty($_POST["Enrol_no"]))
        {  
            $Enrol_no = "Enrollment no is required";  
             $flag = false;
        }
        else 
        {  
            $Enrol_no = test_input($_POST["Enrol_no"]);  
            
            if (!preg_match ("/^[0-9]*$/", $Enrol_no) ) 
            {  
                $Enrol_noErr = "Only numeric value is allowed.";
                $flag = false;
            }  
         
            if (strlen ($Enrol_no) != 11) 
            {  
                $Enrol_noErr = "Enrollment no must contain 11 digits."; 
                $flag = false;
            }  
        }  
        if (empty($_POST["Email_id"]))
        {  
            $Email_idErr = "Email is required";  
            $flag = false;
        }
        else 
        {  
            $Email_id = test_input($_POST["Email_id"]);  
            // check that the e-mail address is well-formed  
            if (!filter_var($Email_id, FILTER_VALIDATE_EMAIL))
            {  
                $Email_idErr = "Invalid email format"; 
                $flag = false;
            }  
        }
    
    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if($flag == true)
    {
        $Full_Name =$_POST['Full_Name'];
        $Enrol_no = $_POST['Enrol_no'];
        $Email_id = $_POST['Email_id'];
        $Semester = $_POST['Semester'];
        $Nature_Of_Complain = $_POST['Nature_Of_Complain'];
        $Complain_Details = $_POST['Complain_Details'];
        
       
      if(!empty($Full_Name) || !empty($Enrol_no) || !empty( $Email_id) || !empty($Semester) || !empty( $Nature_Of_Complain) || !empty($Complain_Details))
        {
          //connection
           $con = mysqli_connect('localhost','root','','labequipment');
            if(mysqli_connect_error())
            {
                die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
            }
            else
            {
                $insert = "insert into complain_form (Full_Name,Enrol_no, Email_id,Semester, Nature_Of_Complain, Complain_Details) values(?,?,?,?,?,?)";
                $stml = $con->prepare($insert);
                $stml->bind_param("sisiss",$Full_Name, $Enrol_no, $Email_id, $Semester, $Nature_Of_Complain, $Complain_Details);
               header("Location: ./complain.php");
                $stml->execute();
                $stml->close();
                $con->close();
       
            }
        
        
    }
    else
    {
        header("Location: ./complain.php");
         echo 'all field are required';
        
    }
    }
    else
    {
        
       $Err = "Data not Inserted"; 
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Now UI Dashboard by Creative Tim
  </title>
   
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
    
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/complain.css" rel="stylesheet" />
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />

  

</head>
<body class="">
   
<div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          CT
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Student
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li >
            <a href="dashboard.html">
              <i class="fas fa-user fa-2x"></i>
              <p>Profile</p>
            </a>
          </li>
          <li>
            <a href="subject.html">
              <i class="fas fa-book fa-2x"></i>
              <p>Subject</p>
            </a>
          </li>
          <li class="active ">
            <a href="./complain.html">
              <i class="fas fa-frown fa-2x"></i>
              <p>Complain</p>
            </a>
          </li>

          <li>
            <a href="https://www.ict.gnu.ac.in/content/cloud-based-application" target="_blank">
              <i class="fas fa-book-reader fa-2x"></i>
              <p>S
                  yllabus</p>
            </a>
          </li>

          <li>
            <a href="#">
              <i class="fas fa-user-clock fa-2x"></i>
              <p>Login history</p>
            </a>
          </li>

            <li>
              <a href="#">
                <i class="fas fa-sign-out-alt fa-2x"></i>
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
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Complain Form</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav"> 
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>

  <div class="container">
      <div class="title">Complain Form</div>
    <div class="content">
      <form action= "#" method = "post">
         
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="E.g.John Lockwood" name="Full_Name" autofocus>
              
          </div>
		   <div class="input-box">
            <span class="details">Enrollment number</span>
            <input type="number" placeholder="E.g.19162123378" name="Enrol_no">
               
          </div>
		  <div class="input-box">
            <span class="details">Email Id</span>
            <input type="email" placeholder="E.g.xyz@yahoo.com"  name="Email_id">
              
          </div>
          <div class="input-box">
            <span class="details">Semester</span>
            <select id="Sem" name="Semester" style = "width: 400px; " required>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
			</select>
          </div>
         <div class="input-box">
            <span class="details">Nature Of Complain</span>
            <select id="com" name="Nature_Of_Complain" style = "width: 400px; "required>
				<option value="Technical">Technical</option>
				<option value="Non Technical">Non Technical</option>
			</select>

          </div>
		  <div class="input-box">
            <span class="details">Complain Details</span>
            <textarea name="Complain_Details" row="11" cols="50" required>
			</textarea>
          </div>
        </div>
          <?php 
          echo "<br>" . $Full_NameErr;
          echo "<br>" . $Enrol_no;
          echo "<br>" . $Email_idErr;
          echo "<br>" . $Err;
          ?>
        
        <div class="button" >
          <input type="submit" value="Send" name="submit">
        </div>

<!--
		<script>
			function popUp()
			{
				confirm("Do you want to submit? ");
			}
		</script>
-->
      </form>
    </div>
  </div>
<script>
</script>

</body>

</html>
