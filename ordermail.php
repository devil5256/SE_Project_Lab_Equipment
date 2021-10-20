<?php
include("connect.php");
error_reporting(0);
?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require('php/Exception.php');
require('php/PHPMailer.php');
require('php/SMTP.php');

$Name = $_POST["aname"];
$Reason = $_POST["des"];

$Equip_1 = $_POST['equip1'];
$Equip_2 = $_POST['equip2'];
$Equip_3 = $_POST['equip3'];
$Equip_4 = $_POST['equip4'];
$Equip_5 = $_POST['equip5'];
$Equip_6 = $_POST['equip6'];
$Equip_7 = $_POST['equip7'];
$Equip_8 = $_POST['equip8'];

$quan_1 = $_POST['quantity1'];
$quan_2 = $_POST['quantity2'];
$quan_3 = $_POST['quantity3'];
$quan_4 = $_POST['quantity4'];
$quan_5 = $_POST['quantity5'];
$quan_6 = $_POST['quantity6'];
$quan_7 = $_POST['quantity7'];
$quan_8 = $_POST['quantity8'];



if(isset($_POST['submit']))
{
    
    for($i =1; $i<= 8; $i++)
{
    if(${Equip_."$i"} != "select")
    {
        $e =  (string)${Equip_."$i"};
        $q = (string) ${quan_."$i"};
        $insert="INSERT INTO `order_request` (`Admin_name`, `Reason`, `Equipment_name`, `Quantity`, `Date`) VALUES ('$Name', '$Reason','$e', $q , CURRENT_DATE());";

        $RESULT = $mysqli->query($insert);
          
    }
     
     

}
          


            
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';	// hostname of mail service you are using
$mail->Port = '587';	// port number of outgoing SMTP server of mail server
$mail->SMTPDebug = 0;
$mail->isHTML(true);
$mail->Username = 'deepakkumarsinghkshatriya19@gnu.ac.in';	//	email ID through which mail is to be sent
$mail->Password = 'Zebronics_(.)';	//	password of email ID through which mail is to be sent
$mail->From = 'deepakkumarsinghkshatriya19@gnu.ac.in';	//	same email address as entered above
$mail->Subject = 'Order Details';	//	subject of email which is to be sent
$mail->Body =  "<br> Below are the Deatails of new equipments which are required to order: <br>" . "Name: " . $Name . "<br>Reason: " . $Reason;
    
for($i =1; $i<= 8; $i++)
{
    if(${Equip_."$i"} != "select")
    {
     $mail->Body .= "<br><br>Equipment Name: " . ${Equip_."$i"} . " <br>Quantity: " . ${quan_."$i"};  
    }
     
    
}
 
$mail->AddAddress('d.k.singh5256@gmail.com');	//	email address of receiver
try {
		$mail->send();
	    header("location: ./dashboard_admin.php");
	} 
	catch (Exception $e) 
	{
		echo "Mailer Error: " . $mail->ErrorInfo;
	}

}
?>