<?php
include 'creds.php';

$connect = mysqli_connect($hostname, $username, $password, $database);
if($connect){
    print("<h1>Connection Established Successfully</h1>");
}else{
    print("Connection Failed ");
}

$sql = "SELECT * FROM photographs";
$distinctDatesSql = "SELECT DISTINCT date_taken from photographs";
$distinctLocationSql = "SELECT DISTINCT location from photographs";

$allDates = mysqli_query($connect, $distinctDatesSql);
$allLocations = mysqli_query($connect, $distinctLocationSql);

$result = mysqli_query($connect, $sql);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedLocation = $_POST["location"];
    $selectedDate = $_POST["date"];

    $query = "SELECT * FROM photographs WHERE location = '$selectedLocation' AND date_taken='$selectedDate'";
    $queryExecute = mysqli_query($connect, $query);
    $output = mysqli_fetch_assoc($queryExecute);
    if (mysqli_num_rows($queryExecute) > 0) {
        echo "<div style='width:500px;border:2px solid; display:flex; padding:3px; margin-bottom:4px;background-color: rgb(200, 200, 200);'><h1>~Results~</h1></div>";
                echo "<div>
                <img src='" . $output['picture_url'] . "' style='max-width: 200px;'>
                <p>Subject: " . $output['subject'] . "</p>
                <p>Location: " . $output['location'] . "</p>
                <p>Date Taken: " . $output['date_taken'] . "</p>
                </div>";
    } else {
        echo "No matching image selected. Please select from any item in this list:<br>
        'america', '2023-11-12' <br>
        'ontario', '2023-06-30'<br>
        'america', '2023-03-30'<br>
        'america', '2023-02-12'<br>
        'america', '2023-01-11'<br>
        'florida', '2017-04-09'<br>
        'ontario', '2016-11-27'<br>
        'ontario', '2023-11-30' <br>
        'texas', '2011-04-30'<br>
        'florida', '2006-11-04'<br>
        ";
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="background-color: rgb(173, 232, 237);">
<div style='width:500px;border:2px solid; display:flex; padding:3px; margin-bottom:4px;background-color: rgb(200, 200, 200);'>~Photos~</div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="location">Select Location:</label><br>
        <select name="location" id="location">
            <?php
                while ($row = mysqli_fetch_assoc($allLocations)) {
                    echo "<option value='". $row["location"] . "'>" . $row["location"] . "</option>";
                }
            ?>
        </select>

        <br>

        <label for="date">Select Year:</label><br>
        <select name="date" id="date">
            <?php
                while ($row = mysqli_fetch_assoc($allDates)) {
                    echo "<option value='". $row["date_taken"] . "'>" . $row["date_taken"] . "</option>";
                }
            ?>
        </select>

        <br><br>

        <input type="submit" value="Search">
    </form>
</body>
</html>

<?php mysqli_close($connect);?>