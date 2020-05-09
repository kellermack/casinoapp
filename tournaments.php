<?php
// load DB
require('Database.class.php');
$database = new Database();

?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>Las Vegas Summer Poker Tour</title>
    <link rel="stylesheet" type="text/css" href="awesomecss.css">

</head>

<body>

<h1>2019 Las Vegas Poker Donkfest</h1>

<h1>Sort by Casino Name</h1>

<form action="index.php" method="post">

    <!-- it's good to have labels for your form elements -->
    <label for="casinoName">Choose your casino</label>
    <br>

    <select id="casinoName" name="casinoName">
        <!-- set the default "all" option to 0 so if they pick all it comes through as just "0" and is easier to work with -->
        <option value="0">-All-</option>

        <?php
        // get casino names
        $casinoNames = $database->getCasinoNames();
        // selected casino name if they submitted the form
        $selectedCasino = isset($_POST['casinoName']) ? $_POST['casinoName'] : '';

        // loop through the casino names
        foreach ($casinoNames as $casinoName) {
            // here we will add selected to the <option> html tag if this is our selected casino
            // this way the dropdown doesn't reset every time we submit the form
            $selected = ($selectedCasino == $casinoName) ? 'selected' : '';
            echo "<option value=\"$casinoName\" $selected>$casinoName</option>";
        }
        ?>
        <?php
        // get casino dates
        $casinoDates = $database->getCasinoDates();
        // selected casino date if they submitted the form
        $selectedDates = isset($_POST['casinoDate']) ? $_POST['casinoDate'] : '';

        // loop through the casino dates
        foreach ($casinoDates as $casinoDate) {
            // here we will add selected to the <option> html tag if this is our selected casino
            // this way the dropdown doesn't reset every time we submit the form
            $selected = ($selectedDates == $casinoDate) ? 'selected' : '';

        }
        ?>


    </select>


    <input type="date"
           name="casinoDate"
           value="<?php echo(isset($_POST['casinoDate']) ? $_POST['casinoDate'] : ''); ?>"
           min="2018-05-25"
           max="2018-07-01">

    <select name="s_points">
        <option value="0+">0+</option>
        <option value="50+">50+</option>
        <option value="75+">75+</option>
        <option value="100+">100+</option>
        value="<?php echo(isset($_POST['s_point']) ? $_POST['s_point'] : ''); ?>"


    </select>

    <button id="filter">Search</button>
    <br>

</form>


<div>
    <?php

    // an example showing we know what was selected
    // we can do an if here because $selectedCasino will be null if nothing was submitted
    // or 0 if they picked -ALL-
    // null and 0 are both evaluated as false in an if, so this only runs if they picked an actual casino
    if ($selectedCasino) {
        echo "You chose $selectedCasino!";
    }
    ?>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vegaspoker";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }


    // load html table
    // I switched the and to or in the casinoDate $sql.

    $sql = "SELECT * FROM tournaments WHERE true";
    if (isset($_POST['casinoName'])) {
        $sql .= " and casino = '" . $_POST['casinoName'] . "'";
    }
    if (isset($_POST['casinoDate'])) {
        $sql .= " or schedule BETWEEN '" . $_POST['casinoDate']
            . " 00:00:00.00' AND '" . $_POST['casinoDate'] . " 23:59:59.999'";
    }
    if (isset($_POST['s_point'])) {
        $sql .= " and s_points = '" . $_POST['s_point'] . "'";

    }


    $result = $conn->query($sql);
    if ($result == mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo "<form method='post' action='index.php'>";
            echo "<table>";
            echo "<tr>";
            echo "<th>select</th>";
            echo "<th>id</th>";
            echo "<th>grouping</th>";
            echo "<th>casino</th>";
            echo "<th>cost</th>";
            echo "<th>game</th>";
            echo "<th>schedule</th>";
            echo "<th>fee_percent</th>";
            echo "<th>s_points</th>";
            echo "<th>notes</th>";
            echo "</tr>";

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='tournament_id[]' value='" . $row["id"] . "'/></td>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["grouping"] . "</td>";
                    echo "<td>" . $row["casino"] . "</td>";
                    echo "<td>" . $row["cost"] . "</td>";
                    echo "<td>" . $row["game"] . "</td>";
                    echo "<td>" . $row["schedule"] . "</td>";
                    echo "<td>" . $row["fee_percent"] . "</td>";
                    echo "<td>" . $row["s_points"] . "</td>";
                    echo "<td>" . $row["notes"] . "</tr>";
                    echo "</tr>";


                }

            }
            echo "<input type='submit'>";
            echo "</form>";
        }
    }

    ?>
</div>

</body>
</html>         
         
