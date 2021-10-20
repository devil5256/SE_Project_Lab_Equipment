<?php
 $f1 = 0;
$f2 = 0;
if(isset($_POST["submit"]))
{
            
			$email = $_POST["email"];
			$new_pass = $_POST["npass"];
            $confirm_pass = $_POST["cpass"];
            $old_pass = $_POST["opass"];
    
			$cnn = mysqli_connect("localhost", "root","","labequipment");
			$qry="select * from users where Email = '$email'";
            //$cnt = 0;
           
    
              
 if ($result = $cnn->query($qry)) {

    while ($row = $result->fetch_assoc()) {
        
            $cnt = mysqli_num_rows($result);
       
            if($cnt == 1)
            {
                $db_email = $row['Email'];  
                $db_pass = $row['Pass'];
                
                
                if($db_pass == $old_pass)
                {
                    
                
                    if($db_email == $email and $new_pass == $confirm_pass)
                    {
                        $update="update users set pass = '$new_pass' where Email = '$db_email'";
                        $RESULTS = $cnn->query($update);
                        echo "Password Updated";
                    
                        header("location: index.php");
                    }
                    else
                    {

                        $f1 = 1;
                    }
                }
                else
                {
                    $f2 = 1;
                }
                
            }
        
            else
            {
                echo "Invalid Username or Password don't match";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Forget Password</title>
        <style>
            .box{
                margin: 150px 450px 170px;
                background-color: white;
                padding-top: 50px;
                padding-left: 90px ;
                padding-right: 100px;
                padding-bottom: 50px;
                border-radius: 10px;
            }
            .head{
                font-size: 25px;
                text-align: justify-all;
                overflow:hidden;
                white-space:nowrap;
                font-family: Cambria;
           
               
                
            }
            .field{
                font-size: 25px;
                border-bottom-color: black;
                border-right: none;
                border-left: none;
                border-top: none;
                border-radius: 10px;
                max-width: 220px;
                font-family: monospace;
            }
            .btn{
                font-size: 30px;
                 border-radius: 8px;
                font-family: sans-serif;
                background-color: darkgreen;
                
            }
            body{
                  background: linear-gradient(to left, #000000 0%, #66ffff 100%);
                background-repeat: no-repeat;
                background-size: cover;
                margin-bottom: 170px;
            }
            .btn:hover{
                background-color: greenyellow;
            }
            .txt{
                font-size: 30px;
                text-align: center;
                font-family: sans-serif;
                
            }
            hr{
                background-color: black;
                
            }
        </style>
    </head>
    <body>
        <div class="box">
        <form method="post">
            
                <div class="txt">
                    Reset Password
                </div>
                <hr>
            <table cellpadding="5" cellspacing="5">
                <tr>
                    <td class="head"><label>Email</label></td><td><input class="field" type="email" name="email" placeholder="Email Id"></td>
                </tr>
                <tr>
                    <td class="head"><label>Old Password</label></td><td><input class="field" type="password" name="opass" placeholder="Old Password"></td>
                </tr>
                <tr>
                    <td class="head"><label>New Password</label></td><td><input class="field" type="password" name="npass" placeholder="New Password"></td>
                </tr>
                <tr>
                    <td class="head"><label>Confirm Password</label></td><td><input class="field" type="password" name="cpass" placeholder="Confirm Password"></td>
                </tr>
                
                <tr>
                    <td><input type="submit" class="btn" name="submit" value="submit"></td>
                </tr>
            </table>
            <?php
                if($f1 == 1)
                {
                    echo "Invalid User name or password";
                }
                elseif($f2 == 1)
                {
                    echo "Old password do not match";
                }
            

            ?>
          
        </form>
              </div>
    </body>
</html>
