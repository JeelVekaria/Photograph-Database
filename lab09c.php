<?php
        include 'creds.php';


        $connect = mysqli_connect($hostname, $username,
        $password, $database);
        if($connect){
            print("<h1>Connection Established Successfully</h1>");
        }else{
            print("Connection Failed ");
        }
        
        $exist = 0;
        $sql2 = "SELECT * FROM photographs";
        $result = mysqli_query($connect, $sql2);
        if (mysqli_num_rows($result) > 0) {
            echo "<body style='background-color: rgb(173, 232, 237);'>";
            echo 
            "<div style='display: flex;justify-content:flex-start; width:100%;'>" . 
            
            "<div style='width:500px;border:2px solid; display:flex; padding:3px; margin-bottom:4px;background-color: rgb(200, 200, 200);'> Location: Ontario </div>" .
            
            "</div>";
            
            
            while($row = mysqli_fetch_assoc($result)) {
                if( $row["location"] == "ontario"){
                    $exist = 1;
                    echo 
                        "<div style='width:500px;height:auto;border:2px solid; display:flex; padding:3px;background-color: white;'>
                            <img src='" . $row["picture_url"] . "' style='width:500px;height:auto;'>
                        </div>";
                    echo 
                        "<div style='width:500px;height:20px;border:2px solid; display:flex; padding:3px;background-color: white;margin-top: 2px; margin-bottom:10px;'>
                        ■ Subject: " . $row["subject"] ." ■ Location: " . $row["location"] . 
                            " ■</div>";
                    }
            }
            echo "</body>";
        } else {
        echo "No results.";
    }
    if( $exist==0){
        echo "No pictures of Ontario taken.";
    }
    
    mysqli_close($connect);
    
    
    ?>