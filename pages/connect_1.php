<?php

$Full_NameErr = $Enrol_noErr = $Email_idErr = "";
    $Full_Name = $Enrol_no = $Email_id = "";
if(isset($_POST['submit']))
{
     
    
    if (empty($_POST["Full_Name"]))
        {  
            $Full_NameErr = "Name is required"; 
            
        }
        else
        {  
            $Full_Name = test_input($_POST["Full_Name"]);  
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]*$/",$Full_Name))
            {  
                $Full_NameErr = "Only alphabets and white space are allowed";  
            }  
        }
        if (empty($_POST["Enrol_no"]))
        {  
            $Enrol_no = "Enrollment no is required";  
        }
        else 
        {  
            $Enrol_no = test_input($_POST["Enrol_no"]);  
            
            if (!preg_match ("/^[0-9]*$/", $Enrol_no) ) 
            {  
                $mEnrol_noErr = "Only numeric value is allowed.";  
            }  
         
            if (strlen ($Enrol_no) != 11) 
            {  
                $Enrol_noErr = "Enrollment no must contain 11 digits.";  
            }  
        }  
        if (empty($_POST["Email_id"]))
        {  
            $Email_idErr = "Email is required";  
        }
        else 
        {  
            $Email_id = test_input($_POST["Email_id"]);  
            // check that the e-mail address is well-formed  
            if (!filter_var($Email_id, FILTER_VALIDATE_EMAIL))
            {  
                $Email_idErr = "Invalid email format";  
            }  
        }
    
    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
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
                header("Location: ../examples/complain.php");
                $stml->execute();
                $stml->close();
                $con->close();
       
            }
        
        
    }
    else
    {
         echo 'all field are required';
        die();
    }
}
?>