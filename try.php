<?php
           
            
			$cnn = mysqli_connect("localhost", "root","","labequipment");
			$query1="select COUNT(F_name) from users where Role_id = 3 '";
          
            $stuCount = mysqli_query($cnn,$query1);
          
            // if ($result = $cnn->query($stuCount)) {
            //     // while ($row = $result->fetch_assoc()) {
            //     }
            $result = $cnn->query($stuCount)
            echo $result;
?>