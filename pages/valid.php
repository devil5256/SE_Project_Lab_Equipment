<?php

    //define variables and set to empty values
    $Full_NameErr = $Enrol_noErr = $Email_idErr = "";
    $Full_Name = $Enrol_no = $Email_id = "";

    //form is submitted with post method 
    if($_SERVER["REQUEST_METHOD"] == "POST")
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
    }
    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
   
?>