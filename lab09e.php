    <?php
    include 'creds.php';

    $connect = mysqli_connect($hostname, $username, $password, $database);
    if($connect){
        print("<h1>Connection Established Successfully</h1>");
    }else{
        print("Connection Failed ");
    }
    
    $sql = "SELECT * FROM photographs ORDER BY RAND() LIMIT 1";
    $sql2 = "SELECT * FROM photographs";
    $result = mysqli_query($connect, $sql);
    $result2 = mysqli_query($connect, $sql2);
    $count=0;

    while($row = mysqli_fetch_assoc($result2)) {
        $count=$count+1;
    }
    
    echo "<p>Total number of images: " . $count . "</p>";
    if (mysqli_num_rows($result) > 0) {
        echo "<body style='background-color: rgb(173, 232, 237);'>";
        $rowRandom = mysqli_fetch_assoc($result);
        echo "<p>Here is a random image. Refresh the page for a potentially new image.</p>";
        echo "<div style='justify-content:center;display:flex;'> <figure>
        <img src='" . $rowRandom['picture_url'] . "' style='max-width: 500px;border: 5px solid'>
        <figcaption> ■ Subject: " . $rowRandom['subject'] . " ■ Location: " . $rowRandom['location'] . " ■</figcaption>
        </figure></div>";
    } else {
        echo "<p> Couldn't Find Image</p>";
    }
    
    echo "</body>";
    mysqli_close($connect);
    ?>
