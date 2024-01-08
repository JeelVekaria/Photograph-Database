    <?php
        include 'creds.php';

        // create a connection
        $connect = mysqli_connect($hostname, $username,
        $password, $database);
        // Check connection
        if($connect){
            print("Connection Established Successfully");
        }else{
            print("Connection Failed ");
        }

        $sql = "CREATE TABLE IF NOT EXISTS photographs (
        picture_number INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        subject VARCHAR(20) NOT NULL,
        location VARCHAR(20) NOT NULL,
        date_taken DATE NOT NULL,
        picture_url VARCHAR(100) NOT NULL UNIQUE
        );";


        $sqltesting = "SELECT * FROM photographs";
        $created = mysqli_query($connect, $sqltesting);
        if(mysqli_num_rows($created) <= 0){
            
        
        $sql = "INSERT IGNORE INTO 
                    photographs (subject, location,date_taken,picture_url) 
                VALUES 
                -- ADD 10 TOTAL
                    ('dog', 'ontario', '2023-11-30', 'https://i.imgur.com/NpjXuGD.jpeg'),
                    ('cat', 'america', '2023-11-12', 'https://i.imgur.com/JC4Hgr6.jpeg'),
                    ('koala', 'america', '2023-02-12', 'https://i.imgur.com/Q5F4nle.jpeg'),
                    ('dog2', 'ontario', '2016-11-27', 'https://i.imgur.com/XgbZdeA.jpeg'),
                    ('fox', 'texas', '2011-04-30', 'https://i.imgur.com/C6HqM9R.jpeg'),
                    ('river', 'ontario', '2023-06-30', 'https://i.imgur.com/BUDcQwW.jpeg'),
                    ('keyboard', 'america', '2023-03-30', 'https://i.imgur.com/CmGWE5z.jpeg'),
                    ('otter', 'america', '2023-01-11', 'https://i.imgur.com/jcsHbJM.jpeg'),
                    ('cat2', 'florida', '2006-11-04', 'https://i.imgur.com/uBNA8tl.jpeg'),
                    ('deer', 'florida', '2017-04-09', 'https://i.imgur.com/DXCXvzw.jpeg')
                    ";
        }

 
 
 if (mysqli_multi_query($connect, $sql)) {
     echo "<h3>Database Populated Succesfully</h3>";
} 
    else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        }

        


?>