<?php
session_start();
?>
<?php
		$username="";
		$password="";
		$info = "";
		
		if(isset($_POST["submit"])){
            
			$username = $_POST["uname"];
			$password = $_POST["password"];
			$cnn = mysqli_connect("localhost", "root","","labequipment");
			$qry="select * from users where username='$username' and Pass ='$password'";
          
           		$result = $cnn->query($qry);
			$row=$result->fetch_assoc();
			$roleid = $row["Role_id"];
			$cnt = mysqli_num_rows($result);
			if($cnt==0){
				$info = "either username or password is incorrect!";
			}	
			else{
                
                		$_SESSION["U_Id"] = $row["U_Id"];
				$_SESSION["F_name"] = $row["F_name"];
				$_SESSION["F_name"] = $row["F_name"];
               			$_SESSION["username"] = $row["username"];
                		echo "Role id = $roleid";

			if($roleid == 1)
			{
				header("location: pages/dashboard_admin.html");
			}
			else if($roleid == 2)
			{
				header("location: pages/assistant/dashboard.html");
			}
			else if($roleid == 3)
			{
				header("location: pages/student/examples/dashboard.html");
			}
			
			
				
		}	
			
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
    <style>
        .logo{
            padding-left: 160px;
            padding-top: 0px;
            margin-top: -100px;
            margin-bottom: 50px;
        }
        hr{
          border-color: black;  
        }
        .back{
            background: linear-gradient(to left, #ff0000 0%, #ff9900 100%);
        }
        login100-form validate-form{
            
            width: 80%;
            margin: 0 auto;
        }
        
    </style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100 back">
			<div class="wrap-login100">
                <div class="logo">
                    <img src="images/logo_1.jpg">
                    <hr>
                </div> 
<!--				<div class="login100-pic js-tilt" >-->
					<img src="images/img-01.png" alt="IMG">
<!--				</div>-->

				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title" style="font-size: 32px;">
					Login
					</span>

					<div class="wrap-input100" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="uname" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>