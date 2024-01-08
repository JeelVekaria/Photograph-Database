<?php
        include 'creds.php';


        // create a connection
        $connect = mysqli_connect($hostname, $username,
        $password, $database);
        // Check connection
        if($connect){
            print("<h1>Connection Established Successfully</h1>");
        }else{
            print("Connection Failed ");
        }
        
        
        $sql2 = "SELECT * FROM photographs ORDER BY date_taken DESC";
        $result = mysqli_query($connect, $sql2);
        if (mysqli_num_rows($result) > 0) {
            echo "<body style='background-color: rgb(173, 232, 237);'>";
            echo 
            "<div style='display: flex;justify-content:flex-start; width:100%;'>" . 
            
            "<div style='width:140px;border:2px solid; display:flex; padding:3px; margin:4px;background-color: rgb(200, 200, 200);'> Picture Number </div>" .
            "<div style='width:150px;border:2px solid; display:flex; padding:3px; margin:4px;background-color: rgb(200, 200, 200);'> Subject </div>" .
            "<div style='width:180px;border:2px solid; display:flex; padding:3px; margin:4px;background-color: rgb(200, 200, 200);'> Location </div>" .
            "<div style='width:180px;border:2px solid; display:flex; padding:3px; margin:4px;background-color: rgb(200, 200, 200);'> Date Taken<br>YYYY-MM-DD </div>" .
            "<div style='width:400px;border:2px solid; display:flex; padding:3px; margin:4px;background-color: rgb(200, 200, 200);'> Picture Url</div>" .
            
            "</div>";
            
            
            while($row = mysqli_fetch_assoc($result)) {
                echo 
                "<div style='display: flex;justify-content:flex-start; width:100%;'>" . 
                
                "<div style='width:140px;border:2px solid; display:flex; padding:3px; margin:4px;background-color: white;'>" . $row["picture_number"] . "</div>" .
                "<div style='width:150px;border:2px solid; display:flex; padding:3px; margin:4px;background-color: white;'>" . $row["subject"] . "</div>" .
                "<div style='width:180px;border:2px solid; display:flex; padding:3px; margin:4px;background-color: white;'>" . $row["location"] . "</div>" .
                "<div style='width:180px;border:2px solid; display:flex; padding:3px; margin:4px;background-color: white;'>" . $row["date_taken"] . "</div>" .
                "<div style='width:400px;border:2px solid; display:flex; padding:3px; margin:4px;background-color: white;'>" . $row["picture_url"] . "</div>" .
                
                "</div>";
                
            }
            echo "</body>";
        } else {
        echo "No results.";
    }
    
    mysqli_close($connect);
    
    
    ?>