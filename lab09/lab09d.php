<?php
require("db_connection.php");

// get the unique options for year and location
$sql_locations = "SELECT DISTINCT location FROM Lab09Pictures ORDER BY location ASC";
$result_locations = mysqli_query($connect, $sql_locations);
$sql_years = "SELECT DISTINCT YEAR(date_taken) AS year FROM Lab09Pictures ORDER BY year DESC";
$result_years = mysqli_query($connect, $sql_years);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lab 09D</title>
    <link rel="stylesheet" href="./styles1.css">

</head>
<body>

<h1>Lab 09D: Filter Pictures</h1>
<br><a href='https://webdev.cs.torontomu.ca/~osibazeb/cps530/lab09/'>INDEX<a/><br>
<form method="POST" action="">
    <label for="location">Location:</label>
    <select name="location" id="location">
        <option value="any">Any Location</option>
        <?php
        while ($row = mysqli_fetch_assoc($result_locations)) {
            echo "<option value='" . $row['location'] . "'>" . $row['location'] . "</option>";
        }
        ?>
    </select>
    <br><br>

    <label for="year">Year:</label>
    <select name="year" id="year">
        <option value="any">Any Year</option>
        <?php
        // Populate year options
        while ($row = mysqli_fetch_assoc($result_years)) {
            echo "<option value='" . $row['year'] . "'>" . $row['year'] . "</option>";
        }
        ?>
    </select>
    <br><br>

    <button type="submit">Filter Pictures</button>
</form>

<hr>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $location = $_POST['location'];
    $year = $_POST['year'];

    $where_clauses = [];
    if ($location !== 'any') {
        $location_escaped = mysqli_real_escape_string($connect, $location);
        $where_clauses[] = "location = '$location_escaped'";
    }
    if ($year !== 'any') {
        $year_escaped = mysqli_real_escape_string($connect, $year);
        $where_clauses[] = "YEAR(date_taken) = '$year_escaped'";
    }
    $where_sql = count($where_clauses) > 0 ? "WHERE " . implode(' AND ', $where_clauses) : "";

    // Final SQL query
    $sql_filtered = "SELECT * FROM Lab09Pictures $where_sql";
    $result_filtered = mysqli_query($connect, $sql_filtered);

    if ($result_filtered && mysqli_num_rows($result_filtered) > 0) {
        echo "<div class='photo-wrapper'>";
        while ($row = mysqli_fetch_assoc($result_filtered)) {
		$number = $row['picture_number'];
                $subject = $row['subject'];
                $image = $row['picture_url'];
                $location = $row['location'];
                $date_taken = $row['date_taken'];


                echo "<div class='photo'>";
                echo "<img src='$image' class='photo-image'><hr>";
                echo "<div class='photo-caption'>$number. $subject<br>$location<br>$date_taken<br><a href=$image>$image</a></div>";
                echo "</div>";

        }
        echo "</div>";
    } else {
        echo "<p>No pictures found for the selected criteria.</p>";
    }
}
?>

</body>
</html>

